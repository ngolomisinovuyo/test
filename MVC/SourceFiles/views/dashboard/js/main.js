$(function(){
    $.get('dashboard/xhrGetListings',function(o){
        
        for(var i=0; i < o.length; i++)
        {
            $('#listInserts').append('<div>'+o[i].text+'<a style="color:blue; font-size:20; background:none;" rel="'+o[i].data_id+'" class="del" href="#">x</a></div>');
        }
        $(document).on('click','.del',function(){
            delItem = $(this);
            var data_id = $(this).attr('rel');
            
            $.post('dashboard/xhrDeleteListings',{'data_id':data_id},function(o){
               
            //$('#listInserts').append('<div>'+o.text+'<a style="color:blue; font-size:20;" class="del" href="#" rel="'+o.id+'">x</a></div>');
             delItem.parent().remove();
            });
       
            return false;
        });
         
    },'json');
   
    $('#randomInsert').submit(function()
    {
       var url = $(this).attr('action');
       var data= $(this).serialize();
        $.post(url,data,function(o){
            //console.log(o.text);
            $('#listInserts').append('<div>'+o.text+'<a style="color:blue; font-size:20;background:none;" class="del" href="#" rel="'+o.data_id+'">x</a></div>');
             
        },'json');
        return false;
    });
});
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


