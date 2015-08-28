import	java.applet.*;
import	java.awt.*;
import	java.awt.event.*;

public class Formular4 extends Applet
						implements ActionListener {

	Button			b1;
	Button			b2;
	CardLayout		layout;
	Panel			karten;

	public void		init () {

		b1 = new Button ("<<");
		b2 = new Button (">>");

		b1.addActionListener (this);
		b2.addActionListener (this);

		Panel		navigation;

		navigation = new Panel ();
		navigation.add (b1);
		navigation.add (b2);


		Panel		karte1 = new Panel ();


		karte1.add (new Label ("__________ Karte 1: __________"));
		karte1.add (new Label ("Beispiel:"));
		karte1.add (new TextField (10));
		karte1.add (new Checkbox ("Rot"));
		karte1.add (new Checkbox ("Blau"));


		Panel		karte2 = new Panel ();

		karte2.add (new Label ("__________ Karte 2: __________"));
		karte2.add (new Label ("Wie finden Sie dies?"));

		CheckboxGroup group = new CheckboxGroup ();
		karte2.add (new Checkbox ("Gut", group, true));
		karte2.add (new Checkbox ("Nicht Gut", group, false));


		Panel		karte3 = new Panel ();

		karte3.add (new Label ("__________ Karte 3: __________"));
		karte3.add (new Label ("Wohin geht Ihr Urlaub?"));

		Choice		ziele = new Choice ();

		ziele.addItem ("Paris");
		ziele.addItem ("New York");
		ziele.addItem ("London");
		ziele.addItem ("Ich habe gar kein Urlaub");
		karte3.add (ziele);


		Panel		karte4 = new Panel ();

		karte4.add (new Label ("__________ Karte 4: __________"));
		karte4.add (new Label ("Schreiben Sie hier Ihren Roman:"));
		karte4.add (new TextArea (4, 20));


		Panel		karte5 = new Panel ();

		karte5.add (new Label ("__________ Karte 5: __________"));
		karte5.add (new Label ("Ich krieg' die Pizza mit:"));

		List l = new List (4, true);

		l.add ("Spinat");
		l.add ("Schinken");
		l.add ("Brokoli");
		l.add ("extra Käse");
		karte5.add (l);


		karten = new Panel ();
		layout = new CardLayout (10, 10);
		karten.setLayout (layout);

		karten.add ("1", karte1);
		karten.add ("2", karte2);
		karten.add ("3", karte3);
		karten.add ("4", karte4);
		karten.add ("5", karte5);


		setLayout (new BorderLayout ());
		add ("Center", karten);
		add ("South", navigation);
	}


	public void		actionPerformed (ActionEvent e) {

		if (e.getActionCommand () == "<<") {

			layout.previous (karten);
		}

		if (e.getActionCommand () == ">>") {

			layout.next (karten);
		}
	}
}
