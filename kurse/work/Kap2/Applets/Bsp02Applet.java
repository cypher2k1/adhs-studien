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
public class Bsp02Applet
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
			output.append ("Mehr zu elementaren Datentypen:\n");

			//
			// Hier werden noch mehr Variablen deklariert, mit
			// elementaren Datentypen
			//
			boolean		x1 = false;
			byte		x2 = 123;
			short		x3 = 20000;
			double		x4 = 0.5;

			//
			// Hier wird der Umgang mit Variablen vom Typ boolean
			// gezeigt.
			//
			output.append ("x1 ist: " + x1 + "\n"); 
			output.append ("x1 ist nicht: " + !x1 + "\n"); 
			output.append ("x1 oder nicht x1 ist: " + (x1 || !x1) + "\n"); 
			output.append ("\n");		
		}
	}
}