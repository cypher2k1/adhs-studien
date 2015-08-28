//
// In den folgenden 4 Zeilen wird eine Klasse "Haustier"
// definiert. Die Instanzen hier haben alle einen Namen als String
//
class Haustier {

	String		name;
}

//
// Davon werden Hunde, Katzen und Ratten abgeleitet.
// In diesem einfachen Beispiel haben alle jedoch
// keine weiteren Eigenschaften
//
class Hund extends Haustier {

}


	//
	// Achja: Pudel und Terrier gibt es ja auch noch
	// Weitere Eigenschaften werden jedoch nicht festgelegt.
	// Zum Beispiel könnte man als Eigenschaft eines Pudels
	// noch das Datum des letzten Friseurbesuches speichern.
	class Pudel extends Hund {


	}


	class Terrier extends Hund {


	}


class Katze extends Haustier {

}



class Ratte extends Haustier {

}


//
// Die folgende "Anwendung" erzeugt erneut zwei Instanzen
// der Klasse Hund und der Klasse Katze.
//
public class Anwendung3 {

	public static void main (String args []) {

		
	}
}
