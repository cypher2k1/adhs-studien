

// hier werden die Functionnen der Navigation programmiert


// hier sind einige globale Variable 
       
var currentChapter;
var zustandWuerzel = true;
var textBrowser = "";
var zeilenZaehler = 0; 
leer = '" "';
titelbild = '"zur Titelseite"';
autor = '"Autor"';
              
zustandKapitelAuf = new Array(anzahlKapitel);
     
for (var i = 0; i < anzahlKapitel; i++)
{
	zustandKapitelAuf[i] = false;            	
}


/*Die funktion wuerzelAction() schliesst der gesamten menu wenn man auf das bild anklick
wenn man wieder auf das Bild anklick wird die Naigationstruktur geoffnet mit der letzte Zustan*/

function wuerzelAction()
{
	text='';
	kurs = '"Inhalt öffnen"';
	
  	if (zustandWuerzel == true)
  	{  	  				
          	text += "<table border='0' cellpadding='0' cellspacing='0' >"+
 	      		"<tr>"+ 	      		
 	        		"<td><a href='javascript:wuerzelAction()' onMouseOver='self.status=" + kurs + ";return true' onMouseOut='self.status=" + leer + ";return true'>"+
            			"<img src="+"'"+ navigationIcon + "'"+" border='0' width='40' height='36' name='folderIcon0'></a></td>"+
            			"<td nowrap><a href='javascript:wuerzelAction()' onMouseOver='self.status=" + kurs + ";return true' onMouseOut='self.status=" + leer + ";return true' >Einf&uuml;hrung in Java</a></td>"+
 	      		"</tr>"+
 	    		"</table>";	
          		
          	/*text += "<table border='0' cellpadding='0' cellspacing='0' >"+
 	      		"<tr><br>"+ 	      		
 	        		"<td colspan='2'><a href='Javascript:Autor()' onMouseOver='self.status=" + autor + ";return true' onMouseOut='self.status=" + leer + ";return true' >Autor</a></td>"+
 	      		"</tr>"+
 	    		"</table>";*/
 
      		text += "<br><br>"; 
      		  	  	
  	  	textBrowser = text;
          	browserLayer();          
          	zustandWuerzel = false;
  	}
  	else
  	{  	
          	gibBaum(-1);
     	  	zustandWuerzel = true;
  	}
}


/* Die Funktion gibBaum zeichnet die Struktur der Navigation unter Berucksichtigung 
ob eine Kapitel gerade auf ist oder nicht Erst beim erste aufruf werden die Kapitel gemalt
und wenn man auf dem Struktur weiterklick dann werden varialble belegt um den Zustand der angeklickten 
Kapitel zu speichern um die wieder zugeben wenn mann eine andere kapitel oeffnen will
Die Links entsprechen Die Hierarchie ein Kurs und werden automatisch erstellt*/

