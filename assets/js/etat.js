// $(document).ready(function() {
//     $('#example').DataTable(
        
//          {     

//       "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
//         "iDisplayLength": 5
//        } 
//     );

//     $('#example1').DataTable(
        
//          {     

//       "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
//         "iDisplayLength": 5
//        } 
//     );
// } );

var today = new Date();
var dd = today.getDate();
remplissage($('#type_operation').val(), dd, dd);
$('#date_du').change(function(event) {

  var val = $('#type_operation').val();
  var datedebut = $('#date_du').val();
  var datefin = $('#date_au').val();

  remplissage(val, datedebut, datefin);
});

$('#date_du').change(function(event) {
  var val = $('#type_operation').val();
  var datedebut = $('#date_du').val();
  var datefin = $('#date_au').val();

  remplissage(val, datedebut, datefin);
});
$('#type_operation').change(function() {
  var val = $('#type_operation').val();
  var datedebut = $('#date_du').val();
  var datefin = $('#date_au').val();

  remplissage(val, datedebut, datefin);
});



function remplissage(val, datedebut, datefin) 
{
  if(val == "referentiel")
  {
    $('#tableau_enrolement').css({
      display: 'none'
    });

    $('#tableau_referentiel').css({
      display: 'block'
    });

    $.post(
      base_url+"Acceuil/etat_operation/"+val,
      {
        datedebut: datedebut,
        datefin: datefin
      }, 
      function(data, textStatus, xhr) {
        console.log(data.data);

        if(data.success == true)
        {
          $('#tbody_referentiel').html("");
        
          for (var i = data.data.length - 1; i >= 0; i--) {
            var content = '<tr>'
            +'<td>'+data.data[i].codeparc+'</td>'
            +'<td>'+data.data[i].nom+' '+data.data[i].prenom +'</td>'
            +'<td>'+data.data[i].arrondissement+'</td>'
            +'<td>'+data.data[i].quartier+'</td>'
            +'<td>'+data.data[i].parcelle+'</td>'
            +'<td>'+data.data[i].superficie+'</td></tr>';
            $('#tbody_referentiel').html($('#tbody_referentiel').html() + content);
          }
        }else
        {
           $('#tbody_referentiel').html("");
        }
    }, "json").fail(function(jqXHR, error){
        alert(jqXHR.responseText);
    });


  }else if(val == "enrollement")
  {
    $('#tableau_referentiel').css({
      display: 'none'
    });

    $('#tableau_enrolement').css({
      display: 'block'
    });

    $.post(
      base_url+"Acceuil/etat_operation/"+val, 
      {
        datedebut: datedebut,
        datefin: datefin
      },  
      function(data, textStatus, xhr) {
      console.log(data.data);

      if(data.success === true)
      {
        $('#tbody_enrollement').html("");
      
        for (var i = data.data.length - 1; i >= 0; i--) {
          var content = '<tr><td><img height="50" width="50" src="data:image/jpeg;base64,'+data.data[i].photo+'"/></td><td>'+data.data[i].nom+'</td><td>'+data.data[i].prenom+'</td><td>'+data.data[i].profession+'</td><td>'+data.data[i].dateCreation+'</td></tr>';
          $('#tbody_enrollement').html($('#tbody_enrollement').html() + content);
        }
      }else
      {
         $('#tbody_enrollement').html("");
      }
    }, "json").fail(function(jqXHR, error){
        alert(jqXHR.responseText);
    }); 
  }
}