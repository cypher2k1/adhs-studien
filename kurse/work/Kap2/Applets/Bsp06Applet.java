import	java.applet.*;

import	java.awt.*;
import	java.awt.event.*;


//
// Die folgende Klasse ist ein Applet, d.h. sie
// erbt von java.awt.Applet. Außerdem reagiert
// sie aber auch auf Events, die von Buttons
// ausgelöst werden. Deshalb implemeniert sie
// das java.awt.event.ActionListener Interface
//
public class Bsp06Applet
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

		execute = new Button ("Ausführen");
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
		if (e.getActionCommand () == "Ausführen") {

			output.append ("\n");		
			output.append ("Explizites type-casting:\n");

			int			a;

			//
			// Wenn einer Fließkomma Zahl in einen Wert vom Typ int
			// gecastet wird, geht der Anteil hinter dem Komma verloren.
			// Es wird nicht gerunden.
			//
			a = (int) 2.7;
			output.append ("1. Zuweisung von 2.7 an int: " + a +"\n"); 

			a = (int) 2.3;
			output.append ("2. Zuweisung von 2.3 an int: " + a + "\n"); 

			//
			// Der Typ einer Fließkomma-Zahl ist per Default: double.
			// Beim Zuweisen an eine float Variable muß man entweder
			// eine kleines "f" hinter die Zahl schreiben, oder "float"
			// in Klammern davor.
			//
			float		f1 = 1.5f;
			float		f2 = (float) 1.6;
			output.append ("\n");		
		}
	}
}