<?php
//PDO (PHP Data Objects)

$dbhost = 'localhost:3306';
$dbuser = 'root';
$dbpass = 'Art@1234';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass); 
if(! $conn )
{
die('Could not connect: ' . mysqli_connect_error());
}
echo 'Connected successfully'.'<br>';*/

//krijimi i databazes
$sql = 'CREATE Database library_db';
$retval = mysqli_query( $conn, $sql ); 
if(! $retval )
{
die('Could not create database: ' . mysqli_connect_error());
}
echo "Database Ushtrime created successfully\n";
mysqli_close($conn);

//Fshirja e databazes
$sql = 'DROP Database library_db';
$retval = mysqli_query( $conn, $sql ); if(! $retval )
{
die('Could not drop database: ' . mysqli_connect_error());
}
echo "Database library_db droped successfully\n"; 
mysqli_close($conn);

?>
<?php
//Krijimi i tabeles
$dbhost = 'localhost:3306';
$dbuser = 'root';
$dbpass = 'Password';
$db='library_db';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db); 
if(! $conn )
{
die('Could not connect: ' . mysqli_connect_error());
}
$sql = 'CREATE TABLE authors ( 
    Id integer,
    fullName varchar(100);

$retval = mysqli_query( $conn, $sql ); 
if(! $retval )
{
die('Could not create table: ' . mysqli_connect_error());
}
echo "Table authors was created successfully\n";
mysqli_close($conn);


 //Insertimi i te dhenave
$dbhost = 'localhost:3306';
$dbuser = 'root';
$dbpass = 'Art@1234';
$db='library_db';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db); 
if(! $conn )
{
die('Could not connect: ' . mysqli_connect_error());
}
$sql = 'INSERT INTO authors '.
'(id, fullName) '. 'VALUES ( 1, "J.K. Rowling" )';
'(id, fullName) '. 'VALUES ( 2, "George R.R. Martin" )';

$retval = mysqli_query( $conn, $sql ); if(! $retval )
{
die('Could not enter data: ' . mysqli_connect_error());
}
echo "Entered data successfully\n"; 
mysqli_close($conn);

 ?>