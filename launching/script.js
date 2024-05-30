alert('script.js loaded');
function loadData() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "launching/get_user.php", true); // URL of your server-side script to fetch user data

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("result").innerHTML = xhr.responseText;
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
