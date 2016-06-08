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
var field_name = new Array('name','address','phone','website','mType','reimburse','comment');

$(function(){
  $.ajax({
	  url:"/includes/dbCRUD.php",
    type:"POST",
    data:"actionfunction=showData",
    cache: false,
    success: function(response){
		  $('#tableAjax').html(response);
		  //createInput();
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
		          //createInput();
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

    $('#close').unbind('click');
    $('#favsButton').unbind('click');

    $('#close, #favsButton').hover(function(event){
      var top = event.pageY;
      var left = event.pageX;
      var moveLeft = -152;
      $('#cantCloseDiv').css({top:top, left:left+moveLeft}).show();
      },
      function(){
        $('#cantCloseDiv').hide();
      });

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
          tdstr += '<td><div id="'+field_name[j]+'">'+$(tds[j]).html()+'</div></td>';
          //tdstr += "<td><input readonly type='"+field_arr[j]+"' name='"+field_name[j]+"' value='"+$(tds[j]).html()+"' placeholder='"+field_pre_text[j]+"'></td>";
        }

		    for(var j=4;j<field_arr.length-2;j++){
          tdstr += '<td><div class="checkbox"><label><input name="materials" type="checkbox" value="Aluminum"> Aluminum</label></div><div class="checkbox"><label><input name="materials" type="checkbox" value=" Copper"> Copper</label></div><div class="checkbox"><label><input name="materials" type="checkbox" value=" Electronics"> Electronics</label></div><div class="checkbox"><label><input name="materials" type="checkbox" value=" Glass"> Glass</label></div><div class="checkbox"><label><input name="materials" type="checkbox" value=" Household Hazardous Waste"> Household Hazardous Waste</label></div><div class="checkbox"><label><input name="materials" type="checkbox" value=" Paper"> Paper</label></div><div class="checkbox"><label><input name="materials" type="checkbox" value=" Plastic"> Plastic</label></div><div class="checkbox"><label><input name="materials" type="checkbox" value=" Steel"> Steel</label></div><div class="checkbox"><label><input name="materials" type="checkbox" value="'+$(tds[j]).html()+'" class="hidden" checked="checked"></label></td>';

          //<select id='mType' class='form-control' multiple='multiple'><option value='Aluminum'>Aluminum</option><option value='Steel'>Steel</option><option value='Copper'>Copper</option><option value='Plastic'>Plastic</option><option value='Glass'>Glass</option><option value='Paper'>Paper</option><option value='Electronics'>Electronics</option><option value='Household Hazardous Waste'>Household Hazardous Waste</option></select></td>";

          //tdstr += "<td><select id='mType' class='form-control' multiple='multiple'><option value='Aluminum'>Aluminum</option><option value='Steel'>Steel</option><option value='Copper'>Copper</option><option value='Plastic'>Plastic</option><option value='Glass'>Glass</option><option value='Paper'>Paper</option><option value='Electronics'>Electronics</option><option value='Household Hazardous Waste'>Household Hazardous Waste</option></select></td>";

          //tdstr += "<td><input id='"+field_name[j]+"' type='"+field_arr[j]+"' name='"+field_name[j]+"' value='"+$(tds[j]).html()+"' placeholder='"+field_pre_text[j]+"'></td>";

          //console.log($(tds[j]).html());
        }

        for(var j=5;j<field_arr.length-1;j++){
          tdstr += "<td><select id='reimburse' class='form-control'><option value='"+$(tds[j]).html()+"'></option><option value='Yes'>Yes</option><option value='No'>No</option></select></td>";
        }

        for(var j=6;j<field_arr.length;j++){

            tdstr += "<td><input class='form-control' id='"+field_name[j]+"' type='"+field_arr[j]+"' name='"+field_name[j]+"' value='"+$(tds[j]).html()+"' placeholder='"+field_pre_text[j]+"'></td>";
        }

    	  tdstr+="<td>"+updatebutton +" " + cancel+"</td>";
    	  $('#createinput').remove();
    	  $('#'+edittrid).html(tdstr);

    $('.checkbox').on('click', 'input[type="checkbox"]', function(){
      if ($('input[type="checkbox"]').length <= 0) {
        $('.hidden').prop('checked', true);
      }
      else {
        $('.hidden').prop('checked', false);
      }
    });

  });


  $('#tableAjax').on('click','#ajaxupdate',function(){

    $('#favsButton, #close').click(function() {
      $('#favoritesDiv').toggle();
    });
    $('#close').bind('click');
    $('#favsButton').bind('click');

    $('#close, #favsButton').hover(function(event){
      $('#cantCloseDiv').hide();
    });

    var mType = [];
    $.each($("input[type='checkbox']:checked"), function(){
      mType.push($(this).val());
    });

    //var mType = $('#mType:checked').val();
    //console.log(mTypeValue);

    var reimburse = $('#reimburse').val();
    var edittrid = $(this).parent().parent().attr('id');
    var name =  $("input[name='"+field_name[0]+"']");
    var address = $("input[name='"+field_name[1]+"']");
    var phone =$("input[name='"+field_name[2]+"']");
    var website = $("input[name='"+field_name[3]+"']");
    //var mType = $("input[name='"+field_name[4]+"']");
    var price = $("input[name='"+field_name[5]+"']");
    var comment = $("input[name='"+field_name[6]+"']");

    //if(validate(name,address,phone,website,mType,price,comment)){
      data = "name="+name.val()+"&address="+address.val()+"&phone="+phone.val()+"&website="+website.val()+"&mType="+mType+"&reimburse="+reimburse+"&comment="+comment.val()+"&editid="+edittrid+"&actionfunction=updateData";
      $.ajax({
        url:"/includes/dbCRUD.php",
        type:"POST",
        data:data,
        cache: false,
        success: function(response){
          if(response!='error'){
            $('#tableAjax').html(response);
            pre_tr_id=false;
            //createInput();
          }
        }
      });
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
          //createInput();
        }
      }
    });
  });

  $('#tableAjax').on('click','#ajaxcancel',function(){
    var edittrid = $(this).parent().parent().attr('id');
    $('#'+edittrid).html(pre_tds);
		//createInput();
		pre_tr_id=false;

      $('#favsButton, #close').click(function() {
        $('#favoritesDiv').toggle();
      });
      $('#close').bind('click');
      $('#favsButton').bind('click');

      $('#close, #favsButton').hover(function(event){
        $('#cantCloseDiv').hide();
      });
	});

});

 function createInput(){
  var blankrow = "<tr id='createinput'>";
    for(var i=0;i<field_arr.length;i++){
      blankrow+= "<td class='ajaxreq'><input id='"+field_name[i]+"' type='"+field_arr[i]+"' name='"+field_name[i]+"' placeholder='"+field_pre_text[i]+"' /></td>";
    }
    blankrow+="<td class='ajaxreq'>"+savebutton+"</td></tr>";
    $('#tableAjax').append(blankrow);
  }

function validate(price){
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