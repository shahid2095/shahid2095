<?php

echo "<style type='text/css'>";
for($i=1;$i<=$row_cnt;$i++){
echo "
 
#owl-demo".$i." .item{
    padding: 10px 0px;
  margin: 2px;
  color: #FFF;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  text-align: center;
}
";
}
echo "</style>";
echo "<script type='text/javascript' src='system/js/owl.carousel.js'></script>";
echo "<script type='text/javascript'>";

for($i=1;$i<=$row_cnt;$i++){
echo "
 $(document).ready(function() {

   var owl = $('#owl-demo".$i."');
 
  owl.owlCarousel({
      items : '".$res[$i]['visible']."', 
    itemsCustom : false,
    itemsDesktop : [1199,4],
    itemsDesktopSmall : [980,3],
    itemsTablet: [768,2],
    itemsTabletSmall: false,
    itemsMobile : [479,1],
    singleItem : false,
    itemsScaleUp : false,
 
    //Basic Speeds
    slideSpeed : 200,
    paginationSpeed : 800,
    rewindSpeed : 1000,
 
    //Autoplay
    autoPlay : true,
    stopOnHover : true,
 
    // Navigation
    navigation : true,
    navigationText : ['prev','next'],
    rewindNav : true,
    scrollPerPage : false,
 
    //Pagination
    pagination : false,
    paginationNumbers: false,
 
    // Responsive 
    responsive: true,
    responsiveRefreshRate : 200,
    responsiveBaseWidth: window,
 
    // CSS Styles
    baseClass : 'owl-carousel',
    theme : 'owl-theme',
 
    //Lazy load
    lazyLoad : false,
    lazyFollow : true,
    lazyEffect : 'fade',
 
    //Auto height
    autoHeight : false,
 
    //JSON 
    jsonPath : false, 
    jsonSuccess : false,
 
    //Mouse Events
    dragBeforeAnimFinish : true,
    mouseDrag : true,
    touchDrag : true,
 
    //Transitions
    transitionStyle : false,
 
    // Other
    addClassActive : false,
 
    //Callbacks
    beforeUpdate : false,
    afterUpdate : false,
    beforeInit: false, 
    afterInit: false, 
    beforeMove: false, 
    afterMove: false,
    afterAction: false,
    startDragging : false,
    afterLazyLoad : false

    
  });
   $('#owl-demo".$i."').ready(function(){
    owl.trigger('owl.play','".$res[$i]['_time']."'); //owl.play event accept autoPlay speed as second parameter
  })
});


";
}
echo "</script>";

?>