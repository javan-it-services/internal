/*
The Ultimate Navigation with CSS level 3, Mon Dec 1st, 2008
Copyright (C) 2008 Bogdan Pop of WebRaptor (http://www.bogdanpop.info, http://www.webraptor.eu)
Published by Freelancer Magazine (http://www.freelancermagazine.com)
Special thanks to Taiyab Raja of 6 Creations (http://www.6creations.com)
Special thanks to John Cottone of Tone Media, LLC

Released under Creative Commons Attribution 3.0 (http://creativecommons.org/licenses/by/3.0)
If you modify these source codes and use them in your own projects you must not modify or remove the above credits. However, you may add your own below this line.
*/
navHover = function() {
	var lis = document.getElementById("navmenu").getElementsByTagName("LI");
	for (var i=0; i<lis.length; i++) {
		lis[i].onmouseover=function() {
			this.className+=" iehover";
		}
		lis[i].onmouseout=function() {
			this.className=this.className.replace(new RegExp(" iehover\\b"), "");
		}
	}
}
if (window.attachEvent) window.attachEvent("onload", navHover);

function move_box()
{
    var offset = 0;
    var element = document.getElementById('menubar');

    element.style.top = (document.documentElement.scrollTop + offset) + 'px';
}