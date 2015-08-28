var suche_Window = null;
var druck_window = null;
var Fehler_Window = null;
var Save_Window = null;
var fenster = null;
endl = unescape("%0D");
endl_62 = unescape("%0A");
var cookie_eintrag;
var c_name;
var c_name_alt;
var textBrowserNav = "";
var suchBegriff = "";
var mover = 'Bildwechsel(HighlightN6,"b5");self.status="Suche starten";return true';	
var mout = 'Bildwechsel(NormalN6,"b5")';
var index;
var kapitel;
var searchValue = 0;
	 
	 

//******************************************************************
//	function init() 
//******************************************************************
function init()
{    	    
	NZneu = parent.window.opener.parent.parent.frames[2].document.URL;	
	modul = NZneu.substring(NZneu.indexOf("Mod_"),NZneu.length);
			
	if (modul.indexOf("\\") > -1)
	{
		modul1 = modul.substring(0,modul.indexOf("\\"));
	}	
	else if (modul.indexOf("/") > -1)
	{
		modul1 = modul.substring(0,modul.indexOf("/"));
	}
	else modul1 = "Mod_0";

	//if (IE5 || IE6) modul1 = modul.substring(0,modul.indexOf("\\"));
	//else modul1 = modul.substring(0,modul.indexOf("/"));		
			
	modul = modul1;
		
	if (modul.indexOf("Mod_0") == 0)
	{		
		c_name = 'NZ';	
		index = 0
	}
	else if (modul.indexOf("Mod_") == 0)
	{			
		c_name = 'NZ_' + modul.substring(4,modul.length);					
		index = modul.substring(4,modul.length);
	}

	c_name_alt = c_name;
    	select();
    	browserLayer();    	
}


//******************************************************************
//	getTextBrowserNav() 
//******************************************************************
function getTextBrowserNav() 
{
	return textBrowserNav; 
}


//******************************************************************
//	NZ_Anzeigen() 
//******************************************************************
function NZ_Anzeigen()
{			
	if (IE5 || IE6) Text = "<form Name='NZForm' method='POST'><p><textarea  name='S1' rows='14' cols='50' wrap='virtual' onFocus='notSearch()' onBlur ='CheckInhalt(this.value)'>"
	else if (N4) Text = "<form Name='NZForm' method='POST'><p><textarea  name='S1' rows='15' cols='28' wrap='virtual' onFocus='notSearch()' onBlur ='CheckInhalt(this.value)'>"
	else if (N6) Text = "<form Name='NZForm' method='POST'><p><textarea  name='S1' rows='14' cols='48' wrap='virtual' onFocus='notSearch()' onBlur ='CheckInhalt(this.value)'>"
	else Text = "<form Name='NZForm' method='POST'><textarea  name='S1' rows='15' cols='48' wrap='virtual' onFocus='notSearch()' onBlur ='CheckInhalt(this.value)'>"
		
    	Text = Text + "</textarea></form>"
    	return Text
}


//******************************************************************
//	CheckInhalt() 
//******************************************************************
function CheckInhalt(Feld)
{
  	searchValue = 0;   
  	return false;
}


//******************************************************************
//	notSearch() 
//******************************************************************
function notSearch()
{		
   	searchValue = 1;   	   
}


//******************************************************************
//	cookieEintragen() 
//******************************************************************
function cookieEintragen()
{				
	eval("cookie_eintrag = parent." + c_name + "_frame.cookie_eintrag");
	
	if ((document.all) || (document.getElementById))
	{
		document.forms[0].elements[0].value = cookie_eintrag;			
	}
	else if (document.layers)
	{		
		document.layers["inhalt"].document.forms[0].elements[0].value = cookie_eintrag;	
	}
}


//******************************************************************
//	suchbegriffEintragen() 
//******************************************************************
function suchbegriffEintragen()
{	
	if ((document.all) || (document.getElementById))
	{
		document.forms[1].suchFeld.value = suchBegriff;			
	}
	else if (document.layers)
	{		
		document.layers["inhalt"].document.forms[1].suchFeld.value = suchBegriff;	
	}
}


//******************************************************************
//	SaveNotiz() 
//******************************************************************
function SaveNotiz()
{	
	if (N4) tmp = document.layers["inhalt"].document.forms[0].elements[0].value;    	
    	else tmp = document.forms[0].elements[0].value; 
    	
	eval("gespeichert = parent." + c_name + "_frame.SaveNotiz(tmp)");    	
    	cookie_eintrag = tmp;     	    	
    	
    	return gespeichert;
}


