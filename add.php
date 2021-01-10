<?php require_once 'db.php';?>



<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>T-Shirt</title>
</head>
<body>

<!--Form Starts-->
<form action="" method="post" id="form">
    <div class="form-group w-25">
        <label for="tname">T-Shirt name</label>
        <input type="text" class="form-control" name="tname" id="tname" placeholder="Enter name">
    </div>
    <div class="form-group w-25">
        <label for="cid">Color</label>
        <select class="form-control" name="cid" id="cid">
            <?php
            $sql = "SELECT * FROM `colors`";
            $color = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($color)){ ?>
                <option value="<?=$row['cid']?>" ><?=$row['cname']?></option>
            <?php } ?>

        </select>
    </div>
    <div class="form-group w-25" >
        <label for="size">Size</label>
        <select class="form-control" name="size" id="size">
            <?php
            $sql = "SELECT * FROM `sizes`";
            $size = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($size)){ ?>
                <option value="<?=$row['sid']?>" ><?=$row['size']?></option>
            <?php } ?>

        </select>
    </div>
    <div class="form-group w-25">
        <label for="price">Price</label>
        <select class="form-control" name="price" id="price">
            <?php
            $sql = "SELECT * FROM `prices`";
            $price = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($price)){ ?>
                <option value="<?=$row['pid']?>" ><?=$row['price']?></option>
            <?php } ?>
        </select>
        <button type="submit" class="btn btn-primary mt-3 ml-5" name="button">Add</button>
</form>

<?php
    if(isset($_POST['button']))
    {
        /*echo '<pre>';
        print_r($_POST);
        exit();*/
        $tname = $_POST['tname'];
        $cid = $_POST['cid'];
        $size = $_POST['size'];
        $price = $_POST['price'];

        $insert = mysqli_query($conn,"INSERT INTO `tshirts`(`tname`, `color`, `size`, `price`) VALUES ('$tname','$cid','$size','$price')");

        if(!$insert)
        {
            echo mysqli_error();
        }
        else
        {
            echo "Records added successfully.";
            header('location:index.php');
        }
    }

    mysqli_close($conn);
?>
<!-- Optional JavaScript; choose one of the two! -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>