$(document).ready(function(){
	
	$("#signupform").submit(function(){
		var first=$("#first").val();
		var last=$('#second').val();
		var username = $('#username').val();
		var email_id=$("#email").val();
		var create_password=$("#createPass").val();
		var confirm_password=$("#confirmPass").val();
		var category = document.getElementById("category");
		var category_value = category.options[category.selectedIndex].value;
		// Checking condition if create password is equal to confirm password.
		if(create_password===confirm_password)
		{
			// Storing SignUp details in signup credentials.
			var signup_credentials = {"username":username,"email":email_id,"password":create_password,"firstname":first,"lastname":last, "lawyer":category_value};
			console.log("making ajax call...",signup_credentials);

		// Sending SignUp credentials to the server through ajax call.

				$.ajax({
    		    url: "user_data_submit",
        		type: 'POST',
        		data: signup_credentials,
        		// dataType: 'json',			    

			    //Receiving SignUp result from the server. 
			    success : function(signup_result){
			    	console.log(signup_result);
			    	window.open("success","_self");
			  //       if(signup_result.success==1 && signup_result.lawyer == '1')
					// {
					// 	window.open("/success_lawyer?id="+signup_result.uuid,"_self");
					// }
					// else if(signup_result.success==1 && signup_result.lawyer == '0')
					// {
					// 	window.open("/success_user","_self");
					// }
			    },
			    error : function(){
			        console.log("Signup Call failed !!!")
			    }
			});
			document.getElementById("error_msg").style.display='none';
		}
		// if create password and confirm password doesn't match, error message displayed
		else
		{
			document.getElementById("error_msg").style.display='block';
		}
		event.preventDefault();
	});
});