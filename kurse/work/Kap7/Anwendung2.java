import java.awt.*;
import java.awt.event.*;

import java.beans.*;

class Anwendung2 extends Frame {

	public Anwendung2 () {

		super ("Bindet die Bean2 ein");

		MenuBar		mBar	= new MenuBar ();
		Menu		mFile	= new Menu ("Datei");
		MenuItem	cmdQuit	= new MenuItem ("Beenden");

		logic2		l2 = new logic2 ();

		cmdQuit.addActionListener (l2);
		mBar.add (mFile);
		mFile.add (cmdQuit);
		this.setMenuBar (mBar);


		setLayout (new FlowLayout (FlowLayout.LEFT, 10, 10));


		IntegerTextField2	tf2 = new IntegerTextField2 ();

		tf2.setColumns (10);
		tf2.addPropertyChangeListener (l2);

		add (tf2);


		this.setSize (200, 100);
		this.setVisible (true);
	}


	public static void main (String args []) {

		new Anwendung2 ();
	}
}


class logic2 implements ActionListener, PropertyChangeListener {

	public void actionPerformed (ActionEvent e) {

		if (e.getActionCommand ().equals ("Beenden"))
			System.exit (0);
	}


	public void propertyChange (PropertyChangeEvent e) {

		if (e.getPropertyName ().equals ("Integer Value")) {

			Integer	d = (Integer) e.getNewValue ();

			System.out.print ("Neuer Wert: ");
			System.out.println (d);
		}
	}
}
