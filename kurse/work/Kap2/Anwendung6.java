// ----------------------------------------------------
//
// Bei form handelt es sich jetzt um ein Interface,
// welches festlegt, dass es ein Verhalten "umfang"
// und "inhalt" gibt - aber nicht, wie dieses
// Verhalten aussieht.
//
interface form {

	abstract int		umfang ();
	abstract int		inhalt ();
}

// ----------------------------------------------------
//
// Die Klasse cad_objekt definiert Eigenschaften
// eines CAD Objekts: eine Position auf dem
// Bildschirm und eine Methode zum Verschieben.
//
abstract class cad_objekt {

	public int		h;
	public int		v;
	
	void	verschieben (int dh, int dv) {
	
		h += dh;
		v += dv;
	}
}

// ----------------------------------------------------
//
// Die Klasse quadrat erbt die Eigenschaften von
// cad_objekt, implementiert aber gleichzeit das
// Interface form, d.h. es gibt Methoden zum
// Berechnen von Umfang und Inhalt.
//
class quadrat extends cad_objekt implements form {

	private int		kantenlaenge;
	
	public quadrat (int d) {
	
		kantenlaenge = d;
		h = 0;
		v = 0;
	}
		
	public int		umfang () {return 4 * kantenlaenge;}
	public int		inhalt () {return kantenlaenge * kantenlaenge;}
}

//
// s.o.
//
class kreis extends cad_objekt implements form {

	private int		radius;
	
	public kreis (int d) {
	
		radius = d;
		h = 0;
		v = 0;
	}

	public int		umfang () {return (int) (2 * 3.14 * radius);}
	public int		inhalt () {return (int) (3.14 * (radius ^2));}
}




//
// Die folgende "Anwendung" erzeugt erneut zwei Instanzen
// der Klasse Hund und der Klasse Katze.
//
public class Anwendung6 {

	public static void main (String args []) {

		cad_objekt		o = new quadrat (5);
		
		o.verschieben (4, 2);
		
		System.out.println (((quadrat) o).umfang ());
	}
}
