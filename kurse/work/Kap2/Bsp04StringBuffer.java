class Bsp04StringBuffer {
	
	public static void main (String args[]) { 
		
		
		// ----------------------------------------------------

		System.out.println ("Arbeiten mit StringBuffern:");
		
		//
		// In der folgenden Zeile wird ein StringBuffer erzeugt,
		// der drei Zeichen lang ist, und in dem die drei Zeichen
		// d, e und f stehen.
		//
		StringBuffer	sb = new StringBuffer ("def");
		
		//
		// Jetzt werden diese drei Positionen mit neuen Zeichen belegt.
		//
		sb.setCharAt (0, 'a');
		sb.setCharAt (1, 'b');
		sb.setCharAt (2, 'c');
		
		//
		// Dann wird dass Ganze in einen "richtigen" String
		// konvertiert.
		//
		String			s4 = sb.toString ();
		
		System.out.println ("Zusammengebaut wurde: " + s4);
	}
}
