function goPage(Ziel) {
    document.location=Ziel
}

var HWind=null;

   function Autor(){
       if (HWind!=null)
          if (HWind.closed==false)
             HWind.close()
             
      if (IE5 || IE6) HWind=window.open("../Autor/Autor.htm","Autor","resizable=no,width=600,height=400,left=100,top=100,scrollbars=no,dependent=yes");
         else if (N4) HWind=window.open("../Autor/Autor.htm","Autor","resizable=no,width=600,height=400,screenX=100,screenY=100,scrollbars=no,dependent=yes");
         else if (N6) HWind=window.open("../Autor/Autor.htm","Autor","resizable=no,width=600,height=400,screenX=100,screenY=100,scrollbars=no,dependent=yes");
         else HWind=window.open("../Autor/Autor.htm","Autor","resizable=no,width=600,height=400,left=100,top=100,scrollbars=no,dependent=yes");
               
         HWind.focus();
   }