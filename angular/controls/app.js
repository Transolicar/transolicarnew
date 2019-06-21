/* 
 app del Angular
 */


angular.module("transolicar",['angular-loading-bar','ngSanitize','duScroll'])
  .run(['$rootScope', '$anchorScroll', function ( $rootScope, $anchorScroll) {

    $rootScope.$on('$routeChangeSuccess', function(newRoute, oldRoute) {
    $location.hash($routeParams.scrollTo);
    $anchorScroll();  
  });
        
        
        $rootScope.sliactivo = "";
        $rootScope.nosactivo = "";
        $rootScope.seractivo = "";
        $rootScope.preactivo = "";
        $rootScope.novactivo = "";
        $rootScope.polactivo = "";
        $rootScope.conactivo = "";
        
        
        $rootScope.formaD={
            'nombre':null,
            'asunto':null,
            'comentario':null,
            'ema':null,
            'terminos':null
   
                   
        };
        
        
        $rootScope.resetear = function(){
            
        $rootScope.sliactivo = "";
        $rootScope.nosactivo = "";
        $rootScope.seractivo = "";
        $rootScope.preactivo = "";
        $rootScope.novactivo = "";
        $rootScope.polactivo = "";
        $rootScope.conactivo = "";
            
        };
        
        
        $rootScope.colapseMenu = function(){
            
            $("#navbar").collapse("hide");
         
        };
        
        $rootScope.hoverbtn = function (event){
            
            
      var back = $(event.target).css("background"); 
      var border = $(event.target).css("border-color");  
      
              
       $(event.target).css("background",border); 
       $(event.target).css("border-color",back); 
       $(event.target).css("color",back);  
            
        };
        
        
       $rootScope.hoveroutbtn = function (event){
            
            
         var back = $(event.target).css("background"); 
        var border = $(event.target).css("border-color");  
        
              
       $(event.target).css("background",border); 
       $(event.target).css("border-color",back); 
       $(event.target).css("color",back);    
            
        };
        
        
       
        
  }])