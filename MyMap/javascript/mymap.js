function toggledisplay (id, indicator){ 
	if (document.getElementById) { 	// regular browser
		var obj = document.getElementById(id);
		var pic = document.getElementsByName(indicator);
		obj.style.display = (obj.style.display=='block'?'none':'block');
		pic[0].src = (obj.style.display=='block'?'modules/MyMap/pnimages/hide.gif':'modules/MyMap/pnimages/show.gif');
	} else if(document.all) { 		// Internet Exploder
		id.style.display = (id.style.display=='block'?'none':'block');
		indicator.src = (id.style.display=='block'?'modules/MyMap/pnimages/hide.gif':'modules/MyMap/pnimages/show.gif');
	} else if (document.layers) { 	// Netscape 4.x
		document.id.style.display = (document.id.style.display=='block'?'none':'block');
		document.indicator.src = (document.id.style.display=='block'?'modules/MyMap/pnimages/hide.gif':'modules/MyMap/pnimages/show.gif');
	}
}


function change(url,element)
{
	new Ajax.Updater(
		element,
		url, 
		{
			method: 'get',
			evalScripts: true
		}
	);
}