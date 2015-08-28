import java.io.*;

class Lesen  {

	public static void main (String args []) {

		try {

			FileReader		f  = new FileReader  ("remember.txt");
			BufferedReader	in = new BufferedReader (f);

			String s;

			while ((s = in.readLine()) != null) {

				System.out.println (s);
			}
			in.close();

		} catch (Exception e) {

		}

		System.out.println ("fertig.");
	}
}
