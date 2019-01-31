 /*call the saveLeadFormdata function at mousekeyup*/	
	function saveLeadFormdata()
	{
		
		var uniqid=$("#uniqid").val();
		var fname=$("#fname").val();
		var lname=$("#lname").val();
		var email=$("#email").val();
		var phone=$("#phone").val();
		var address=$("#address").val();
		var squarefoot=$("#squarefoot").val();
		/*ajax post : save information on each changes*/
		$.ajax({
			type:"post",
			url:"lead_submit.php", 
			data:"uniqid="+uniqid+"&fname="+fname+"&lname="+lname+"&email="+email+"&phone="+phone+"&address="+address+"&squarefoot="+squarefoot,
 			success:function(data){
				
				$("#form_info").html(data);
				
				/* Fade out the message after 3 seconds */
				setTimeout(function ()
				{
					$('#form_info').animate({
						opacity: 0
					}, 250);
				}, 3000);
				
			}

		});

	}
 