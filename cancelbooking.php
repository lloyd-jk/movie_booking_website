<?php
    session_start();
    if ($_SESSION['username']==null) {
        $_SESSION['username']='guest';
    }
?>

<?php

$connect = mysqli_connect('localhost','root','') or die(mysqli_error($connect));
mysqli_select_db($connect,'project') or die(mysqli_error($connect));

?>

<?php



$sql = "DELETE FROM booking "; 

if(isset($_POST['delete'])) {

    $delete_term = $connect -> real_escape_string($_POST['delete_box']);
    $sql .= "WHERE booking_id = '{$delete_term}'";
}

$query = mysqli_query($connect,$sql) or die(mysqli_error($connect,$sql));
//
//$sql = mysqli_query($connect,"SELECT * FROM student WHERE rollno = '$search_term'");
echo ' Booking Cancelled ';

?>



<?php
    header("refresh:2; mybooking.php");
?>

</body>

</html>