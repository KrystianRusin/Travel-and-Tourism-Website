<?php
if(isset($_POST['signup-submit'])){

  require 'dbh.php';

  $username = $_POST['uid'];
  $email = $_POST['mail'];
  $firstName = $_POST['fName'];
  $lastName = $_POST['lName'];
  $password = $_POST['pwd'];
  $passwordconfirm = $_POST['pwd-confirm'];

if(empty($username) || empty($email) || empty($firstName) || empty($lastName) || empty($password) || empty($passwordconfirm)){
  header("Location: /FinalProject/signup.php?error=emptyfield");
  exit();
}
 else if(!(filter_var($email, FILTER_VALIDATE_EMAIL)) ) {
    header("Location: /FinalProject/signup.php?error=invalidemail");
    exit();
  }
  else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: /FinalProject/signup.php?error=invalidusername");
    exit();
  }
  else if(!preg_match("/^[a-zA-Z0-9]*$/", $firstName)) {
    header("Location: /FinalProject/signup.php?error=invalidfirstname");
    exit();
  }
  else if(!preg_match("/^[a-zA-Z0-9]*$/", $lastName)) {
    header("Location: /FinalProject/signup.php?error=invalidlastname");
    exit();
  }
  else if($password !== $passwordconfirm){
    header("Location: /FinalProject/signup.php?error=passwordcheck");
    exit();

  } else {

    $sql = "SELECT Username FROM login WHERE Username = ? ";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: /FinalProject/signup.php?error=sqlerror");
      exit();
    }  else{
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt);
      if($resultCheck>0){
        echo "<script>
        alert('Username Taken');
        window.location.href='/FinalProject/signup.php';
        </script>";
        exit();

      }  else
        {
          $sql = "INSERT INTO login (FirstName, LastName, Username, Password, EmailAddress) VALUES(?, ?, ?, ?, ?)";
          $stmt = mysqli_stmt_init($conn);
          if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location /FinalProject/signup.php?error=sqlerror");
            exit();
          }else{
            mysqli_stmt_bind_param($stmt, "sssss", $firstName, $lastName, $username, $password, $email);
            mysqli_stmt_execute($stmt);

            }
            echo '<script type="text/javascript">';
            echo ' alert("Sign Up Success")';
            echo '</script>';
            ?>
                <script>
                    document.location = ("header.php");
                </script>
            <?php
        }

    }

}

    mysqli_stmt_close($stmt);
    mysqli_close($conn);


  }else{
    header("Location: /Log In/header.php");
    exit();

  }
