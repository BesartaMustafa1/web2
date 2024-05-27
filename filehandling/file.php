<?php
function read_file_contents($filename) {
    if (file_exists($filename)) {
        return readfile($filename);
    } else {
        return "File does not exist.";
    }
}

function open_file($filename, $mode) {
    return fopen($filename, $mode) or die("Unable to open file!");
}

function read_full_file($filename) {
    $file = open_file($filename, "r");
    $content = fread($file, filesize($filename));
    fclose($file);
    return $content;
}

function read_file_line($filename) {
    $file = open_file($filename, "r");
    $line = fgets($file);
    fclose($file);
    return $line;
}

function read_file_lines($filename) {
    $file = open_file($filename, "r");
    $lines = [];
    while (!feof($file)) {
        $lines[] = fgets($file);
    }
    fclose($file);
    return $lines;
}

function read_file_characters($filename) {
    $file = open_file($filename, "r");
    $content = "";
    while (!feof($file)) {
        $content .= fgetc($file);
    }
    fclose($file);
    return $content;
}

function create_file($filename, $content) {
    $file = open_file($filename, "w");
    fwrite($file, $content);
    fclose($file);
}

function append_to_file($filename, $content) {
    $file = open_file($filename, "a");
    fwrite($file, $content);
    fclose($file);
}

function delete_file($filename) {
    if (file_exists($filename)) {
        unlink($filename);
        return "File deleted successfully";
    } else {
        return "File does not exist.";
    }
}
?>

<?php
// Krijimi i një skedari të quajtur file.txt
$file_content = "Ky është përmbajtja e file.txt.\n";
$file_content .= "Ky është rreshti tjetër.\n";
$file_content .= "Dhe këtu mund të shtoni më shumë rreshta nëse dëshironi.";

// Shkrimi i përmbajtjes në file.txt
file_put_contents('data/file.txt', $file_content);

echo "file.txt është krijuar me sukses.";
?>