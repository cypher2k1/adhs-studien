class Bsp14Continue {
	
	public static void main (String args[]) { 
		
		// ----------------------------------------------------
		
		System.out.println ("for-Schleife mit continue");
		
		int		k;
		
		for (k=1; k<=10; k ++) {

			if (k == 5)
				continue;
				
			System.out.println (k);	
		}
	} 
}