//******************************************************************
//	SaveNotiz_alt() 
//******************************************************************
function SaveNotiz_alt()
{	
	if (N4) tmp = document.layers["inhalt"].document.forms[0].elements[0].value;    	
    	else tmp = document.forms[0].elements[0].value; 
    	    	
	eval("parent." + c_name_alt + "_frame.SaveNotiz(tmp)");    	     	
    	cookie_eintrag = tmp;     	
}


//******************************************************************
//	ClearNotiz() 
//******************************************************************
function ClearNotiz(reload)
{    	
	eval("parent." + c_name + "_frame.ClearNotiz(" + reload + ")");    	
	cookie_eintrag = "";
	
    	if (reload) 
    	{
    		select();
    		browserLayer();
    	}    	    
}


//******************************************************************
//	ClearNotiz_alle() 
//******************************************************************
function ClearNotiz_alle()
{
	eval("parent.NZ_frame.ClearNotiz(true)");
	
    	for (var i = 1; i < kapitelTitel.length; i++)
	{
		eval("parent.NZ_" + i + "_frame.ClearNotiz(true)");
	}
}


//******************************************************************
//	linkResultSearch() 
//******************************************************************
function linkResultSearch(kapitel)
{   	 
    	if (parent.cookieTest == false) 
    	{
        	document['b6'].src=offBild[6].src
        	alert ("Um diese Funktion zu nutzen, müssen in Ihrem Browser Cookies aktiviert sein.")
    	} 
    	else 
    	{        	    			
		c_name_alt = c_name;		
		
		if (kapitel == 0) c_name = "NZ";
		else c_name = "NZ_" + kapitel;
		
		select();
		browserLayer();
    	}	    	
}


//******************************************************************
//	getKapitel() 
//******************************************************************
function getKapitel()
{
	return c_name;
}


//******************************************************************
//	NZ_print() 
//******************************************************************
function NZ_print()
{			
       druck_window = PopUpFenster("Vorschau.htm","DruckFenster",400,440,100,0);	
}


//******************************************************************
//	shut() 
//******************************************************************
function shut()
{	
	druck_window.close();		
}


//******************************************************************
//	TextToHTML() 
//******************************************************************
function TextToHTML(text)
{	
	if (N6)
	{
		pos = text.indexOf(endl_62);
	
		while (pos >= 0)
		{		
			text1 = text.substring(0,pos) + '<br>' + text.substring(pos+1,text.length);
			text = text1;
		      	pos = text.indexOf(endl_62);
		}		
	}
	else
	{
		pos = text.indexOf(endl);		
	
		while (pos >= 0)
		{				
			text1 = text.substring(0,pos) + '<br>' + text.substring(pos+1,text.length);
			text = text1;
		      	pos = text.indexOf(endl);
		}
   	}
   	
	return text;
}



//******************************************************************
//	NotizLink() 
//******************************************************************
function NotizLink(kapitel)
{		
	if (N4) wert = document.layers["inhalt"].document.NZForm.S1.value;
	else wert = document.NZForm.S1.value;
	
	c_name_alt = c_name;	
	eval("cookie_eintrag = parent." + c_name_alt + "_frame.cookie_eintrag");
	
	if (cookie_eintrag == wert)
	{				
		index = kapitel;
			
		if (kapitel == 0) c_name = "NZ";		
		else c_name = "NZ_" + kapitel;	
		
		select();
		browserLayer();
	}
	else
	{		
		if(OP711 || OP721)  Fehler_Window = PopUpFenster("Fehler.htm","Fehler_wechseln",100,250,100,100);	
		else 				Fehler_Window = PopUpFenster("Fehler.htm","Fehler_wechseln",60,250,100,100);
	}	
}


//******************************************************************
//	allDelete() 
//******************************************************************
function allDelete()
{
	if(OP711 || OP721)  Fehler_Window = PopUpFenster("Delete.htm","alle_loeschen",100,300,100,100);
	else 				Fehler_Window = PopUpFenster("Delete.htm","alle_loeschen",60,300,100,100);
}


