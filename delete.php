<?php
        $conn = mysqli_connect('localhost','root','','project');

        if(!$conn){
            echo "Connection Error : " . mysqli_connect_error();
        }

        $t_id = $_GET['id'];
        $movie = mysqli_real_escape_string($conn, $_POST['movies']);

        $sql = "DELETE FROM `theatre-movie` WHERE `theatre-movie`.`t_id` = $t_id AND `theatre-movie`.`movie_id` = $movie";
        $res = mysqli_query($conn,$sql);

        if($res)
        {
            echo '<h1>Successfuly Deleted';
            header('Location: http://localhost/Main%20Page/select_theatre.php');
		    exit();
        }
        else{
            echo "ERROR----->".mysqli_error($conn);
        }

?>
