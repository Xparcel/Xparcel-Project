/*
	Document is responsible for handeling the ADD function to the 
	managePackage.php page. Ajax used to post information to the 
	server.
*/

$(document).ready(function () {

	$('#table').tabs({
		event: "click",
	    // Effects: fadeIn, fadeOut, slideDown, slideUp, animate
	    show: "fadeIn",
	    hide: "fadeOut",
	    // Starting panel
	    active: 1,
	    // Collapse by clicking the current tab
	    collapsible: false,
	    // Height based on content (content) or largest (auto)
	    heightStyle: "auto"
	});

	$("[title]").tooltip();

	//dialgo box for add button
	$("#Cdialog").dialog({

    	draggable:true,
    	resizable:false,
    	height: 300,
    	width: 300,
    	modal: true,
    	position:{
    		my:'center',
    		of: '#packages'
      	} ,
      	show: 500,
      	hide: 500,
      	autoOpen: false,
      	buttons:{
        	"OK": function(){
       	
			sendTrackNum();
            $(this).dialog("close");
        
      },
      "CANCEL": function(){
        alert("CANCEL button been pushed");
        $(this).dialog("close");  
      }
    }
     });

      $('#btnAdd').click(function(){
            
            $("#Cdialog").dialog("open");
      });

      function sendTrackNum(){
      	 
      	 $trackNum = $('#trackingNum').val();

      	 $.post('php/AddPackage.php', {
  	 		trackingNum : $trackNum,
  	 		method 		: "testTrackNum"

  	 	 	},
  	 		function(data){  

      	 		alert(data);

      	 });
      	
      	 
      }
});