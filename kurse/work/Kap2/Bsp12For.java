class Bsp12For {
	
	public static void main (String args[]) { 
		
		// ----------------------------------------------------
		
		System.out.println ("for-Schleife:");
		
		int		k;
		
		//
		// In der for-Anweisung wird zunächst k auf den
		// Wert 1 gesetzt. Falls die Bedingung k<=10
		// dann erfüllt ist, werden die Anweisungen im
		// Rumpf der Schleife ausgeführt.
		//
		for (k=1; k<=10; k ++) {
			
			System.out.println (k);	
			
			//
			// Am Ende des Schleifenrumpfes wird die
			// Inkrement-Anweisung "k ++" aus der
			// for-Anweisung ausgeführt um bei Testen
			// der Bedinugung weitergemacht (s.o.)
		}
	} 
}
