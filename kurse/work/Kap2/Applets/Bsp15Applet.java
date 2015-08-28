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
public class Bsp15Applet
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

			output.append ("for-Schleife:");
			output.append ("\n");

			int		k;

			//
			// In der for-Anweisung wird zunächst k auf den
			// Wert 1 gesetzt. Falls die Bedingung k<=10
			// dann erfüllt ist, werden die Anweisungen im
			// Rumpf der Schleife ausgeführt.
			//
			for (k=1; k<=10; k ++) {

				output.append ("" + k);	
				output.append ("\n");

				//
				// Am Ende des Schleifenrumpfes wird die
				// Inkrement-Anweisung "k ++" aus der
				// for-Anweisung ausgeführt um bei Testen
				// der Bedinugung weitergemacht (s.o.)
			}

			output.append ("\n");
		}
	}
}