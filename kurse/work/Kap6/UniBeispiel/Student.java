package UniBeispiel;

import java.io.*;

public class Student extends Person implements Serializable {

	public int			m_martrikelnr;

	public Student (String vorname, String name) {
		super (vorname, name);

		m_martrikelnr = -1;
	}
}

