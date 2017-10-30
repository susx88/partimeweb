
function validLogin(){
      var uname=$('#username').val();
      var password=$('#password').val();
	//alert(uname)
      var dataString = 'username='+ uname + '&password='+ password;
      $("#errorMessageImg").show();
      $("#errorMessageImg").fadeIn(1000).html('<img src="assets/img/loading.gif" />');
      $.ajax({
      type: "POST",
      url: "login-check.php",
      data: dataString,
      cache: false,
      success: function(result){
               var result=trim(result);
               //$("#flash").hide();
               console.log(result);
               if(result.substr(0,7)=='correct')
               {
			         //n = result.split("&");
                   //$("#errorMessage").html('Successful validation, redirecting please wait...');
				       //window.location='http://partime.grupojega.cl/main.php?module=start';
					     window.location='http://localhost:86/partime/main.php?module=start';
               }
               else{
					      $("#errorMessage").show();
                $('#errorMessage').attr('style', 'display:block');
                $("#errorMessageImg").html('');
					      //$("#errorMessage").html("");
					 }
               
      }
      });
}

function trim(str){
     var str=str.replace(/^\s+|\s+$/,'');
     return str;
}

function esEnter()
  {
	if(window.event){
		// IE
		keynum = event.keyCode;
	}
	else {
		keynum = event.which;
	}
	//alert(keynum)
	if (keynum==13)
	  {
	   validLogin();
	  }
	}
