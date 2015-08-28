import java.io.*;
import java.awt.*;
import java.awt.event.*;

class IntegerTextField1 extends TextField implements Serializable {


	public IntegerTextField1 () {

		super ();
		this.enableEvents (java.awt.AWTEvent.KEY_EVENT_MASK);
	}



    public int getIntegerValue () {

		int result = 0;

		try {

			result = Integer.parseInt (this.getText ());
		}
		catch (Exception e) {}

		return result;
    }


    public void setIntegerValue (int d) {

		setText (Integer.toString (d));
	}


    public void processKeyEvent (KeyEvent event) {

		char c = event.getKeyChar ();

		if ((c >= '0' && c <= '9') ||
			(c == KeyEvent.VK_DELETE) ||
			(c == KeyEvent.VK_BACK_SPACE)) {

			// ... tue nichts, d.h.
			// der Event wird normal verarbeitet

		} else {

			// l�sche den Event, ohne Verarbeitung
			event.consume ();
		}
	}
}
