import	java.rmi.*;


public class RechnerAppl {

	public static void main (String args[]) {

		try {
			// Suche die Implementierung des Interfaces

			RechnerIntf rechner = (RechnerIntf) Naming.lookup ("RechnerServer");


			// Berechne die Summe von 5 und 7 oder so

			int		a = 5;
			int		b = 7;

			int		result = rechner.addiere (a, b);

			System.out.println ("Ergebis: " + result);

		} catch (Exception e) {

			System.out.println (e.getMessage ());
			e.printStackTrace ();
		}
	}
}
