//***************************************
// Inhalt des Layers "tabelleInputLayer"
//***************************************
function showInput()
{
	text = "";
	text += "<form name='Wahlliste'>";
	text += setAufgabenstellung();
		
	text = text + '<table summary="Aufgaben" width="680" cellpadding="1" cellspacing="0" border="0">';
	text = text + '	<tr>';
	text = text + '		<td colspan="3"><img src="../Medien/Spacer.gif" height="3" alt=""></td>';
	text = text + '	</tr>';
	text = text + '	<tr>';
	text = text + '		<td class="tdwahl" width="10">&nbsp;</td>';
	
	if (position == "oben")
	{
	   if (IE5 || IE6)      text = text + ' <td class="tdwahl" align="center">' + frage[0] + '<br><textarea name="Feld" class="textarea" rows="' + TextareaElement1.rowIE + '" cols="' + TextareaElement1.colIE + '" onKeyUp="saveLuecke()"></textarea></td>';
   	   else if(N4)  text = text + ' <td class="tdwahl" align="center">' + frage[0] + '<br><textarea name="Feld" class="N4" rows="' + TextareaElement1.rowN4 + '" cols="' + TextareaElement1.colN4 + '" onKeyUp="saveLuecke()"></textarea></td>';
   	   else if(N6)  text = text + '	<td class="tdwahl" align="center">' + frage[0] + '<br><textarea name="Feld" class="textarea" rows="' + TextareaElement1.rowN6 + '" cols="' + TextareaElement1.colN6 + '" onKeyUp="saveLuecke()"></textarea></td>';
	   else         text = text + '	<td class="tdwahl" align="center">' + frage[0] + '<br><textarea name="Feld" class="textarea" rows="' + TextareaElement1.rowIE + '" cols="' + TextareaElement1.colIE + '" onKeyUp="saveLuecke()"></textarea></td>';
	}
	else if (position == "neben")
	{
	   if (IE5 || IE6)      text = text + ' <td class="tdwahl" align="center">' + frage[0] + '<textarea name="Feld" class="textarea" rows="' + TextareaElement1.rowIE + '" cols="' + TextareaElement1.colIE + '" onKeyUp="saveLuecke()"></textarea></td>';
      	   else if(N4)  text = text + ' <td class="tdwahl" align="center">' + frage[0] + '<textarea name="Feld" class="N4" rows="' + TextareaElement1.rowN4 + '" cols="' + TextareaElement1.colN4 + '" onKeyUp="saveLuecke()"></textarea></td>';
      	   else if(N6)  text = text + '	<td class="tdwahl" align="center">' + frage[0] + '<textarea name="Feld" class="textarea" rows="' + TextareaElement1.rowN6 + '" cols="' + TextareaElement1.colN6 + '" onKeyUp="saveLuecke()"></textarea></td>';
	   else         text = text + '	<td class="tdwahl" align="center">' + frage[0] + '<textarea name="Feld" class="textarea" rows="' + TextareaElement1.rowIE + '" cols="' + TextareaElement1.colIE + '" onKeyUp="saveLuecke()"></textarea></td>';
	}
	
	text = text + '		<td class="tdwahl" width="10">&nbsp;</td>';
	text = text + '	</tr>';
	text = text + '	<tr>';
	text = text + '		<td class="tdwahl" width="10" colspan="3">&nbsp;</td>';
	text = text + '	</tr>';
  	text = text + '	<tr>';
    	text = text + '		<td colspan="3"><img src="../Medien/Spacer.gif" height="3" alt=""></td>';
  	text = text + '	</tr>';    		
	text = text + '</table>';
	
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
	text = text + '<table summary="Aufgaben" width="680" cellpadding="1" cellspacing="0" border="0">';
	text = text + '	<tr>';
	text = text + '		<td colspan="3"><img src="../Medien/Spacer.gif" height="3" alt=""></td>';
	text = text + '	</tr>';
	text = text + '	<tr>';
	text = text + '		<td class="tdwahl" width="10">&nbsp;</td>';	
	
	if (position == "oben")
	{
	   if (IE5 || IE6)      text = text + ' <td class="tdwahl" align="center">' + frage[0] + '<br><textarea name="Feld" readonly class="textarea" rows="' + TextareaElement1.rowIE + '" cols="' + TextareaElement1.colIE + '"></textarea></td>';
	   else if(N4)  text = text + ' <td class="tdwahl" align="center">' + frage[0] + '<br><textarea name="Feld" readonly class="N4" rows="' + TextareaElement1.rowN4 + '" cols="' + TextareaElement1.colN4 + '"></textarea></td>';
	   else if(N6)  text = text + '	<td class="tdwahl" align="center">' + frage[0] + '<br><textarea name="Feld" readonly class="textarea" rows="' + TextareaElement1.rowN6 + '" cols="' + TextareaElement1.colN6 + '"></textarea></td>';
	   else         text = text + '	<td class="tdwahl" align="center">' + frage[0] + '<br><textarea name="Feld" readonly class="textarea" rows="' + TextareaElement1.rowIE + '" cols="' + TextareaElement1.colIE + '"></textarea></td>';
	}
	else if (position == "neben")
	{
	   if (IE5 || IE6)      text = text + ' <td class="tdwahl" align="center">' + frage[0] + '<textarea name="Feld" readonly class="textarea" rows="' + TextareaElement1.rowIE + '" cols="' + TextareaElement1.colIE + '"></textarea></td>';
	   else if(N4)  text = text + ' <td class="tdwahl" align="center">' + frage[0] + '<textarea name="Feld" readonly class="N4" rows="' + TextareaElement1.rowN4 + '" cols="' + TextareaElement1.colN4 + '"></textarea></td>';
	   else if(N6)  text = text + '	<td class="tdwahl" align="center">' + frage[0] + '<textarea name="Feld" readonly class="textarea" rows="' + TextareaElement1.rowN6 + '" cols="' + TextareaElement1.colN6 + '"></textarea></td>';
	   else         text = text + '	<td class="tdwahl" align="center">' + frage[0] + '<textarea name="Feld" readonly class="textarea" rows="' + TextareaElement1.rowIE + '" cols="' + TextareaElement1.colIE + '"></textarea></td>';	
	}
		
	text = text + '		</td>';
	text = text + '		<td class="tdwahl" width="10">&nbsp;</td>';
	text = text + '	</tr>';
	text = text + '	<tr>';
	text = text + '		<td class="tdwahl" width="10" colspan="3">&nbsp;</td>';
	text = text + '	</tr>';
  	text = text + '	<tr>';
    	text = text + '		<td colspan="3"><img src="../Medien/Spacer.gif" height="3" alt=""></td>';
  	text = text + '	</tr>';    		
	text = text + '</table>';	
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
		
	if ((document.all) || (document.getElementById))
	{
		document.forms[0].elements[0].value = unescape(eval("TextareaElement1.muster"));
	}
	else if (document.layers)
	{
		document.layers["LernerInput"].document.Wahlliste.elements[0].value = unescape(eval("TextareaElement1.muster"));
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
	
	text = text + '<form name="Wahlliste">';
	text = text + '<table summary="Aufgaben" width="680" cellpadding="1" cellspacing="0" border="0">';
	text = text + '	<tr>';
	text = text + '		<td colspan="3"><img src="../Medien/Spacer.gif" height="3" alt=""></td>';
	text = text + '	</tr>';
	text = text + '	<tr>';
	text = text + '		<td class="tdwahl" width="10">&nbsp;</td>';
	
	if (position == "oben")
	{				
		if (eval("parent.parent.frames[0].document.kurs.auswertung0.value == 1"))
		{
		   if (IE5 || IE6)      text = text + ' <td class="tdwahl" align="center">' + frage[0] + '<br><textarea name="Feld" readonly class="textareajac" rows="' + TextareaElement1.rowIE + '" cols="' + TextareaElement1.colIE + '">' + unescape(parent.parent.frames[0].document.kurs.ergebnis0.value) + '</textarea></td>';
		   else if(N4)  text = text + ' <td class="tdwahl" align="center">' + frage[0] + '<br><textarea name="Feld" readonly class="N4" rows="' + TextareaElement1.rowN4 + '" cols="' + TextareaElement1.colN4 + '">' + unescape(parent.parent.frames[0].document.kurs.ergebnis0.value) + '</textarea></td>';
		   else if(N6)  text = text + '	<td class="tdwahl" align="center">' + frage[0] + '<br><textarea name="Feld" readonly class="textareajac" rows="' + TextareaElement1.rowN6 + '" cols="' + TextareaElement1.colN6 + '">' + unescape(parent.parent.frames[0].document.kurs.ergebnis0.value) + '</textarea></td>';
		   else         text = text + '	<td class="tdwahl" align="center">' + frage[0] + '<br><textarea name="Feld" readonly class="textareajac" rows="' + TextareaElement1.rowIE + '" cols="' + TextareaElement1.colIE + '">' + unescape(parent.parent.frames[0].document.kurs.ergebnis0.value) + '</textarea></td>';
		}
		else 
		{			
		   if (IE5 || IE6)      text = text + ' <td class="tdwahl" align="center">' + frage[0] + '<br><textarea name="Feld" readonly class="textareaneinc" rows="' + TextareaElement1.rowIE + '" cols="' + TextareaElement1.colIE + '">' + unescape(parent.parent.frames[0].document.kurs.ergebnis0.value) + '</textarea></td>';
   		   else if(N4)  text = text + ' <td class="tdwahl" align="center">' + frage[0] + '<br><textarea name="Feld" readonly class="N4" rows="' + TextareaElement1.rowN4 + '" cols="' + TextareaElement1.colN4 + '">' + unescape(parent.parent.frames[0].document.kurs.ergebnis0.value) + '</textarea></td>';
   		   else if(N6)  text = text + '	<td class="tdwahl" align="center">' + frage[0] + '<br><textarea name="Feld" readonly class="textareaneinc" rows="' + TextareaElement1.rowN6 + '" cols="' + TextareaElement1.colN6 + '">' + unescape(parent.parent.frames[0].document.kurs.ergebnis0.value) + '</textarea></td>';
		   else         text = text + '	<td class="tdwahl" align="center">' + frage[0] + '<br><textarea name="Feld" readonly class="textareaneinc" rows="' + TextareaElement1.rowIE + '" cols="' + TextareaElement1.colIE + '">' + unescape(parent.parent.frames[0].document.kurs.ergebnis0.value) + '</textarea></td>';
		}
	}
	else if (position == "neben")
	{
		if (eval("parent.parent.frames[0].document.kurs.auswertung0.value == 1"))
		{
		   if (IE5 || IE6)      text = text + ' <td class="tdwahl" align="center">' + frage[0] + '<textarea name="Feld" readonly id="lueckejac" rows="' + TextareaElement1.rowIE + '" cols="' + TextareaElement1.colIE + '">' + unescape(parent.parent.frames[0].document.kurs.ergebnis0.value) + '</textarea></td>';
		   else if(N4)  text = text + ' <td class="tdwahl" align="center">' + frage[0] + '<textarea name="Feld" readonly id="lueckejac" rows="' + TextareaElement1.rowN4 + '" cols="' + TextareaElement1.colN4 + '">' + unescape(parent.parent.frames[0].document.kurs.ergebnis0.value) + '</textarea></td>';
		   else if(N6)  text = text + '	<td class="tdwahl" align="center">' + frage[0] + '<textarea name="Feld" readonly id="lueckejac" rows="' + TextareaElement1.rowN6 + '" cols="' + TextareaElement1.colN6 + '">' + unescape(parent.parent.frames[0].document.kurs.ergebnis0.value) + '</textarea></td>';
		   else         text = text + '	<td class="tdwahl" align="center">' + frage[0] + '<textarea name="Feld" readonly id="lueckejac" rows="' + TextareaElement1.rowIE + '" cols="' + TextareaElement1.colIE + '">' + unescape(parent.parent.frames[0].document.kurs.ergebnis0.value) + '</textarea></td>';	
		}
		else
		{
		   if (IE5 || IE6)      text = text + ' <td class="tdwahl" align="center">' + frage[0] + '<textarea name="Feld" readonly id="lueckeneinc" rows="' + TextareaElement1.rowIE + '" cols="' + TextareaElement1.colIE + '">' + unescape(parent.parent.frames[0].document.kurs.ergebnis0.value) + '</textarea></td>';
   		   else if(N4)  text = text + ' <td class="tdwahl" align="center">' + frage[0] + '<textarea name="Feld" readonly id="lueckeneinc" rows="' + TextareaElement1.rowN4 + '" cols="' + TextareaElement1.colN4 + '">' + unescape(parent.parent.frames[0].document.kurs.ergebnis0.value) + '</textarea></td>';
   		   else if(N6)  text = text + '	<td class="tdwahl" align="center">' + frage[0] + '<textarea name="Feld" readonly id="lueckeneinc" rows="' + TextareaElement1.rowN6 + '" cols="' + TextareaElement1.colN6 + '">' + unescape(parent.parent.frames[0].document.kurs.ergebnis0.value) + '</textarea></td>';
		   else         text = text + '	<td class="tdwahl" align="center">' + frage[0] + '<textarea name="Feld" readonly id="lueckeneinc" rows="' + TextareaElement1.rowIE + '" cols="' + TextareaElement1.colIE + '">' + unescape(parent.parent.frames[0].document.kurs.ergebnis0.value) + '</textarea></td>';                                
		}
	}
		
	text = text + '		<td class="tdwahl" width="10">&nbsp;</td>';
	text = text + '	</tr>';
	text = text + '	<tr>';
	text = text + '		<td class="tdwahl" width="10" colspan="3">&nbsp;</td>';
	text = text + '	</tr>';
  	text = text + '	<tr>';
    	text = text + '		<td colspan="3"><img src="../Medien/Spacer.gif" height="3" alt=""></td>';
  	text = text + '	</tr>';    		
	text = text + '</table>';				
		
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
	
	if ((document.all) || (document.getElementById))
	{
		document.forms[0].elements[0].value = unescape(eval("parent.parent.frames[0].document.kurs.ergebnis0.value"));
	}
	else if (document.layers)
	{
		document.layers["LernerInput"].document.Wahlliste.elements[0].value = unescape(eval("parent.parent.frames[0].document.kurs.ergebnis0.value"));
	}	
}
