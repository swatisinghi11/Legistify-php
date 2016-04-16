$(document).ready(function(){
	
	var base_url = window.location.origin;
	var post_url_localhost = base_url+"/legistifyphp_github/index.php/Landing_page/authentication";
	var post_url_openshift = base_url+"/index.php/Landing_page/authentication";
	
	$("#signinform").submit(function(){
		var username=$("#username").val();
		var password=$("#password").val();
		var checkbox = document.getElementById('remember').checked;
	// Storing signIn data in signIn credentials.
		var signin_credentials = {username:username,password:password,remember:checkbox};
		console.log("signin call...");

	// Sending SignIn credentials to the server through ajax call.
		$.ajax({
			    type: 'POST',
			    url: post_url_localhost,
			    data: signin_credentials,
			    dataType: "json",
		    //Receiving SignIn result from the server. 
			    success : function(signin_result){
			    	console.log(signin_result);
			    	var uuid=signin_result.uuid;
			    	if(signin_result.success == 1){
				    	console.log("successfully signed in!!!!!!!!!!!!!!");
				    	window.open("current_user/"+uuid,"_self");
				    }
				    else if(signin_result.success == 0){
				    	alert("Username Does not exists!!!");
				    }
				    else{
				    	alert("Incorrect Password !!!")
				    }
			    },
			    error : function(){
			        console.log("Signin Call failed !!!")
			    }
			});
		event.preventDefault();
	});

});