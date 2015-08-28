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
public class Bsp12Applet
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

			output.append ("case-Anweisung (ohne break):");
			output.append ("\n");


			int			a = 2;

			//
			// Da die Variable a zu diesem Zeitpunkt den Wert 2 hat,
			// wird der Zweig der sitch-Anweisung ausgeführt, der mit
			// dem case-Label 2 beginnt. Es wird jedoch immer nur dieser
			// eine Zweig ausgeführt.
			//
			switch (a) {

				case 1: 

					output.append ("a hat den Wert 1");
					output.append ("\n");

				case 2: 

					output.append ("a hat den Wert 2");
					output.append ("\n");

				case 3: 

					output.append ("a hat den Wert 3");
					output.append ("\n");

				default: 

					output.append ("a hat einen anderen Wert");
					output.append ("\n");
			}


			output.append ("\n\n");		
		}
	}
}