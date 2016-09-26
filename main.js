
/*$("#submit").click(function(){
	alert("working");
 	data = {};
 	$(document).find("[name]").each(function(index,value){
 		var that = $(this);
 		var name = that.attr("name");
 		var value = that.val();
 		data[name] = value;
 	});
 	$.ajax({
 		url = "head.php",
 		type = "get",
 		data = data,
 		sucess:function(response){
 			$("#error").innerHTML = response;
 		}
 	});
});*/

$('#submit').on('click',function(){
	//alert("hai")
	var that = $(document),
	
	data={};
	var ename = $("#name").val();
	var epassword = $("#password").val();
	//alert(ename + epassword);
	data["name"]=ename;
	data["password"]=epassword;
	/*that.find('[name]').each(function(index,value){
		var that=$(this);
		 name =that.attr('name'),
		 value = that.val(),
		 data[name]=value;
		 
	});*/
	$.ajax({

		url:"head.php",
		type:"post",
		data:data,
		
		success:function(response){
    	console.log(response);
    	document.getElementById('error').innerHTML = response;
    
		}
	});
	return false;
});

