class Bsp05Rechnen {
	
	public static void main (String args[]) { 
		
		// ----------------------------------------------------

		System.out.println ("Rechnen mit Variablen:");
		
		int			a;
		int			b;
		int			c;
		int			durchschnitt;
		
		//
		// Den Variablen, die in den Zeilen hierdrüber deklariert
		// wurde, werden hier nun Werte zugewiesen. Diese Werte
		// ergeben sich entweder aus einfachen Konstanten oder
		// aus dem Ergebnis der Berechnung einer Formel.
		//
		a = 5;
		b = 23;
		c = 48;
		durchschnitt = (a + b + c) / 3;
		
		System.out.print ("Der Durchschnitt von "); 
		System.out.print (a + ", " + b + " und " + c + " ist "); 
		System.out.println (durchschnitt);

	} 
}
