<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
	<head>
		<?php echo link_tag('bootstrap.min.css')?>
    <?php echo link_tag('bootstrap.css')?>
    <?php echo script_tag('jquery-1.11.1.js')?>
    <?php echo script_tag('bootstrap.js')?>
    <?php echo script_tag('bootstrap.min.js')?>
    <?php echo script_tag('navigate.js')?>
    <?php echo script_tag('signin.js')?> 
    <?php echo script_tag('mainPage.js')?> 

		<title>Legistify</title>

	</head>
	<body>
		<div>
		  <div class="container" style="border-bottom: thin solid #d3d3d3;">
		  		<div style="float:left; width:80%;">
		  			<h4 id= "user_name"> </h4>
		  		</div>
		  		<div style="float:right; width:20%;">	
		    		<button type="button" class="btn btn-default navbar-btn" style="float:right;" onclick="logout()">Sign Out</button>
		  		</div>

		  </div>
		</div>
		<div id="left_panel" style="padding: 10px;float:left; width:40%; border-right: thin solid #d3d3d3;">
			
		</div>
		<div id="right_panel" style="padding: 10px; float:left; width:60%;">
			<h2> Welcome to Legistify. Select a lawyer and book an appointment.</h2>
		</div>
		
	</body>
</html>