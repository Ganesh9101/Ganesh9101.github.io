<!DOCTYPE html>
<html lang="en" >
<head>
    <!-- JavaScript Bundle with Popper -->
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <meta charset="UTF-8">
  <title>VT Notes Homepage</title>
  <link rel="stylesheet" href="homepage.css">

</head>
    <body>
        <!-- Code for navbar  -->
        <nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-black " >

            <a href="#" 
                class="navbar-brand mb-0 h1">
                <img class = "d-inline-block align-top" src="Logo Shape V.png" width="40" height="40">
                <img class = "d-inline-block align-top" src="Logo Shape N.png" width="40" height="40">
            </a>
            <div class = "collapse navbar-collapse " id= "navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active" >
                        <a  style="margin-left: 1020px; padding-right:20px;"
                        href="homepage.php" class= "nav-link" style="colour:red">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a style="color:red;" 
                        href="index.php" class= "nav-link" style="colour:red">Log Out</a>
                    </li>
                    
                </ul>
            </div>

        </nav>
    
        <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        
        <!-- Code for navbar  -->

        <div class="view">
            <form action="view.php" method="post">
                <button class="button">View</button>
            </form>
            
        </div>
        <div class="upload">
            <form class="upload" action="homepage.php" method="post" enctype="multipart/form-data">
            <input id="pdf" type="file" name="pdf" value="" required><br><br>
            
            <button class = "button" name = "submit">Upload</button>

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

                    $sql="INSERT INTO pdf_file(pdf,size) values('$pdf','$pdf_size')";
                    $query=mysqli_query($db,$sql);
                }   
            ?>

        </div>

    </body>
</html>