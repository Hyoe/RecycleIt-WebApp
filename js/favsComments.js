var data='';
var pre_tr_id=false;
var action = '';
var savebutton = "<input type='button' id='ajaxsave' class='btn btn-success' value='Add'>";
var updatebutton = "<input type='button' id='ajaxupdate' class='btn btn-success' value='Update'>";
var cancel = "<input type='button' id='ajaxcancel' class='btn btn-warning' value='Cancel'>";
var priceFilter = /^0-9/;
var emailfilter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
var pre_tds;
var field_arr = new Array('text', 'text', 'text', 'text', 'text', 'text', 'text');
var field_pre_text= new Array('Enter name','Enter address','Enter phone','Enter website','Enter material types','Enter price','Enter comment');
var field_name = new Array('name','address','phone','website','mType','price','comment');

 $(function(){
 $.ajax({
	     url:"/includes/dbCRUD.php",
                  type:"POST",
                  data:"actionfunction=showData",
        cache: false,
        success: function(response){

		  $('#tableAjax').html(response);
		  createInput();
		}
	   });

 $('#tableAjax').on('click','#ajaxsave',function(){

	   var name =  $("input[name='"+field_name[0]+"']");
	   var address = $("input[name='"+field_name[1]+"']");
	   var phone =$("input[name='"+field_name[2]+"']");
	   var website = $("input[name='"+field_name[3]+"']");
       var mType = $("input[name='"+field_name[4]+"']");
       var price = $("input[name='"+field_name[5]+"']");
       var comment = $("input[name='"+field_name[6]+"']");

	   if(validate(name,address,phone,price)){
	   data = "name="+name.val()+"&address="+address.val()+"&phone="+phone.val()+"&website="+website.val()+"&mType="+mType.val()+"&price="+price.val()+"&comment="+comment.val()+"&actionfunction=saveData";
       $.ajax({
	     url:"/includes/dbCRUD.php",
                  type:"POST",
                  data:data,
        cache: false,
        success: function(response){
		   if(response!='error'){
		      $('#tableAjax').html(response);
		  createInput();
		     }
		}

	   });
      }
      else{
	   return;
	  }
	   });

 $('#tableAjax').on('click','#ajaxedit',function(){
      var edittrid = $(this).parent().parent().attr('id');
        if(pre_tr_id){
	    alert("Cancel or update in-progress update first");
	    return false;
	}
	pre_tr_id = true;
    	var tds = $('#'+edittrid).children('td');
        var tdstr = '';
		var td = '';
		pre_tds = tds;

        for(var j=0;j<field_arr.length-3;j++){
            tdstr += '<td>'+$(tds[j]).html()+'</td>';
             //tdstr += "<td><input readonly type='"+field_arr[j]+"' name='"+field_name[j]+"' value='"+$(tds[j]).html()+"' placeholder='"+field_pre_text[j]+"'></td>";
        }

		for(var j=4;j<field_arr.length;j++){

             tdstr += "<td><input type='"+field_arr[j]+"' name='"+field_name[j]+"' value='"+$(tds[j]).html()+"' placeholder='"+field_pre_text[j]+"'></td>";
        }


		  tdstr+="<td>"+updatebutton +" " + cancel+"</td>";
		  $('#createinput').remove();
		  $('#'+edittrid).html(tdstr);
	   });

	   $('#tableAjax').on('click','#ajaxupdate',function(){
       var edittrid = $(this).parent().parent().attr('id');
	   var name =  $("input[name='"+field_name[0]+"']");
	   var address = $("input[name='"+field_name[1]+"']");
	   var phone =$("input[name='"+field_name[2]+"']");
	   var website = $("input[name='"+field_name[3]+"']");
       var mType = $("input[name='"+field_name[4]+"']");
       var price = $("input[name='"+field_name[5]+"']");
       var comment = $("input[name='"+field_name[6]+"']");

	   //if(validate(name,address,phone,website,mType,price,comment)){
	   data = "name="+name.val()+"&address="+address.val()+"&phone="+phone.val()+"&website="+website.val()+"&mType="+mType.val()+"&price="+price.val()+"&comment="+comment.val()+"&editid="+edittrid+"&actionfunction=updateData";
       $.ajax({
	     url:"/includes/dbCRUD.php",
                  type:"POST",
                  data:data,
        cache: false,
        success: function(response){
		   if(response!='error'){
		      $('#tableAjax').html(response);
		      pre_tr_id=false;
		  createInput();
		     }
		}

	   });
//}
//else{
//return;
//}
	   });
	   	   $('#tableAjax').on('click','#ajaxdelete',function(){
       var edittrid = $(this).parent().parent().attr('id');

	   data = "deleteid="+edittrid+"&actionfunction=deleteData";
       $.ajax({
	     url:"/includes/dbCRUD.php",
                  type:"POST",
                  data:data,
        cache: false,
        success: function(response){
		   if(response!='error'){
		      $('#tableAjax').html(response);
		  createInput();
		     }
		}

	   });
	   });
 $('#tableAjax').on('click','#ajaxcancel',function(){
      var edittrid = $(this).parent().parent().attr('id');

        $('#'+edittrid).html(pre_tds);
		createInput();
		pre_tr_id=false;
	   });
	   });

 function createInput(){

  var blankrow = "<tr id='createinput'>";
  for(var i=0;i<field_arr.length;i++){
	  blankrow+= "<td class='ajaxreq'><input type='"+field_arr[i]+"' name='"+field_name[i]+"' placeholder='"+field_pre_text[i]+"' /></td>";
	}
	blankrow+="<td class='ajaxreq'>"+savebutton+"</td></tr>";
  $('#tableAjax').append(blankrow);

  }

function validate(price){
var contact = jQuery('input[name=contact]');




        /*

		if (name.val()=='') {
			fname.addClass('hightlight');
			return false;
		} else name.removeClass('hightlight');

        if (address.val()=='') {
			address.addClass('hightlight');
			return false;
		} else address.removeClass('hightlight');

        if (phone.val()=='') {
			phone.addClass('hightlight');
			return false;
		} else phone.removeClass('hightlight');


        if(!priceFilter.test(price.val())){
           alert("Price must be betwee $0 - $10");
           price.addClass('hightlight');
           return false;
        }else price.removeClass('hightlight');

        */

		return true;

}
