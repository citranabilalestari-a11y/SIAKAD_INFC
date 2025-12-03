
<?php
$db=new mysqli("localhost","root","","siakaddb");
if($db){
    //echo "koneksi berhasil!";
}else{
    echo "koneksi gagal!";
}
?>