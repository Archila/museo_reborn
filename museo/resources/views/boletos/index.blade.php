@extends('templates.home')

@section('content')
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    

  
    <div class="row">
      
      <div class="col s6 center-align ">
        <p class="center-align caption">Tipo de visitante</p>
          @foreach ($visitante as $v)
            <input  class="with-gap visitante" id="{{$v->nombre}}" type="radio" value="{{$v->id}}" name="group1">
            <label for="{{$v->nombre}}">{{$v->nombre}}</label>
          @endforeach
      </div>

      <div class="col s6 center-align ">
        <p class="center-align caption">Rango de Edad</p>
          @foreach ($rango as $r)
            <input  class="with-gap rango" id="{{$r->nombre}}" type="radio" value="{{$r->id}}" name="group2">
            <label for="{{$r->nombre}}">{{$r->nombre}}</label>
          @endforeach
      </div>
    
    </div>
   

  <div class="row">
      <div class="col s6">
        <div class="row">
          <div class="col s12">
            <h5 class="light">Precio:</h5>
          </div>
         
          <div class="col s12" id='town'>
           
          </div>
         
        </div>
        <div class="row">
          <form name="boleto">
            <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
            <div class="input-field col s10 center-align">
              <input value="1" type="hidden" id="ingreso2" onKeyUp="boleteria()" type="number" class="validate" placeholder="Cantidad">
            </div>
            <div class="input-field col s10 center-align">
              <input id="ingreso3" onKeyUp="nombre()" type="text" class="validate" placeholder="Nombre">
            </div>
            <div class="input-field col s10 center-align">
              <input id="ingreso4" type="hidden" name="ingreso4" value="">
            </div>
            <div class="input-field col s6 left-align">
              
            </div>
          </form>  
          <button id="action" class="btn waves-effect waves-light" type="submit" name="action">Enviar</button>
          <button id="add" class="btn waves-effect waves-light" type="submit" name="add">Agregar</button>    
        </div>
      </div>
    
    <div class="col s6 m6">
      <div class="card hoverable z-depth-2">
        <div class="card-content">
        <div class="card-image">
          <img style="margin-top:-1cm;margin-bottom:-0.5cm;" src="{{URL::asset('Images/museologo.png')}}">
        </div>
          
          <p id="date" class="caption center-align"></p>
        </div>
        <div class="row ">
        <div class="col s6 offset-s3 divider"></div>
        </div>
        
          <div class="row">
              <div class="col s6">
                <h5 class="light right-align">Total:</h5>
              </div>
              <div class="col s6">
                <h5 class="light"><div id="resultado" name="resultado">Q. 0</div></h5>
              </div>
          </div>
          <div class="row">
              <div class="col s6 offset-s3">
                <h5 class="light center-align"><div id="resultado2" name="resultado2">Nombre</div></h5>
              </div>
          </div>
            <p class="center-align">www.museodehistoriaxela.com</p>
          <br>
          </div>
      
  </div>

  <div class="row">
    <div class="col s10 offset-s1">
      <table id="tableboleto" class="bordered highlight responsive-table">
          <thead>
            <tr>
                <th>Fecha</th>
                <th>Tarifa</th>
                <th>Nombre</th>
                <th>Subtotal</th>
                <th>Accion</th>
            </tr>
          </thead>

          <tbody id="content_table">
            <tr>
              
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td>Total</td>
              <td id="total_total">0.00</td>
            </tr>
          </tfoot>
        </table>
    </div>
  
  </div>
    
</div>
    
<script type="text/javascript">
  var fecha,tarifa,usuario;
  var total = 0;
  $("#action").click(function(){
    $("#tableboleto tbody tr").each(function (index) {
                var campo1, campo2, campo3,campo4;
                var token = $("#token").val();
                $(this).children("td").each(function (index2) {
                    switch (index2) {
                        case 0:
                        campo1 = $(this).text();
                        break;
                        case 1:
                        campo2 = $(this).text();
                        break;
                        case 2:
                        campo3 = $(this).text();
                        break;
                        case 3:
                        campo4 = $(this).text();
                        break;
                    }

                    $(this).css("background-color", "#ECF8E0");
                
                })
                $.ajax({
                  url: '{!!URL::to('boletos')!!}',
                  headers: {'X-CSRF-TOKEN':token},
                  type: 'POST',
                  dataType: 'json',
                  data:{fecha:campo1,total:campo4,tarifa:campo2,nombre:campo3},

                  success:function(){

                    swal("Boleto Generado", "Generando boleto", "success");
                    document.boleto.ingreso2.value = "";
                    document.boleto.ingreso3.value = "";
                    document.getElementById('resultado').innerHTML ="Q. 0";
                    document.getElementById('resultado2').innerHTML="Nombre";

                 }
      });
               // alert(campo1 + ' - ' + campo2 + ' - ' + campo3+ ' - ' + campo4);
            })
     
    
      
    
  });

