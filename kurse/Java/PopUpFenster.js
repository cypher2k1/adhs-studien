var fenster;


//*******************************************************************
//		PopUpFenster()
//*******************************************************************
function PopUpFenster(URL,name,hoehe,breite,x,y,scroll)
{		
	if (fenster != null)
		if (fenster.closed == false)
	        	fenster.close()
	
	// statische Eigenschaften	
	var prop = "dependent=no,location=no,menubar=no,resizable=no,status=no,toolbar=no,";

	// dynamische Eigenschaften	
	// Größe des Fensters
	prop += "height=" + hoehe + ",width=" + breite;	
	
	// Scrollbar
	if (scroll) prop += ",scrollbars=yes,";
	else prop += ",scrollbars=no,";
		
	// Position des Fensters				
	if (navigator.appName.indexOf("Netscape") > -1) 
	{				
		prop += ",screenY=" + y + ",";	
		prop += "screenX=" + x;		
	}
	else 
	{
		prop += ",top=" + y + ",";	
		prop += "left=" + x;
	}

	fenster = open(URL,name,prop);
	return fenster;
}




function PopUpWindow(URL,name,hoehe,breite,x,y,scroll)
{		
	if (fenster != null)
		if (fenster.closed == false)
	        	fenster.close()
	
	// statische Eigenschaften	
	var prop = "dependent=no,location=no,menubar=no,resizable=no,status=no,toolbar=no,";

	// dynamische Eigenschaften	
	// Größe des Fensters
	prop += "height=" + hoehe + ",width=" + breite;	
	
	// Scrollbar
	if (scroll) prop += ",scrollbars=yes,";
	else prop += ",scrollbars=no,";
		
	// Position des Fensters				
	if (navigator.appName.indexOf("Netscape") > -1) 
	{				
		prop += ",screenY=" + y + ",";	
		prop += "screenX=" + x;		
	}
	else 
	{
		prop += ",top=" + y + ",";	
		prop += "left=" + x;
	}

	fenster = open(URL,name,prop);
	
}