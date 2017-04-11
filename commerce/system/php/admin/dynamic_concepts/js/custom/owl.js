 var owl = $('#owl-demo');
 
  owl.owlCarousel({
      items : 10, 
    itemsCustom : false,
    itemsDesktop : [1199,6],
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
    navigation : false,
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


 var owl2 = $('#owl-demo_2');
 
  owl2.owlCarousel({
      items : 10, 
    itemsCustom : false,
    itemsDesktop : [1199,6],
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
    navigation : false,
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

 var owl3 = $('#owl-demo_3');
 
  owl3.owlCarousel({
      items : 10, 
    itemsCustom : false,
    itemsDesktop : [1199,6],
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
    autoHeight : true,
 
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


   $("#img_01").elevateZoom({
    gallery:'gal1', 
    cursor: 'pointer', 
    zoomType   : "window",
    galleryActiveClass: 'active',
     imageCrossfade: true,
     easing:true,
     easingDuration:500,
     borderSize:0,
     zoomWindowWidth:500,
     zoomWindowHeight:400
   }); 

var id = $("#productid").val();
$('#add-cart').click(function(){

 
 


    $.get('system/php/dynamic_cart/regular_product_cart/add_to_cart.php',{id:id},function(data)
    {
      $('#empty').html(data);
        
          $.get('system/php/dynamic_cart/regular_product_cart/cart_response_d.php',{id:id},function(data)
        {
          $('#cart').html(data);
        });

      
    });


  });
 $.get('system/php/dynamic_cart/regular_product_cart/cart_response_d.php',{id:id},function(data)
        {
          $('#cart').html(data);
        });

  $('#contact').click(function(){
  $('#myModal').modal({show:true})
});

$('#myModal').on('show.bs.modal', function (e) {
    console.log('modal show');
});
