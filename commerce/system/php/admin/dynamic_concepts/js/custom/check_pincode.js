$("document").ready(function(){

$('#check').click(function(){

  var id = $("#pincode_text").val();
    


    $.get('system/ajax/check_pincode.php',{id:id},function(data)
    {
      $('#pincode_status').html(data);
        $.get('system/ajax/check_pincode.php',function(data)
    {
      $('#pincode_status').html(data);
    });

      
    });



});
