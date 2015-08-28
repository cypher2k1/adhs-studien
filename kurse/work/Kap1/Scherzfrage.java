import java.io.*;

class Scherzfrage {

	public static void main (String args[]) {

		try {

			InputStream		i = System.in;
			BufferedReader	r;
			int				d;

			r = new BufferedReader (new InputStreamReader (i));

			System.out.println ("Wieviele Räder hat ein Auto?");

			do {

				String			s = r.readLine ();

				d = Integer.parseInt(s.trim());

				if (d == 5) {

					System.out.println ("Ja, genau richtig!");
					d = 0;

				} else if (d == 4)
					System.out.println ("Sie haben das Lenkrad vergessen!");

				else if (d != 0)
					System.out.println ("Nicht ganz!");

			} while (d != 0);

		} catch (Exception e) {

			System.out.println ("Oops!");
		}

		System.out.println ("fertig.");
	}
}
