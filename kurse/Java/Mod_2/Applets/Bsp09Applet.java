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
public class Bsp09Applet
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

			output.append ("if-Anweisung:\n");

			int		a = 1;
			
			//
			// Die drei Anweisungen innerhalb der
			// if-Anweisung werden ausgef�hrt, wenn
			// die Variable a gerade den Wert 1 hat.
			//
			
			if (a == 1) {
			
				output.append ("Mehere Anweisungen...");
				output.append ("\n");		

				output.append ("... werden in Klammern...");
				output.append ("\n");		

				output.append ("... eingeschlossen!");
				output.append ("\n");		
			}

			output.append ("\n\n");		
		}
	}
}