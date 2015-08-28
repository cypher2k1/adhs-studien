import	java.applet.*;
import	java.awt.*;

public class Animation2	extends Applet implements Runnable {

	Image		fisch1;
	Image		fisch2;
	int			x;
	int			y;
	int			richtung;
	
	public void		init () {

		fisch1 = getImage (getDocumentBase (), "fisch1.gif");
		fisch2 = getImage (getDocumentBase (), "fisch2.gif");
		
		x = 50;
		y = 22;
		
		richtung = -4;
	}
	
	public void		paint (Graphics g) {
		
		g.setColor (Color.decode ("#8888ff"));
		g.fillRect (0, 0, 500, 120);
		
		if (richtung < 0)
			g.drawImage (fisch1, x, y, this);
		
		if (richtung > 0)
			g.drawImage (fisch2, x, y, this);
	}

	Thread		thread;
	
	public void		start () {

		thread = new Thread (this);
		thread.start ();
	}

	public void run () {
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