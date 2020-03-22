<?php
namespace FileRun;
Lang::setSection("Admin: Logs");

if (!Perms::canManage('logs')) {
	jsonFeedback(false, "You are not allowed to access the activity logs.");
}

$paging = [];
$paging['perPage'] = \S::sanitizeInteger($_REQUEST['limit'], 20);
$paging['pageOffset'] = \S::sanitizeInteger($_REQUEST['start'], 0);

$sort = ["id" => "DESC"];
if ($_REQUEST['sort']) {
	$t = \S::fromHTML($_REQUEST['sort']);
	if (ctype_alnum($t)) {
		$paging['sort'] = $t;
	}
	$dir = strtoupper(\S::fromHTML($_REQUEST['dir']));
	if ($dir == 'DESC' || $dir == 'ASC') {
		$paging['sort_dir'] = $dir;
	}
	if ($paging['sort'] && $paging['sort_dir']) {
		$sort = [$paging['sort']  => $paging['sort_dir']];
	}
}

$filterUids = false;
if ($_REQUEST['users']) {
	$t = \S::fromHTML($_REQUEST['users']);
	$t = str_replace("user:", "", $t);
	$list = explode("|", $t);
	$t = [];
	foreach ($list as $uid) {
		$uid = \S::sanitizeID($uid);
		if ($uid) {
			$t[] = $uid;
		}
	}
	if (count($t) > 0) {
		$filterUids = $t;
	}
}

$d = Log::getTable();

$filterCriteria = [];

$usd = Users::getTable();

if (Perms::isIndependentAdmin()) {
	if ($filterUids) {
		$q = [
			[
				["owner", "=", $usd->q($auth->currentUserInfo['id'])],
				["id", "=", $usd->q($auth->currentUserInfo['id']), "OR"],
			],
			["id", "IN", "('".implode("','", $filterUids)."')"]
		];
	} else {
		$q = [
			["owner", "=", $usd->q($auth->currentUserInfo['id'])],
			["id", "=", $usd->q($auth->currentUserInfo['id']), "OR"]
		];
	}
	
	$uids = $usd->selectColumn(["id"], $q);
	$filterCriteria[] = ["uid", "IN", "('".implode("','", $uids)."')"];
} else {
	$adminOver = Perms::getOne('admin_over');
	if (Perms::isSuperUser()) {
		if ($filterUids) {
			$filterCriteria[] = ["uid", "IN", "('".implode("','", $filterUids)."')"];
		}
	} else {
		if ($adminOver != "-ALL-") {
			$list = [];
			if (is_array($adminOver)) {
				foreach ($adminOver as $key => $gid) {
					$list = array_merge($list, UserGroups::selectUsersByGroup($gid));
				}
			}
			$list = array_unique($list);
			if ($filterUids) {
				$list = array_intersect($list, $filterUids);
			}
			$filterCriteria[] = ["uid", "IN", "('".implode("','", $list)."')"];
		}
	}
}

if ($_REQUEST['actions']) {
	$t = [];
	foreach ($_REQUEST['actions'] as $key => $checked) {
		$key = \S::fromHTML($key);
		if ($checked && strlen($key) > 0 && ctype_alpha(str_replace('_', '', $key))) {
			$t[] = $key;
		}
	}
	if (count($t) > 0) {
		$filterCriteria[] = ["action", "IN", "('".implode("','", $t)."')"];
	}
}

if ($_REQUEST['date_start']) {
	$dateStart = \S::fromHTML($_REQUEST['date_start']);
	$filterCriteria[] = ["date", ">=", "'".Utils\Date::HTMLDate2MySQL($dateStart, false, "/", ["y" => 2, "m" => 0, "d" => 1])."'"];
}
if ($_REQUEST['date_end']) {
	$dateEnd = \S::fromHTML($_REQUEST['date_end']);
	$filterCriteria[] =["date", "<=", "'".Utils\Date::HTMLDate2MySQL($dateEnd, true, "/", ["y" => 2, "m" => 0, "d" => 1])."'"];
}

if ($_REQUEST['search']) {
	$searchKey = \S::fromHTML($_REQUEST['search']);
	$filterCriteria[] = ["data", "LIKE", $d->q('%'.$searchKey.'%')];
}

if (count($filterCriteria) == 0) {$filterCriteria = false;}

