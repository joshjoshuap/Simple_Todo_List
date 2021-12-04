<?php include "dbconn.php";
if (isset($_POST['btnAdd'])) {
    $addList = $_POST['addList'];
    $newList = "INSERT INTO lists(list) VALUES ('$addList')";

    $sql = mysqli_query($connection, $newList);

    if (!$sql) {
        die('Query Failed' . mysqli_error($connection));
    }
}

$displayLists = "SELECT * FROM lists";
$sql = mysqli_query($connection, $displayLists);

if (!$sql) {
    die('Query Failed');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <div>
            <h1>Simple Todo List</h1>
            <form action="index.php" method="POST">
                <input type="text" name="addList" placeholder="Add your list here ...">
                <input type="submit" class="btn btn-success" name="btnAdd" value="Add List">
            </form>
        </div>

        <table>
            <th colspan="2">Lists</th>
            <?php while ($sqlRow = mysqli_fetch_assoc($sql)) { ?>
                <tr>
                    <td class="list-desc"><?php echo $sqlRow['list'] ?></td>
                    <td>
                        <form action="updateList.php" method="post">
                            <input type="hidden" name="listID" value="<?php echo $sqlRow['id']; ?>">
                            <input type="hidden" name="listItem" value="<?php echo $sqlRow['list']; ?>">
                            <input class="btn btn-primary" name="btnEdit" type="submit" value="Edit">
                        </form>

                        <form action="deleteList.php" method="post">
                            <input type="hidden" name="listID" value="<?php echo $sqlRow['id']; ?>">
                            <input class="btn btn-danger" type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php } ?>

        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>