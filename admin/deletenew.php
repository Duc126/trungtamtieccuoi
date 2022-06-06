<?php
include("db.php");
$sql = "DELETE FROM new WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($con, $sql)) {
    echo "<script type='text/javascript'> alert('Thông Tin đã được xóa')</script>";
    header("Location: TT.php");
} else {
    echo "<script type='text/javascript'> alert('Xóa Thất Bại')</script>" . mysqli_error($con);
}
mysqli_close($con);

?>