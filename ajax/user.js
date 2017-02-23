//user update//   
$(function(){
	$('[name="user_update"]').click(function(){
		var user_id = $('[name="user_id"]');
		var name = $('[name="name"]');
		var email = $('[name="email"]');
		var mobile = $('[name="mobile"]');
		var password = $('[name="password"]');
		var repassword = $('[name="repassword"]');
		var about = $('[name="about"]');
        
        var pass = password.val();
        
        if(pass != "")
        {
        
		
        if((pass.length < 6))
        {
            alert("Password 6 - 15 Characters");
            return;
        }
        
        if( pass != repassword.val())
        {
            alert("Password and Repassword dont match");
            return;
        }
        }
        
       //alert(password.val());
       
		var dataString = 
		'user_id='+user_id.val()+
		'&name='+encodeURIComponent(name.val())+
		'&email='+encodeURIComponent(email.val())+
		'&mobile='+encodeURIComponent(mobile.val())+
		'&password='+encodeURIComponent(pass)+
		'&repassword='+repassword.val()+
		'&about='+encodeURIComponent(about.val());
		 
        
		//alert(pass);
		
		$.ajax({
			 type:'post',
			 url:'post_url/profile_up',
			 data:dataString,
			 success:function(data){
				//alert(data);
				arr = new Array();
				arr = data.split("|");
				if(arr[0] == 0){
					alert(arr[1]);
					window.location = 'profile';
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
