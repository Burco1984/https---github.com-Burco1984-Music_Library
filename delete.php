<?php
    session_start();
    include_once('dbConfig.php');
    if(isset($_POST['bulk_delete_submit'])){
        $idArr = $_POST['checked_id'];
        foreach($idArr as $id){
            mysqli_query($conn,"DELETE FROM artists WHERE artists_id=".$id);
        }
        $_SESSION['success_msg'] = ' deleted successfully.';
        //header("Location:action.php");
		echo "Song have been " . $_SESSION["success_msg"] . ".<br>";
		echo '<a href ="home.html">Home</a>';
    }
?>