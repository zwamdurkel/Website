for F in *.png
do 
cwebp -q 80 $F -o `basename ${F%.png}`.webp
done