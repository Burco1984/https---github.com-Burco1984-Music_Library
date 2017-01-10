<?php
    
    include_once('dbConfig.php');
	if(isset($_POST['art_name'])){
			$aname = $_POST['art_name'];
         $query = mysqli_query($conn,"SELECT * FROM artists WHERE artists_name='$aname'");
	}
?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <meta name="description" content="">
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&amp;subset=latin">
  <link rel="stylesheet" href="bootstrap.min.css"> 
  <link rel="stylesheet" href="style.css"> 
  <link rel="stylesheet" href="mbr-additional.css" type="text/css">
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  <script type="text/javascript" src="javascripts.js" ></script>
  
  
</head>
<body>
<section class="mbr-section mbr-section-hero mbr-section-full mbr-section-with-arrow" id="header5-2" style="background-color: rgb(107,213,160);">

    

    <div class="mbr-table-cell">

        <div class="container">
            <div class="row">
                <div class="mbr-section col-md-10">

                    <h1 class="mbr-section-title display-1">Your Music Library</h1>
                    <p class="mbr-section-lead lead">Here is the list of all songs.<br> in our database for your chosen artist.</p>
					<div class="">
<form name="bulk_action_form" action="action.php" method="post" Onclick="deleteConfirm();"/>
    <table class="w3-table-all w3-card-4 w3-hoverable" align="center">
         <thead>
        <tr class="w3-pale-green">
            <th><input type="checkbox" name="select_all" id="select_all" value=""/></th>        
            <th>Artists Name</th>
            <th>Song Name</th>
        </tr>
       </thead>
        <?php
		$Connection = mysqli_connect('localhost','root','','mydatabase') or die("Connection failed::".mysql_error());
         $query = mysqli_query($Connection,"SELECT * FROM artists WHERE artists_name='$aname'");
	
            if(mysqli_num_rows($query) > 0){
                while($row = mysqli_fetch_assoc($query)){
        ?>
        <tr>
            <td align="center"><input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $row['artists_id']; ?>"/></td>        
            <td><?php echo $row['artists_name']; ?></td>
            <td><?php echo $row['song_name']; ?></td>
        </tr> 
        <?php } } else{ ?>
            <tr><td colspan="5"> Sorry No records found.</td></tr> 
			
        <?php } ?>
    </table>
	</br>
    <input type="submit" class="btn btn-danger" name="bulk_delete_submit" value="Delete"/>
</form>
<a href="javascript:history.back()">Go Back</a>
</div>
                </div>
            </div>
        </div>
    </div>

</section>
<?php
$Cser = mysqli_connect('localhost','root','') or die("Connection failed::".mysql_error()); 
$s ="select * from mydatabase.artists";  
$result = mysqli_query($Cser, $s);
$count=mysqli_num_rows($result);
echo $count." Records";
?>
	
  
    <div class="container">
        <p class="text-xs-center">Copyright (c) 2017 Dalmash.</p>
    </div>
</footer>
