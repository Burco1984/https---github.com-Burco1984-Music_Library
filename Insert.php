<?php
	$link = mysqli_connect("localhost", "root", "", "mydatabase"); 
	
	if (mysqli_connect_errno()){
		printf("Connection failed: %s\n", mysqli_connect_error());
		exit();
	}
	

		if(isset($_POST['art_name']) && isset($_POST['son_name'])){
			$aname = $_POST['art_name'];
			$sname = $_POST['son_name'];
		$result = mysqli_query($link,"SELECT * FROM artists WHERE song_name='".$sname."'");
		
		if (mysqli_num_rows($result) !=0)
			
			{
				echo ("Song already exist");
				echo "<br>";
				$go_back = htmlspecialchars($_SERVER['HTTP_REFERER']);
				echo "<a href='$go_back'>Go Back</a>";
				
			}
		else {
			 $query = "INSERT INTO mydatabase.artists (artists_name, song_name) VALUES ('$aname', '$sname')";
			 mysqli_query($link, $query);
			 
			echo "<br>";			 
			echo "<br>";			 
			 echo "The Artist Name is: $aname"; 
			 echo "<br>";
			 echo "and Song Name is: $sname"; 
			 echo "<br>";
			 $go_back = htmlspecialchars($_SERVER['HTTP_REFERER']);
				echo "<a href='$go_back'>Go Back</a>";
			
		}
		
		}
	//mysqli_free_result($result);
	mysqli_close($link);
	
?>
