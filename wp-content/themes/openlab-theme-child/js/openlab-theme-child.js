/* openlab-theme-child.js
 *
 * the purpose of this file is to defin JS methods for use in OpenLab Child Theme.
 *
 * @author Kadin Benjamin ktb1193
 * */

/*
 * the following code enables a sticky main navigation bar
 * */
var navbar = null;
var sticky = null;

history.scrollRestoration = "manual"; // prevents error caused by reloading page when not at top

window.onload = function() { 
        navbar = document.getElementById( "wpadminbar" );
        navbar.style["background-color"] = "black";
        sticky = navbar.offsetTop;
}

window.onscroll = function() {  
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
