import UniBeispiel.*;

import java.io.*;
import java.util.*;


class NeueUni {

	public static void	main (String [] args) {


		Uni		u = new Uni ("Uni. XY");

		u.einschreiben (new Student ("Till", "Hansen"));
		u.einschreiben (new Student ("Sabine", "Sahlmann"));
		u.einschreiben (new Student ("Kate", "Stonebraker"));

		u.alles_anzeigen ();


		try {

			FileOutputStream	fs = new FileOutputStream ("unidata.ser");
			ObjectOutputStream	os = new ObjectOutputStream	(fs);

			os.writeObject (u);
			os.close ();

		} catch (IOException e) {}
	}
}

