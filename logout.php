<?php
    session_start();

    if(session_destroy()){
        $_SESSION['loggedIn'] = 0;
        
        echo "<script>
        alert('Successfully Logged Out');
        window.location.href='/FinalProject/index.php';
        </script>";
        
        
//        header("Location: index.php");
    }
?>
