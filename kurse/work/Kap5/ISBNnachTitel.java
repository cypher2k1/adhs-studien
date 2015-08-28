import java.io.*;
import java.net.*;

public class ISBNnachTitel {

	public static void main (String args []) {


		URL				url;
		String			prefix = "http://www.amazon.de/exec/obidos/ASIN/";
		String			content = "";

		try {

			url  = new URL (prefix + args [0]);

			int			len		= 0;
			byte[]		b		= new byte [1000];
			InputStream in		= url.openStream ();

			while ((len = in.read (b)) != -1)
				content = content + new String (b);
			in.close ();

		} catch (Exception e) {

			System.out.println (e);
		}



		if (! content.equals ("")) {

			String	marker1	= "<font face=verdana,arial,helvetica color=#CC6600>";
			String	marker2	= "</font>";
			int		start	= content.indexOf (marker1);
			int		ende	= content.length () -1;

			if (start != -1) {

				String	content2 = content.substring (start + marker1.length () -1, ende);
				int		ende2	 = content2.indexOf (marker2);

				if (ende2 != -1) {

					content2 = content2.substring (1, ende2);

					System.out.println (content2);
				}
			}
		}
	}
}
