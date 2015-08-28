import UniBeispiel.*;

import java.io.*;
import java.util.*;
import java.sql.*;

class UniDB {

	public static void	main (String [] args) {


		//
		// Alte Uni einladen
		//
		Uni		u = null;

		try {

			FileInputStream		fs = new FileInputStream ("unidata.ser");
			ObjectInputStream	os = new ObjectInputStream	(fs);

			u = (Uni) os.readObject ();
			os.close ();

		} catch (IOException e) {}
			catch (ClassNotFoundException e) {}





		if (u != null) {

			Connection		c = null;

			try {

				Class.forName ("sun.jdbc.odbc.JdbcOdbcDriver");
				c = DriverManager.getConnection ("jdbc:odbc:UNI_DB_ODBC");

				if (c != null) {
					Statement	s = c.createStatement ();

					if (s != null) {

						int			d;
						String		sql;
						ResultSet	rs;
						int			UniID, PersID;


						sql = "INSERT INTO Uni (f_name) VALUES ('";
						sql = sql + u.m_name;
						sql = sql + "')";
						System.out.println (sql);

						s.executeUpdate (sql);



						sql = "SELECT ID FROM Uni WHERE f_name = '";
						sql = sql + u.m_name;
						sql = sql + "'";
						System.out.println (sql);

						rs = s.executeQuery (sql);

						UniID = -1;
						if (rs.next ())
							UniID = rs.getInt (1);


						int		i;

						for (i=0; i<u.m_studenten.size (); i ++) {
							Student stud = (Student) u.m_studenten.get (i);

							sql = "INSERT INTO Person (f_vorname, f_name) VALUES ('";
							sql = sql + stud.m_vorname;
							sql = sql + "', '";
							sql = sql + stud.m_name;
							sql = sql + "')";
							System.out.println (sql);

							s.executeUpdate (sql);



							sql = "SELECT ID FROM Person WHERE f_name = '";
							sql = sql + stud.m_name;
							sql = sql + "' AND f_vorname = '";
							sql = sql + stud.m_vorname;
							sql = sql + "'";
							System.out.println (sql);

							rs = s.executeQuery (sql);
							PersID = -1;
							if (rs.next ())
								PersID = rs.getInt (1);



							sql = "INSERT INTO Student (ID, f_matrikelnummer, uni_ID) VALUES (";
							sql = sql + PersID;
							sql = sql + ", ";
							sql = sql + stud.m_martrikelnr;
							sql = sql + ", ";
							sql = sql + UniID;
							sql = sql + ")";
							System.out.println (sql);

							s.executeUpdate (sql);
						}
					}

					c.close ();
				}

			} catch (Exception e) {System.out.println (e);}
		}
	}
}
