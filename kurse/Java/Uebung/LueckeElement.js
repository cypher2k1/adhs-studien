/****************************************************************** ********
* Das Objekt LueckeElement dient zur Erstellung einer Eingabezeile für eine
* Aufgabe vom Typ 'Lückentext'.
****************************************************************** ********/

/*
	font = {"norm"|"code"}		// norm = normaler Text; code = Quellcode
	ausrichtung = {"left"|"center"|"right"}
*/
	
function LueckeElement(nummer,muster,variante1,variante2,luecke,sizeIE,sizeN4,sizeN6,font,ausrichtung)
{	
	this.nummer = nummer;	
	this.muster = escape(muster);
	this.variante1 = escape(variante1);
	this.variante2 = escape(variante2);		
	this.luecke = luecke;	
	this.sizeIE = sizeIE;
	this.sizeN4 = sizeN4;
	this.sizeN6 = sizeN6;
	this.font = font;
	this.ausrichtung = ausrichtung;
	
	setAnswer(muster,variante1,variante2,luecke);	
}
