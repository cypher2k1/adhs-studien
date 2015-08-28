import java.util.*;

public class NeueListenVerwaltung {

	public static void main( String args [] ){
	
		List<String>	klassenkameraden2 = new LinkedList<String>();

		klassenkameraden2.add( "Hans-Georg" );	
		klassenkameraden2.add( "Korinna" );	
		klassenkameraden2.add( "Sabine" );	
		klassenkameraden2.add( "Sebastian" );	
/*
		klassenkameraden2.add( new Integer(5) );	

NeueListenVerwaltung.java:13: cannot find symbol
symbol  : method add(java.lang.Integer)
location: interface java.util.List<java.lang.String>
                klassenkameraden2.add( new Integer(5) );
                                ^
1 error

*/		
		
		
		System.out.println( "Klassenkameraden:" );
		Iterator<String> iter = klassenkameraden2.iterator();
		while( iter.hasNext() ){
			String name = iter.next();
			
			System.out.println( name );
		}
	}
};


/*
javac ListenVerwaltung.java

java ListenVerwaltung   

Klassenkameraden:
Hans-Georg
Korinna
Sabine
Sebastian

Siehe:
	docs/api/java/util/LinkedList.html
	docs/api/java/util/Iterator.html


javac NeueListenVerwaltung.java
java NeueListenVerwaltung 

Kein TypeCast: "String name = iter.next();"


*/
