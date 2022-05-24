<?php 
session_start();

//initializing variables
$vtuno = "";
$email = "";
$errors = array();

//connect to database 
$db = mysqli_connect('localhost','root', '', 'vtnotes');

//Register user

if (isset($_POST['reg_user'])) {
    $vtuno = mysqli_real_escape_string($db,$_POST['vtuno']);
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $password = mysqli_real_escape_string($db,$_POST['password']);
    
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($vtuno)) { array_push($errors, "VTU No. is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password)) { array_push($errors, "Password is required"); }

    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM signupinfo WHERE vtuno='$vtuno' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
  
    if ($user) { // if user exists
        if ($user['vtuno'] === $vtuno) {
            array_push($errors, "VTU No. already exists");
        }

        if ($user['email'] === $email) {
            array_push($errors, "Email already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password);//encrypt the password before saving in the database

        $query = "INSERT INTO signupinfo (vtuno, email, password) 
              VALUES('$vtuno', '$email', '$password')";
        mysqli_query($db, $query);
        $_SESSION['vtuno'] = $vtuno;
        $_SESSION['success'] = "You are now logged in";
        header('location: homepage.php');
    }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
    $vtuno = mysqli_real_escape_string($db, $_POST['vtuno']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($vtuno)) {
        array_push($errors, "VTU is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM signupinfo WHERE vtuno='$vtuno' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['vtuno'] = $vtuno;
          $_SESSION['success'] = "You are now logged in";
          header('location: homepage.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}


?>