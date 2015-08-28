import	java.applet.*;
import	java.awt.*;
import	java.awt.event.*;

/**
 *  Hier wird mein Applet definiert
 */
public class TestApplet	extends Applet implements ActionListener {

	String		farbe;
	Button		schwarz, weiss;

	/**
	 *  Die init () Methode erzeugt die Oberfl�che mit zwei Buttons
	 */
	public void		init () {

		farbe = getParameter ("farbe");

		schwarz = new Button ("Schwarz");
		weiss   = new Button ("Weiss");

		schwarz.addActionListener (this);
		weiss.addActionListener (this);

		add (schwarz);
		add (weiss);
	}

	/**
	 *  Die paint () Methode f�llt den Hintergrund mit der aktuellen Farbe
	 */
	public void		paint (Graphics g) {

		g.setColor (Color.decode (farbe));
		g.fillRect (0, 0, 200, 100);
	}

	/**
	 *  Die actionPerformed () Methode wechselt die aktuelle Farbe
	 *  und l�sst das Applet neu zeichnen
	 */
	public void		actionPerformed (ActionEvent e) {

		if (e.getActionCommand () == "Schwarz") {

			farbe = "#000000";
			repaint ();
		}

		if (e.getActionCommand () == "Weiss") {

			farbe = "#FFFFFF";
			repaint ();
		}
	}
}