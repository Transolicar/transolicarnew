angular.module("transolicar")
        
 .filter("maxLength", function(){
    return function(text,max){
        if(text !== null){
            if(text.length > max){
                return text.substring(0,max) + "...";
            }
        }
    };
});
