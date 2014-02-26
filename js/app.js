/**
 * app.js
 *
 * The Javascript!
 */
$(document).ready(function(){

	//NProgress.configure({ trickle: false });

	//showProject($('.projects .project:first-child'));

	var $mainContent = $("#container"),
        siteUrl = "http://" + top.location.host.toString(),
        url = ''; 


    $('#content').hide().fadeIn(500);

	//stroll.bind( '#content ul', { live: true } );

	//on animation end
	//$('#yourElement').one('webkitAnimationEnd mozAnimationEnd oAnimationEnd animationEnd', doSomething());


	/*
	*	PUSH STATE EVENTS
	*/

	/* check for support before we move ahead */
	if (typeof history.pushState !== "undefined") {
	    var historyCount = 0;

		$(document).on("click", 'a[href*="' + siteUrl + '"], a[href*="#"]', function(e) {
		    //e.preventDefault();

		    //location.hash = this.pathname;
		    var href = $(this).attr("href");

		    if(href != '#'){
		    	console.log('load page');
				loadLink(href);
				history.pushState(null, null, href);
		    }

		    return false;
		});

		// $(document).on('click', '.view-case', function(e){
			
		// 	e.preventDefault();

		// 	var href= $(this).attr("href");

		// 	loadLink(href);
		// 	history.pushState(null, null, href);

	 //        return false;
		// });

	    window.onpopstate = function(){
	        if(historyCount) {
	            loadLink(document.location);
	        }
	        historyCount = historyCount+1;
	    };

	}

	$(document).on('click', '.acc-item--title', function(e){
		e.preventDefault();

		showProject($(this));

		return false;
	});

});

function showProject($this){
	
	var parent = $this.closest('.acc-item');
	var easing = 'linear';
	var dur = 300;

	parent.addClass('visible');
	parent.siblings().removeClass('visible');

	parent.find('.acc-item--preview').slideDown(dur, easing);
	parent.siblings().find('.acc-item--preview').slideUp(dur, easing);

}

/*$(window).scroll(function(){
	$('.acc-item').each(function(i,v){
		console.log(i,v);
		if($(this).inView()){
			$(this).addClass('load');
		}
		//$(this).inView();
	});
    //alert($("#obj").inView());
});*/


/*$.fn.inView = function(){
    //Window Object
    var win = $(window);
    //Object to Check
    obj = $(this);
    //the top Scroll Position in the page
    var scrollPosition = win.scrollTop();
    //the end of the visible area in the page, starting from the scroll position
    var visibleArea = win.scrollTop() + win.height();
    //the end of the object to check
    var objEndPos = (obj.offset().top + obj.outerHeight());
    return(visibleArea >= objEndPos && scrollPosition <= objEndPos ? true : false)
};*/

/*$(window).scroll(function() {
	$('.grow li').each(function(){
	var imagePos = $(this).offset().top;

	var topOfWindow = $(window).scrollTop();
		if (imagePos < topOfWindow+400) {
			$(this).addClass("past");
		}
	});
});*/

function loadLink(href){

	NProgress.start();

	var section = $('#content');
	var overlay = $('.overlay');
	var speed = 300;


	//section.hide();

    //section.fadeTo('fast', 0.2);

    $.ajax({
        url: href,
        success: function(data) {

        	//$('.site-header').addClass('site-header--small');
			

			overlay.fadeIn(speed, function(){

				section.hide().html(data).show();
			});

            // update the page title
            var title = section.find('h1').text();
            $('head').find('title').text(title);


            //overlay.fadeOut(speed);
            NProgress.done();

            overlay.fadeOut(speed);

        },
        error: function(a,b,c){
            $('#primary').fadeOut('fast', function(){
                $(this).html(data).fadeTo(speed, 1);
            });
            // update the page title
            var title = $('#primary').find('h1').text();
            $('head').find('title').text(title);
            NProgress.done();
        }
    });

}