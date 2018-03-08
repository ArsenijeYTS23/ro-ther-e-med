  $(document).ready(function(){
  $('#btn-add').click(function(e){
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        e.preventDefault(); 
         $('#frmTasks').attr('action', 'http://localhost/radiotherapy/public/dijagnoza/save');
         $('#myModalLabel').html('Upisi dijagnozu');
          $('#dijagnoza').show();
            $('#doktor').hide();
              $('#izmeniSliku').hide();
            $('#user').hide();
             $('#pacijenti').hide();
             $('#frmTasks').trigger("reset");
        $('#btn-save').html('upisi');
          
        $('#myModal').modal('show');
    });
    
  $('.izmeni').click(function(){
      var task_id = $(this).val();
 var url='http://localhost/radiotherapy/public/izmeniDijagnozu';
      $.get(url + '/' + task_id, function (data) {
            //success data
       //     alert(data.sifra);
            console.log(data);
             $('#frmTasks').attr('action', 'http://localhost/radiotherapy/public/dijagnoza/update/' + task_id);
               $('#myModalLabel').html('Izmeni dijagnozu');
              $('#dijagnoza').show();
                $('#doktor').hide();
                  $('#izmeniSliku').hide();
                $('#user').hide();
             $('#pacijenti').hide();
            $('#sifra').val(data.sifra);
            $('#naziv').val(data.naziv);
            $('#btn-save').html('izmeni');
            $('#myModal').modal('show');
        }) ;
    });
    
  $('#dodajPacijenta').click(function(e){
     $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        e.preventDefault(); 
         $('#frmTasks3').attr('action', 'http://localhost/radiotherapy/public/pacijent/save');
         $('#frmTasks3').attr('method', 'post');
          $('#myModalLabel').html('Dodaj pacijenta');
        
             $('#frmTasks3').trigger("reset");
             $('#dijagnoza').hide();
               $('#izmeniSliku').hide();
               $('#doktor').hide();
               $('#user').hide();
             $('#pacijenti').show();
           
        $('#btn-save').html('Dodaj pacijenta');
        $('#myModal').modal('show');
        }) ;
        
          $('#izmeni').click(function(){
      var task_id = $(this).val();
   //   alert(task_id)
 var url='http://localhost/radiotherapy/public/izmeniPacijenta';
      $.get(url + '/' + task_id, function (data) {
            //success data
           
             $('#frmTasks').attr('action', 'http://localhost/radiotherapy/public/pacijent/update/' + task_id);
               $('#myModalLabel').html('Izmeni pacijenta');
              $('#dijagnoza').hide();
              $('#izmeniSliku').hide();
               $('#doktor').hide();
               $('#user').hide();
             
             $('#pacijenti').show();
            $('#name').val(data.name);
            $('#lokalizacija').val(data.localization_id);
            $('#diagnoza').val(data.diagnosas_id);
            $('#godiste').val(data.godiste);
            $('#karton').val(data.karton);
            $('#mesto').val(data.mesto);
            $('#odluka').val(data.odluka_id);
            $('#napomena').val(data.napomena);
            $('#beleska').val(data.beleske);
            $('#telefon').val(data.telefon);
            $('#doktorP').val(data.doctor_id);
            $('#lastname').val(data.lastname);
            $('#obradjenZa').val(data.obradjenZa);
            $('#konzilijum').val(data.konz);
            $('#pocetak').val(data.pocetak);
            $('#kraj').val(data.kraj);
            $('#obrada').val(data.obr);
            $('#btn-save').html('izmeni');
            $('#myModal').modal('show');
        }) ;
    });
    
     $('#dodajDoktora').click(function(e){
     $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        e.preventDefault(); 
         $('#frmTasks').attr('action', 'http://localhost/radiotherapy/public/doktor/save');
         $('#frmTasks').attr('method', 'post');
          $('#myModalLabel').html('Dodaj doktora');
        
             $('#frmTasks').trigger("reset");
             $('#dijagnoza').hide();
               $('#izmeniSliku').hide();
             $('#pacijenti').hide();
             $('#user').hide();
             $('#doktor').show();
        $('#btn-save').html('Dodaj doktora');
        $('#myModal').modal('show');
        }) ;
     $('#izmeniFoto').click(function(e){
         var task_id = $(this).val();
     $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        e.preventDefault(); 
         $('#frmTasks').attr('action', 'http://localhost/radiotherapy/public/slika/' + task_id);
         $('#frmTasks').attr('method', 'post');
          $('#myModalLabel').html('Izmeni sliku');
        
             $('#frmTasks').trigger("reset");
             $('#dijagnoza').hide();
             $('#pacijenti').hide();
             $('#user').hide();
             $('#doktor').hide();
             $('#izmeniSliku').show();
        $('#btn-save').html('Izmeni sliku');
        $('#myModal').modal('show');
        }) ;
        
         $('.izmeniDoktora').click(function(){
      var task_id = $(this).val();
    //  alert(task_id);
 var url='http://localhost/radiotherapy/public/izmeniDoktora';
      $.get(url + '/' + task_id, function (data) {
            //success data
             $('#frmTasks').attr('action', 'http://localhost/radiotherapy/public/doktor/update/' + task_id);
               $('#myModalLabel').html('Izmeni doktora');
             $('#dijagnoza').hide();
             $('#pacijenti').hide();
             $('#user').hide();
               $('#izmeniSliku').hide();
             $('#doktor').show();
            $('#drName').val(data.name);
          
            $('#drLastname').val(data.lastname);
            $('#btn-save').html('izmeni');
            $('#myModal').modal('show');
        }) ;
    });
         $('.izmeniUsera').click(function(){
      var task_id = $(this).val();
    //  alert(task_id);
 var url='http://localhost/radiotherapy/public/izmeniUsera';
      $.get(url + '/' + task_id, function (data) {
            //success data
             $('#frmTasks').attr('action', 'http://localhost/radiotherapy/public/user/update/' + task_id);
               $('#myModalLabel').html('Korisnik');
             $('#dijagnoza').hide();
             $('#pacijenti').hide();
               $('#izmeniSliku').hide();
             $('#doktor').hide();
             $('#user').show();
            $('#userName').html(data.name+" "+data.lastname);
           $('#rola').val(data.rola_id);
           $('#rolaDoktor').val(data.doktor_id);
         
            $('#btn-save').html('izmeni');
            $('#myModal').modal('show');
        }) ;
    });
         $('.pomeranje1').click(function(){
            //  var task_id = this.id.replace(/pomeranje/, '');
           //  alert(task_id);
     $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
            $('#frmTasks1').trigger("reset");
           $('#myModalPomeranje').modal('show');
        }) ;
        
        
        
         $('.pomeranje2').click(function(){
            // alert();
              var task_id = this.id.replace(/move/, '');
            
     $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var url='http://localhost/radiotherapy/public/izvrsipomeranje';
        $.get(url + '/' + task_id, function (data) {
            //success data
             $('#frmTasks2').trigger("reset");
             $('#pomerix').show();
             $('#pomeriy').show();
             $('#pomeriz').show();
             $('#xxx').text("");
             $('#yyy').text("");
             $('#zzz').text("");
             $('#imeiprezime').text($("#ime"+task_id).text());
             if(data.pomeranje_x==null){
                $('#pomerix').hide();  
             }
             if(data.pomeranje_y==null){
                $('#pomeriy').hide();  
             }
             if(data.pomeranje_z==null){
                $('#pomeriz').hide();  
             }
             $('#pomerixx').val(data.pomeranje_x);
             $('#pomeriyy').val(data.pomeranje_y);
             $('#pomerizz').val(data.pomeranje_y);
           $('#myModalPomeranje2').modal('show');
          }) ;
        }) ;
        
        
         $('#pomerix').on("input",function(){
           //  alert(+$('#pomerixx').val() + +$('#pomerix').val());
          
     $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
           $('#xxx').text(+$('#pomerixx').val() + +$('#pomerix').val());
           $('#myModalPomeranje2').modal('show');
        }) ;
        
         $('#pomeriy').on("input",function(){
        //     alert(+$('#pomeriyy').val() + +$('#pomeriy').val());
          
     $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
           $('#yyy').text(+$('#pomeriyy').val() + +$('#pomeriy').val());
           $('#myModalPomeranje2').modal('show');
        }) ;
        
         $('#pomeriz').on("input",function(){
       //      alert(+$('#pomerizz').val() + +$('#pomeriz').val());
          
     $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
           $('#zzz').text(+$('#pomerizz').val() + +$('#pomeriz').val());
           $('#myModalPomeranje2').modal('show');
        }) ;
        
        
        
   
         $('.izmeniNastavak').click(function(){
      var task_id = $(this).val();
     alert(task_id);
 var url='http://localhost/radiotherapy/public/izmeniNastavak';
      $.get(url + '/' + task_id, function (data) {
            //success data
             $('#frmTasks1').attr('action', 'http://localhost/radiotherapy/public/nastavak/update/' + task_id);
             
             $('#nastavakKonzilijum').val(data.nastavakKonzilijum);
             $('#nastavakDiagnoza').val(data.diagnosas_id);
             $('#nastavakObrada').val(data.nastavakObrada);
             $('#nastavakObradjenZa').val(data.nastavakObradjenZa);
             $('#nastavakObradjenZa').val(data.nastavakObradjenZa);
             $('#nastavakPocetak').val(data.nastavakPocetak);
             $('#nastavakKraj').val(data.nastavakKraj);
             $('#myModalLabel1').html('izmeni');
           
            $('#btn-save1').html('izmeni');
            $('#nastavakModal').modal('show');
        }) ;
    });
       
    });
    