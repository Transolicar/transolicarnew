$(document).ready(function(e){
    
    
    var alto =  $(window).height();
    
    alto = alto-100;
    
 
    
    $('#vista').css('min-height',alto+'px');
    
   
    
});

function carrousel(){
   
    $('#preguntas-carousel').owlCarousel({
        items: 3,
        itemsDesktop: false,
        itemsDesktopSmall: false,
        itemsTablet: [980,3],
        itemsTabletSmall: [767,2],
        itemsMobile: [479,1],
        navigation: true,
        navigationText: ['<i class="glyphicon glyphicon-chevron-left"></i>','<i class="glyphicon glyphicon-chevron-right"></i>'],
        pagination: false
      });
}
$(document).resize(function(e){
    
     var alto =  $(window).height();
    
    alto = alto-100;
    

    
    $('#vista').css('min-height',alto+'px');
    
    
    
});


