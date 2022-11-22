let prevScrollpos = window.pageYOffset;

window.onscroll = function() {
    let currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {

        if (document.body.scrollTop > 0 || document.documentElement.scrollTop > 0) {
            document.getElementById("header").style.backgroundColor="white";
            document.getElementById("header").style.boxShadow="2px 3px 3px black";
        } else {
            document.getElementById("header").style.backgroundColor="transparent";
            document.getElementById("header").style.boxShadow="2px 3px 3px transparent";
        }
        document.getElementById("header").style.top = "-150px";
    } else if (prevScrollpos < currentScrollPos) {
        document.getElementById("header").style.top = "-400px";
    }
    prevScrollpos = currentScrollPos;
}

function valideMenu() {
    let price = document.forms["form-menu"]["price"].value;
    if (price <= 0) {
        alert("Price must be higher than 0");
        return false;
    }
}