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

function enable_submit_button(value, type) {
    if (type == 1) {
        if (value != "" && document.getElementById("name") != "" && document.getElementById("surname") != "" && document.getElementById("email") != "" && document.getElementById("password") != "" && document.getElementById("check-password") != "") {
            document.getElementById("submit-button").disabled = false;
        }
    }

    if (type == 2) {
        if (value != "" && document.getElementById("name") != "" && document.getElementById("ingredients") != "" && document.getElementById("day") != "") {
            document.getElementById("submit-button").disabled = false;
        }
    }

    if (type == 3) {
        if (value != "" && document.getElementById("od") != "") {
            document.getElementById("submit-button").disabled = false;
        }
    }

    if (type == 4) {
        if (value != "" && document.getElementById("name") != "" && document.getElementById("ingredients") != "") {
            document.getElementById("submit-button").disabled = false;
        }
    }

    if (type == 5) {
        if (value != "") {
            document.getElementById("submit-button").disabled = false;
        }
    }

    if (type == 6) {
        if (value != "" && document.getElementById("email") != "") {
            document.getElementById("submit-button").disabled = false;
        }
    }

    if (type == 7) {
        if (value != "" && document.getElementById("name") != "" && document.getElementById("surname") != "" && document.getElementById("email") != "") {
            document.getElementById("submit-button").disabled = false;
        }
    }
}

function check_exists_email_registration(email) {
    var xml_http = new XMLHttpRequest();
    //"?c=auth&a=registration"
    xml_http.open("GET", "?c=auth&a=emailCheck&emailCheck=" + email, true);
    xml_http.send();
    xml_http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (this.response === "true") {
                document.getElementById("email_check").innerHTML = "Daný email už existuje";
            } else {
                document.getElementById("email_check").innerHTML = "Zadajte Email";
            }
        }
    }
}

function check_same_passwords(password) {
    var xml_http = new XMLHttpRequest();
    url = "?c=auth&a=passwordCheck&passwordCheck=" + password + "-" + document.getElementById("password").value;
    xml_http.open("GET", url, true);
    xml_http.send();
    xml_http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (this.response === "false") {
                document.getElementById("password_check").innerHTML = "Heslá sa nezhodujú";
            } else {
                document.getElementById("password_check").innerHTML = "Potvrďte heslo";
            }
        }
    }
}

function check_exists_day(day) {
    var xml_http = new XMLHttpRequest();
    //"?c=auth&a=registration"
    xml_http.open("GET", "?c=daily_menu&a=dayCheck&dayCheck=" + day, true);
    xml_http.send();
    xml_http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (this.response === "false") {
                document.getElementById("day_check").innerHTML = "Daný deň neexistuje";
            } else {
                document.getElementById("day_check").innerHTML = "Deň";
            }
        }
    }
}