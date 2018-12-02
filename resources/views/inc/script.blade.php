<script>
	var token = '{{Session::token()}}';
	var url = '{{ route('edit')}}';

	$(document).ready(function() {
		
	  $('.editSubmit').click(function(event){
		  	var postBodyElement = event.target.parentNode.parentNode.childNodes[0];
			console.log(postBodyElement);
		  	event.preventDefault();
		  	//console.log(url);
		  	var postBody = event.target.parentNode.childNodes[4].value;
		  	var id = event.target.parentNode.parentNode.childNodes[2].id;
		  	$.ajax({
		  		method: 'POST',
		  		url: url,
		  		data: {
		  			body: postBody,
		  			post_id: id,
		  			_token: token
		  		}
		  	}).done(function(msg){
		  		console.log(msg);
		  		$(postBodyElement).text(msg['body']);
		  		//console.log(JSON.stringify(msg));
		  	});
		});
	});
	

	function TitleOn(id)
	{
	    var form = "editTitle" + id;
	    //console.log(form);

	    if(document.getElementById(form).style.visibility=="visible")
	    {
			document.getElementById(form).style.visibility="hidden";
	    }
	    else
	    {
	    	document.getElementById(form).style.visibility="visible";
	    }
	    
	}




</script>