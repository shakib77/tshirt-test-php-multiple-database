<?php require_once 'db.php';?>
<?php require_once 'delete.php';?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

    <title>T-shirt</title>
</head>
<body>
<br>

<div class="container" my-4>
    <table class="table" id="myTable">
        <thead>
        <tr>
            <th scope="col">NO.</th>
            <th scope="col">T-shirt</th>
            <th scope="col">Color</th>
            <th scope="col">Size</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $sql = "SELECT t.tid, t.tname, c.cname, s.size, p.price FROM tshirts t INNER JOIN colors c ON t.color = c.cid INNER JOIN prices p ON t.price = p.pid INNER JOIN sizes s ON t.size = s.sid";
        $result = mysqli_query($conn, $sql);
        $tid = 0;

        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <th scope='row'><?=++$tid?></th>
                <td><?=$row['tname']?></td>
                <td><?=$row['cname']?></td>
                <td><?=$row['size']?></td>
                <td><?=$row['price']?></td>
                <td>
                    <a class='delete btn btn-sm btn-primary' href='edit.php?edit=<?=$row['tid']?>'>Edit</a>
                    <a class='delete btn btn-sm btn-danger' href='index.php?delete=<?=$row['tid']?>'>Delete</a>
                </td>
            </tr>

        <?php } ?>

        </tbody>
    </table>
</div>
<hr>
<a type="button" class="btn btn-primary ml-5" href="add.php">Add T-Shirt</a>

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
</html>
