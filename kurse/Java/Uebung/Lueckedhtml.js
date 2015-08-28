//***************************************
// Inhalt des Layers "tabelleInputLayer"
//***************************************
function showInput()
{		
	text = "";
	text += "<form name='Wahlliste'>";
	text += setAufgabenstellung();
		
	lText = frage[0];
	i = 0;		
	text += "<table summary='Aufgaben' width='680' cellpadding='1' cellspacing='0' border='0'>";
	text += "	<tr>";
	text += "		<td colspan='3'><img src='../Medien/Spacer.gif' height='3' alt=''></td>";
	text += "	</tr>";
	text += "	<tr>";
	text += "		<td class='tdwahl' width='24'>&nbsp;</td>";
	
	if (eval("LueckeElement" + (i+1) + ".ausrichtung") == 'left') text = text + "<td class='tdwahl' align='left'><br>";
	else if (eval("LueckeElement" + (i+1) + ".ausrichtung") == 'center') text = text + "<td class='tdwahl' align='center'><br>";
	else if (eval("LueckeElement" + (i+1) + ".ausrichtung") == 'right') text = text + "<td class='tdwahl' align='right'><br>";
	
	while (lText.indexOf('<>') > 0)
	{
		position = lText.indexOf('<>');			
		text = text + 		lText.substring(0,position);		
				
		if (eval("LueckeElement" + (i+1) + ".font") == 'norm') 		
		{
			font = 'inputNormalGrau'; 
			fontN4 = 'inputNormalN4'; 
		}
		else if (eval("LueckeElement" + (i+1) + ".font") == 'code') 	
		{
			font = 'inputCodeGrau';
			fontN4 = 'inputCodeN4'; 
		}

		if (IE5 || IE6) text = text + 		"&nbsp;<input type='text' name='Feld" + (i+1) + "' size='" + eval("LueckeElement" + (i+1) + ".sizeIE") + "' class='" + font + "' onKeyUp='saveLuecke()'>";		
		else if (N4) text = text + 	"&nbsp;<input type='text' name='Feld" + (i+1) + "' size='" + eval("LueckeElement" + (i+1) + ".sizeN4") + "' class='" + fontN4 + "' onKeyUp='saveLuecke()'>";		
		else if (N6) text = text + 	"&nbsp;<input type='text' name='Feld" + (i+1) + "' size='" + eval("LueckeElement" + (i+1) + ".sizeN6") + "' class='" + font + "' onKeyUp='saveLuecke()'>";		
		else text = text + 		"&nbsp;<input type='text' name='Feld" + (i+1) + "' size='" + eval("LueckeElement" + (i+1) + ".sizeIE") + "' class='" + font + "' onKeyUp='saveLuecke()'>";		
		
		lText = lText.substring(position+2,lText.length);
		i++;		
	}
	
	text = text + 			lText + "<br><br>";
	text = text + "		</td>";
	text = text + "		<td class='tdwahl' width='24'>&nbsp;&nbsp;</td>";
	text = text + "	</tr>";
  	text = text + "	<tr>";
    	text = text + "		<td colspan='3'><img src='../Medien/Spacer.gif' height='3' alt=''></td>";
  	text = text + "	</tr>";    		
	text = text + "</table>";
	
	text += setLeiste();		
	text += setHilfe();
	text += setHinweis();
	text += setPunkte();
	text += "</form>";
			
	if (document.all)
	{			
		document.all("LernerInput").innerHTML = text;
	}
	else if (document.getElementById)
	{
		document.getElementById("LernerInput").innerHTML = text;
	}		
	else if (document.layers)
	{			
		with (document.layers["LernerInput"].document)		
		{
			open();
			clear();			
			write(text)
			close();
		}
	}
}


