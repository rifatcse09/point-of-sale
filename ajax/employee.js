//user update//   
$(function(){
		$('#employee_add').on('submit', function(e){
		e.preventDefault();
		var user_id = $('[name="user_id"]');
		var name = $('[name="name"]');
		var email = $('[name="email"]');
		var mobile = $('[name="mobile"]');
		var username = $('[name="username"]');
		var password = $('[name="password"]');
		var repassword = $('[name="repassword"]');
		var usertype = $('[name="usertype"]');
		var about = $('[name="about"]');
        
		 if(password.val() != "")
        {
			if((password.val().length < 6) || (password.val().length > 15))
			{
				alert("Password 6 - 15 Characters");
				return;
			}
        
			if( password.val() != repassword.val())
			{
				alert("Password and Repassword dont match");
				return;
			}
        }
        
       // alert(password.val());
       
		var dataString = 
		'user_id='+user_id.val()+
		'&name='+encodeURIComponent(name.val()) +
		'&email='+encodeURIComponent(email.val()) +
		'&mobile='+encodeURIComponent(mobile.val()) +
		'&username='+encodeURIComponent(username.val()) +
		'&password='+encodeURIComponent(password.val()) +
		'&repassword='+repassword.val() +
		'&usertype='+usertype.val() +
		'&about='+encodeURIComponent(about.val());
		 
        
		//alert(dataString);
		
		$.ajax({
			 type:'post',
			 url:'post_url/emp_add',
			 data:dataString,
			 success:function(data){
				//alert(data);
				arr = new Array();
				arr = data.split("|");
				if(arr[0] == 0){
					alert(arr[1]);
					window.location = 'employeeadd';
				}
				else {
					alert(arr[1]);
				}
				
			 },
			 error:function(){
				//alert('Error');
			 }
			 
		});
	});
});
//



//employee update//   
$(function(){
	$('[name="emp_update"]').click(function(){
		var user_id = $('[name="user_id"]');
		var emp_id = $('[name="emp_id"]');
		var name = $('[name="name"]');
		var email = $('[name="email"]');
		var mobile = $('[name="mobile"]');
		var username = $('[name="username"]');
		var password = $('[name="password"]');
		var repassword = $('[name="repassword"]');
		var usertype = $('[name="usertype"]');
		var about = $('[name="about"]');
        
		 if(password.val() != "")
        {
			if((password.val().length < 6) || (password.val().length > 15))
			{
				alert("Password 6 - 15 Characters");
				return;
			}
        
			if( password.val() != repassword.val())
			{
				alert("Password and Repassword dont match");
				return;
			}
        }
        
       // alert(password.val());
       
		var dataString = 
		'user_id='+user_id.val()+
		'&emp_id='+emp_id.val()+
		'&name='+encodeURIComponent(name.val()) +
		'&email='+encodeURIComponent(email.val()) +
		'&mobile='+encodeURIComponent(mobile.val()) +
		'&username='+encodeURIComponent(username.val()) +
		'&password='+encodeURIComponent(password.val()) +
		'&repassword='+repassword.val() +
		'&usertype='+usertype.val() +
		'&about='+encodeURIComponent(about.val());
		 
        
		//alert(dataString);
		
		$.ajax({
			 type:'post',
			 url:'post_url/emp_update',
			 data:dataString,
			 success:function(data){
				//alert(data);
				arr = new Array();
				arr = data.split("|");
				if(arr[0] == 0){
					alert(arr[1]);
					window.location = 'employeemanage';
				}
				else {
					alert(arr[1]);
				}
				
			 },
			 error:function(){
				//alert('Error');
			 }
			 
		});
	});
});

/*employee email chk
$(function() {
    $("#email").on('input',function() {
        //alert("abcd");

        $.ajax({
            url: "post_url/emp_email_chk",
            type: "POST",
            data: {email: $(this).val()},
            dataType: 'json',
            success: function(d) {
                if (d.is_exist == true) {
                    is_exist = true;
                    $("#email_chk").html('');
                    $('#email').removeClass("focus");
                } else {
                    is_exist = false;

                    $("#email_chk").html("<p style='font-weight:bold;font-size:12px;margin:0;padding:0;color:red'>Already Taken</p>");
                    //$("#email").val('');
                    $('#email').addClass("focus");
                }
            }
            ,
            error: function(xhrr, status, thrown)
            {

                alert(error);

            }
        });
    });
});*/


/*end */

/* $(function(){
    item_events.init();
});  */
//
