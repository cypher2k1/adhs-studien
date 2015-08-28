import javax.swing.*;

public class swingapp extends JFrame {

	public static void main (String args []) {

		new swingapp ();
	}


	public swingapp () {
		super ("Eine Anwendung");


		JMenuBar	mBar	= new JMenuBar();
		JMenu		mFile	= new JMenu ("Datei");
		JMenuItem	cmdQuit	= new JMenuItem ("Beenden");


		mBar.add (mFile);
		mFile.add (cmdQuit);
		setJMenuBar(mBar);

		setSize (300, 300);
		setVisible (true);
	}
}
