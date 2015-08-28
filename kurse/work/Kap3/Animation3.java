import	java.applet.*;
import	java.awt.*;

public class Animation3	extends Applet implements Runnable {

	Image			fisch1;
	Image			fisch2;
	int				x;
	int				y;
	int				richtung;

	MediaTracker	tracker;
	
	Dimension		size;
	Image			offscreenI;
	Graphics		offscreenG;
	
	public void		init () {

		fisch1 = getImage (getDocumentBase (), "fisch1.gif");
		fisch2 = getImage (getDocumentBase (), "fisch2.gif");

		tracker = new MediaTracker (this);
		tracker.addImage (fisch1, 1);
		tracker.addImage (fisch2, 2);
		
		x = 50;
		y = 22;
		
		richtung = -4;
		
		size = this.getSize ();
		offscreenI = this.createImage (size.width, size.height);
		offscreenG = offscreenI.getGraphics ();
	}
	
	public void		update (Graphics g) {paint (g);}
	
	public void		paint (Graphics g) {
		
		offscreenG.setColor (Color.decode ("#8888ff"));
		offscreenG.fillRect (0, 0, 500, 120);

		if (richtung < 0)
			offscreenG.drawImage (fisch1, x, y, this);

		if (richtung > 0)
			offscreenG.drawImage (fisch2, x, y, this);
		
		g.drawImage (offscreenI, 0, 0, this);
	}

	Thread		thread;
	
	public void		start () {

		thread = new Thread (this);
		thread.start ();
	}

	public void run () {
		try { tracker.waitForAll (); } catch (InterruptedException e) {}
		if (! tracker.isErrorAny ()) {
		
			while (true) {
				try { thread.sleep (80); } catch (InterruptedException e) {}

				x += richtung;
				if (richtung < 0)
					if (x < 10)
						richtung = -richtung;
				if (richtung > 0)
					if (x > 350)
						richtung = -richtung;

				if (y < 25)
					y = 26;
				else
					y = 24;

				repaint ();
			}
		}
	}
}