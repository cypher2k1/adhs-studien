import	java.applet.*;

import	java.awt.*;
import	java.awt.event.*;


//
// Die folgende Klasse ist ein Applet, d.h. sie
// erbt von java.awt.Applet. Au�erdem reagiert
// sie aber auch auf Events, die von Buttons
// ausgel�st werden. Deshalb implemeniert sie
// das java.awt.event.ActionListener Interface
//
public class Bsp07Applet
	extends Applet
	implements ActionListener {

	TextArea	output;
	Button		execute;

	public void		init () {
	
		//
		// ...
		//
		output  = new TextArea ();
		output.setEditable (false);

		execute = new Button ("Ausf�hren");
		execute.addActionListener (this);
		
		//
		//
		//
		GridBagLayout		thisLayout	= new GridBagLayout ();
		GridBagConstraints	c			= new GridBagConstraints ();
		
		c.gridy		 = 0;
		c.gridheight = 4;
		c.weighty	 = 1.0;
		c.weightx	 = 1.0;
		c.fill		 = GridBagConstraints.BOTH;
		thisLayout.setConstraints (output, c);
		
		c.gridy 	 = 5;
		c.gridheight = 1;
		c.weighty	 = 0.0;
		c.fill		 = GridBagConstraints.BOTH;
		thisLayout.setConstraints (execute, c);

		this.setLayout (thisLayout);
		this.add (output);
		this.add (execute);
	}
	
	
	public void		actionPerformed (ActionEvent e) {

		//
		// ...
		//
		if (e.getActionCommand () == "Ausf�hren") {

			output.append ("\n");		
			output.append ("Arbeiten mit Arrays:\n");

			//
			// In dem folgenden Array ist Platz f�r 6 Zahlen vom Typ
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
			output.append ("Anzahl der Lottozahlen: " + lottozahlen.length + "\n"); 
			output.append ("Erste Zahl ist: " + lottozahlen [0] + "\n");


			//
			// Eine andere Art Arrays zu erzeugen besteht darin, die Werte
			// in geschweiften Klammnern aufzuz�hlen.
			//
			String 	ampelphasen [] = {"rot", "gelb", "gr�n"};

			output.append ("Erste Ampelphase ist: " + ampelphasen [0] + "\n");


			//
			// Auch mehr-dimensionale Arrays sind m�glich: zum Beispiel
			// ein Tic-Tac-Toe Feld aus 3x3 Zeichen.
			//
			char	tictactoe [][] = {{' ', ' ', ' '},
									  {' ', ' ', ' '},
									  {' ', ' ', ' '}};


			//
			// Die einzelnen Felder k�nnen dann durch mehrmaliges "indizieren"
			// erreicht werden.
			//
			tictactoe [1] [1] = 'O';
			tictactoe [2] [0] = 'X';
			tictactoe [0] [2] = 'O';
			// ...


			output.append ("\n");		
		}
	}
}