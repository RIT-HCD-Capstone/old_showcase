//openlab-theme-child.js

/*
 * the following code enables a sticky main navigation bar
 * */
var navbar = null;
var sticky = null;

window.onload = function() { 
        navbar = document.getElementById( "wpadminbar" );
        navbar.style["background-color"] = "black";
        sticky = navbar.offsetTop;
}

window.onscroll = function() { 
        if ( !navbar ) { window.scrollTo(0, 0); }
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
