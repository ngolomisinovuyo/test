$(document).ready(function()
{
    var URL='http://localhost:8080/ClassicModels/';
    $.ajax({
        beforeSend:function(){alert('Saving product data');},
        url:URL+'Controller.php',
        method:'POST',
        data:$('#add_product').serialize(),
        sucess:function(data)
        {
            alert('hahaha');
        }
    });
});
