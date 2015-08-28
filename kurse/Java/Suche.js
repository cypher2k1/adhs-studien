var result;
var textBrowserNav = "";
var warteText = "";
var linksArray = new Array();
var blaetern;
var arrayTitle = new Array();
var locationID = "";
var suche = true;
var suchBegriff = "";
var abbruch = false;
var leer = true;

Normal3 = new Image();
Normal3.src = "Stat-Gifs/Nzu.gif";
Highlight3 = new Image();
Highlight3.src = "Stat-Gifs/Nzu_Mo.gif";
 
NormalN6 = new Image();
NormalN6.src = "Stat-Gifs/Lupesuche.gif";
HighlightN6 = new Image();
HighlightN6.src = "Stat-Gifs/Lupesuche_Mo.gif";
 
function Bildwechsel(Bildobjekt,PName)
{
	command= "window.document."+PName+".src = Bildobjekt.src";
	eval(command);
}


//******************************************************************
//	function  reduction() 
//******************************************************************
function reduction(Text)
{
      	var r = Text.indexOf("  ");

     	if (Text.charAt(r+1) == " ")
      	{
      		Text = Text.substring(0,r).concat(Text.substring(r+1,Text.length));
      		Text = reduction(Text);
      	}
      	
      	return (Text);
}


//******************************************************************
//	function  reductionBeginn() 
//******************************************************************
function reductionBeginn(Text)
{      	
	var txt = Text;

      	while (txt.substring(0,1) == " ")
      	{
      		txt = txt.substring(1,txt.length);
      	}

      	return(txt);
}


//******************************************************************
//	function  reductionEnd() 
//******************************************************************
function reductionEnd(Text)
{
      	var k = Text.lastIndexOf(" ");      	      	

      	if ((k != -1) && (k==Text.length-1))
      	{
	      	Text = Text.substring(0,Text.length-1);
	      	Text = reductionEnd(Text);
      	}

       	return(Text);
}


//******************************************************************
//	function  setArrayBegriff()
//******************************************************************
function setArrayBegriff()
{		
	suchBegriff = document.Suchen.suchFeld.value;	
	convertSign();	
	suchBegriff = reductionBeginn(suchBegriff);
	suchBegriff = reductionEnd(suchBegriff);
	suchBegriff = reduction(suchBegriff);	
	
	if (suchBegriff == "")
	{
		suche = false;
		TrefferAnzeige();		
	}
	else
	{
		var arrayBegriff = suchBegriff.split(" ");
		var anzahlSuchBegriff = ""+arrayBegriff.length;		
        	document.fileopener.setAnzahlBegriff(anzahlSuchBegriff);
	
		for(var i=0;i<arrayBegriff.length;i++)
		{
			document.fileopener.setSuchbegriffArray(arrayBegriff[i],i);
		}
	}
}


//******************************************************************
//	function  convertSign()
//******************************************************************
function convertSign()
{
	var specialSign = new Array("ü","Ü","ä","Ä","ö","Ö","ß");
	var convertSign = new Array("&uuml;","&Uuml;","&auml;","&Auml;","&ouml;","&Ouml;","&szlig;")			
			
	while(suchBegriff.indexOf("ü")!=-1 || suchBegriff.indexOf("Ü")!=-1 || suchBegriff.indexOf("ä")!=-1 || suchBegriff.indexOf("Ä")!=-1 || suchBegriff.indexOf("ö")!=-1 || suchBegriff.indexOf("Ö")!=-1 || suchBegriff.indexOf("ß")!=-1)	
	{		
		for(var i = 0; i<specialSign.length;i++)
		{
			suchBegriff = suchBegriff.replace(eval("/"+specialSign[i]+"/"),convertSign[i]);						
		}
	}	
}


//******************************************************************
//	function  search()
//******************************************************************
function search()
{ 	 	
	suche = true;
	blaetern = 0;	
	initTrefferliste(true);
	setArrayBegriff();	
	
	if (suche)
	{
		leer = false;
		var locationID = window.location.href; 			
		locationID = unescape(locationID.substring(0,locationID.lastIndexOf("/")+1)); 		
		document.fileopener.setStringJs(locationID);						
		document.fileopener.actionThread(); 
	}
}


//******************************************************************
//	function  SucheAbbrechen()
//******************************************************************
function SucheAbbrechen()
{
	document.fileopener.abbruch(); 
	abbruch = true;
	TrefferAnzeige();
}


//******************************************************************
//	function  init()
//******************************************************************
function init()
{
	if (document.all)
	{
		document.all("SucheAbbruch").style.pixelTop = 90;
		document.all("SucheAbbruch").style.pixelLeft = 240;
		document.all("SucheAbbruch").style.visibility = "visible";
	}
	else if (document.getElementById)
	{
		document.getElementById("SucheAbbruch").style.top = 90;
		document.getElementById("SucheAbbruch").style.left = 240;
		document.getElementById("SucheAbbruch").style.visibility = "visible";		
	}
	else if (document.layers)
	{
		document.layers["SucheAbbruch"].top = 100;
		document.layers["SucheAbbruch"].left = 290;		
		document.layers["SucheAbbruch"].visibility = "visible";
	}
	
	initTrefferliste(false);
}


