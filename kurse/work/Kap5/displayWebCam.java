import java.awt.*;
import java.awt.event.*;
import java.awt.image.*;
import java.net.*;

public class displayWebCam extends Frame implements Runnable {

	static Image		bild;
	static String		bildURL;

	public static void main (String args []) {

		bildURL = args [0];
		new displayWebCam ();
	}


	logic 			l;
	Toolkit			toolkit;
	URL				url;
	MediaTracker	mt;
	Thread			thread;


	public displayWebCam () {
		super ("displayWebCam");

		l = new logic ();

		MenuBar		mBar	= new MenuBar ();
		Menu		mFile	= new Menu ("Datei");
		MenuItem	cmdQuit	= new MenuItem ("Beenden");

		mBar.add (mFile);
		mFile.add (cmdQuit);
		this.setMenuBar (mBar);

		cmdQuit.addActionListener (l);

		toolkit = Toolkit.getDefaultToolkit ();

		url = null;
		mt  = null;



		try {

			url  = new URL (bildURL);
			bild = toolkit.createImage (url);
			mt   =  new MediaTracker (this);

			mt.addImage (bild, 1);
			mt.waitForAll ();

			mt.removeImage (bild, 1);

		} catch (Exception e) {

		}


		//
		// Fenster in der entsprechenden Größe anzeigen
		//
		setTitle (bildURL);

		int		w = bild.getWidth (this);
		int		h = bild.getHeight (this);

		setSize (w, h);
		setVisible (true);



		thread = new Thread (this);
		thread.start ();

	}

	public void run () {

		while (true) {
			try { thread.sleep (80); } catch (InterruptedException e) {}

			try {

				bild = toolkit.createImage (url);
				mt   =  new MediaTracker (this);

				mt.addImage (bild, 1);
				mt.waitForAll ();
				mt.removeImage (bild, 1);

			} catch (Exception e) {

			}

			repaint ();
		}
	}

	public void		paint (Graphics g) {

		g.drawImage (bild, 4, 15, this);
	}
}


class logic implements ActionListener {

	public void actionPerformed (ActionEvent e) {

		String		cmd = e.getActionCommand ();

		if (cmd == "Beenden")
			System.exit (0);
	}
}