function gibBaum(currentChapter)
{    
    	zeilenZaehler = 0;
    	var text = '';
    	
    	if (currentChapter != -1)
    	{
 		if (zustandKapitelAuf[currentChapter]) zustandKapitelAuf[currentChapter] = false;
 		else zustandKapitelAuf[currentChapter] = true;
    	}	

    	for (var i = 0; i < anzahlKapitel; i++)
     	{
         	if (zustandKapitelAuf[i] == false)
     	 	{
     	 		kurs = '"Inhalt schließen"';
     	 		ordner = '"Kapitel ' + (i+1) + ' öffnen"';
     	 		kapname = '"zu Kapitel ' + arrayValue[i][0] + '"';     	 		
     	 		
              		if (i == 0)
              		{              			            
                		text += "<table border='0' cellpadding='0' cellspacing='0' >"+
                       			"<tr>"+
	                 			"<td><a href='javascript:wuerzelAction()' onMouseOver='self.status=" + kurs + ";return true' onMouseOut='self.status=" + leer + ";return true'>"+
	                   				"<img src="+"'"+ navigationIcon + "'"+" border='0' width='40' height='36' name='folderIcon0' onMouseOver='self.status=" + kurs + ";return true' onMouseOut='self.status=" + leer + ";return true'></a></td>"+
	                 			"<td nowrap><a href='javascript:wuerzelAction()' onMouseOver='self.status=" + kurs + ";return true' onMouseOut='self.status=" + leer + ";return true' >Einf&uuml;hrung in Java</a></td>"+
	               			"</tr>"+
	               			"<tr>"+
	                 			"<td><img src='Ftv2VertLine2.gif' width='16' height='10'></td>"+
	               			"</tr>"+
	               			"<tr>"+
	                 			"<td><img src='Ftv2Node.gif' width='16' height='22'><a href='../Start.htm' target='_top' onMouseOver='self.status=" + titelbild + ";return true' onMouseOut='self.status=" + leer + ";return true'>"+
		            				"<img src='Ftv2Doc.gif' border='0' width='24' height='22'></a></td>"+
	                 			"<td nowrap><a href='../Start.htm' target='_top'  onMouseOver='self.status=" + titelbild + ";return true' onMouseOut='self.status=" + leer + ";return true'>Titelseite</a></td>"+
	               			"</tr>";
	               			
	               		if (parent.visitedPages[i][0][0] == true)
	               		{
					text += "<tr>"+
			 				"<td><a href='javascript:gibBaum("+i+")' onMouseOver='self.status=" + ordner + ";return true' onMouseOut='self.status=" + leer + ";return true'><img src='Ftv2PNode.gif' border='0' width='16' height='22'></a><a href='javascript:gibBaum("+i+")' onMouseOver='self.status=" + ordner + ";return true' onMouseOut='self.status=" + leer + ";return true'>"+
			    					"<img src='Ftv2FolderClosed.gif' border='0' width='24' height='22'></a></td>"+
			 				"<td nowrap><a href='../Mod_"+(i+1)+"/"+(i+1)+"_"+(i+1)+"_1.htm'  onMouseOver='self.status=" + kapname + ";return true' onMouseOut='self.status=" + leer + ";return true'>"+ arrayValue[i][0] +"</a><img src='../Uebung/Yes_.gif'></td>"+
		       				"</tr>"+
	        				"</table>";	        	               		
	               		}
	               		else
	               		{
                       			text += "<tr>"+
			 				"<td><a href='javascript:gibBaum("+i+")' onMouseOver='self.status=" + ordner + ";return true' onMouseOut='self.status=" + leer + ";return true'><img src='Ftv2PNode.gif' border='0' width='16' height='22'></a><a href='javascript:gibBaum("+i+")' onMouseOver='self.status=" + ordner + ";return true' onMouseOut='self.status=" + leer + ";return true'>"+
			    					"<img src='Ftv2FolderClosed.gif' border='0' width='24' height='22'></a></td>"+
			 				"<td nowrap><a href='../Mod_"+(i+1)+"/"+(i+1)+"_"+(i+1)+"_1.htm'  onMouseOver='self.status=" + kapname + ";return true' onMouseOut='self.status=" + leer + ";return true'>"+ arrayValue[i][0] +"</a></td>"+
		       				"</tr>"+
	        				"</table>";	        
	        		}
               		}
     	       		else if (i == anzahlKapitel-1)
	       		{
	       			if (parent.visitedPages[i][0][0] == true)
	       			{
		  			text += "<table border='0' cellpadding='0' cellspacing='0' >"+
		         			"<tr>"+  			  
  			  				"<td><a href='javascript:gibBaum("+i+")' onMouseOver='self.status=" + ordner + ";return true' onMouseOut='self.status=" + leer + ";return true'><img src='Ftv2PlastNode.gif' border='0' width='16' height='22'></a><a href='javascript:gibBaum("+i+")' onMouseOver='self.status=" + ordner + ";return true' onMouseOut='self.status=" + leer + ";return true'>"+
		            					"<img src='Ftv2FolderClosed.gif' border='0' width='24' height='22'></a></td>"+
			  				"<td nowrap><a href='../Mod_"+(i+1)+"/"+(i+1)+"_"+"1"+"_1.htm'  onMouseOver='self.status=" + kapname + ";return true' onMouseOut='self.status=" + leer + ";return true'>" +arrayValue[i][0] +"</a><img src='../Uebung/Yes_.gif'></td>"+
	                  			"</tr>"+	                  
			 			"</table>";			 		 
			 	}
			 	else
			 	{
					text += "<table border='0' cellpadding='0' cellspacing='0' >"+
		         			"<tr>"+  			  
  			  				"<td><a href='javascript:gibBaum("+i+")' onMouseOver='self.status=" + ordner + ";return true' onMouseOut='self.status=" + leer + ";return true'><img src='Ftv2PlastNode.gif' border='0' width='16' height='22'></a><a href='javascript:gibBaum("+i+")' onMouseOver='self.status=" + ordner + ";return true' onMouseOut='self.status=" + leer + ";return true'>"+
		            					"<img src='Ftv2FolderClosed.gif' border='0' width='24' height='22'></a></td>"+
			  				"<td nowrap><a href='../Mod_"+(i+1)+"/"+(i+1)+"_"+"1"+"_1.htm'  onMouseOver='self.status=" + kapname + ";return true' onMouseOut='self.status=" + leer + ";return true'>" +arrayValue[i][0] +"</a></td>"+
	                  			"</tr>"+	                  
			 			"</table>";			 		 			 	
			 	}
	        	}
  	      		else
     	   		{
     	   			if (parent.visitedPages[i][0][0] == true)
	       			{
     	    	   			text += "<table border='0' cellpadding='0' cellspacing='0' >"+
				  		"<tr>"+
				   			"<td><a href='javascript:gibBaum("+i+")' onMouseOver='self.status=" + ordner + ";return true' onMouseOut='self.status=" + leer + ";return true'><img src='Ftv2PNode.gif' border='0' width='16' height='22'></a><a href='javascript:gibBaum("+i+")' onMouseOver='self.status=" + ordner + ";return true' onMouseOut='self.status=" + leer + ";return true'>"+			   
				    				"<img src='Ftv2FolderClosed.gif' border='0' width='24' height='22'></a></td>"+
				   			"<td nowrap><a href='../Mod_"+(i+1)+"/"+(i+1)+"_"+"1"+"_1.htm'  onMouseOver='self.status=" + kapname + ";return true' onMouseOut='self.status=" + leer + ";return true'>"+ arrayValue[i][0] +"</a><img src='../Uebung/Yes_.gif'></td>"+
				  		"</tr>"+			  			  
				 		"</table>";			 	                        			 
				 }
				 else
				 {
					text += "<table border='0' cellpadding='0' cellspacing='0' >"+
				  		"<tr>"+
				   			"<td><a href='javascript:gibBaum("+i+")' onMouseOver='self.status=" + ordner + ";return true' onMouseOut='self.status=" + leer + ";return true'><img src='Ftv2PNode.gif' border='0' width='16' height='22'></a><a href='javascript:gibBaum("+i+")' onMouseOver='self.status=" + ordner + ";return true' onMouseOut='self.status=" + leer + ";return true'>"+			   
				    				"<img src='Ftv2FolderClosed.gif' border='0' width='24' height='22'></a></td>"+
				   			"<td nowrap><a href='../Mod_"+(i+1)+"/"+(i+1)+"_"+"1"+"_1.htm'  onMouseOver='self.status=" + kapname + ";return true' onMouseOut='self.status=" + leer + ";return true'>"+ arrayValue[i][0] +"</a></td>"+
				  		"</tr>"+			  			  
				 		"</table>";			 	                        			 				 	
				 }
			}
     	 	}
     	 	else if (zustandKapitelAuf[i] == true)
     	 	{     	
     	 		kurs = '"Inhalt schließen"';
     	 		ordner = '"Kapitel ' + (i+1) + ' schließen"';
     	 		kapname = '"zu Kapitel ' + arrayValue[i][0] + '"';
     	 		
	              	if (i == 0)
              		{
                		text += "<table border='0' cellpadding='0' cellspacing='0' >"+
					"<tr>"+
	                 			"<td><a href='javascript:wuerzelAction()' onMouseOver='self.status=" + kurs + ";return true' onMouseOut='self.status=" + leer + ";return true'>"+
	                   				"<img src="+"'"+ navigationIcon + "'"+" border='0' width='40' height='36' name='folderIcon0' onMouseOver='self.status=" + kurs + ";return true' onMouseOut='self.status=" + leer + ";return true'></a></td>"+
	                 			"<td nowrap><a href='javascript:wuerzelAction()' onMouseOver='self.status=" + kurs + ";return true' onMouseOut='self.status=" + leer + ";return true' >Einf&uuml;hrung in Java</a></td>"+
	               			"</tr>"+
	               			"<tr>"+
	                 			"<td><img src='Ftv2VertLine2.gif' width='16' height='10'></td>"+
	               			"</tr>"+
	               			"<tr>"+
	                 			"<td><img src='Ftv2Node.gif' width='16' height='22'><a href='../Start.htm' target='_top' onMouseOver='self.status=" + titelbild + ";return true' onMouseOut='self.status=" + leer + ";return true'>"+
		            				"<img src='Ftv2Doc.gif' border='0' width='24' height='22'></a></td>"+
	                 			"<td nowrap><a href='../Start.htm' target='_top'  onMouseOver='self.status=" + titelbild + ";return true' onMouseOut='self.status=" + leer + ";return true'>Titelseite</a></td>"+
	               			"</tr>";
	               			
	               		if (parent.visitedPages[i][0][0] == true)
				{
					text += "<tr>"+
			 				"<td><a href='javascript:gibBaum("+i+")' onMouseOver='self.status=" + ordner + ";return true' onMouseOut='self.status=" + leer + ";return true'><img src='Ftv2MNode.gif' border='0' width='16' height='22'></a><a href='javascript:gibBaum("+i+")' onMouseOver='self.status=" + ordner + ";return true' onMouseOut='self.status=" + leer + ";return true'>"+
			   					"<img src='Ftv2FolderOpen.gif' border='0' width='24' height='22'></a></td>"+
			 				"<td nowrap><a href='../Mod_"+(i+1)+"/"+(i+1)+"_"+(i+1)+"_1.htm'  onMouseOver='self.status=" + kapname + ";return true' onMouseOut='self.status=" + leer + ";return true'>"+ arrayValue[i][0] +"</a><img src='../Uebung/Yes_.gif'></td>"+
		       				"</tr>"+
		      				"</table>";								
				}
				else
				{
		       			text += "<tr>"+
			 				"<td><a href='javascript:gibBaum("+i+")' onMouseOver='self.status=" + ordner + ";return true' onMouseOut='self.status=" + leer + ";return true'><img src='Ftv2MNode.gif' border='0' width='16' height='22'></a><a href='javascript:gibBaum("+i+")' onMouseOver='self.status=" + ordner + ";return true' onMouseOut='self.status=" + leer + ";return true'>"+
			   					"<img src='Ftv2FolderOpen.gif' border='0' width='24' height='22'></a></td>"+
			 				"<td nowrap><a href='../Mod_"+(i+1)+"/"+(i+1)+"_"+(i+1)+"_1.htm'  onMouseOver='self.status=" + kapname + ";return true' onMouseOut='self.status=" + leer + ";return true'>"+ arrayValue[i][0] +"</a></td>"+
		       				"</tr>"+
		      				"</table>";
		      		}
		      
		     		zeilenZaehler += anzahlUnterKapitel[i];		     		     
              		}
              		else if (i == anzahlKapitel-1)
              		{
              			if (parent.visitedPages[i][0][0] == true)
				{
					text += "<table border='0' cellpadding='0' cellspacing='0' >"+
		               			"<tr>"+
		  	 	 			"<td><a href='javascript:gibBaum("+i+")' onMouseOver='self.status=" + ordner + ";return true' onMouseOut='self.status=" + leer + ";return true'><img src='Ftv2MLastNode.gif' border='0' width='16' height='22'></a><a href='javascript:gibBaum("+i+")' onMouseOver='self.status=" + ordner + ";return true' onMouseOut='self.status=" + leer + ";return true'>"+  									 
		  	 	  				"<img src='Ftv2FolderOpen.gif' border='0' width='24' height='22'></a></td>"+
		         	 			"<td nowrap><a href='../Mod_"+(i+1)+"/"+(i+1)+"_"+1+"_1.htm'  onMouseOver='self.status=" + kapname + ";return true' onMouseOut='self.status=" + leer + ";return true'>"+ arrayValue[i][0] +"</a><img src='../Uebung/Yes_.gif'></td>"+
		               			"</tr>"+	               
	 		      			"</table>";					
				}
				else
               			{
	                		text += "<table border='0' cellpadding='0' cellspacing='0' >"+
		               			"<tr>"+
		  	 	 			"<td><a href='javascript:gibBaum("+i+")' onMouseOver='self.status=" + ordner + ";return true' onMouseOut='self.status=" + leer + ";return true'><img src='Ftv2MLastNode.gif' border='0' width='16' height='22'></a><a href='javascript:gibBaum("+i+")' onMouseOver='self.status=" + ordner + ";return true' onMouseOut='self.status=" + leer + ";return true'>"+  									 
		  	 	  				"<img src='Ftv2FolderOpen.gif' border='0' width='24' height='22'></a></td>"+
		         	 			"<td nowrap><a href='../Mod_"+(i+1)+"/"+(i+1)+"_"+1+"_1.htm'  onMouseOver='self.status=" + kapname + ";return true' onMouseOut='self.status=" + leer + ";return true'>"+ arrayValue[i][0] +"</a></td>"+
		               			"</tr>"+	               
	 		      			"</table>";
	 		      	}
 		      			
                     		zeilenZaehler += anzahlUnterKapitel[i];		     
	 	       	}
               		else  
               		{
               			if (parent.visitedPages[i][0][0] == true)
               			{
					text += "<table border='0' cellpadding='0' cellspacing='0' >"+
 		         			"<tr>"+
		           				"<td><a href='javascript:gibBaum("+i+")' onMouseOver='self.status=" + ordner + ";return true' onMouseOut='self.status=" + leer + ";return true'><img src='Ftv2MNode.gif' border='0' width='16' height='22'></a><a href='javascript:gibBaum("+i+")' onMouseOver='self.status=" + ordner + ";return true' onMouseOut='self.status=" + leer + ";return true'>"+
		             					"<img src='Ftv2FolderOpen.gif' border='0' width='24' height='22'></a></td>"+
			   				"<td nowrap><a href='../Mod_"+(i+1)+"/"+(i+1)+"_"+1+"_1.htm'  onMouseOver='self.status=" + kapname + ";return true' onMouseOut='self.status=" + leer + ";return true'>"+ arrayValue[i][0] +"</a><img src='../Uebung/Yes_.gif'></td>"+
			 			"</tr>"+
 						"</table>";               			
               			}
               			else
               			{
                 			text += "<table border='0' cellpadding='0' cellspacing='0' >"+
 		         			"<tr>"+
		           				"<td><a href='javascript:gibBaum("+i+")' onMouseOver='self.status=" + ordner + ";return true' onMouseOut='self.status=" + leer + ";return true'><img src='Ftv2MNode.gif' border='0' width='16' height='22'></a><a href='javascript:gibBaum("+i+")' onMouseOver='self.status=" + ordner + ";return true' onMouseOut='self.status=" + leer + ";return true'>"+
		             					"<img src='Ftv2FolderOpen.gif' border='0' width='24' height='22'></a></td>"+
			   				"<td nowrap><a href='../Mod_"+(i+1)+"/"+(i+1)+"_"+1+"_1.htm'  onMouseOver='self.status=" + kapname + ";return true' onMouseOut='self.status=" + leer + ";return true'>"+ arrayValue[i][0] +"</a></td>"+
			 			"</tr>"+
 						"</table>";
 				}
 					
 				zeilenZaehler += anzahlUnterKapitel[i];		       
 			}
 			
			for (var j = 1; j < arrayValue[i].length; j++)
 			{
 		   		if (j == arrayValue[i].length-1)
 		   		{
 		   			kapname = '"zu Unterkapitel ' + statusValue[i][j] + '"';
 		   			
 		        		if (i == anzahlKapitel-1)
 		        		{
			  			if (parent.visitedPages[i][j][0] == true)                      	  
			  			{                      	  	
							text += "<table border='0' cellpadding='0' cellspacing='0' >"+
				         			"<tr>"+
				           				"<td><img src='Ftv2Blank.gif' width='16' height='22'><img src='Ftv2LastNode.gif' width='16'height='22'><a href='../Mod_"+(i+1)+"/"+(i+1)+"_"+j+"_1.htm' onMouseOver='self.status=" + kapname + ";return true' onMouseOut='self.status=" + leer + ";return true'>"+
				             					"<img src='Ftv2Doc.gif' border='0' width='24' height='22'></a>"+
				           				"</td>"+
				     	   				"<td nowrap><a href='../Mod_"+(i+1)+"/"+(i+1)+"_"+j+"_1.htm'  onMouseOver='self.status=" + kapname + ";return true' onMouseOut='self.status=" + leer + ";return true'>"+ arrayValue[i][j] +"</a><img src='../Uebung/Yes_.gif'></td>"+
					 			"</tr>"+				 
	 							"</table>";  				                          	  	
                      	  			}
                      	  			else
                      	  			{   		          
				  			text += "<table border='0' cellpadding='0' cellspacing='0' >"+
				         			"<tr>"+
				           				"<td><img src='Ftv2Blank.gif' width='16' height='22'><img src='Ftv2LastNode.gif' width='16'height='22'><a href='../Mod_"+(i+1)+"/"+(i+1)+"_"+j+"_1.htm' onMouseOver='self.status=" + kapname + ";return true' onMouseOut='self.status=" + leer + ";return true'>"+
				             					"<img src='Ftv2Doc.gif' border='0' width='24' height='22'></a>"+
				           				"</td>"+
				     	   				"<td nowrap><a href='../Mod_"+(i+1)+"/"+(i+1)+"_"+j+"_1.htm'  onMouseOver='self.status=" + kapname + ";return true' onMouseOut='self.status=" + leer + ";return true'>"+ arrayValue[i][j] +"</a></td>"+
					 			"</tr>"+				 
	 							"</table>"; 				    
	 					}
 					} 			 
		        		else 
		        		{
			  			if (parent.visitedPages[i][j][0] == true)                      	  
    			  			{                      	  	
							text += "<table border='0' cellpadding='0' cellspacing='0' >"+
 		                   				"<tr>"+
			             					"<td><img src='Ftv2VertLine.gif' width='16' height='22'><img src='Ftv2LastNode.gif' width='16'height='22'><a href='../Mod_"+(i+1)+"/"+(i+1)+"_"+j+"_1.htm' onMouseOver='self.status=" + kapname + ";return true' onMouseOut='self.status=" + leer + ";return true'>"+
			              						"<img src='Ftv2Doc.gif' border='0' width='24' height='22'></a>"+
			             					"</td>"+
			             					"<td nowrap><a href='../Mod_"+(i+1)+"/"+(i+1)+"_"+j+"_1.htm'  onMouseOver='self.status=" + kapname + ";return true' onMouseOut='self.status=" + leer + ";return true'>"+ arrayValue[i][j] +"</a><img src='../Uebung/Yes_.gif'></td>"+
 			           				"</tr>"+
 			          				"</table>";				                          	  	
                      	  			}
                      	  			else
                      	  			{  		           
		            				text += "<table border='0' cellpadding='0' cellspacing='0' >"+
 		                   				"<tr>"+
			             					"<td><img src='Ftv2VertLine.gif' width='16' height='22'><img src='Ftv2LastNode.gif' width='16'height='22'><a href='../Mod_"+(i+1)+"/"+(i+1)+"_"+j+"_1.htm' onMouseOver='self.status=" + kapname + ";return true' onMouseOut='self.status=" + leer + ";return true'>"+
			              						"<img src='Ftv2Doc.gif' border='0' width='24' height='22'></a>"+
			             					"</td>"+
			             					"<td nowrap><a href='../Mod_"+(i+1)+"/"+(i+1)+"_"+j+"_1.htm'  onMouseOver='self.status=" + kapname + ";return true' onMouseOut='self.status=" + leer + ";return true'>"+ arrayValue[i][j] +"</a></td>"+
 			           				"</tr>"+
 			          				"</table>"; 	
			   			} 			          
 		        		}
 		   		}  		     
 		   		else
 		   		{
 		   			kapname = '"zu Unterkapitel ' + statusValue[i][j] + '"';
 		   			
                      			if (i == anzahlKapitel-1)
                      			{
                      	  			if (parent.visitedPages[i][j][0] == true)                      	  
                      	  			{
				 			text += "<table border='0' cellpadding='0' cellspacing='0' >"+
								"<tr>"+
					  				"<td><img src='Ftv2Blank.gif' width='16' height='22'><img src='Ftv2Node.gif' width='16'height='22'><a href='../Mod_"+(i+1)+"/"+(i+1)+"_"+j+"_1.htm' onMouseOver='self.status=" + kapname + ";return true' onMouseOut='self.status=" + leer + ";return true'><img src='Ftv2Doc.gif' border='0' width='24' height='22'>"+
					   	 				"</a></td>"+
					  				"<td nowrap><a href='../Mod_"+(i+1)+"/"+(i+1)+"_"+j+"_1.htm'  onMouseOver='self.status=" + kapname + ";return true' onMouseOut='self.status=" + leer + ";return true'>"+ arrayValue[i][j] +"</a><img src='../Uebung/Yes_.gif'></td>"+
								"</tr>"+
 				       				"</table>"; 			                                	  
                      	  			}
                      	  			else
                      	  			{                      	  	
				 			text += "<table border='0' cellpadding='0' cellspacing='0' >"+
								"<tr>"+
					  				"<td><img src='Ftv2Blank.gif' width='16' height='22'><img src='Ftv2Node.gif' width='16'height='22'><a href='../Mod_"+(i+1)+"/"+(i+1)+"_"+j+"_1.htm' onMouseOver='self.status=" + kapname + ";return true' onMouseOut='self.status=" + leer + ";return true'><img src='Ftv2Doc.gif' border='0' width='24' height='22'>"+
					    					"</a></td>"+
					  				"<td nowrap><a href='../Mod_"+(i+1)+"/"+(i+1)+"_"+j+"_1.htm'  onMouseOver='self.status=" + kapname + ";return true' onMouseOut='self.status=" + leer + ";return true'>"+ arrayValue[i][j] +"</a></td>"+
								"</tr>"+
 				       				"</table>"; 			          
			  			} 				       
 		       			}
 		       			else
 		       			{ 		       		 		       
 		        			if (parent.visitedPages[i][j][0] == true)                      	  
						{                      	  	
							text += "<table border='0' cellpadding='0' cellspacing='0' >"+
 				  				"<tr>"+
				    					"<td><img src='Ftv2VertLine.gif' width='16' height='22'><img src='Ftv2Node.gif' width='16'height='22'><a href='../Mod_"+(i+1)+"/"+(i+1)+"_"+j+"_1.htm' onMouseOver='self.status=" + kapname + ";return true' onMouseOut='self.status=" + leer + ";return true'><img src='Ftv2Doc.gif' border='0' width='24' height='22'>"+
				     						"</a></td>"+
				    					"<td nowrap><a href='../Mod_"+(i+1)+"/"+(i+1)+"_"+j+"_1.htm'  onMouseOver='self.status=" + kapname + ";return true' onMouseOut='self.status=" + leer + ";return true'>"+ arrayValue[i][j] +"</a><img src='../Uebung/Yes_.gif'></td>"+
 				   				"</tr>"+
 				 				"</table>"; 				                          	  	
                      	  			}
                      	  			else
                      	  			{                      	  
 		          				text += "<table border='0' cellpadding='0' cellspacing='0' >"+
 				  				"<tr>"+
				    					"<td><img src='Ftv2VertLine.gif' width='16' height='22'><img src='Ftv2Node.gif' width='16'height='22'><a href='../Mod_"+(i+1)+"/"+(i+1)+"_"+j+"_1.htm' onMouseOver='self.status=" + kapname + ";return true' onMouseOut='self.status=" + leer + ";return true'><img src='Ftv2Doc.gif' border='0' width='24' height='22'>"+
				     						"</a></td>"+
				    					"<td nowrap><a href='../Mod_"+(i+1)+"/"+(i+1)+"_"+j+"_1.htm'  onMouseOver='self.status=" + kapname + ";return true' onMouseOut='self.status=" + leer + ";return true'>"+ arrayValue[i][j] +"</a></td>"+
 				   				"</tr>"+
 				 				"</table>"; 				    
 			  			}
 		        		}
                    		}
                	}       
     	   	}     	  
      	}           
      
      	
 			        
      	text += "<br><br>"; 			         	      
      	textBrowser = text;
      	browserLayer();      
}
    
    
    /* 
    Diese Funktion zwingt netscape 4 eine Scrollbar zu 
    erzeugen falls der Layer zu klein ist für die Darstellung
    */
    
function gibTabelle()
{                          
	return zeilenZaehler;                
}
    
    
    
 /* Die Funktion Browser ist für die Darstellung in verschiedene Browser zustandig*/

function browserLayer()
{
     	if (document.all)
     	{
        	document.all("inhalt").innerHTML = textBrowser;
     	}
      	else if (document.getElementById)
      	{
		document.getElementById("inhalt").innerHTML = textBrowser;
      	}
      	else if (document.layers)
      	{	                     		      		
      		document.height = 400 + (zeilenZaehler * 23);
	   
	   	with (document.layers["inhalt"].document)
		{
	   		open();
	   		clear();
	   		write(textBrowser);
   	   		close();
		}
   	}       
}