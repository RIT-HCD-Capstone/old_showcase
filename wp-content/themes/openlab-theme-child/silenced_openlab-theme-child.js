//openlab-theme-child.js

var navbar = null;
var sticky = null;

window.onload = function() {
        navbar = document.getElementById( "wpadminbar" );
        navbar.style["background-color"] = "black";
        sticky = navbar.offsetTop;
}

window.onscroll = function() { fixMenu() };
function fixMenu() { 
        if ( window.pageYOffset >= sticky ) {
                navbar.style["position"] = "fixed";
                navbar.style["top"] = "0";
                navbar.style["width"] = "100%";
        } else {
                navbar.style["position"] = "";
                navbar.style["top"] = "";
                navbar.style["width"] = "";
        }
}
