$("#view").hide();
$(".completedtask").click(function(){
	$("#view").toggle();
});

/*$(".completedtask").click(function(){
	
$.ajax({
	 //type: "POST",
    url: "compleatedtask.php",
    //data: {sname : ""},
    cache: false,
    success: function(data){
     alert(data);
  }

});
});*/
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

/*$('#submit').on('click',function(){
	//alert("hai")
	var that = $(document),
	
	data={};
	var ename = $("#name").val();
	var epassword = $("#password").val();
	//alert(ename + epassword);
	data["name"]=ename;
	data["password"]=epassword;*/
	/*that.find('[name]').each(function(index,value){
		var that=$(this);
		 name =that.attr('name'),
		 value = that.val(),
		 data[name]=value;
		 
	});*/
	/*$.ajax({

		url:"head.php",
		type:"post",
		data:data,
		
		success:function(response){
    	console.log(response);
    	document.getElementById('error').innerHTML = response;
    
		}
	});
	return false;
});*/

$("#view_edit").hide();

$(".alltask").click(function(){
	//alert("dgdg");
	$("#view_edit").toggle();
});
$("#changetask").click(function(){
	var task = $("#task").val();
	alert(task);
});

$("button").click(function(){
	//alert("ypppp");
var me = $(this).attr('class');
//alert(me);
if(me!="alltask"&&me!="completedtask"){
	//alert(me);
	//alert("ypppp");
var id = '#'+me;
var work = $(id).val();
//alert(work);

//var head = $("input[name = me]").val();
//alert(head);
//alert(work);

$.ajax({
	type: "POST",
    url: "delete.php",
    data: {sname : me , task : work},
    cache: false,
    success: function(data){
     //alert(data);
     window.location.replace("home.php");
  }

});
}
//alert(me);
});

/*$("a").click(function(){
	var name = $(this).attr('class');
	//alert(name);
	$.ajax({
	type: "POST",
    url: "delete.php",
    data: {sname : name},
    cache: false,
    success: function(data){
     //alert(data);
  }

});
});*/


