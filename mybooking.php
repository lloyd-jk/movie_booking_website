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


$sql = "SELECT * FROM booking WHERE username = '" . $_SESSION['username'] . "'";

// if(isset($_POST['search'])) {

//     $search_term = $connect -> real_escape_string($_POST['search_box']);
//     $sql .= "WHERE person_id = '{$search_term}'";
// }

$query = mysqli_query($connect,$sql) or die(mysqli_error($connect));
//
//$sql = mysqli_query($connect,"SELECT * FROM student WHERE rollno = '$search_term'");
// echo ' Displayed ';

?>
<!doctype html>

<body>
<h1>My Bookings</h1></br></br>
<table width='70%' cellpadding='5' cellspace='5'>


<tr>
    <td><strong>Booking Id</strong></td>
    <td><strong>Movie Title</strong></td>
    <td><strong>Theatre</strong></td>
    <td><strong>Show Time</strong></td>
    <td><strong>Show Date</strong></td>
    
</tr>
<?php while ($row = mysqli_fetch_array($query)) { ?>
<tr>
    <td><?php echo $row['booking_id']; ?></td>
    <td><?php echo $row['movie_title'] ; ?></td>
    <td><?php echo $row['theatre_name']; ?></td>
    <td><?php echo $row['show_time'] . " hours"; ?></td>
    <td><?php echo $row['show_date']; ?></td>
</tr>


<?php } ?>
</table>




<form name="delete_form" method="POST" action="cancelbooking.php">
        </br></br></br></br>
        <h2>Cancel booking</h2>
            Enter the Booking Id to Cancel: <input type="text" name="delete_box" /> 
            <input type="submit" name="delete" value="Cancel booking.">    
</form>