//******************************************************************
//	function  initTrefferliste()
//******************************************************************
function initTrefferliste(suche)
{	
	textBrowserNav = "";
	textBrowserNav += "<table summary='Volltextsuche' border='0' cellpadding='0' cellspacing='0' width='372'>"+	   			
				"<tr>"+
				   "<td valign='top' colspan='3'>&nbsp;&nbsp;&nbsp;<span class='ntitel'>Trefferliste:</span><br></td>"+
				"</tr>"+
				"<tr>"+
				   "<td valign='top' colspan='3'>&nbsp;</td>"+
				"</tr>"+
		 		"<tr>"+ 
		 	   "</table>";
		 	   
	textBrowserNav += "<table summary='Volltextsuche' border='0' cellpadding='0' cellspacing='0' width='372'>";
	
	if (suche) 
	{
		changeMousePointer("wait");
		textBrowserNav += "<tr><td width='8'>&nbsp;</td><td>Die Suche wird gestartet.<br>Dieser Vorgang kann einige Zeit dauern. Bitte warten...<br></td></tr>";
	}
	else textBrowserNav += "<td >&nbsp;<br></td>";
	
	textBrowserNav += "</tr></table>";
	browserLayer();	    			
}


//******************************************************************
//	function  anzeige2(result)
//******************************************************************
function anzeige2(result)
{
	result = result.substring(0,result.length-1)	
	arrayTitle = result.split("#")		
}


//******************************************************************
//	function  anzeige(result)
//******************************************************************
function anzeige(result)
{	
	result = result.substring(0,result.length-1)	
	
	if (result != "") linksArray = result.split(",");
	else linksArray = "";			
	
	TrefferAnzeige();
}


//******************************************************************
//	function  TrefferAnzeige()
//******************************************************************
function TrefferAnzeige()
{
	changeMousePointer("wait");
	textBrowserNav = "";
   							
	textBrowserNav += "<table summary='Volltextsuche-Trefferliste-Titel' border='0' cellpadding='0' cellspacing='0' width='372'>"+	   			
				"<tr>"+
				   "<td valign='top' colspan='3'>&nbsp;&nbsp;&nbsp;<span class='ntitel'>Trefferliste:</span><br></td>"+
				"</tr>"+			    		 
		 		"<tr>"+
				   "<td colspan='3'> &nbsp;<br></td>"+
	    			"</tr>"+
	    		   "</table>";	 
	    		   
	textBrowserNav += "<table summary='Volltextsuche-Trefferliste-Titel' border='0' cellpadding='0' cellspacing='0' width='372'>";	    		   
	
	// wenn Suche abgebrochen aber noch nicht gestartet, dann...
	if ((abbruch) && (leer))
	{
		textBrowserNav +=" <tr><td width='8'>&nbsp;</td><td colspan='2' align='left'>&nbsp;<br></td></tr></table>";						    									
		changeMousePointer("auto");
		abbruch = false;
	}
	// wenn die Suche abgebrochen wird, dann...
	else if (abbruch)
	{
		textBrowserNav +=" <tr><td width='8'>&nbsp;</td><td colspan='2' align='left'>Die Suche wurde abgebrochen. <br>Sie können die Suche erneut starten.<br></td></tr></table>";						    									
		changeMousePointer("auto");
		abbruch = false;
	}
	// wenn kein Suchbegriff eingegeben worden ist, dann ...
	else if (!suche)
	{		    	
		textBrowserNav +=" <tr><td width='8'>&nbsp;</td><td colspan='2' align='left'>Bitte geben Sie einen Suchbegriff ein.<br></td></tr></table>";						    									
		changeMousePointer("auto");
	}
	
	// wenn kein Treffer gefunden worden ist, dann ...
  	else if (linksArray.length == 0)
	{		    	
		textBrowserNav +=" <tr><td width='8'>&nbsp;</td><td colspan='2' align='left'>Ihre Suchanfrage ergab keinen  Treffer im Kurstext.</td></tr></table>";						    					
		changeMousePointer("auto");
	}
	
	// wenn Trefferanzahl zu hoch ist, dann ...
	else if (linksArray.length > 40)
	{		    	
		textBrowserNav +=" <tr><td width='8'>&nbsp;</td><td colspan='2' align='left'>Ihre Suchanfrage ergab zu viele Treffer.<br>Bitte schr&auml;nken Sie Ihre Suchanfrage ein.<br></td></tr></table>";						    					
		changeMousePointer("auto");
	}
	
	// wenn Treffer gefunden worden sind, dann ...
	else
	{				
		treffer = linksArray.length;				
		minimum = Math.min(treffer,blaetern+10);
		
		textBrowserNav += "<tr><td colspan='3' align='left'>&nbsp;Der Suchbegriff wurde im Kurstext <span class='ntitel'>" + treffer  + "</span> mal gefunden.<br></td></tr>";
		textBrowserNav += "<tr><td colspan='3'><span class='ntitel'><br>&nbsp;Treffer "+ (blaetern+1)  +" bis " + minimum + "</span><br><br></td></tr>";		
		
		// Trefferliste
		for (var i = blaetern; i < minimum; i++)
		{			
			var seite = "'" + linksArray[i] + "'";			
			textBrowserNav +="<tr><td colspan='3'>&nbsp;&nbsp;<a href='javascript:loadResult("+i+")' class='lziel'>" + arrayTitle[i] +"</a></td></tr>";						
		} 
		
		// auffüllen der Trefferliste mit Leerzeilen
		for (var i = minimum; i < blaetern+10; i++)
		{						
			textBrowserNav +="<tr><td colspan='3'>&nbsp;&nbsp;</td></tr>";
		}
				
		textBrowserNav += "<tr>";		

		// Navigation			
		if (blaetern > 0)
		{
			// Zurück-Button
			textBrowserNav +="<td align='left' width=30%><br><a href='javascript:blaeternHinten();TrefferAnzeige()' class='lziel'>&lt;&lt; Zur&uuml;ck</a></td>";										
		}
		else 
		{
			textBrowserNav +="<td align='right' width=30% ><br>&nbsp;</td>";
		}
		
					
		if(treffer>10)
		{
			numberNav();
		}				
		else 
		{
			textBrowserNav +="<td align='right' width=30% ><br>&nbsp;</td>";
		}
											
		if (minimum != treffer)
		{
			// Vor-Button			
			textBrowserNav +="<td align='right' width=30% ><br><a href='javascript:blaeternVorn();TrefferAnzeige()' class='lziel'>Weiter &gt;&gt;</a></td>";			
		}
		else 
		{
			textBrowserNav +="<td align='right' width=30% ><br>&nbsp;</td>";
		}
		
		textBrowserNav += "</tr></table>";
		changeMousePointer("auto");
	}	
	
	leer = true;
	browserLayer();	
}


