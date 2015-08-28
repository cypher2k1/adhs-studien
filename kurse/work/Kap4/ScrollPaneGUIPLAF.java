import javax.swing.*;
import javax.swing.tree.*;
import java.awt.event.*;
import javax.swing.event.*;
import java.awt.*;

public class ScrollPaneGUIPLAF extends JFrame {

	public ScrollPaneGUIPLAF () {
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
		topPanel.setLayout (new FlowLayout ());

		getContentPane().add (topPanel);


		topPanel.add (new JLabel ("Beispiel:"));
		topPanel.add (new JTextField (10));


		topPanel.add (new JCheckBox ("mit Käse", true));

		JRadioButton		rGut		= new JRadioButton ("Gut",  true);
		JRadioButton		rNichtGut	= new JRadioButton ("Nicht gut",  false);

        ButtonGroup group = new ButtonGroup();
        group.add(rGut);
        group.add(rNichtGut);

		topPanel.add (rGut);
		topPanel.add (rNichtGut);

		topPanel.add (new JButton ("Test"));

		setSize (300, 150);
		setVisible (true);

	    try {

	      	UIManager.setLookAndFeel("com.sun.java.swing.plaf.windows.WindowsLookAndFeel");
//	      	UIManager.setLookAndFeel("com.sun.java.swing.plaf.motif.MotifLookAndFeel");
//     		UIManager.setLookAndFeel("javax.swing.plaf.metal.MetalLookAndFeel");

      		SwingUtilities.updateComponentTreeUI(this);

    	} catch (Exception e) {	}
	}


	public static void main (String args []) {

		new ScrollPaneGUIPLAF ();
	}

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
