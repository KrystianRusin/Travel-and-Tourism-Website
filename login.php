<?php
if(isset($_POST['login-submit'])){

require 'dbh.php';

$username = $_POST['uid'];
$password = $_POST['pwd'];


$sql = "SELECT * FROM login WHERE Username = ? OR Password=?;";
$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql)){

  header("Location: ../header.php?error=sqlerror");
  exit();
}else{

  mysqli_stmt_bind_param($stmt, "ss", $username, $password);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  if($row = mysqli_fetch_assoc($result)) {


    if($password !== $row['Password']){
      header("Location: ../header.php?error=incorrectpassword");
      exit();

    }else{

        session_start();
        $_SESSION["userId"] = $username;
        $_SESSION["loggedIn"] = true;

      echo '<script type="text/javascript">';
      echo ' alert("Log In Success")';
      echo '</script>';

        ?>
            <script>
                document.location = ("index.php");
            </script>
        <?php
      
      
      exit();

    }


  }else{
    header("Location: /A4/header.php?error=usernotfound");
    exit();

  }



}



}
else{
  header("Location: /A4/header.php");
  exit();
}
