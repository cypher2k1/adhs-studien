class Bsp07Arrays {
	
	public static void main (String args[]) { 
		
		
		// ----------------------------------------------------

		System.out.println ("Arbeiten mit Arrays:");
		
		//
		// In dem folgenden Array ist Platz für 6 Zahlen vom Typ
		// int.
		//
		int		lottozahlen [] = new int [6];
		
		
		//
		// Die einzelnen Werte werden von 0 bis 5 durchnumeriert
		// und hier mit einzelnen Werten belegt.
		//
		lottozahlen [0] = 45;
		lottozahlen [1] = 12;
		lottozahlen [2] = 7;
		lottozahlen [3] = 8;
		lottozahlen [4] = 23;
		lottozahlen [5] = 9;
	
		//
		// Mit dem Attribute "lenght" eines Attributes kann abgefragt
		// werden, wieviele Werte da jetzt drinstehen.
		//
		System.out.println ("Anzahl der Lottozahlen: " + lottozahlen.length); 
		System.out.println ("Erste Zahl ist: " + lottozahlen [0]);
		
		
		//
		// Eine andere Art Arrays zu erzeugen besteht darin, die Werte
		// in geschweiften Klammnern aufzuzählen.
		//
		String 	ampelphasen [] = {"rot", "gelb", "grün"};
		
		System.out.println ("Erste Ampelphase ist: " + ampelphasen [0]);


		//
		// Auch mehr-dimensionale Arrays sind möglich: zum Beispiel
		// ein Tic-Tac-Toe Feld aus 3x3 Zeichen.
		//
		char	tictactoe [][] = {{' ', ' ', ' '},
								  {' ', ' ', ' '},
								  {' ', ' ', ' '}};
								  
		
		//
		// Die einzelnen Felder können dann durch mehrmaliges "indizieren"
		// erreicht werden.
		//
		tictactoe [1] [1] = 'O';
		tictactoe [2] [0] = 'X';
		tictactoe [0] [2] = 'O';
		// ...
	}
}
