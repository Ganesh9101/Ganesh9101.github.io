<?php 


//connect to database 
$db = mysqli_connect('localhost','root', '', 'vtnotes');


if (isset($_POST['submit'])) {
    $pdf=$_FILES['pdf']['name'];
    $pdf_type=$_FILES['pdf']['type'];
    $pdf_size=$_FILES['pdf']['size'];
    $pdf_tem_loc=$_FILES['pdf']['tmp_name'];
    $pdf_store="pdf/".$pdf;

    move_uploaded_file($pdf_tem_loc,$pdf_store);

    $sql="INSERT INTO pdf_file (pdf) values ('$pdf')";
    $query=mysqli_query($db,$sql);

}



?>