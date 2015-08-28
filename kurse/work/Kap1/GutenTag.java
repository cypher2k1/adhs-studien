import java.io.*;

public class GutenTag {

	public static void main (String args[]) {

		System.out.println ("Guten Tag!");
		System.out.println ("Wie ist Ihr Name?");

		try {

			InputStream		i = System.in;
			BufferedReader	r;

			r = new BufferedReader (new InputStreamReader (i));

			String			s = r.readLine ();

			System.out.println ("Hallo " + s + "!");

		} catch (IOException e) {

			System.out.println ("Oops!");
		}

		System.out.println ("fertig.");
	}
}
