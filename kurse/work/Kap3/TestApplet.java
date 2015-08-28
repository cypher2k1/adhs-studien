import	java.applet.*;
import	java.awt.*;
import	java.awt.event.*;

public class TestApplet	extends Applet implements ActionListener {

	String		farbe;
	Button		schwarz, weiss;

	public void		init () {

		farbe = getParameter ("farbe");

		schwarz = new Button ("Schwarz");
		weiss   = new Button ("Weiss");

		schwarz.addActionListener (this);
		weiss.addActionListener (this);

		add (schwarz);
		add (weiss);
	}

	public void		paint (Graphics g) {

		g.setColor (Color.decode (farbe));
		g.fillRect (0, 0, 200, 100);
	}

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