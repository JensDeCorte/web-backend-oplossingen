

$("#mailform").submit(AjaxCall);


function AjaxCall()
{
    var dataofuser=$("#mailform").serialize(); //serializes data
    console.log(dataofuser);
    
    $.ajax({
        type:"POST", //defines type 
        url:"contact-API.php", //defines action url
        data: dataofuser, //defines data to give 
        success: function(data) //if succesfully executed
        {
            $result = data;
            
            if ($result["message"]=="SUCCES") 
            {
                $(".msg").html("Bericht verzonden JS");
            }
            else
            {
           	    $(".msg").html("Bericht NIET verzonden JS");
            }
        }
    });

    return false;
}