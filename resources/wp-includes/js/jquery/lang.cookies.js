function setCookie(cname, cvalue, exdays) {

	Cookies.remove(cname);
	Cookies.remove(cname, { path: '/', domain: 'slotsfanatics.com' });
	Cookies.remove(cname, { path: '/', domain: 'www.slotsfanatics.com' });
	
    var expires;
    if (exdays === 0) {
        expires = '';
    } else {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        expires = "expires=" + d.toGMTString();
    }
    var domain2 = (typeof domain2 === "undefined") ? '' : "; domain="+domain2;
    document.cookie = cname + "=" + cvalue + "; " + expires + "path=/" + domain2;
}


function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i].trim();
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}


//Using jQuery
$(document).ready(function() {
    $(document).on('click','#flag-en', function() {
        setCookie('googtrans', '/en/en', 0, '.slotsfanatics.com');
        location.reload();
    });
	
	$(document).on('click','#flag-sv', function() {
        setCookie('googtrans', '/en/sv', 0, '.slotsfanatics.com');
        location.reload();
    });
	
	$(document).on('click','#flag-fi', function() {
        setCookie('googtrans', '/en/fi', 0, '.slotsfanatics.com');
        location.reload();
    });
	
	$(document).on('click','#flag-no', function() {
        setCookie('googtrans', '/en/no', 0, '.slotsfanatics.com');
        location.reload();
    });
	
	$(document).on('click','#flag-nl', function() {
        setCookie('googtrans', '/en/nl', 0, '.slotsfanatics.com');
        location.reload();
    });
	
	$(document).on('click','#flag-de', function() {
        setCookie('googtrans', '/en/de', 0, '.slotsfanatics.com');
        location.reload();
    });
   
    
});