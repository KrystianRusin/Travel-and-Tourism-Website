//Website header scroll
function arrowDown() {
    document.querySelector('.navBar').scrollIntoView({ 
        behavior: 'smooth' 
    });
}
//Navbar buttons
function homePage() {
    document.location = ("index.php");
}
function favouritesPage(loggedIn){
    console.log("logged in: ", loggedIn);
    if(loggedIn === 1){
        document.location = ("favourites.php");
    } else{
        alert("Please Log In to choose favourites");
//        document.location = ("index.php");
    }
}
function touristPage(id) {
    var id = id;
//    var name = $(this).data('username');        
    if (id !== undefined && id !== null) {
        window.location = 'touristLocations.php?id=' + id;
    }
//    document.location = ("touristLocations.php");
}
function loginPage(loggedIn) {
    console.log("logged in: ", loggedIn);
    if(loggedIn === 1){
        document.location = ("logout.php");
    } else{
        document.location = ("header.php");
    }


    
}
