<?php
header('Content-Type: text/html; charset=utf8');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login CMS.UM</title>
    <meta name="description" content="CMS.UM">
    <meta name="author" content="Borja Abad">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php  Media::js();   ?>
	<?php  Media::css();  ?>
  </head>
<body style="">
	
		<?php
		if(MENU){
			echo  '<div id="wrapper">';
			include 'menu.php';
		}
		else 
			echo '<div>';
			
			?>
		<?php //include 'top_bar.php';?>
