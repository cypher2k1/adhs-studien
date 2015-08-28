package UniBeispiel;

import java.util.*;
import java.io.*;

public class Uni implements Serializable {

	public String		m_name;
	public LinkedList	m_studenten;


	private int		zaehler;

	public Uni (String name) {

		m_name		= name;
		m_studenten = new LinkedList ();
	}


	public void einschreiben (Student stud) {

		stud.m_martrikelnr = neue_martikelnummer ();
		m_studenten.add (stud);
	}


	public int neue_martikelnummer () {

		zaehler = zaehler + 1;
		return (zaehler);
	}


	public void alles_anzeigen () {

		System.out.println (this.m_name);
		System.out.println ("--------------------------");

		int		i;

		for (i=0; i<this.m_studenten.size (); i ++) {

			System.out.print (((Student) this.m_studenten.get (i)).m_martrikelnr);
			System.out.print (": ");
			System.out.print (((Student) this.m_studenten.get (i)).m_vorname);
			System.out.print (" ");
			System.out.println (((Student) this.m_studenten.get (i)).m_name);
		}

	}
}
