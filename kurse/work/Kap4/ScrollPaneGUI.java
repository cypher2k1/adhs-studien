import javax.swing.*;
import java.awt.event.*;
import java.awt.*;

public class ScrollPaneGUI extends JFrame {

	public ScrollPaneGUI () {
		super ("Eine Anwendung");

		addWindowListener (new myWindowAdapter ());
		JMenuBar	mBar	= new JMenuBar();
		JMenu		mFile	= new JMenu ("Datei");
		JMenuItem	cmdQuit	= new JMenuItem ("Beenden");

		mFile.setMnemonic ('D');
		cmdQuit.setMnemonic ('B');
		cmdQuit.setToolTipText ("Beendet das Programm");
		cmdQuit.addActionListener (new Anwendung ());

		mBar.add (mFile);
		mFile.add (cmdQuit);
		setJMenuBar(mBar);


		JPanel			topPanel = new JPanel ();
		topPanel.setLayout (new BorderLayout ());

		getContentPane().add (topPanel);


		JScrollPane		scrollPane;
		scrollPane = new JScrollPane ();


		topPanel.add (scrollPane, BorderLayout.CENTER);


		Icon image = new ImageIcon ("pic.gif");
		JLabel label = new JLabel (image);

		scrollPane.getViewport().add (label);


		setSize (300, 300);
		setVisible (true);

	}



	public static void main (String args []) {

		new ScrollPaneGUI ();
	}
}


class myWindowAdapter extends WindowAdapter {

	public void windowClosing (WindowEvent e) {

		System.exit (0);
	}
}



class Anwendung implements ActionListener {

	public void actionPerformed (ActionEvent e) {
		String		cmd = e.getActionCommand ();

		if (cmd == "Beenden")
			System.exit (0);
	}
}