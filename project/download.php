<?php
include "connect_db.php";
if (isset($_GET['sno'])) {
    $id = $_GET['sno'];

    // fetch file to download from database
    $sql = "SELECT fname FROM uploaded_files WHERE sno=$id";
    $result = mysqli_query($con, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['fname'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['fname']));
        readfile('uploads/' . $file['fname']);
    }
}

else if (isset($_GET['sno1'])) {
    $sno1= $_GET['sno1'];

    // fetch file to download from database
    $sql1 = "SELECT fname FROM uploaded_files WHERE send_from='$_SESSION[email]'";
    $result1 = mysqli_query($con, $sql1);

    $file1 = mysqli_fetch_assoc($result1);
    $filepath1 = 'uploads/' . $file1['fname'];

    if (file_exists($filepath1)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath1));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file1['fname']));
        readfile('uploads/' . $file1['fname']);
    }
}

?>