$(document).ready(function(){

  $("#add").on('click',newRowTable);
  $("collection-item").on('click','.fa-eraser',deleteProduct);
	//$("collection-item").on('click','.fa-edit',editProduct);

	$("body").on('click',".fa-eraser",deleteProduct);
	//$("body").on('click',".fa-edit",editProduct);

  function deleteProduct()
  {
    var _this = this;
    var array_fila=getRowSelected(_this);
    calculateTotals(array_fila[3],2)
    $(this).parent().parent().fadeOut("slow",function(){$(this).remove();});
  }
  function newRowTable()
  {
      var dato1 = fecha;
      var dato3 = tarifa;
      var dato4 = usuario;
      var dato2 = parseFloat(total);
    	
      var name_table=document.getElementById("tableboleto");
      var row = name_table.insertRow(0+1);

      var cell1 = row.insertCell(0);
      var cell2 = row.insertCell(1);
      var cell3 = row.insertCell(2);
      var cell4 = row.insertCell(3);
      var cell5 = row.insertCell(4);
      

      cell1.innerHTML = '<p >'+fecha+'</p>';
      cell2.innerHTML = '<p >'+tarifa+'</p>';
      cell3.innerHTML = '<p >'+usuario+'</p>';
      cell4.innerHTML = '<p name="total_f[]">'+total+'</p>';
      cell5.innerHTML = '<i style="cursor:pointer;" class="small fa-eraser material-icons red-text">delete</i>';

      //Para calcular los totales enviando los parametros
      calculateTotals(total, 1);
      //Para calcular los totales sin enviar los parametros, solo adquiriendo los datos de la columna con mismo tipo de datos
    
}
function getRowSelected(objectPressed){
	//Obteniendo la linea que se esta eliminando
	var a=objectPressed.parentNode.parentNode;
	//b=(fila).(obtener elementos de clase columna y traer la posicion 0).(obtener los elementos de tipo parrafo y traer la posicion0).(contenido en el nodo)
	var fecha=a.getElementsByTagName("td")[0].getElementsByTagName("p")[0].innerHTML;
	var tarifa=a.getElementsByTagName("td")[1].getElementsByTagName("p")[0].innerHTML;
	var usuario=a.getElementsByTagName("td")[2].getElementsByTagName("p")[0].innerHTML;
	var total=a.getElementsByTagName("td")[3].getElementsByTagName("p")[0].innerHTML;
	
	var array_fila = [fecha, tarifa, usuario,total];

	return array_fila;
	//console.log(numero+' '+codigo+' '+descripcion);
}
function calculateTotals(total,accion){
	
	var t_total=parseFloat(document.getElementById("total_total").innerHTML);

	//accion=1		Sumarle al los totales
	//accion=2		Restarle al los totales
	if (accion==1) {
		
		document.getElementById("total_total").innerHTML=parseFloat(t_total)+parseFloat(total);
	}else if(accion==2){
		
		document.getElementById("total_total").innerHTML=parseFloat(t_total)-parseFloat(total);
	}else{
		alert('Accion Invalida');
	}
}
function calculateTotalsBySumColumn(){
	
	var totales_n=0;
	var array_totalesn=document.getElementsByName("total_f[]");
	for (var i=0; i<array_totalesn.length; i++) {
		totales_n+=parseFloat(array_totalesn[i].innerHTML);
	}
	document.getElementById("total_total").innerHTML=totales_n;
}

  var currentDate = new Date()
  var day   = currentDate.getDate()
  var month = currentDate.getMonth() + 1
  var year  = currentDate.getFullYear()
  document.getElementById("date").innerHTML = (day + "/" + month + "/" + year);
  var prod_id="";
  fecha= (year + "/" + month + "/" + day);
  

	$(document).on('change','.visitante',function(event){
		
    $(document).on('change','.rango',function () {
    
      prod_id=$(this).val();
      var a=$(this).parent();
      		
			$.get("/find/"+event.target.value+""+prod_id, function(response,state){
			console.log(response);
			
			$("#town").empty();
			for(i=0;i<response.length;i++)
      {
			  $("#town").append("<input name='grupo' onClick='boleteria()' type='radio' value='"+response[i].monto+"' id='"+response[i].id+"'>"+"<label for='"+response[i].id+"'>"+response[i].monto+"</label></p>");
        
      }
		});

	});
		
	});

});
function boleteria()
{
  var radios = document.getElementsByName('grupo');
    for (var i = 0, length = radios.length; i < length; i++)
    {
      if (radios[i].checked)
      {
        var ingreso1 = radios[i].value;
        var id = radios[i].id;
        break;
      }
    }
      var ingreso2 = document.boleto.ingreso2.value;
      document.boleto.ingreso4.value = id;
      tarifa = id;
      try
      {
	      ingreso1 = (isNaN(parseInt(ingreso1)))? 0 : parseInt(ingreso1);
		    ingreso2 = (isNaN(parseInt(ingreso2)))? 0 : parseInt(ingreso2);
		    document.getElementById('resultado').innerHTML = "Q." + ingreso1*ingreso2;
        total = ingreso1*ingreso2;
	    }
      catch(e) {}
}

function nombre()
{
  var ingreso3 = document.boleto.ingreso3.value;
  usuario = ingreso3;
  document.getElementById('resultado2').innerHTML = ingreso3;
}

</script>
@include('sweet::alert')
@endsection

@section('sections')
  <div class="center">
    <i class="medium material-icons">account_balance</i>
    <p><strong>Boleto:</strong><br>
    Documento que se entrega a la persona interesada en el que se garantiza que esta ha realizado el pago por un servicio.</p>
  </div>
@endsection