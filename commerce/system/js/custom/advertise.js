    setInterval(function(){ 

      $.get('advertise.php',function(data)
    {
      $('#ads').html(data);
    });

    }, "<?php echo $get_result['duration_reappear'];?>");
     $.get('advertise.php',function(data)
    {
      $('#ads').html(data);
    });