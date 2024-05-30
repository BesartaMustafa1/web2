alert('script.js loaded');

function loadUser() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "launching/get_user.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("user").innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}


function updateUser() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "launching/update_user.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("result").innerHTML = xhr.responseText;
        }
    };

    var params = "id=1&name=Jane&age=25";
    xhr.send(params);
}

// Lexim i te dhenave nga PHP skripta
function loadData() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "launching/data.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("result").innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}

// Update i te dhenave nga PHP skripta
function updateData() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "update.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("result").innerHTML = xhr.responseText;
        }
    };
    var params = "name=John&age=30";
    xhr.send(params);
}
