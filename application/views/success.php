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
    <?php echo script_tag('signup.js')?>

		<title>success</title>
	</head>

	<body>
		<div class="header">
		<br>
			<a href="/"> <div class="tag">
      			<p style="font-size:35px;font-family:Courier new;margin-left:40%;color:#514e4e"><span style="margin-top:-0.5%; font-family:Papyrus,sans-serif;font-size:50px;letter-spacing:4px"><strong><span style="color:#cc364a">L</span><span style="color:blue">e</span><span style="color:green">g</span><span style="color:brown">i</span><span style="color:orange">s</span><span style="color:#420217">t</span><span style="color:green">i</span><span style="color:brown">f</span><span style="color:blue">y</span></strong></span>  </p>
    			</div> </a>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6" style="margin-top:10%;background-color:#f2effb;box-shadow: 4px 4px 3px #888888;border-radius:3%">
					<br>
					<p style="font-family:Lato;font-size:20px">You are successfully signed up. Please sign in to continue. <button type="submit" class="btn btn-primary" onclick="openURL(4)">Sign In</button></p>
					<br>
				</div>
			</div>
		<div>
	</body>
</html>