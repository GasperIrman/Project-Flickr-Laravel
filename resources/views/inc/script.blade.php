<script>
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
	function ContentOn(id)
	{
	    var form = "editContent" + id;
	    console.log(form);
	    document.getElementById(form).style.visibility="visible";
	}
</script>