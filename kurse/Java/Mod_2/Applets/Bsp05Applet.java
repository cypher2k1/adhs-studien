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
public class Bsp05Applet
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
			output.append ("Rechnen mit Variablen:\n");

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

			output.append ("Der Durchschnitt von "); 
			output.append (a + ", " + b + " und " + c + "...\n ... ist "); 
			output.append (durchschnitt + "\n");
			output.append ("\n");		
		}
	}
}