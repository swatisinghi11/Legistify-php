<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
	<head>
		<?php echo link_tag('bootstrap.min.css')?>
		<?php echo link_tag('bootstrap.css')?>
		<?php echo script_tag('bootstrap.js')?>
		<?php echo script_tag('bootstrap.min.js')?>
		<?php echo script_tag('navigate.js')?>


		<title>Legistify</title>
	</head>
	 <body style="background-image:url(<?php echo base_url('assets/images/law1.jpg')?>); width: 25%; background-size: 100%;background-position: center center;background-repeat: no-repeat;">
		
	<br>
	<div class="header">
		<br>
			<a href="/Legistify2/index.php/Landing_page"> <div class="tag">
      <p style="font-size:35px;font-family:Courier new;margin-left:160%;color:#514e4e"><span style="margin-top:-0.5%; font-family:Papyrus,sans-serif;font-size:50px;letter-spacing:4px"><strong><span style="color:#cc364a">L</span><span style="color:blue">e</span><span style="color:green">g</span><span style="color:brown">i</span><span style="color:orange">s</span><span style="color:#420217">t</span><span style="color:green">i</span><span style="color:brown">f</span><span style="color:blue">y</span></strong></span>                                                </p>
    </div> </a>
		</div>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
			</div>
			<div class="col-md-6">
				<h3 style="font-size:3.3em;font-family:Courier new;margin-left:-5%;margin-top:30%;color:#f4dfdf"><strong> Find the best Lawyers</strong> </h3>
				<button type="button" class="btn btn-default btn-lg" style="margin-top:35%;font-family: Lato;font-size:2em;width:36%" onclick="openURL(1)">Sign In</button>
				<button type="button" class="btn btn-default btn-lg" style="margin-top:35%;font-family: Lato;font-size:2em;width:36%" onclick="openURL(2)">Sign Up</button>
			</div>
		</div>
	</div>
	<footer style="margin-left:1%;margin-top:5%;font-family: Lato">Copyright &copy; 2016 Legistify, All Rights Reserved. </footer>
	</body>
</html>
	