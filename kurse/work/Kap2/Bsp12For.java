class Bsp12For {
	
	public static void main (String args[]) { 
		
		// ----------------------------------------------------
		
		System.out.println ("for-Schleife:");
		
		int		k;
		
		//
		// In der for-Anweisung wird zun�chst k auf den
		// Wert 1 gesetzt. Falls die Bedingung k<=10
		// dann erf�llt ist, werden die Anweisungen im
		// Rumpf der Schleife ausgef�hrt.
		//
		for (k=1; k<=10; k ++) {
			
			System.out.println (k);	
			
			//
			// Am Ende des Schleifenrumpfes wird die
			// Inkrement-Anweisung "k ++" aus der
			// for-Anweisung ausgef�hrt um bei Testen
			// der Bedinugung weitergemacht (s.o.)
		}
	} 
}
