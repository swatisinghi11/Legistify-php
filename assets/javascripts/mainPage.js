var global_uuid;
var current_user;
var selected_lawyer = "no-body";
var status_mapping = {0:'Not Available', 1:'Available', 2:'Booked'}
var appointment_status_map = {0:'Request Rejected', 1:'Request Pending for Approval', 2:' Your Appointment is Confimed'}
var user_status_mapping = {0:'Not Available', 1:'Available', 2:'Already Booked By Another Person'}
var schedule_date;
var schedule_time_slot = [];
$(document).ready(function(){
	var current_url = String(window.location.href);
	var index = current_url.indexOf("current_user/");
	var user_uuid = current_url.substr(index+13)
	global_uuid = user_uuid;
	console.log(global_uuid);
	var base_url = window.location.origin;
	var post_url_localhost = base_url+"/legistifyphp_github/index.php/Landing_page/mainpage_initialisation";
	var post_url_openshift = base_url+"/index.php/Landing_page/mainpage_initialisation";
	$.ajax({
		    type: 'POST',
		    url: post_url_localhost,
		    data: {"uuid":user_uuid},
		    dataType: "json",
	    //Receiving SignIn result from the server. 
		    success : function(mainpage_initialization_result){
		    	console.log("return mainpage data");
		    	console.log(mainpage_initialization_result);
		    	// var uuid=signin_result.uuid;
		    	// if(signin_result.success == 1){
			    // 	console.log("successfully signed in!!!!!!!!!!!!!!");
			    // 	window.open("current_user/"+uuid,"_self");
			    // }
			    // else if(signin_result.success == 0){
			    // 	alert("Username Does not exists!!!");
			    // }
			    // else{
			    // 	alert("Incorrect Password !!!")
			    // }
		    },
		    error : function(a,b,c){

		        console.log("initialization failed !!!",a,b,c);
		    }
		});
	event.preventDefault();
	

});