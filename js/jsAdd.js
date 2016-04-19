/*
	Document is responsible for handeling the ADD function to the 
	managePackage.php page. Ajax used to post information to the 
	server.
*/

$(document).ready(function () {

	//windows tab layout
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
	        
	       		$(this).dialog("close");  
	        }
    	}
    });

	//if ad button clicked open dialog 'Cdialog' box
	$('#btnAdd').click(function(){

		$("#Cdialog").dialog("open");
	});

      //check for and add tracking number to users table
      function sendTrackNum(){
      	 
      	 //$trackNum = $('#trackingNum').val();
      	 //post to the php page
      	 $.post('php/AddPackage.php', {
  	 		trackingNum : $('#trackingNum').val(),
  	 		method 		: "testTrackNum"

  	 	 	},
  	 		function(data){  

      	 		if(!data){
      	 			confirm("We could not find your tracking number");
      	 		}
      	 		else{
      	 			alert(data);
      	 			$('#PackSuccess').slideToggle(1000,function(){
      	 			});
      	 			setTimeout(toggleTimer,2000);	
      	 		}

      	 });

      	 //toggle the package success message
      	 function toggleTimer(){
      	 	$('#PackSuccess').slideToggle(1000,function(){
      	 		//??
      	 			});
      	 }
      	
      	 
      }
});