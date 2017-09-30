
$(document).ready({

  //Funcion para cambiar la barra de progreso
  function resetActive(event, percent, step) {
      $(".progress-bar").css("width", percent + "%").attr("aria-valuenow", percent);
      $(".progress-completed").text(percent + "%");
  }

  function selecionado(){
    var select = document.getElementById('tipoadquisicion');
    var id=select.value;
    var tipo= select.options[select.selectedIndex].text;
    if (tipo=="Heredado")
    {ocultar();}
    else {mostrar();}
  }

  function mostrar(){
    document.getElementById('p').style.display = 'block';
  }
  function ocultar(){
      document.getElementById('p').style.display = 'none';
      document.getElementById('SMO').style.display = 'none';
      document.getElementById('cpNin').style.display = 'none';
  }


  function capturar()
  {
     var resultado="ninguno";
     var radios=document.getElementsByName("grp1");
     for(var i=0;i<radios.length;i++)
     {
         if(radios[i].checked)
         resultado=radios[i].value;
     }
     if (resultado=="si") {
      document.getElementById('SMO').style.display = 'none';
      document.getElementById('cpNin').style.display = 'block';

      }else {
        document.getElementById('SMO').style.display = 'block';
        document.getElementById('cpNin').style.display = 'none';
        buscarDon();
      }
  }


  function capturarDonante()
  {
     var resultado="ninguno";
     var radios=document.getElementsByName("grp2");
     for(var i=0;i<radios.length;i++)
     {
         if(radios[i].checked)
         resultado=radios[i].value;
     }

    document.datos.iddonanteC.value = resultado;

  }


  function buscarDon()
  {
  $('#buscar').on('keyup',function(){
    $value=$(this).val();
    $.ajax({
      type : 'get',
       url : '{{URL::to('buscardon')}}',
       data : {'search':$value},
       success:function(data){
         $('tbody').html(data);
       }
    });
  })
  }


});
