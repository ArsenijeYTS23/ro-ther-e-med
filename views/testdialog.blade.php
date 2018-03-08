

<div style="  transition: opacity 0.5s 0.7s ease; overflow-y:auto;" class="modal fade" id="pacijentModal333" role="dialog"  >
     
    <div class="modal-dialog" style="width: 60%;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><% jedan.name +' '+ jedan.lastname%> </h4>
          <p><% jedan.karton %></p>
        </div>
        <div class="modal-body">
         <table class="table table-reflow">
 
  <tbody>
   
   
    <tr >
<!--    <tr  ng-show="display(user.id)" >-->
      <td>God rodjenja</td>
     
      <td><% jedan.godiste%></td>
     
    </tr>
     <tr>
      <td>Mesto</td>
     
      <td><% jedan.mesto %></td>
     
    </tr>
     <tr>
      <td>Telefon</td>
     
      <td><% jedan.telefon %></td>
     
    </tr>
    <tr>
       <td>Datum konzilijuma</td>
     
      <td><% jedan.konzilijum | date :  "dd-MMM-yyyy" %></td>
     
    </tr>
     <tr>
      <td>Lokalizacija</td>
     
      <td><% jedan.localization.name %></td>
     
    </tr>
    <tr>
       <td>Dijagnoza</td>
     
      <td><% jedan.diagnosas.naziv %></td>
     
    </tr>
    <tr>
      <td>Zracenje</td>
     
      <td><% jedan.odluka.name %></td>
    
    </tr>
    <tr>
      <td>Doktor</td>
     
      <td><% jedan.doctor.name+ ' '+ jedan.doctor.lastname %></td>
     
    </tr>
    <tr>
        <td>Datum obrade</td>
        <td><% jedan.obrada |  date : "dd-MMM-yyyy" %></td>
    </tr>
    <tr>
        <td>Obradjen za</td>
        <td><% jedan.obradjenZa %></td>
    </tr>
    
     <tr>
      <td>Napomena</td>
     
      <td><p><% jedan.napomena %></p></td>
     
    </tr>
     <tr>
      <td>Beleske</td>
     
      <td><p><% jedan.beleske %></p></td>
     
    </tr>
    <tr>
        <td>Aparat</td>
        <td>
            <%jedan.primus ? 'Primus' : jedan.oncor ? 'Oncor': ""%>
    
            <div class="dropdown" ng-if="!(jedan.primus || jedan.oncor)">
    <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Ubaci na aparat
    <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
      <li role="presentation" ng-controller="aparatiCtrl"><a role="menuitem" tabindex="-1" ng-click="ubaciPac(1,jedan.id)" href="">Primus</a></li>
      <li role="presentation" ng-controller="aparatiCtrl"><a role="menuitem" tabindex="-1" ng-click="ubaciPac(2,jedan.id)" href="">Oncor</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="">Elekta1</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Elekta2</a></li>
    </ul>
  </div>

          
      </td>
    </tr>
    <tr>
        <td>Pomeranje</td>
        <td id="div1" style="display:none;" ng-if="!jedan.pomeranje" >   <a  ><% ubacivanje %></a></td>
        <td  ng-if="jedan.pomeranje">
         
            <a class="pomeranje" id="pomeranje"  ng-if="jedan.pomeranje" href="#">
                <% jedan.pomeranje.pomeranje_x !=null ? 
                   jedan.pomeranje.pomeranje_x >0  ? 
                   'levo'+' '+jedan.pomeranje.pomeranje_x
                   : 'desno'+' '+abs(jedan.pomeranje.pomeranje_x)
                   :'' %><br>
                 <% jedan.pomeranje.pomeranje_y !=null ? 
                   jedan.pomeranje.pomeranje_y >0  ? 
                   'ka glavi'+' '+jedan.pomeranje.pomeranje_y
                   : 'ka nogama'+' '+abs(jedan.pomeranje.pomeranje_y)
                   :'' %>  <br>
                 <% jedan.pomeranje.pomeranje_z !=null ? 
                   jedan.pomeranje.pomeranje_z >0  ? 
                   'gore'+' '+jedan.pomeranje.pomeranje_z
                   : 'dole'+' '+abs(jedan.pomeranje.pomeranje_z)
                   :'' %>  
                </a>
            <a class="pomeranje" style="float: right;" ng-if="jedan.pomeranje" ng-click="deletePomeranje(jedan.pomeranje.id,jedan.id)" href=""><span style="color: orangered;" class="glyphicon glyphicon-remove"></span></a>
            
        </td>
       
        <td id="pomeranje1" ng-if="!jedan.pomeranje"  data-toggle='modal'  data-target='#myModalPomeranje333'  ><a  href="#">Ubaci pomeranje</a></td>
      
    </tr>
     
   
  </tbody>
</table>
        </div>
        <div class="modal-footer">
            <button style="float: left;" data-toggle='modal' data-target='#myModal22' ng-click="updatePacient(jedan.id)" type="button" class="btn btn-primary" onclick="">Izmeni (dodaj) podatke</button>
            <button type="button" class="btn btn-primary" style="background:maroon;"  data-dismiss="modal">Izadji</button>
        </div>
      </div>
      
    </div>
  </div>