//****************************************
// Inhalt des Layers "tabelleOutputLayer"
//****************************************
function showOutput()
{	
	text = "";
	text += "<form name='Wahlliste'>";
	text += setAuswertung();
	text += setAufgabenstellung();
		
	lText = frage[0];
	i = 0;	
	text = text + "<form name='Wahlliste'>";
	text = text + "<table summary='Aufgaben' width='680' cellpadding='1' cellspacing='0' border='0'>";
	text = text + "	<tr>";
	text = text + "		<td colspan='3'><img src='../Medien/Spacer.gif' height='3' alt=''></td>";
	text = text + "	</tr>";
	text = text + "	<tr>";
	text = text + "		<td class='tdwahl' width='24'>&nbsp;</td>";
	
	if (eval("LueckeElement" + (i+1) + ".ausrichtung") == 'left') text = text + "<td class='tdwahl' align='left'><br>";
	else if (eval("LueckeElement" + (i+1) + ".ausrichtung") == 'center') text = text + "<td class='tdwahl' align='center'><br>";
	else if (eval("LueckeElement" + (i+1) + ".ausrichtung") == 'right') text = text + "<td class='tdwahl' align='right'><br>";
	
	while (lText.indexOf('<>') > 0)
	{
		position = lText.indexOf('<>');		
		text = text + 		lText.substring(0,position);
		
		if (eval("LueckeElement" + (i+1) + ".font") == 'norm') 		
		{
			font = 'inputNormalGrau'; 
			fontN4 = 'inputNormalN4'; 
		}
		else if (eval("LueckeElement" + (i+1) + ".font") == 'code') 	
		{
			font = 'inputCodeGrau';				
			fontN4 = 'inputCodeN4'; 
		}

		if (IE5 || IE6) text = text + 		"&nbsp;<input type='text' name='Feld" + (i+1) + "' size='" + eval("LueckeElement" + (i+1) + ".sizeIE") + "' class='" + font + "' readonly value=''>";		
		else if (N4) text = text + 	"&nbsp;<input type='text' name='Feld" + (i+1) + "' size='" + eval("LueckeElement" + (i+1) + ".sizeN4") + "' class='" + fontN4 + "' readonly value=''>";		
		else if (N6) text = text + 	"&nbsp;<input type='text' name='Feld" + (i+1) + "' size='" + eval("LueckeElement" + (i+1) + ".sizeN6") + "' class='" + font + "' readonly value=''>";		
		else text = text + 		"&nbsp;<input type='text' name='Feld" + (i+1) + "' size='" + eval("LueckeElement" + (i+1) + ".sizeIE") + "' class='" + font + "' readonly value=''>";				
		
		lText = lText.substring(position+2,lText.length);
		i++;		
	}
	
	text = text + 			lText + "<br><br>";
	text = text + "		</td>";
	text = text + "		<td class='tdwahl' width='24'>&nbsp;&nbsp;</td>";
	text = text + "	</tr>";
  	text = text + "	<tr>";
    	text = text + "		<td colspan='3'><img src='../Medien/Spacer.gif' height='3' alt=''></td>";
  	text = text + "	</tr>";    		
	text = text + "</table>";		
		
	text += setHilfe();	
	text += "</form>";
	
	if (document.all)
	{		
		document.all("LernerInput").innerHTML = text;		
	}
	else if (document.getElementById)
	{		
		document.getElementById("LernerInput").innerHTML = text;		
	}
	else if (document.layers)
	{
		with (document.layers["LernerInput"].document)
		{
			open();
			clear();			
			write(text)
			close();
		}
	}
	
	for (var j = 0; j < i; j++)
	{				
		if ((document.all) || (document.getElementById))
		{
			document.forms[0].elements[j].value = unescape(eval("LueckeElement" + (j+1) + ".muster"));
		}
		else if (document.layers)
		{
			document.layers["LernerInput"].document.Wahlliste.elements[j].value = unescape(eval("LueckeElement" + (j+1) + ".muster"));
		}						
	}	
}


