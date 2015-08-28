
  
    Normal4 = new Image();
    Normal4.src = "../Medien/Auswerten.gif";
    Highlight4 = new Image();
    Highlight4.src = "../Medien/Auswerten_Mo.gif";
  
    Normal5 = new Image();
    Normal5.src = "../Medien/Losung.gif";
    Highlight5 = new Image();
    Highlight5.src = "../Medien/Losung_Mo.gif";
  
    Normal6 = new Image();
    Normal6.src = "../Medien/Loschen.gif";
    Highlight6 = new Image();
    Highlight6.src = "../Medien/Loschen_Mo.gif";
  
   //Fenster schlieﬂen
    Normal1 = new Image();
    Normal1.src = "../Medien/Fzu.gif";
    Highlight1 = new Image();
    Highlight1.src = "../Medien/Fzu_Mo.gif";
  				   		 
  
    function Bildwechsel(Bildobjekt,PName)
    {  	  	
    	if (N4) 
    	{
    		if (document.layers['leisteLayer'])
    		{
    			if (PName != "4") command = "document.layers['leisteLayer'].document.b"+PName+".src = Bildobjekt.src";
    			else command = "document.layers['hilfeLayer'].document.b"+PName+".src = Bildobjekt.src";
    		}
    		else
    		{
    			if (PName != "4") command = "document.layers['LernerInput'].document.b"+PName+".src = Bildobjekt.src";
    			else command = "document.layers['LernerInput'].document.b"+PName+".src = Bildobjekt.src";
    		}
    	}
     	else command = "window.document.b"+PName+".src = Bildobjekt.src";
     	   	
     	eval(command);
  }