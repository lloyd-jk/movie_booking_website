<?php
        $conn = mysqli_connect('localhost','root','','project');

        if(!$conn){
            echo "Connection Error : " . mysqli_connect_error();
        }

        $tName = $_GET['id'];
        echo $tName;
        $movie = mysqli_real_escape_string($conn, $_POST['movies']);

            $sql4 = "INSERT INTO `theatre-movie` (`t_id`, `movie_id`) VALUES ('$tName', '$movie')";
            $res2 = mysqli_query($conn,$sql4);
            if($res2)
            {
                header('Location: http://localhost/Main%20Page/select_theatre.php');
		        exit();
            }
            else{
                echo "ERROR----->".mysqli_error($conn);
            }

?>
