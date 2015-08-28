package UniBeispiel;

import java.io.*;

public class Person implements Serializable {

	public String		m_name;
	public String		m_vorname;

	public Person (String vorname, String name) {

		m_name		= name;
		m_vorname	= vorname;
	}
}


