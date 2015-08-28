class Bsp09Case {
	
	public static void main (String args[]) { 
		
		// ----------------------------------------------------

		System.out.println ("case-Anweisung (mit break):");
		
		
		int			a = 2;

		//
		// Da die Variable a zu diesem Zeitpunkt den Wert 2 hat,
		// wird der Zweig der sitch-Anweisung ausgeführt, der mit
		// dem case-Label 2 beginnt. Es wird jedoch immer nur dieser
		// eine Zweig ausgeführt.
		//
		switch (a) {
			
			case 1: 

				System.out.println ("a hat den Wert 1");
				break;

			case 2: 

				System.out.println ("a hat den Wert 2");
				break;

			case 3: 

				System.out.println ("a hat den Wert 3");
				break;

			default: 

				System.out.println ("a hat einen anderen Wert");
				break;
		}


		// ----------------------------------------------------

		System.out.println ("case-Anweisung (ohne break!):");
		a = 2;
		
		//
		// In der folgenden switch-Anweisung fehlen die break-
		// Anweisungen. Dieses führt dazu, dass nicht nur ein
		// Zweig ausgeführt wird, sondern alle darunter liegenden
		// ebenfalls.
		//
		switch (a) {
			
			case 1: 

				System.out.println ("a hat den Wert 1");

			case 2: 

				System.out.println ("a hat den Wert 2");

			case 3: 

				System.out.println ("a hat den Wert 3");

			default: 

				System.out.println ("a hat einen anderen Wert");
		}
	}
}
