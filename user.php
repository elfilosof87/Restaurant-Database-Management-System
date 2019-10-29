<?php 
require('db.php');
include("auth.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Foodilite|Reservation</title>
    <link href="//db.onlinewebfonts.com/c/465b1cbe35b5ca0de556720c955abece?family=AbolitionW00-Regular" rel="stylesheet"
        type="text/css" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/button.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <title>Foodilite</title>
</head>

<body data-aos-easing="ease-out-back" data-aos-duration="1500" data-aos-delay="0">
    <nav class="navbar navbar-expand-md navbar-dark position-sticky-top fixed-top">
        <div class="canvas-area">
            <div class="head1">
                <a class="navbar-logo" href="#"><img src="img/logo.png"
                        style="height:35px; width: 214px;padding-top:1px"> </a></div>
            <div class="flot">
                <button class="navbar-toggler" type="button " style="float: right" data-toggle="collapse"
                    data-target="#navbarResponsive">
                    <span class="navbar-toggler-icon "></span>
                </button>
            </div>

            <div class="collapse navbar-collapse text-right" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">about</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="menu.php">menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reservation.php">reservation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">logout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user">
                            <p> <?php echo $_SESSION['email']; ?></p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="col-md-12">
            <p style="font-family: 'Beyond the mountains';color:black;margin-top:100px;text-align:center;font-size:40px">Welcome <?php echo $_SESSION['email']; ?></p>
        </div>
    </div>

    <p>Your past orders</p>
    <table width="90%" border="1" style="text-align:center;border-collapse:collapse;margin-top:10px;margin-left:30px;margin-right:30px!important">
        <thead>
            <tr>
                <th><strong>S.No</strong></th>
                <th><strong>Item name</strong></th>
                <th><strong>Quantity</strong></th>
                <th><strong>Date</strong></th>
                <th><strong>Total</strong></th>
            </tr>
        </thead>
        <tbody>
            <?php
$count=1;
$email = $_SESSION["email"];
$sel_query="Select m.name,i.quantity,c.ord_date,c.email,c.oprice
    from orders1 c, ord_item i, menu m
    where c.ord_id=i.ord_id and m.id=i.id
    and c.email='$email'";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td align="center"><?php echo $count; ?></td>
                <td align="center"><?php echo $row["name"]; ?></td>
                <td align="center"><?php echo $row["quantity"]; ?></td>
                <td align="center"><?php echo $row["ord_date"]; ?></td>
                <td align="center"><?php echo $row["oprice"]; ?></td>
            </tr>
            <?php $count++; } ?>
        </tbody>
    </table>
</body>
</html>