//******************************************************************
//	function  numberNav()
//******************************************************************
function  numberNav()
{
	var erg = Math.ceil(treffer/10);	
	textBrowserNav +="<td align='center' width=30%><br>";
	
	for(var i=1; i<= erg; i++)
	{
		if(blaetern==eval(i-1)*10)
		{				
			textBrowserNav +="<a href='javascript:blaeternXmal("+i+");TrefferAnzeige()'><span class='atitel'>"+i+"</span></a> &nbsp;&nbsp;";												
		}
		else
		{				
			textBrowserNav +="<a href='javascript:blaeternXmal("+i+");TrefferAnzeige()'><span class='ntitel'>"+i+"</span></a>&nbsp;&nbsp;";													
		}				
	}

	textBrowserNav +="</td>";
}


//******************************************************************
//	function  loadResult()
//******************************************************************
function loadResult(seite)
{	
	var body = linksArray[seite];	
	var posCut = body.indexOf("Mod");
	body = body.substring(posCut-1,body.length);	
	opener.parent.parent.frames[2].document.location = "."+body;	
}


//******************************************************************
//	function  blaeternVorn() 
//******************************************************************
function blaeternVorn()
{ 	
 	blaetern += 10;	
}


//******************************************************************
//	function  blaeternHinten()
//******************************************************************
function blaeternHinten()
{
 	blaetern -= 10;
}


//******************************************************************
//	function  blaeternXmal() 
//******************************************************************
function blaeternXmal(a)
{ 	
 	blaetern = a*10-10;
}


//******************************************************************
//	function  browserLayer()
//******************************************************************
function browserLayer()
{			
	if (document.all)
      	{
		document.all("suchErgebnis").style.pixelTop = 100 ;
	      	document.all("suchErgebnis").style.pixelLeft = 15 ;
	      	document.all("suchErgebnis").style.pixelWidth =375 ;
	      	document.all("suchErgebnis").innerHTML = textBrowserNav;
      	}
       	else if (document.getElementById)
       	{
		document.getElementById("suchErgebnis").style.top = 104;
	       	document.getElementById("suchErgebnis").style.left = 15 ;
		document.getElementById("suchErgebnis").style.width = 425;       	
		document.getElementById("suchErgebnis").innerHTML = textBrowserNav;				
       	}
       	else if (document.layers)
       	{
       		document.layers["suchErgebnis"].top = 130;
       		document.layers["suchErgebnis"].left = 30;
       		document.layers["suchErgebnis"].width = 100;
       		
   		with (document.layers["suchErgebnis"].document)
		{
   			open();
   			clear();
   			write(textBrowserNav);
   		        close();
		}
    	}
}


//******************************************************************
//	function  changeMousePointer()
//******************************************************************
function changeMousePointer(zeiger)
{	
	if (document.all)
	{		
		document.all("suchenl").style.cursor = zeiger;					
	}
	else if (document.getElementById)
	{
	   	document.getElementById("suchenl").style.cursor = zeiger;
	}
	else if (document.layers)
	{
	 	// keine Ahnung wie das funktioniert!?! 	
    	}
}


//******************************************************************
//	function  nothing()
//*******************************************************************
function nothing()
{	
}