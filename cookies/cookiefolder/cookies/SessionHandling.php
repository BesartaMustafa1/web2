<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Session Handling</title>
</head>
<body>


<form method="post">
    <label for="name">Enter name:</label>
    <input type="text" id="name" name="name" required><br><br>
    
    <button type="submit" name="create_session">Session</button>
    <button type="submit" name="view_session">View Session</button>
    <button type="submit" name="destroy_session">Destroy Session</button>
</form>

<?php
session_start();
#Definimi dhe përdorimi i SESSIONS në PHP me të gjitha specifikat (krijimi, ruajtja e vlerave, leximi i vlerave etj).
if(isset($_POST['create_session'])) {
    if(!empty($_POST['name'])) {
        $_SESSION['name'] = $_POST['name'];
        echo "<p>Session created successfully!</p>";
    } else {
        echo "<p>Please enter a name.</p>";
    }
}

if(isset($_POST['view_session'])) {
    if(isset($_SESSION['name'])) {
        echo "<p>Session Name: " . $_SESSION['name'] . "</p>";
    } else {
        echo "<p>No session found.</p>";
    }
}

if(isset($_POST['destroy_session'])) {
    session_destroy();
    echo "<p>Session destroyed successfully!</p>";
}
?>

</body>
</html>