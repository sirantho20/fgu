$(document).ready(function(){
runAllForms();

			
				// Validation
				$("#login-form").validate({
					// Rules for form validation
					rules : {
						'LoginForm[username]' : {
							required : true,
						},
						'LoginForm[password]' : {
							required : true,
							minlength : 3,
							maxlength : 20
						}
					},

					// Messages for form validation
					messages : {
						'LoginForm[username]' : {
							required : 'Please enter your username',
						},
						'LoginForm[password]' : {
							required : 'Please enter your password'
						}
					},

					// Do not change code below
					errorPlacement : function(error, element) {
						error.insertAfter(element.parent());
					}
				});
});