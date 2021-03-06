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
		 			$('#alertNoPack').hide();
		 			//store the retreived data in an array
		 			var packArray = data.split(',');
		 			
		 			//show the success message
		 			$('#PackSuccess').slideToggle(1000,function(){
		 			});
		 			setTimeout(toggleTimer,2000);
		 			//add details to table
		 			//addToTable(packArray);	
		 			$("#tablebody").load("/xparcel/php/reloadPackages.php");
		 		}

		 });
	}

	//toggle the package success message
	function toggleTimer(){
	 	$('#PackSuccess').slideToggle(1000,function(){
	 		//??
	 	});
	}

	//adds the details into the table
	function addToTable(packArray){

		$(this).packArray = packArray;
		//store the retrieved details
		$Ddate= packArray[0];
		$stat= packArray[1];
		$tNum= packArray[2];

		//dynamically enter the details into the table 
		var table = document.getElementById('tableBody');
		var row = table.insertRow(0);

		var cell0 = row.insertCell(0);
		var cell1 = row.insertCell(1);
		var cell2 = row.insertCell(2);

		cell0.innerHTML = $Ddate;
		cell1.innerHTML = $stat;
		cell2.innerHTML = $tNum;

		//location.reload();
	}

	//handling the row selected on the table
	$("#tablebody tr").click(function(){
   		$(this).addClass('selected').siblings().removeClass('selected');    
   		var value=$(this).find('td:first').html();
   		//alert(value);    
	});


	/*$('.ok').on('click', function(e){
		alert($("#tablebody tr.selected td:first").html());
	});*/	
});