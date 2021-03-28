/**
 * File : addUser.js
 * 
 * This file contain the validation of add user form
 * 
 * Using validation plugin : jquery.validate.js
 * 
 * @author Kishor Mali
 */

$(document).ready(function(){
	
	var addResidentForm = $("#addResident");
	
	var validator = addResidentForm.validate({
		
		rules:{
			res_Fname :{ required : true },
			res_Lname :{ required : true },
			age :{ required : true, digits : true },
			gender :{ required : true },
			status :{ required : true },
			mobile_no : { required : true, digits : true },
			add_id : { required : true, selected : true}
		},
		messages:{
			res_Fname :{ required : "This field is required" },
			res_Lname :{ required : "This field is required" },
			age : { required : "This field is required", digits : "Please enter numbers only" },
			gender :{ required : "This field is required" },\
			status :{ required : "This field is required" },
			mobile_no : { required : "This field is required", digits : "Please enter numbers only" },
			add_id : { required : "This field is required", selected : "Please select atleast one option" }			
		}
	});
});
