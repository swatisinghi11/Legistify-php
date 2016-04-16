$(document).ready(function(){
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
			    url: "authentication",
			    data: signin_credentials,
			    dataType: "json",
		    //Receiving SignIn result from the server. 
			    success : function(signin_result){
			    	console.log(signin_result);
			    	var uuid=signin_result.uuid;
			    	console.log("successfully signed in!!!!!!!!!!!!!!");
			    	window.open("current_user/"+uuid,"_self");
			  //       if(signin_result.success==1)
					// {
					// 	window.open();
					// }
			    },
			    error : function(){
			        console.log("Signin Call failed !!!")
			    }
			});
		event.preventDefault();
	});

});