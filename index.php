<?php
    session_start();

    if(isset($_SESSION['loggedIn'])){
        $_SESSION["loginTab"] = "LOG OUT";
    } else {
        $_SESSION["loginTab"] = "LOGIN";
    }

    require 'dbh.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Fast Travel</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="styleFile.css" media="screen" />
        <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Aldrich&display=swap" rel="stylesheet">

        <script src="websiteScript.js"></script>

    </head>
    <body>
        <div class="headerBackground">
            <h1 class="websiteHeader">Fast Travel</h1>
            <div class="center">
                <span onclick="arrowDown()" class="arrow">&#8595;</span>
            </div>
        </div>

        <ul class="navBar">
            <li class="grid-1-2">
                <span onclick="homePage()">HOME</span>
            </li>
            <li class="grid-1-2">
                <span onclick="loginPage(<?php if(isset($_SESSION['loggedIn'])){ echo $_SESSION['loggedIn']; } ?>)"><?php echo $_SESSION["loginTab"]; ?></span>
            </li>
        </ul>




        <div class="Xoffset mainBody">
            <article class="grid-1-1">
                <h1 class="pageHeader">Discover your destination!</h1>
            </article>
<!--            <div class="row">
                <article class="row grid-1-1">
                    <div class="widget">
                        <form action="/action_page.php">
                            <input class="MainSearch" type="text" name="MainSearch" placeholder="Search">
                            <input type="submit" value="Submit">
                        </form>
                    </div>
                </article>
            </div>-->

            <?php
                $sql = "SELECT * FROM cities";
                $result = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_array($result)){
                    echo "<div class='row'>
                            <article class='row grid-1-1'>
                                <div onclick='touristPage(".$row['id'].")' class='widget'>";
                                    echo "<div class='grid-1-4 inline'>";
                                        echo '<img class="discoverImg" src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'"  />';
                                    echo "</div>";
                                    echo "<div class='grid-3-4 inline'>";
                                        echo "<div id='name'>";
                                            echo "<h3>" . $row['name'] . "</h3>";
                                        echo "</div>";
    //                                    echo "<br>";
                                        echo "<div id='description'>";
                                            echo $row['description'];
                                        echo "</div>";
                                    echo "</div>";
                    echo "      </div>
                            </article>
                        </div>";
                }

            ?>

            <div class="row grid-1-1">
                <ul class="navBar">
                    <li class="grid-1-1">
                        <span onclick="arrowDown()">Back to Top</span>
                    </li>
                </ul>
            </div>
        </div>
    </body>
</html>
