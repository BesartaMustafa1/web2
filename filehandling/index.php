<?php
include 'includes/filehandler.php';

$filename = 'filehandling/file.txt';

// 1. Leximi i përmbajtjes së fajllit
echo "Reading file contents using readfile():<br>";
echo read_file_contents($filename);
echo "<br><br>";

// 2. Leximi i përmbajtjes së plotë të fajllit
echo "Reading full file contents using fread():<br>";
echo read_full_file($filename);
echo "<br><br>";

// 3. Leximi i një rreshti nga fajlli
echo "Reading a single line using fgets():<br>";
echo read_file_line($filename);
echo "<br><br>";

// 4. Leximi i të gjitha rreshtave nga fajlli
echo "Reading all lines using fgets() and feof():<br>";
$lines = read_file_lines($filename);
foreach ($lines as $line) {
    echo $line . "<br>";
}
echo "<br>";

// 5. Leximi i karaktereve një nga një
echo "Reading file character by character using fgetc():<br>";
echo read_file_characters($filename);
echo "<br><br>";

// 6. Krijimi i një fajlli të ri dhe shkrimi në të
$new_filename = 'data/testfile.txt';
echo "Creating and writing to a new file:<br>";
create_file($new_filename, "studenti 1\nstudenti 3\n");

// 7. Mbishkrimi i përmbajtjes së fajllit ekzistues
echo "Overwriting the file contents:<br>";
create_file($new_filename, "studenti 5\n");

// 8. Shtimi i përmbajtjes së re në fajllin ekzistues
echo "Appending to the file:<br>";
append_to_file($new_filename, "studenti me append\n");

// 9. Fshirja e fajllit
echo "Deleting the file:<br>";
echo delete_file($new_filename);
?>
