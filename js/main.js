$(document).ready(function(e){
    
    
    var alto =  $(window).height();
    
    alto = alto-100;
    
 
    
    $('#vista').css('min-height',alto+'px');
    
   
    
});


$(document).resize(function(e){
    
     var alto =  $(window).height();
    
    alto = alto-100;
    

    
    $('#vista').css('min-height',alto+'px');
    
    
    
});


