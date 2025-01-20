<?php
include 'connect.php';
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_product = mysqli_query($conn, "DELETE FROM `Products` WHERE `P_ID`='$delete_id'");
    if ($delete_product) {
        echo "<script>window.alert('Product Deleted Successfully')</script>";
        echo "<script>window.location.href='addproduct.php'</script>";
    } else {
        echo "<script>window.alert('Product Not Deleted')</script>";
        echo "<script>window.location.href='Addproduct.php'</script>";
    }
}
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_offer = mysqli_query($conn, "DELETE FROM `offers` WHERE `Offer_ID`='$delete_id'");
    if ($delete_product) {
        echo "<script>window.alert('Product Deleted Successfully')</script>";
        echo "<script>window.location.href='addproduct.php'</script>";
    } else {
        echo "<script>window.alert('Product Not Deleted')</script>";
        echo "<script>window.location.href='Addproduct.php'</script>";
    }
}
