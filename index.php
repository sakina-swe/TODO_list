<?php
declare(strict_types=1);

require 'DB.php';
$db = new DB();

if (!empty($_POST)) {
    var_dump($_POST);
    if (strlen($_POST['todo'])) {
        $db->insert();
        header('Location: index.php');
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TODO List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <form action="index.php" method="post">
        <div class="form-group">
            <label>
                <input type="text" name="todo" placeholder="Enter input">
            </label>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

<div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Status</th>
            <th scope="col">TODO</th>
        </tr>
        </thead>

        <tbody>
        <?php
        $data = $db->fetch();
        foreach ($data as $row) { ?>
            <tr>
                <td>
                    <?php if ($row['status']) { ?>
                    <label>
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        Done</label>?>
                </td>
                <?php } ?>
                <td>
                    <?php echo $row['todos'] ?>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>