//**************************************
// Inhalt des Layers "tabelleUserLayer"
//**************************************
function showUser()
{
	text = "";
	text += "<form name='Wahlliste'>";
	text += setAuswertung();
	text += setAufgabenstellung();
		
	lText = frage[0];
	i = 0;
	text = text + "<form name='Wahlliste'>";
	text = text + "<table summary='Aufgaben' width='680' cellpadding='1' cellspacing='0' border='0'>";
	text = text + "	<tr>";
	text = text + "		<td colspan='3'><img src='../Medien/Spacer.gif' height='3' alt=''></td>";
	text = text + "	</tr>";
	text = text + "	<tr>";
	text = text + "		<td class='tdwahl' width='24'>&nbsp;</td>";
	
	if (eval("LueckeElement" + (i+1) + ".ausrichtung") == 'left') text = text + "<td class='tdwahl' align='left'><br>";
	else if (eval("LueckeElement" + (i+1) + ".ausrichtung") == 'center') text = text + "<td class='tdwahl' align='center'><br>";
	else if (eval("LueckeElement" + (i+1) + ".ausrichtung") == 'right') text = text + "<td class='tdwahl' align='right'><br>";
	
	while (lText.indexOf('<>') > 0)
	{
		position = lText.indexOf('<>');		
		text = text + 		lText.substring(0,position);		
		
		if (eval("LueckeElement" + (i+1) + ".font") == 'norm') 
		{
			if (eval("parent.parent.frames[0].document.kurs.auswertung" + i + ".value == 1")) font = 'inputNormalGruen'; 			
			else font = 'inputNormalRot'; 	

			fontN4 = 'inputNormalN4';

		}
		else if (eval("LueckeElement" + (i+1) + ".font") == 'code') 
		{
			if (eval("parent.parent.frames[0].document.kurs.auswertung" + i + ".value == 1")) font = 'inputCodeGruen'; 			
			else font = 'inputCodeRot';

			fontN4 = 'inputCodeN4';
		}						

		if (IE5 || IE6) text = text + 		"&nbsp;<input class='" + font + "' type='text' name='Feld" + (i+1) + "' size='" + eval("LueckeElement" + (i+1) + ".sizeIE") + "' readonly value=''>";		
		else if (N4) text = text + 	"&nbsp;<input class='" + fontN4 + "' type='text' name='Feld" + (i+1) + "' size='" + eval("LueckeElement" + (i+1) + ".sizeN4") + "' readonly value=''>";		
		else if (N6) text = text + 	"&nbsp;<input class='" + font + "' type='text' name='Feld" + (i+1) + "' size='" + eval("LueckeElement" + (i+1) + ".sizeN6") + "' readonly value=''>";		
		else text = text + 		"&nbsp;<input class='" + font + "' type='text' name='Feld" + (i+1) + "' size='" + eval("LueckeElement" + (i+1) + ".sizeIE") + "' readonly value=''>";										
		
		lText = lText.substring(position+2,lText.length);
		i++;		
	}
	
	text = text + 			lText + "<br><br>";
	text = text + "		</td>";
	text = text + "		<td class='tdwahl' width='24'>&nbsp;&nbsp;</td>";
	text = text + "	</tr>";
  	text = text + "	<tr>";
    	text = text + "		<td colspan='3'><img src='../Medien/Spacer.gif' height='3' alt=''></td>";
  	text = text + "	</tr>";    		
	text = text + "</table>";				
		
	text += setLeiste(true);		
	text += setHilfe();
	text += setHinweis();
	text += setPunkte();
	text += "</form>";
	
	if (document.all)
	{				
		document.all("LernerInput").innerHTML = text;
	}
	else if (document.getElementById)
	{
		document.getElementById("LernerInput").innerHTML = text;
	}
	else if (document.layers)
	{
		with (document.layers["LernerInput"].document)
		{
			open();
			clear();			
			write(text);
			close();
		}
	}
	
	for (var j = 0; j < i; j++)
	{				
		if ((document.all) || (document.getElementById))
		{							
			document.forms[0].elements[j].value = unescape(eval("parent.parent.frames[0].document.kurs.ergebnis" + j + ".value"));
		}
		else if (document.layers)
		{
			document.layers["LernerInput"].document.Wahlliste.elements[j].value = unescape(eval("parent.parent.frames[0].document.kurs.ergebnis" + j + ".value"));
		}						
	}	
}
