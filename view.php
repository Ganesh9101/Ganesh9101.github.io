<?php
session_start();
$con = mysqli_connect('localhost','root', '', 'vtnotes');
$sql="SELECT * FROM pdf_file";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
?>
<html>

<head>
  <meta charset="UTF-8">
  <title>VT Notes Files</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lora:wght@700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Krona+One&family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="view.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>

        <!-- Code for navbar  -->
        <nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-black">

<a href="#" 
    class="navbar-brand mb-0 h1">
    <img class = "d-inline-block align-top" src="Logo Shape V.png" width="40" height="40">
    <img class = "d-inline-block align-top" src="Logo Shape N.png" width="40" height="40">
</a>
<div class = "collapse navbar-collapse" id= "navbarNav" >
    <ul class="navbar-nav">
        <li class="nav-item active" >
            <a  style="margin-left: 1020px; padding-right:20px;"
            href="homepage.php" class= "nav-link" style="colour:red">Home</a>
        </li>
        <li class="nav-item active">
            <a style="color:#FF0000;" 
            href="index.php" class= "nav-link" style="colour:red">Log Out</a>
        </li>
        
    </ul>
</div>

</nav>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

<!-- Code for navbar  -->
    

    <div class="main" style="background-color:#fff;">

    <table id="viewdata">
        <tr>
        <th>Name</th>
        <th>Size</th>

        <th colspan=1>Action</th>
        </tr>
    <?php
        while($row=mysqli_fetch_assoc($res))
        {
            echo "<tr><td>";
            echo $row['pdf'];
            echo "</td><td>";
            echo number_format(($row['size']/1024),2) . " Kb";
            echo"
            <td><a style=color:#fafafa; href='display.php?id=".$row['pdf']."'>View</a></td></tr>";

        }
    mysqli_close($con);
    ?>
    </table>

    </div>
</body>


</html>