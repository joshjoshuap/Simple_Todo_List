<?php include "dbconn.php";

$listID = $_POST['listID'];

$deleteQuery = "DELETE FROM lists WHERE id = '$listID'";

$sql = mysqli_query($connection, $deleteQuery);
if (!$sql) {
    die("Delete Query Failed" . mysqli_error($connection));
}

echo "<script>window.location.href='index.php'</script>";