if ($_REQUEST['export']) {
	if ($config['misc']['demoMode']) {
		exit("Action unavailable in this demo version of the software!");
	}
	$q = $d->getQuery("*", $filterCriteria, ["id" => "DESC"]);
	$rs = $d->query($q);
	$filename = "Activity Log (".date("j M Y - H.i.s").").csv";
	header('Content-Type: text/csv');
	header('Content-Disposition: attachment; filename="'.$filename.'"');
	$fp = fopen('php://output', 'wb');
	fputcsv($fp, ["No", "Date", "UserID", "Username", "Name", "Last name", "Action", "Details"]);
	$i = 0;
	foreach ($rs as $k => $row) {
		$i++;
		$userInfo = Users::getInfo($row['uid'], ["username", "name", "name2"]);
		$row['data'] = unserialize($row['data']);
		if (is_array($row['data'])) {
			$row['data'] = json_encode($row['data']);
		}
		$data = [
			$i,
			$row['date'],
			$row['uid'],
			$userInfo['username'],
			$userInfo['name'],
			$userInfo['name2'],
			Notifications\Utils::getActionName($row['action']),
			$row['data']
		];
		fputcsv($fp, $data);
	}
	fclose($fp);
	exit();
}

$rs = $d->select("*", $filterCriteria, $sort, $paging['perPage'], $paging['pageOffset']);

$paging['total'] = $d->selectOneCol("COUNT(id)", $filterCriteria);
//$paging['total'] = $db->GetOne("SELECT FOUND_ROWS()");

$rows = [];
foreach ($rs as $r) {
	$userInfo = Users::getInfo( $r['uid']);
	if (!$userInfo) {
		$userInfo['name'] = "<em>-deleted user-<br>id: ".$r['uid']."</em>";
	}
	$data = unserialize($r['data']);
	if (is_array($data)) {
		$detailsTemplateFile = $GLOBALS['section_path']."/php/details/".$r['action'].".php";
		ob_start();
		if (file_exists($detailsTemplateFile)) {
			require($detailsTemplateFile);
		} else {
?><table cellspacing="1" border="0" class="niceborder verysmall">
<?php foreach ($data as $key => $val) {?>
<tr>
	<td><?php echo $key?></td>
	<td><?php
		if (is_array($val)) {
			foreach ($val as $k => $v) {
				if (!empty($v)) {
					echo '<div>';
					echo $k . ': ';
					if (is_array($v)) {
						echo '<pre>';
						var_export($v);
						echo '</pre>';
					} else {
						echo \S::safeHTML($v);
					}
					echo '</div>';
				}
			}
		} else {
			echo \S::forHTML($val);
		}
	?></td>
</tr>
<?php }?>
</table><?php
		}
		$details = ob_get_clean();
	} else {
		if (strlen($data) > 0) {
			$details = $data;
		} else {
			$details = "";
		}
	}

	$actionName = Notifications\Utils::getActionName($r['action']);
	if (false !== stripos($r['action'], 'fail')) {
		$actionName = '<span class="colorRed">'.$actionName.'</span>';
	}
    $name = Users::formatFullName($userInfo);
	$rows[] = [
		'avatar' => '<img src="a/?uid='.$r['uid'].'" class="avatar-s" loading="lazy" />',
		"id" => $r['id'],
		"name" => \S::safeHTML($name),
		"date" => date(Lang::t("Date Format: Grid - Date"), strtotime($r['date'])),
		"action" => $actionName,
		"details" => $details
	];
}

$returnedFields = [];
$returnedFields[] = ['header' => '&nbsp;', 'name' => 'avatar',  'width' => 46, 'resizable' => false];
$returnedFields[] = ["header" => "ID", "name" => "id", "hidden" => true];
$returnedFields[] = ["header" => Lang::t("Name"), "name" => "name", "width" => 70];
$returnedFields[] = ["header" => Lang::t("Date"), "name" => "date", "width" => 140, "sortable" => true];
$returnedFields[] = ["header" => Lang::t("Action"), "name" => "action", "width" => 140, "sortable" => true];
$returnedFields[] = ["header" => Lang::t("Details"), "name" => "details", "width" => 400, 'css' => 'overflow:auto;'];

jsonOutput([
	"success" => true,
	"metaData" => [
		"fields" => $returnedFields,
		"root" => "rows",
		"totalProperty" => "totalCount"
	],
	"totalCount" => $paging['total'],
	"rows" => $rows
]);