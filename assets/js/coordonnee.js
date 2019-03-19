$('#ajouterCoordonner').click(function(e) {
  e.preventDefault();

  var x = $('input[name=x]').val();
  var y = $('input[name=y]').val();
  var detailcor= $('#detailcoordonnee').val();

  if(x == "" || y== "")
  {
    alert("L'un des coordonnées est vide.");
  }else
  {
    $.post(
      base_url+"Acceuil/addcoordonne", 
      {
        x: x,
        y: y,
        detailcor: detailcor
      }, 
      function(data, textStatus, xhr) {
        console.log(data.success);
        console.log(data.data);
        if(data.success === true)
        {

          $('input[name=x]').val("");
          $('input[name=y]').val("");

          var detailcor = $('#detailcoordonnee').val();
          var text = 'x: '+ data.data.x +' y:'+ data.data.y;
          if(detailcor == "")
          {
            $('#detailcoordonnee').val(text);
          }else
          {
            $('#detailcoordonnee').val(detailcor+'\n\n'+text);
          }

        }

     }, "json").fail(function(jqXHR, error){
        alert(jqXHR.responseText);
    }); 
  }
  
});


$('#ReprendreCoordonner').click(function(e) {
   e.preventDefault();

   $.post(
      base_url+"Acceuil/ReprendreCoordonne", 
      {
      }, 
      function(data, textStatus, xhr) {
        
        if (data.success === true) 
        {
          $('#detailcoordonnee').val("");
        }

     }, "json").fail(function(jqXHR, error){
        alert(jqXHR.responseText);
    });
});


$("#codeparc").on("change paste keyup", function() {
   var valeur = $(this).val();

   $.post(
      base_url+"Acceuil/getInfoCoordonne", 
      {
        codeparc: valeur 
      }, 
      function(data, textStatus, xhr) {
        console.log(data.success);
        if(data.success === true)
        {
          $('input[name=nom_prenom]').val(data.data[0].nom+' '+data.data[0].prenom);
          $('input[name=arron]').val(data.data[0].arrondissement);
          $('input[name=etat_lieu]').val(data.data[0].etat_lieu);
          $('input[name=quartier]').val(data.data[0].quartier);
          $('input[name=parcelle]').val(data.data[0].parcelle);
          $('input[name=superficie]').val(data.data[0].superficie);
          $('input[name=prix_achat]').val(data.data[0].pa);
        }else
        {
          $('input[name=nom_prenom]').val("");
          $('input[name=arron]').val("");
          $('input[name=etat_lieu]').val("");
          $('input[name=quartier]').val("");
          $('input[name=parcelle]').val("");
          $('input[name=superficie]').val("");
          $('input[name=prix_achat]').val("");
        }
     }, "json").fail(function(jqXHR, error){
        alert(jqXHR.responseText);
    }); 
});


$('#UpdateCoodonner').click(function(e) {

  e.preventDefault();

  var codeparc = $('#codeparc').val();

  $.post(
      base_url+"Acceuil/ajoutCoordonnee", 
      {
        codeparc: codeparc 
      }, 
      function(data, textStatus, xhr) {

        console.log(data.success);
        if(data.success === true)
        {
          alert(data.message);
          location.reload();
        }else
        {
          alert(data.message);
        }

     }, "json").fail(function(jqXHR, error){
        alert(jqXHR.responseText);
    }); 
});







