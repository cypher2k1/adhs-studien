var indexURL = window.location.href; //Hier wird der Aufruf der Seite abgefragt; hieraus werden später die Parameter der Plattform geparst
var AICC_SID;
var AICC_URL;
// Parsing von Session_ID und URL der Plattform:
var i = indexURL.indexOf("aicc_sid=");
var aiccExist=false;
if (i==-1){
	//alert("NonAicc");
	aiccExist=false
}
else {
	aiccExist=true;
	//alert("AICC vorhanden!");
}

var j = indexURL.indexOf("&aicc_url=");
AICC_SID=indexURL.substring(i+9,j);
AICC_URL=indexURL.substring(j+10);

// Escaping der URL:

AICC_URL=unescape(AICC_URL);


// Aufruf des Applets in Kwerte mit Parametern SID und URL:
function getParamApplet(){
	var GetParam= frames[0].document.aicc.CallFunction("getParam"," ");
	return(GetParam);
}

// Zurückschreiben der Parameter mit Applet
function putParamApplet(lesson_location,lesson_status,time, score){
	alert (lesson_location+"\n"+lesson_status+"\n"+time+"\n"+score+"\n"+actualScoreArray.join("_"));
	var PutParam=frames[0].document.aicc.CallFunction("putParam","Command=putParam&Version=3.0&Session_id="+AICC_SID+"&AICC_Data=[core]%0D%0Alesson_location+%3D+"+lesson_location+"%0D%0Alesson_status%3D"+lesson_status+"%0D%0Ascore%3D"+score+"%0D%0Atime%3D"+time+"[CORE_LESSON]%0D%0A"+actualScoreArray.join("_"));
	return(PutParam);
}

// Endmeldung an CMI
function exitAU(){
	frames[0].document.aicc.CallFunction("exitAU","Any String Value");
}

function saveAICC(){
	putParamApplet(actualPage,setStatus(), formatTime() ,simpleScore());
}