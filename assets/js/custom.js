$(function(){
window.Parsley.setLocale('es');
$("#form1").click(function(){	
	$('#email').parsley()
	  .addAsyncValidator('remotevalidator', function (xhr) {
				var data = xhr.responseJSON;			
				if (data.bool==true){	
					$('#email').attr("data-parsley-remote-message",data.msg);
					$('#email').parsley().refresh();
					return false;
				} 
				return 200 === xhr.status;
		  }, base_url+'/home/emailisused/',{type:"POST","dataType": "json" }
	   );	  
		
	});	  
});


      