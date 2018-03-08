angular.module('dbService',[])
   .service('db',function($http){
      
   this.getData=function(){
  return      $http({
            method : "get",
            url : "http://localhost/radiotherapy/public/test/status"
   
                    });
                  };
    this.getPacients=function(url){
        return $http.get(url+'/test/status');
    } ;        
    
   this.pacient=function (url,daa){
      
       return  $http.get(url+'/test/otvori/'+daa);
   };
   
   this.deletePomeranje=function(url,pomeranje){
     return  $http.get(url+'/pomeranje/obrisi/'+pomeranje)  ;
   };
                  
});