function ajax(id)
{
    var httpxml;
    try
    {
            httpxml=new XMLHttpRequest();
    }
        catch (e)
        {
    try
    {
        httpxml=new ActiveXObject("Msxml2.XMLHTTP");
    }
        catch (e)
        {
    try
    {
        httpxml=new ActiveXObject("Microsoft.XMLHTTP");
    }
            catch (e)
            {
            alert("Your browser does not support AJAX!");
            return false;
            }
        }
    }
    function stateChanged()
    {
    if(httpxml.readyState==4)
        {
            ///////////////////////
            alert(httpxml.responseText);
            var myObject = JSON.parse(httpxml.responseText);

            if(myObject.value.status=='success'){

                var type_id='type_'+myObject.data.id;
                var price_id='price_'+myObject.data.id;
                var comment_id='comment_'+myObject.data.id;
                document.getElementById(type_id).innerHTML = myObject.data.type;
                document.getElementById(price_id).innerHTML = myObject.data.price;
                document.getElementById(comment_id).innerHTML = myObject.data.comment;


                document.getElementById("msgDsp").innerHTML=myObject.value.message;
                var sid='s'+myObject.data.id;
                document.getElementById(sid).innerHTML = "<input type=button value='Edit' onclick=edit_field("+myObject.data.id+")>";
                setTimeout("document.getElementById('msgDsp').innerHTML=' '",2000)
            }// end of if status is success
            else {  // if status is not success
                document.getElementById("msgDsp").innerHTML=myObject.value.message;
                document.getElementById("msgDsp").style.borderColor='red';
                setTimeout("document.getElementById('msgDsp').style.display='none'",2000)
            } // end of if else checking status

        }
    }


    var url="/includes/display-ajax.php";
    var data_type='data_type'+ id;
    var data_price='data_price'+ id;
    var data_comment='data_comment'+ id;

    var type = document.getElementById(data_type).value;
    var price = document.getElementById(data_price).value;
    var comment = document.getElementById(data_comment).value;

    var parameters="id=" + id + "&type=" + type + "&price="+price;
    parameters = parameters + "&comment="+comment;
    //alert(parameters);
    httpxml.onreadystatechange=stateChanged;
    httpxml.open("POST", url, true)
    httpxml.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    //alert(parameters);
    document.getElementById("msgDsp").style.borderColor='#ffffff';
    document.getElementById("msgDsp").style.display = 'inline'
    document.getElementById("msgDsp").innerHTML="Wait .... ";
    httpxml.send(parameters)

////////////////////////////////


}

