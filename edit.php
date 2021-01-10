<?php require_once 'db.php';?>

<?php
if (isset($_GET['edit'])) {

            /*echo '<pre>';
            print_r($_GET);
            exit();*/
    $id = $_GET['edit'];

    $sql = "SELECT * FROM `tshirts` WHERE tid='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    /*echo '<pre>';
    print_r($row);
    exit();*/

    $tid = $row["tid"];
    $tname = $row["tname"];
    $color = $row["color"];
    $size = $row["size"];
    $price = $row["price"];

}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>world!</title>
</head>
<body>

<!--Form Starts-->
<form action="" method="post" id="form">
    <div class="form-group w-25">
        <label for="tname">T-Shirt name</label>
        <input type="hidden" class="form-control" name="tid" value="<?php if(isset($tid )){echo $tid;} ?>">
        <input type="text" class="form-control" name="tnameEdit" id="tnameEdit" value="<?php if(isset($tname )){echo $tname;} ?>">
    </div>
    <div class="form-group w-25">
        <label for="cid">Color</label>
        <select class="form-control" name="colorEdit" id="colorEdit">
            <?php
            $color_id = $color;
            $sql = "SELECT * FROM colors where cid='$color_id'";

            $myColor = mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($myColor);
            ?>

            <option><?php if(isset($row['cname'] )){echo $row['cname'];} ?></option>
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
        <select class="form-control" name="sizeEdit" id="sizeEdit">
            <?php
            $size_id = $size;
            $sql = "SELECT * FROM sizes where sid='$size_id'";
            $mySize = mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($mySize);
            ?>
            <option><?php if(isset($row['size'] )){echo $row['size'];} ?></option>
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
        <select class="form-control" name="priceEdit" id="priceEdit">
            <?php
            $sql = "SELECT * FROM `prices`";
            $price = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($price)){ ?>
                <option value="<?=$row['pid']?>" ><?=$row['price']?></option>
            <?php } ?>
        </select>
        <button type="submit" class="btn btn-primary mt-3 ml-5" name="update">Update</button>
        <a class='delete btn btn-sm btn-primary mt-3 ml-5' href='index.php'>HomePage</a>
</form>

<?php
if(isset($_POST['update'])){
    $tid = $_POST['tid'];
    $tname = $_POST['tnameEdit'];
    $cid = $_POST['colorEdit'];
    $size = $_POST['sizeEdit'];
    $price = $_POST['priceEdit'];

//    echo '<pre>';
//    print_r($_POST);
//    exit();


    $query = "UPDATE `tshirts` SET `tname`='$tname',`color`='$cid',`size`='$size',`price`='$price' WHERE `tid`='$tid'";
    $update = mysqli_query($conn, $query);// or die(mysqli_error($conn));
    if ($update) {
        echo "Update successful";
    } else {
        echo "Note data is not updated";
    }
}

?>


<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
