<?php
    session_start();
    
    require 'dbh.php';
    
?>
<html>
    <head>
        <title>Favourites</title>
    <!--<h1>This is my epic main menu</h1>-->
    <!--<h2>It will definitely have way to much CSS</h2>-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="styleFile.css" media="screen" />
        <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Aldrich&display=swap" rel="stylesheet"> 
        
        <script src="websiteScript.js"></script>
        
    </head>
    <body>
        
        <ul class="navBar">
            <li class="grid-1-3">
                <span onclick="homePage()">HOME</span>
            </li>
            <li class="grid-1-3">
                <span onclick="favouritesPage(<?php if(isset($_SESSION['loggedIn'])){ echo $_SESSION['loggedIn']; } ?>)">FAVOURITES</span>
            </li>
            <li class="grid-1-3">
                <span onclick="loginPage(<?php if(isset($_SESSION['loggedIn'])){ echo $_SESSION['loggedIn']; } ?>)"><?php echo $_SESSION["loginTab"]; ?></span>
            </li>
        </ul>
        
        <div class="Xoffset mainBody">
            <article class="grid-1-1">
                <h1 class="pageHeader"><?php echo $_SESSION["userId"]; ?>'s Favourites</h1>
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
                                <div class='widget'>";
                                    echo "<div class='grid-1-4 inline'>";
                                        echo '<img class="discoverImg" src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" onclick="touristPage('.$row['id'].')" />';                 
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
