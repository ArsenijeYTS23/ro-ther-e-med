var Ppp=angular.module('customersController', ['ngAnimate','ngRoute']);
Ppp.controller('customersCtrl1', function($scope, $http, $window, db, $filter, $rootScope) {
    $scope.jedan=[];
    $scope.names=[];
    $scope.naslov='Svi pacijenti';
    $scope.stat=1;
    $scope.lok=0;
    $scope.i=1;
    $rootScope.strana=1;
    var url=urlo;
   if (window.location.hash) {
   $scope.stat=parseInt(window.location.hash.substr(1).split('/')[1]);
   if($scope.stat==1){
      $scope.naslov='Svi pacijenti';
   }else if($scope.stat==2){
       $scope.naslov='Lista cekanja'; 
   }else if($scope.stat==3){
       $scope.naslov='Pacijenti u proceduri'; 
   }else if($scope.stat==4){
       $scope.naslov='Pacijenti na zracenju'; 
   }
   }
     db.getPacients(url)
  .then(function(result){
      $scope.localization=result.data[0];
      $scope.pacient=result.data[1];
   
  },function(error){
      console.log('error');
  });

  $scope.status=function(statusi,lok){
    if(angular.isUndefined(statusi)){
        statusi=1;
    }
    if(angular.isUndefined(lok)){
        lok=0;
    }
//    alert($scope.stt);
   if(statusi===1){
       $scope.naslov='Svi pacijenti';
   }else if(statusi===2){
       $scope.naslov='Lista cekanja';
   }else if(statusi===3){
       $scope.naslov='Pacijenti u proceduri';
   }else{
       $scope.naslov='Pacijenti na zracenju';
   }
  
   $scope.stat=statusi;
 
  $scope.lok=lok;
 
  };  
   $scope.otvori=function(daa){
  $scope.jedan={};
  db.pacient(url,daa)
          .then(function(result){
 $scope.jedan=result.data[0];
 $scope.user=result.data[1];
 $scope.dijagnoza=result.data[2];
   });
  };
  $scope.display=function(a){
   return a===1;

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
         db.pacient(url,pacijent)
          .then(function(result){
       $scope.jedan=result.data[0];
         });
        });  
       $scope.pomeranje_x='';
      $scope.pomeranje_y='';
      $scope.pomeranje_z='';
            };
           
    $scope.deletePomeranje=function(pomeranje,pacijent){
         var iEl = angular.element( document.querySelectorAll( '.pomeranje' ) );
          iEl.remove();
     db.deletePomeranje(url,pomeranje)
              .then(function(){
            
  db.pacient(url,pacijent)
  .then(function(result){
       $scope.jedan=result.data[0];
       $scope.user=result.data[1];   
             });  
            });
           }; 
           
      $scope.updatePacient=function(pacijent){
          
           $scope.dijagnoza=''; 
        $scope.doktor=''; 
        $scope.odlukas=''; 
        $scope.name='';
        $scope.lastname='';
        $scope.mesto='';
        $scope.karton='';
        $scope.godiste='';
        $scope.telefon='';
        $scope.diagnoza='';
        $scope.doctor='';
        $scope.lokalizacija='';
        $scope.odluka='';
        $scope.konzilijum='';
        $scope.obrada='';
        $scope.obradjenZa='';
        $scope.pocetak='';
        $scope.kraj='';
        $scope.napomena='';
        $scope.beleska='';
          
          
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
          db.getPacients(url)
  .then(function(result){
      $scope.localization=result.data[0];
    //  $scope.pacient=result.data[1];
  
  },function(error){
      console.log('error');
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
            db.getPacients(url)
  .then(function(result){
      $scope.localization=result.data[0];
      $scope.pacient=result.data[1];
     
  });   
         });
        }); 
        
       };   
         }).filter('fil', function() {
    return function(jedans, stat, lok) {
         var txt = [];
         if(lok>0){
         if(stat===1){
             angular.forEach(jedans, function (jedan) {
                 if(jedan.localization_id===lok){
                         txt.push(jedan);
                     }
                 });
               txt.sort(function(a, b) {
                     var dateA = new Date(a.konzilijum), dateB = new Date(b.konzilijum);
                     return dateA - dateB;
                      });   
                
         }else if(stat===2){
       angular.forEach(jedans, function (jedan) {
                    if (jedan.obrada===null && jedan.localization_id===lok) {
                        txt.push(jedan);
                    }
                });
                txt.sort(function(a, b) {
                     var dateA = new Date(a.konzilijum), dateB = new Date(b.konzilijum);
                     return dateA - dateB;
                      }); 
            }else if(stat===3){
         angular.forEach(jedans, function (jedan) {
                    if (jedan.obrada!==null && jedan.pocetak===null && jedan.localization_id===lok) {
                        txt.push(jedan);
                    }
                }); 
                txt.sort(function(a, b) {
                     var dateA = new Date(a.obrada), dateB = new Date(b.obrada);
                     return dateA - dateB;
                      }); 
            }else if(stat===4){
         angular.forEach(jedans, function (jedan) {
                    if (jedan.pocetak!==null && jedan.localization_id===lok) {
                        txt.push(jedan);
                    }
                }); 
                txt.sort(function(a, b) {
                     var dateA = new Date(a.pocetak), dateB = new Date(b.pocetak);
                     return dateA - dateB;
                      }); 
            }
        }else{
            if(stat===1){
             angular.forEach(jedans, function (jedan) {
                         txt.push(jedan);
                         
                });
              txt.sort(function(a, b) {
                     var dateA = new Date(a.konzilijum), dateB = new Date(b.konzilijum);
                     return dateA - dateB;
                      });    
                
         }else if(stat===2){
       angular.forEach(jedans, function (jedan) {
                    if (jedan.obrada===null) {
                        txt.push(jedan);
                    }
                });
                 txt.sort(function(a, b) {
                     var dateA = new Date(a.konzilijum), dateB = new Date(b.konzilijum);
                     return dateA - dateB;
                      }); 
            }else if(stat===3){
         angular.forEach(jedans, function (jedan) {
                    if (jedan.obrada!==null && jedan.pocetak===null) {
                        txt.push(jedan);
                    }
                });  
                 txt.sort(function(a, b) {
                     var dateA = new Date(a.obrada), dateB = new Date(b.obrada);
                     return dateA - dateB;
                      }); 
            }else if(stat===4){
         angular.forEach(jedans, function (jedan) {
                    if (jedan.pocetak!==null) {
                        txt.push(jedan);
                    }
                });  
                 txt.sort(function(a, b) {
                     var dateA = new Date(a.pocetak), dateB = new Date(b.pocetak);
                     return dateA - dateB;
                      }); 
            }  
        }
        
        return jedan=txt;
    };
});
