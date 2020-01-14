<?php
    session_start();
    require 'dbh.php';
?>
<html>
    <head>
        <title>Locations</title>
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
                <h1 class="pageHeader"></h1>
            </article>
            
            <script>
                
            </script>
            
            <?php
                $id = htmlspecialchars($_GET["id"]);

                $sql = "SELECT * FROM cities WHERE cities.id = '$id'";
                $result = mysqli_query($conn, $sql);
                
                
                while($row = mysqli_fetch_array($result)){

                    echo "<div class='row'>
                            <article class='row grid-3-4'>
                                ";
                                    echo "<h2 class='locationTitle'>";
                                        echo "Why Go To " . $row['name'] . "?";
                                    echo "</h2>";
//                                    echo "<div id='img_div'>";
//                                        echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" onclick="touristPage()" width="461" height="276"/>';                 
//                                    echo "</div>";
                                    echo "<p id='description'>";
                                        echo $row['paragraph1'];
                                    echo "</p>";
                                    echo "<p id='description'>";
                                        echo $row['paragraph2'];
                                    echo "</p>";
                    echo "      
                            </article>";
                        echo "<article class='row grid-1-4'>";
                            echo "<div class='widget'>";
                                echo "<div class='sidePanel'>YOU MIGHT ALSO LIKE</div>";
                            echo "</div>";
                        echo "</article>";
                    echo "</div>";
                    
                    echo "<div class='row'>";
                        echo "<div class=''>";
                            echo '<img class="locationImg" src="data:image/jpeg;base64,'.base64_encode($row['image2'] ).'" " />';                 
                        echo "</div>";
                    echo "</div>";
                    
                    
                    
                    
                    
                    
                    echo "<div class='row'>
                            <article class='row grid-3-4 seperator'>";
                                echo "<h2 class='locationTitle'>";
                                    echo "Best Hotels in " . $row['name'];
                                echo "</h2>";
                    
                        $sql = "SELECT * FROM accommodations WHERE cityId = '$id'";
                        $result = mysqli_query($conn, $sql);
                            while($hotel = mysqli_fetch_array($result)){
                                echo "<ul>";
                                    echo "<a href='" . $hotel['websiteLink'] . "'>" . $hotel['hotel_name'] . "</a>";
                                echo "</ul>";
                            }
                            
                    echo "</article>
                    </div>";
                    
                    echo "<div class='row'>
                            <article class='row grid-3-4 seperator'>";
                                echo "<h2 class='locationTitle'>";
                                    echo "Best Things to Do in " . $row['name'];
                                echo "</h2>";
                                
                        $sql = "SELECT * FROM activities WHERE cityId = '$id'";
                        $result = mysqli_query($conn, $sql);
                            while($activities = mysqli_fetch_array($result)){
                                echo "<ul>";
                                    echo $activities['name'];
                                echo "</ul>";
                            }
                            
                    echo "</article>
                    </div>";
                    
                    echo "<div class='row'>
                            <article class='row grid-3-4 seperator'>";
                                echo "<h2 class='locationTitle'>";
                                    echo "Best Restaurants to visit in " . $row['name'];
                                echo "</h2>";
                                
                        $sql = "SELECT * FROM restaurants WHERE cityId = '$id'";
                        $result = mysqli_query($conn, $sql);
                            while($restaurants = mysqli_fetch_array($result)){
                                echo "<ul>";
                                    echo $restaurants['name'];
                                    echo "<br>";
                                    echo $restaurants['description'];
                                echo "</ul>";
                            }
                            
                    echo "</article>
                    </div>";
                    
                    
                    
                }
                
                
                
                
            ?>
            
            
        </div>    

        
        
        <div></div>
    </body>
     
    
    
</html>
