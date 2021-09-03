 <?php
include 'connect.php';
$stmt  = mysqli_prepare($conn, "select * from Logins");
$stmt->execute();
$res = $stmt->get_result();
echo $res;
echo (mysqli_query($conn,"select * from Logins"));
echo "test";