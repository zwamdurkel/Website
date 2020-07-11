<?php 
/*if ( !$_SESSION['login'] ) {
    header("Location: login");
} */
include('./header.php')
?>        
        <!-- Start Content -->
        <table width='100%' border='0' cellpadding='0' cellspacing='0'>
                <tr>
                    <td width='40%' style='background-color: #eee; color: #222; font-size:15px; font-family:Arial, Helvetica, sans-serif; font-weight: bold; padding:12px;'>
                        Message:
                    </td>
                </tr>
                <tr>
                    <td width='60%' style='background-color: #eee; color: #222; font-size:15px; font-family:Arial, Helvetica, sans-serif; font-weight: bold; padding:12px;'>
                        " . $_POST["message"] . "
                    </td>
                </tr>
                </table>
        <!-- End Content -->
<?php include('./footer.php')?>        