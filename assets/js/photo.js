
    function take_snapshot() {

        Webcam.snap( function(data_uri) {

            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';

        } );

    }


    function take_snapshot_identification() {
    	
    	Webcam.snap( function(data_uri) {
    		alert('Image capturée avec succès. \n Vous pouvez effectuer une autre capture si'  
    			+'l\'autre ne vous convient pas ou cliquez sur ajouter pour enregistrer')
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';

        } );

    }
