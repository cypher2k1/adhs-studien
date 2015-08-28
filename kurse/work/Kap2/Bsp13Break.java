class Bsp13Break {
	
	public static void main (String args[]) { 
		
		// ----------------------------------------------------
		
		System.out.println ("while-Schleife mit break");
		
		
		int			i;
		
		
		i = 1;
		while (i <= 10) {
			
			System.out.println (i);	
			
			if (i == 5)
				break;
			
			i ++;
		}
	} 
}
