if (window.innerWidth && window.innerWidth <= 480) {
	$(document).ready(function(){
		$('nav').addClass('hide');
		$('#head').prepend('<div id="leftButton"><a href="javascript:toggleMenu();">Menu</a></div>');
	});
	function toggleMenu() {
		$('nav').toggleClass('hide');
		$('#leftButton a').toggleClass('pressed');
	}
}
$(document).ready(function(){
	loadPage();
});
function loadPage(url) {
	if (url == undefined) {
		$('#container').load('index.php nav ul', hijackLinks);
	} else {
		$('#container').load(url + ' #content', hijackLinks);
	}
}
function hijackLinks() {
	$('#container a').click(function(e){
		e.preventDefault();
		loadPage(e.target.href);
	});
}

