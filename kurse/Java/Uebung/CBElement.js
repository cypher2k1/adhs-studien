/***********************************************************************
* Das Objekt CBElement dient zur Erstellung einer Eingabezeile für eine
* Aufgabe vom Typ 'Checkbox'.
***********************************************************************/

function CBElement(nrzeigen,nummer,frage,text,antwort)
{	
    this.nrzeigen = nrzeigen;	
    this.nummer = nummer;
	this.frage = frage;
	this.text = text;
	this.antwort = antwort;
	this.input = input;
	
	setCBAnswer(antwort);
}


function input()
{	
	document.write('&nbsp;</td>');
	document.write('<td class="tdwahl" align="center">' + (this.nummer+1) + '.</td>');
	document.write('<td class="tdwahl" width="260">&nbsp;' + this.frage + '</td>');
	document.write('<td class="tdwahl" align="center"><input type="Checkbox" name="Band' + (this.nummer+1) + '" value="on"></td>');	       			       		
	document.write('<td class="tdwahl" align="center">&nbsp;</td>');
	document.write('<td class="tdwahl">&nbsp;');
}
