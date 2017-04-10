<!doctype html>
<html>
<head>
<style>
	<?php
	$fname=$_POST["fname"];
		$lname=$_POST["lname"];
		$bday=$_POST["bday"];
		$gender=$_POST["gender"];
		$province=$_POST["province"];
	?>
	p{
		
		font-family: ‘Palatino Linotype’, ‘Book Antiqua’, Palatino, serif;
		text-shadow: 1px 1px 2px white;
		font-size: 22px;
		text-shadow: <?php

			if (2017-$bits[0]<14){
				echo("#6374AB 1px -1px 2px");
			}
			else if($gender=="Male"){
				echo("1px 1px 2px white");
			}
			else if ($gender=="Female"){
				echo ("#FF69B4 1px -1px 2px");
			}
			?>
		
	}
	h1{
		color: <?php

			if (2017-$bits[0]<14){
				echo("lightblue");
			}
			else if($gender=="Male"){
				echo ("Black");
			}
			else if ($gender=="Female"){
				echo ("Pink");
			}
			?>
	}
	.designfont{
		text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
		color: Pink; 
		font-family: 'Trocchi', serif; 
		font-size: 45px; 
		font-weight: normal; 
		line-height: 48px; 
		margin: 0;
	}
	body{
		 -webkit-background-size: cover;
  		-moz-background-size: cover;
		  -o-background-size: cover;
  		background-size: cover;
		background-image: url('<?php 
		
		$bits = explode('-', $bday);
			if (2017-$bits[0]<14){
				echo("bgn_child.jpg");
			}
			else if($gender=="Male"){
				echo ("night.jpg");
			}
			else if ($gender=="Female"){
				echo ("bgn_women.jpg");
			}
			?>');
 		
		
	}
	img {
    display: block;
    margin-left: auto;
    margin-right: auto
	}
...
</style>
<link href="FontAnimation.css" rel="stylesheet" type="text/css">
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<center><h1 class="designfont animated rubberBand bounce">Slogan of Provice</h1></center>
	<?php
	$fname=$_POST["fname"];
	$lname=$_POST["lname"];
	$bday=$_POST["bday"];
	$gender=$_POST["gender"];
	$province=$_POST["province"];
	
	
	$bits = explode('-', $bday);
	//print_r ($bits);
	// Data Reading
	$handle=fopen($province.".txt","r");
	
	while (!feof($handle)){
			$show=fgets($handle, 1024);
			echo "<center><p>$show</center></p>";
			echo "<br />"; 	
	}
	fclose($handle);
	?>
	<img src ="<?php echo $province.".png"; ?>" />
	
	
</body>
</html>