var test;
test = 1;



function swip(arg){


	switch (arg) {
		case 'left':
			document.getElementById('Card').classList.add('CardLeftTransi');
			break;
		case 'right':
			document.getElementById('Card').classList.add('CardRightTransi');
			break;
	}
	    
 }



function deletez(){

	
}


function generateCardJS(){
console.log("testt");
      $.ajax({
           type: "POST",
           url: 'getDataFromDb.php',
           data:{action:'call_this'},
           success:function(html) {
             $("#testdiv").append(html);
           }

      });
 
}

function DeleteCardJS() {
	//alert($("#Card"));
	
	setTimeout(function(){$('#Card').remove()},2000);
	setTimeout(function(){generateCardJS()},2000);
	
	
	
}


