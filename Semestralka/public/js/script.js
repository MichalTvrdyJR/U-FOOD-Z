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

function enable_submit_button() {

}

function add_to_cart() {

}

function check_passwords(str) {
    if (str.length == 0) {
        document.getElementById("skuskaNiecoho").innerHTML = "";
        return;
    } else {
        var xml_http = new XMLHttpRequest();
        xml_http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("skuskaNiecoho").innerHTML = this.responseText;
            }
        };
        xml_http.open("GET", "");
        xml_http.send();
    }
}