//******************************************************************
//	ja() 
//******************************************************************
function ja()
{			
	if (Fehler_Window.name == "Fehler_wechseln")
	{									
		Fehler_Window.close();
		fenster.close();
		gespeichert = SaveNotiz();
		
		if (gespeichert)
		{
			index = kapitel;
						
			if (kapitel == 0) c_name = "NZ";		
			else c_name = "NZ_" + kapitel;
			
			select();
			browserLayer();
		}		
	}
	else if (Fehler_Window.name == "Fehler_schliessen")
	{								
		Fehler_Window.close();
		fenster.close();
		SaveNotiz();
		
		if (gespeichert) parent.window.opener.zu();
	}
	else if (Fehler_Window.name == "alle_loeschen")  
	{
		Fehler_Window.close();
		ClearNotiz_alle();								
		select();
		browserLayer();
	}
}


//******************************************************************
//	nein() 
//******************************************************************
function nein()
{		
	if (Fehler_Window.name == "Fehler_wechseln")
	{		
		index = kapitel;
				
		if (kapitel == 0) c_name = "NZ";		
		else c_name = "NZ_" + kapitel;	
		
		Fehler_Window.close();
		select();	
		browserLayer();
	}
	else if (Fehler_Window.name == "Fehler_schliessen")  
	{		
		Fehler_Window.close();
		parent.window.opener.zu();
	}	
	else if (Fehler_Window.name == "alle_loeschen")  
	{
		Fehler_Window.close();
	}
}


//*******************************************************************
//		PopUpFenster()
//*******************************************************************
function PopUpFenster(URL,name,hoehe,breite,x,y)
{		
	if (fenster != null)
		if (fenster.closed == false)
			//if (fenster.name == name)
		        	fenster.close()
		        	
	fenster = null;		        	
	
	// statische Eigenschaften	
	var prop = "location=no,menubar=no,resizable=no,status=no,toolbar=no,scrollbars=no,";

	// dynamische Eigenschaften	
	// Größe des Fensters
	prop += "height=" + hoehe + ",width=" + breite;	
		
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


//******************************************************************
//	go()
//******************************************************************
function go(nzkapitel)
{		
	kapitel = nzkapitel;
	NotizLink(nzkapitel);		
}



//******************************************************************
//	setValue()
//******************************************************************
function setValue(value)
{
	suchBegriff = value;		 
}
	 

//******************************************************************
//	showResult()
//******************************************************************	 
function showResult()
{	 
	 //suche_Window = PopUpFenster("Suche.htm","Suchergebnis",410,400,600,0);	 
	 if (N4) 				 suche_Window = PopUpFenster("Suche.htm","Suchergebnis",420,400,600,0);	 
	 else if(N6) 			 NZ_Window = suche_Window = PopUpFenster("Suche.htm","Suchergebnis",430,400,600,0);	 
	 else if(OP711 || OP721) NZ_Window = suche_Window = PopUpFenster("Suche.htm","Suchergebnis",410,400,600,0);
	 else 					 NZ_Window = suche_Window = PopUpFenster("Suche.htm","Suchergebnis",410,400,600,0);
}


//******************************************************************
//	close_window() 
//******************************************************************
function close_such_window()
{		
        suche_Window.close();      
}


//******************************************************************
//	suche() 
//******************************************************************
function suche()
{	
	if (N4) setValue(document.layers["inhalt"].document.Suchen.suchFeld.value);
	else setValue(document.Suchen.suchFeld.value);
	
	showResult()
}


//******************************************************************
//	checkBeforeClose() 
//******************************************************************
function checkBeforeClose()
{		
	if (N4) wert = document.layers["inhalt"].document.NZForm.S1.value;
	else wert = document.NZForm.S1.value;
	
	eval("cookie_eintrag = parent." + c_name + "_frame.cookie_eintrag");
	
	if (cookie_eintrag == wert) return false;
	else return true;
}


//******************************************************************
//	showFehler() 
//******************************************************************
function showFehler()
{	
	if(OP711 || OP721)  Fehler_Window = PopUpFenster("Fehler.htm","Fehler_schliessen",100,250,100,100);		
	else				Fehler_Window = PopUpFenster("Fehler.htm","Fehler_schliessen",60,250,100,100);
}


//******************************************************************
//	SaveNotizLeiste() 
//******************************************************************
function SaveNotizLeiste()
{
	zurueck = SaveNotiz();
}
