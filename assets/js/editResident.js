/**
 * File : editUser.js 
 * 
 * This file contain the validation of edit user form
 * 
 * @author Kishor Mali
 */
$(document).ready(function(){
	
	var editResidentForm = $("#editResident");
	
	var validator = editResidentForm.validate({
		
		rules:{
			res_Fname :{ required : true },
			res_Lname :{ required : true },
			age :{ required : true, digits : true },
			gender :{ required : true },
			status :{ required : true },
			mobile_no : { required : true, digits : true },
			add_desc : { required : true, selected : true}
		},
		messages:{
			res_Fname :{ required : "This field is required" },
			res_Lname :{ required : "This field is required" },
			age : { required : "This field is required", digits : "Please enter numbers only" },
			gender :{ required : "This field is required" },\
			status :{ required : "This field is required" },
			mobile_no : { required : "This field is required", digits : "Please enter numbers only" },
			add_desc : { required : "This field is required", selected : "Please select atleast one option" }			
		}
	});

	var editProfileForm = $("#editProfile");
	
	var validator = editProfileForm.validate({
		
		rules:{
			fname :{ required : true },
			mobile : { required : true, digits : true },
			email : { required : true, email : true, remote : { url : baseURL + "checkEmailExists", type :"post", data : { userId : function(){ return $("#userId").val(); } } } },
		},
		messages:{
			fname :{ required : "This field is required" },
			mobile : { required : "This field is required", digits : "Please enter numbers only" },
			email : { required : "This field is required", email : "Please enter valid email address", remote : "Email already taken" },
		}
	});

});