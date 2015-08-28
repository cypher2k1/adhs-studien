import	java.applet.*;

import	java.awt.*;
import	java.awt.event.*;

//
// In den folgenden 4 Zeilen wird eine Klasse "Haustier"
// definiert. Die Instanzen hier haben alle einen Namen als String
//
class Haustier {

	String		name;
}

//
// In den folgenden 4 Zeilen wird eine Klasse "Hund"
// definiert. Hunde haben hiernach eine Eigenschaft:
// einen Namen als String
//
class Hund extends Haustier {

	void		bellen (int i, TextArea output) {
	
		int		j;
		
		for (j=1; j<=i; j++) {
		
			output.append ("Wau, wau!");
			output.append ("\n");
		}
	}
}


class Katze extends Haustier {

}


//
// Die folgende Klasse ist ein Applet, d.h. sie
// erbt von java.awt.Applet. Außerdem reagiert
// sie aber auch auf Events, die von Buttons
// ausgelöst werden. Deshalb implemeniert sie
// das java.awt.event.ActionListener Interface
//
public class Bsp19Applet
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

			Hund		mein_hund = new Hund ();

			mein_hund.name = "Bello";

			Katze		meine_katze = new Katze ();

			meine_katze.name = "Churchill";



			output.append (mein_hund.name);
			output.append ("\n");
			mein_hund.bellen (2, output);
			output.append (meine_katze.name);
			output.append ("\n");
			output.append ("fertig.");
			output.append ("\n");
		}
	}
}