angular.module('aparatiController', [])
.controller('aparatiCtrl', function($scope, $http, $window, db, $filter, $rootScope) {
     $scope.ubaci=0;
     var url=urlo;
      $rootScope.strana=2;
     var ubaci=0;
        if (window.location.hash) {
   var pac=window.location.hash.substr(1).split('/')[2];
    if(angular.isUndefined(pac)){
     pac=0; 
    }
    var apar= window.location.hash.substr(1).split('/')[1];
    if(apar==1){
      $scope.naslov='Primus';  
    }else if(apar==2){
      $scope.naslov='Oncor';
    }
    
    $scope.pac_id=pac;
   $http.get("http://localhost/radiotherapy/public/test_aparati/aparati")
          .then(function(result){
    $scope.aparati=result.data;
   // $scope.aparat=apar;
   $scope.apa=apar;
    
   //   $scope.primus2=result.data[1];
  },function(error){
      console.log('error');
  });
     }else{
  $http.get("http://localhost/radiotherapy/public/test_aparati/aparati")
          .then(function(result){
    $scope.aparati=result.data;
     $scope.pac_id=0; 
     $scope.apa=1;
      $scope.naslov='Primus';
    },function(error){
      console.log('error');
  });
     }
     $scope.prvaSmena=function(a){
         return parseInt(a)<14;
     };
     $scope.drugaSmena=function(a){
         return parseInt(a)>13;
     };
  $scope.jedan_aparat=function(aparat){
     $scope.apa=aparat;
    if(aparat===1){
        $scope.naslov='Primus';
    }else{
        $scope.naslov='Oncor';
    }
  
  };
 
  $scope.ubaciPac=function(aparat,pac_id){
       $window.location.href = 'http://localhost/radiotherapy/public/test_aparati#!'+aparat+'/'+pac_id; 
  };
  $scope.ubaciPacijenta=function(aparat,id_vreme,pac_id){
       var iEl = angular.element( document.querySelector( '#div'+id_vreme ) );
       iEl.css('display', 'block');
      $scope.ubacivanje='dodavanje'; 
       $scope.apa=parseInt(aparat);
        location.href.split('#')[0];     
     
      $http.get('http://localhost/radiotherapy/public/ubaciPacijenta/'+aparat+'/'+id_vreme+'/'+pac_id)
          .then(function(result){
         
      $http.get("http://localhost/radiotherapy/public/test_aparati/aparati")
          .then(function(result){
    $scope.aparati=result.data;
    $scope.aparat=aparat;
    $scope.pac_id=0;
   
   });        
  });
   
   };
  $scope.ukloniPacijenta=function(aparat,pac_id){
     var iEl = angular.element( document.querySelectorAll( '.class'+pac_id ) );
     iEl.remove();
     if(angular.isUndefined(aparat)){
     aparat=1; 
    }
     $scope.aparat=parseInt(aparat);
 
   $http.get('http://localhost/radiotherapy/public/ukloniPacijenta/'+aparat+'/'+pac_id)
   .then(function(result){
      $http.get("http://localhost/radiotherapy/public/test_aparati/aparati")
          .then(function(result){
             
    $scope.aparati=result.data;
    $scope.aparat=aparat;
    $scope.apa=parseInt(aparat);
   });        
  });
   };  
  $scope.otvori=function(daa){
  db.pacient(url,daa).then(function(result){
      $scope.jedan=result.data[0];
      $scope.user=result.data[1];
  });
   };
  $scope.abs = function(num) {
        return Math.abs(num);
    };
  $scope.pomeranje=function(pacijent){
      $scope.x='';
      $scope.y='';
      $scope.z='';
      $scope.jedan={};
  $http.get("http://localhost/radiotherapy/public/test/otvori/"+pacijent).then(function(result){
 
 console.log($scope.jedan=result.data[0]);
 $scope.user=result.data[1];
 
  
  },function(error){
      console.log('error');
  });
      $('#myModalPomeranje2').modal('show'); 
  };
   $scope.insertPomeranje=function(pacijent){   
     var iEl = angular.element( document.querySelector( '#div1' ) );
        var iEll = angular.element( document.querySelector( '#pomeranje1' ) );
       iEl.css('display', 'block');
       iEll.remove();
      $scope.ubacivanje='....dodavanje....'; 
            $http.post("http://localhost/radiotherapy/public/pomeranje/sacuvaj/"+pacijent, {
                'pomeranje_x':$scope.pomeranje_x,
                'pomeranje_y':$scope.pomeranje_y,
                'pomeranje_z':$scope.pomeranje_z
            }).then(function(){
             //   $scope.jedan={};
  $http.get("http://localhost/radiotherapy/public/test/otvori/"+pacijent).then(function(result){
       $scope.jedan=result.data[0];
       $scope.user=result.data[1];
       if($scope.jedan.primus){
           var aparat=1;
       }else{
         var aparat=2;  
       }

         $http.get("http://localhost/radiotherapy/public/test_aparati/aparati")
          .then(function(result){
    $scope.aparati=result.data;
    $scope.aparat=aparat;
    $scope.apa=aparat;
   //   $scope.primus2=result.data[1];
  },function(error){
      console.log('error');
  });
  
  },function(error){
      console.log('error');
  });  
                },function(error){
                    alert("Sorry! Data Couldn't be inserted!");
                    console.error(error);

                });
                $scope.pomeranje_x='';
      $scope.pomeranje_y='';
      $scope.pomeranje_z='';
            };
  $scope.deletePomeranje=function(pomeranje,pacijent){
        var iEl = angular.element( document.querySelectorAll( '.pomeranje' ) );
          iEl.remove();
      $http.get("http://localhost/radiotherapy/public/pomeranje/obrisi/"+pomeranje).then(function(){
             //   $scope.jedan={};
  $http.get("http://localhost/radiotherapy/public/test/otvori/"+pacijent).then(function(result){
       $scope.jedan=result.data[0];
       $scope.user=result.data[1];
      if($scope.jedan.primus){
           var aparat=1;
       }else{
         var aparat=2;  
       }
          $http.get("http://localhost/radiotherapy/public/test_aparati/aparati")
          .then(function(result){
    $scope.aparati=result.data;
    $scope.apa=aparat;
     $scope.pac_id=0;
   //   $scope.primus2=result.data[1];
  },function(error){
      console.log('error');
  });
  
  },function(error){
      console.log('error');
  });  
                },function(error){
                    alert("Sorry! Data Couldn't be inserted!");
                    console.error(error);

                });
  };          
    
  $scope.display=function(a){
   return a===1;

  }; 
  
    $scope.updatePacient=function(pacijent){
          db.pacient(url,pacijent)
          .then(function(result){
        $scope.jedan=result.data[0];
        $scope.user=result.data[1]; 
        $scope.dijagnoza=result.data[2]; 
        $scope.doktor=result.data[3]; 
        $scope.odlukas=result.data[4]; 
        $scope.name=$scope.jedan.name;
        $scope.lastname=$scope.jedan.lastname;
        $scope.mesto=$scope.jedan.mesto;
        $scope.karton=$scope.jedan.karton;
        $scope.godiste=parseInt($scope.jedan.godiste);
        $scope.telefon=$scope.jedan.telefon;
        $scope.diagnoza=$scope.jedan.diagnosas_id;
        $scope.doctor=$scope.jedan.doctor_id;
        $scope.lokalizacija=$scope.jedan.localization_id;
        $scope.odluka=$scope.jedan.odluka_id;
        $scope.konzilijum=$filter('date')($scope.jedan.konzilijum, 'dd-MMM-yyyy' );
        $scope.obrada=$filter('date')($scope.jedan.obrada, 'dd-MMM-yyyy' );
        $scope.obradjenZa=$scope.jedan.obradjenZa;
        $scope.pocetak=$filter('date')($scope.jedan.pocetak, 'dd-MMM-yyyy' );
        $scope.kraj=$filter('date')($scope.jedan.kraj, 'dd-MMM-yyyy' );
        $scope.napomena=$scope.jedan.napomena;
        $scope.beleska=$scope.jedan.beleska;
        
          });
         };
       $scope.saveUpdates=function(pacient){
          $http.post("http://localhost/radiotherapy/public/testUpdatePacient/"+pacient, {
                'name':$scope.name,
                'lastname':$scope.lastname,
                'mesto':$scope.mesto,
                'karton':$scope.karton,
                'godiste':$scope.godiste,
                'telefon':$scope.telefon,
                'diagnoza':$scope.diagnoza,
                'doktor':$scope.doctor,
                'lokalizacija':$scope.lokalizacija,
                'odluka':$scope.odluka,
                'konzilijum':$('#konzilijum').val(),
                'obrada':$('#obrada').val(),
                'obradjenZa':$scope.obradjenZa,
                'pocetak':$('#pocetak').val(),
                'kraj':$('#kraj').val(),
                'napomena':$scope.napomena,
                'beleske':$scope.beleske
              
              
            }).then(function(){
         db.pacient(url,pacient)
          .then(function(result){
       $scope.jedan=result.data[0];
         }).then(function(){
          $http.get("http://localhost/radiotherapy/public/test_aparati/aparati")
  .then(function(result){
     $scope.aparati=result.data;
     
  });   
         });
        }); 
        
       };   
  
  
  
  
  
}).filter('filAparat', function() {
    return function(aparati,apa) {
          var txt = [];
        if(apa==1){
           angular.forEach(aparati.primus, function (aparat) {
               
                         txt.push(aparat);
                     
                 });
                }else if(apa==2) {
              angular.forEach(aparati.oncor, function (aparat) {
               
                         txt.push(aparat);
                     
                 });     
                }
        
        return aparat=txt;
    };
});