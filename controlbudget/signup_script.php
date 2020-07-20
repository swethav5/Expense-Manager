<?php

require("includes/common.php");

  // Getting the values from the signup page using $_POST[] and cleaning the data submitted by the user.
 
  $name = mysqli_real_escape_string($con, $_POST['name']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $pass=$password;
  $password = MD5($password);
  $contact = mysqli_real_escape_string($con, $_POST['contact']);
  $regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
  $regex_num = "/^[789][0-9]{9}$/";

  $result = mysqli_query($con, "SELECT * FROM user WHERE email='$email'")or die($mysqli_error($con));
  $num = mysqli_num_rows($result);

  if ($num != 0) {
      echo "<script>alert('Email already exits')</script>";
      echo("<script>location:href='signup.php'</script>");
  } else if (!preg_match($regex_email, $email)) {
      echo "<script>alert('Email entered is invalid')</script>";
      echo "<script>locaion.href='signup.php'</script>";
  } else if (!preg_match($regex_num, $contact)) {
      echo "<script>alert('Contact number is not valid')</script>";
      echo "<script>location.href='signup.php'</script>";
  } else if(strlen($pass)<6){
      echo "<script>alert('Minimum 6 characters required')</script>";
      echo "<script>location.href='signup.php'</script>";
  }else{

    $query = "INSERT INTO user(name, email, password, contact)values('" . $name . "','" . $email . "','" . $password . "','" . $contact . "')";
    mysqli_query($con, $query) or die(mysqli_error($con));
    $user_id = mysqli_insert_id($con);
    $_SESSION['email'] = $email;
    $_SESSION['id'] = $user_id;
    header('location: home.php');
  }
?>