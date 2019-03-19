$("#codeparcident").on("change paste keyup", function() {
   var valeur = $(this).val();

   $.post(
      base_url+"Acceuil/getInfoCoordonne", 
      {
        codeparc: valeur 
      }, 
      function(data, textStatus, xhr) {
        console.log(data);
        if(data.success === true)
        {
          $('input[name=nompre]').val("");
          $('input[name=nompre]').val(data.data[0].nom+' '+data.data[0].prenom);
          $('input[name=id_client]').val("");
          $('input[name=id_client]').val(data.data[0].ID_CLIENT);
        }else
        {          
          $('input[name=id_client]').val("");
          $('input[name=nompre]').val("");
        }
     }, "json").fail(function(jqXHR, error){
        alert(jqXHR.responseText);
    }); 
});

$('.smcapture').click(function() {
  var filename =$(this).attr('id');
  var id_client = $('input[name=id_client]').val();

  $('input[name=image]').val("");

  if(id_client == "")
  {
    alert("veuillez entrer un code de parcelle valide!!!")
    
  }else
  {
    if (filename == "autre") 
    {
      $('#nom_autre').css({
        display: 'block',
      });
    }
    $('input[name=filename]').val(filename);
    $('#imgCapture').modal('show');
  }
});

$('#addFile').click(function() 
{
  var id_client = $('input[name=id_client]').val();
  var filename = $('input[name=filename]').val();
  var image = $('input[name=image]').val();
  var codeparc = $('#codeparcident').val();
  var nom_fichier_autre = "";

  if ($('input[name=filename]').val() == "autre" && $('input[name=nom_fichier]').val() == "") 
  {
    alert("Vous n'avez pas renseigner le nom du fichier");
    return;
  }else if ($('input[name=filename]').val() == "autre" && $('input[name=nom_fichier]').val() != "") 
  {
    nom_fichier_autre = $('input[name=nom_fichier]').val();
  }

  $.post(
    base_url+'acceuil/add_identification', 
    {
      id_client: id_client,
      filename: filename,
      nom_fichier_autre:nom_fichier_autre,
      image: image,
      codeparc: codeparc
    }, 
    function(data, textStatus, xhr) {
       if(data.success === true)
        {
          alert(data.message);
          $('#imgCapture').modal('hide');
          $('input[name='+filename+']').val(data.fileName);
          $('input[name=image]').val();
          if(data.filename == "autre")
          {
            $('input[name=nom_fichier]').val("");
            if ($('input[name=autre]').val() == "") 
            {
              $('input[name=autre]').val(data.fileName);
            }else
            {
              $('input[name=autre]').val($('input[name=autre]').val() + ', ' +data.fileName);
            }
            
          }else
          {
            $('input[name='+data.filename+']').val(data.fileName);
          }

        }else
        {          
          alert(data.message);
        }

    
   }, "json").fail(function(jqXHR, error){
        alert(jqXHR.responseText);
  }); 
});