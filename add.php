<?php
        $conn = mysqli_connect('localhost','root','','project');

        if(!$conn){
            echo "Connection Error : " . mysqli_connect_error();
        }

        $tName = $_GET['id'];
        echo $tName;
        $movie = mysqli_real_escape_string($conn, $_POST['movies']);
        // $sql1 = "SELECT movie_id FROM 'movie' WHERE movie_id = '$movie'";
        // $movie_id = mysqli_query($conn,$sql1);

        // $sql2 = "SELECT t_id FROM 'theatre' WHERE t_name = '$tName'";
        // $t_id = mysqli_query($conn,$sql2);
        // echo $t_id;

        // $sql3 = "SELECT * FROM 'theatre-movie' WHERE t_id = '$t_id' AND movie_id = '$movie_id'";
        // $res1 = mysqli_query($conn,$sql3);
        // $array1 = mysqli_fetch_all($res1,MYSQLI_ASSOC);

        // if(count($array1)==0){
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
        // }
        // else{
        //     echo '<h1>Movie already running in selected theatre</h1><br>';
        // }

?>
