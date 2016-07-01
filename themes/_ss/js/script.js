(function($) {

var szcExec = (function() {

	return {
    
		opts: {
            crtClass: 'current',
            btnID: '.top_btn',
            all: 'html, body',
            animEnd: 'webkitAnimationEnd MSAnimationEnd oanimationend animationend', //mozAnimationEnd
            transitEnd: 'webkitTransitionEnd MSTransitionEnd otransitionend transitionend', //mozTransitionEnd 
        },
        
		addCurrent: function() {
        	var url = window.location;
            $('.main-navigation a[href="'+url+'"]').addClass(this.opts.crtClass);
        },
        
        
        scrollFunc: function() {
            var t = this,
                tb = $(t.opts.btnID);
            
            tb.css('display','none').on('click', function() {
                $(t.opts.all).animate({ scrollTop:0 }, 1200, 'easeOutExpo');
            });

            $(document).scroll(function(){

                if($(this).scrollTop() < 200)
                    tb.fadeOut(200);
                else 
                    tb.fadeIn(300);
            });
            
        },
        
        
        slideMenu: function() {
        	$('.tgl-on').on('click', function(){
            	var $nav = $(this).find('ul');
                
            	$nav.slideToggle(300);
                
//            	if($nav.is(':hidden')) {
//                	$nav.slideDown(300);
//                }
//                else {
//                	$nav.slideUp(300);
//                }
            });	
        },
                
        
        isAgent: function(user) {
            if( navigator.userAgent.indexOf(user) > 0 ) return true;
        },
        
        isLocal: function() {
        	if( location.port == 8002 ) return true;
        },
        
        isSpTab: function() {
        	var arr = ['iPhone','iPod','Mobile ','Mobile;','Windows Phone','IEMobile', 'iPad','Kindle','Sony Tablet','Nexus 7','Android Tablet'];
        	
            var th = this;
            var bool = false;
            
            arr.forEach(function(e, i, a) { //e:要素 i:index a:配列オブジェクト
            	if(th.isAgent(e)) {
                	bool = true;
                    return; //Escape Roop
                }
            });
            
            return bool;
        },
        
        
        addAnim: function() {
        	var th = this;
            
            //Set Size to A tag
        	function setHeightToA() {
            	//var $index = $('.bl-belt article.index, .rank article.index');
                var $index = $('article.index');

                $index.each(function(){
                                        
                    //$(this).find('img').load(function(){
                        var $a = $(this)/*.parent('article.index')*/;
                        var ah = $a.height();
                        //$a.find('.entry-meta').text(ah);
                        $a.find('.cover-bl > a').css({height:ah});
                    //});
            	});
			}

            $(window).on({
            	'load': setHeightToA,
            	'resize': setHeightToA,
            });
            
            
            //SET Number to Runking
            $('.rank section').each(function(){ 
            	var len = $(this).find('article.index').length;
                var n = 0;
                
                while(n < len) {
                	$(this).find('article.index').eq(n).children('span.rank-num').text(n+1);
                    n++;
                }
            });
            
        },
        
        searchAnim: function() {
        	var $s = $('.site-header .fa-search');
            var $form = $('.search-form');
            
            $s.on('click', function(e){
            	e.preventDefault();
            	//$('h2').text($form.offset().top);
                //$('h3').text($('.site-header').offset().top);
                
            	if($form.offset().top == $('.site-header').offset().top) {/* *** */
            		$form.animate({ top:57 }, 900, 'easeOutElastic',function(){ //easeOutElastic easeOutBack
                    	$(this).find('input[type="search"]').focus();
                    });
                } else {
                	$form.animate({ top:0 }, 'normal', 'easeInBack');
                }

            });
            
            $('#page').on('click', function(e){
            	if(! $(e.target).hasClass('search-field')) {
            		if($form.offset().top != $('.site-header').offset().top)
                		$form.animate({ top:0 }, 'normal', 'easeInBack');
                }
            });
		},
        
        
        checkWidth: function() {
    		$(window).on({
            	'load': function(){
                    $('h2').text($(window).width());
                },
                'resize': function(){
                    $('h2').text($(window).width());
				},
            });
        },
        
        scrFunc: function() {
        	//$('h3').text($(window).scrollTop());
        	
            //console.log('abcde');
            
            $(window).scroll(function() {
            	if($(window).scrollTop() <= 100) {
                	//$('.wrap-head').removeClass('changeColor').addClass('returnColor');
                    //$('.wrap-head').animate({height:'5em'}, 200, 'linear');
                    /*
                    $('.site-header').css({backgroundColor:'transparent'});
                    $('.main-navigation').css({backgroundColor:'transparent'});
                    */
                    $('.site-header').animate({top:0}, 500, 'easeOutBack', function(){
                    	$(this).queue([]).stop();
                    });
                }
                if($(window).scrollTop() >= 400) {
                    //$('.wrap-head').removeClass('returnColor').addClass('changeColor');
                    //$('.main-navigation').css({top:'20px', left:'500px', position:'fixed', display:'inline-block'});
                    /*
                    $('.site-header').css({backgroundColor:'rgba(255,255,255,0.88)'});
                    $('.main-navigation').css({backgroundColor:'rgba(22,36,39,0.95)'});
                    */
                    //$('.site-header').css({top:'-300px'});
                    $('.site-header').animate({top:'-150px'}, 500, 'easeInBack', function(){
                    	$(this).queue([]).stop();
                    });
                }
            });
		},
        
        settingSize: function(){
        	
            var ww = $(window).width();
            var hh = $(window).height();
            var aspect = hh - (ww/3)*2; //over Aspect 3:2
            
            var vw = $('#page').width();
            vw = (vw - ww)/2;
            
            if(aspect > -115) { //over Aspect > set height, org:-55
                $('.top #mainMv').css({height:hh,width:'auto'}); 
            }
            else {
            	$('.top #mainMv').css({width:'105%',height:'auto'});
            }
            
            var $ctr = $('.ctr');
            var cw = $ctr.width();
            var ch = $ctr.height();
            
            
            $ctr.css({left:ww/2-(cw/2), top:hh/2-(ch/2)-30});
            
            
            
            /* --- */
			$('#filt').css({height:hh, width:ww});
 
            var ttw = $('.sTitle').width();
            $('.sTitle').css({left:(ww-ttw)/2, top:hh/2-86});
                        
            var nvw = $('.top-navi').width();
            $('.top-navi').css({left:(ww-nvw)/2, top:hh/2+10});
            //$('h1').text(ww + ':' + hh + ':' + aspect);
            
            var nvb = $('.topmBtn').width();
            $('.topmBtn').css({left:(ww-nvb)/2+9, top:hh/2+35});

        },
        
        setFilterSize: function(){
        	var v = $('#mainMv')
            
            $('.filter').css({width:v.width(), height:v.height()});
            
        },
        
        contentPosi: function() {
       		
            //SetHeight to Content
//            function setHeightContent() {
//            	var h = $('.cal').height();
//                
//                if($('body').hasClass('home') || $('body').hasClass('category')) {
//                	$('#content').css({top:h+50}); /* site-header Height *** */
//                }
//            }
//              
//       		$(window).on({
//            	'load': setHeightContent,
//                'resize': setHeightContent,
//            });
            
            
            //Video And Loader ---------------------
            if($('body').hasClass('home') || $('#page').hasClass('about')) {
                var video = document.getElementById('mainMv');
                //var video = $('#mainMv').get(0);
                
                video.addEventListener('playing', function(){ //This is Not In window.load()
                    //console.log(video.currentTime);
                    $('.cal').find('img.agif').fadeOut(700, 'linear', function(){
                    	setTimeout(function(){
                        	$('.ctr').fadeIn(2500);
                        }, 1500);
                    });
                    
                }, false);
            
            
            	$(window).on('load', function(){
                    video.play();                    
            	});
            }
           
        },
        
        scrEve: function() {

        	var $window = $(window);
            var wh = $(window).height();
            var th = this;
            
            $sprite = $('.fix .wrap-cal, .member .wrap-cal');
            $title = $('h1.entry-t');
            //var t = $title.offset().top;
            
            $(window).scroll(function() {
                    
            	// '50%' + -($window.scrollTop() / 20) + 'px'
                
                var yPos = $sprite.data('y') - ($window.scrollTop() / $sprite.data('speed')); //data-y: wrap-calのTOP位置 
                    
                
                //$('h1').text(t);
                                
                var yPos2 = $title.data('y') - ($window.scrollTop() / $title.data('speed'));
                
//                $section = $('.fix section');
//                var t = $section.position().top;
//
//                var yPos3 = ($window.scrollTop() / ($window.scrollTop()-105));
//                $('h1').text(yPos3);
                
                if($window.scrollTop() >= 0) { //scroll:0以下になるとガタつくので
                    $sprite.css('top', yPos);
                    $title.css('top', yPos2); 
                    
                	//$section.css({marginTop:yPos3 + 'px'});
                }
                
       	 	});
        },
        
        historyLink: function() {
        	$('.ctr .fa').on('click', function(){
            	
                $('.ctr').fadeOut(500, function(){
                    $('body').fadeOut(1300, 'linear', function(){
                        $(this).load('/about/', function(){
                            
                            $('#page.about').hide();
                            
                            $(this).removeClass('home').fadeIn(700, function(){
                                $('#page.about').fadeIn(1000);
                            
                            });
                        });

    //                    $.get("../page.php", function(data){
    //                      $("#page").text(data).fadeIn(200);
    //                   });

                        //$('#page.about').fadeIn(300);
                    
                    });
                });
                
                history.pushState('', 'About', '/about/'); //詳細はbookにあり HTML5のHistoryAPIを使用してリロードなしのページ遷移が出来る
                
                return false;
            });
        },
        
        
        typeWriter: function() {
        	var $h = $('h1.entry-t');
            
            var str = $h.text();
            var len = str.length;
            var h = $h.css('font-size');
            var i = 0;
            var ss = '';
            
            $h.css({display:'inline-block', lineHeight:'2em'});
            
            //$h.after('<span class="cursol">&nbsp;</span>');
            $('.cursol').css({display:'inline-block', marginLeft:'10px', width:'3px',fontSize:h, background:'#111'});
            
            var timeLag = 400;
            
            setInterval( function(){ //cursolの点滅		
                $('.cursol').hide(50, function(){
                    var ct = $(this);
                
                    setTimeout(function(){
                        ct.show();
                        ct.queue([]).stop();
                    }, timeLag);
                    
                });
            }, timeLag);
            
            $h.text('');
            //$h.text('abc');
            
            //while(i < len) {
            
            function t(i) {
            	
                setTimeout(function(){
                    
                    ss += str[i];
                        
                    $h.text(ss);
                    i++;
                       
                    if(i < len) {
                    	t(i);
                    }
                    else {
                    	//clearInterval();
                    }
                
                }, 120);
            	
                //i++;     
            }
            
            setTimeout(function(){ //初回表示の時用　この時にも少しタイミングをずらす
            	t(i);
            }, 1500);
            
            //$('p').html(str);
            //this.put('p', h);
            
        },
        
        put: function(tag, argText) {
            $(tag).text(argText);
            console.log("CheckText is『 %s 』" , argText);
        },
        
        aaa: function() {
        	$('h1').text('aaa');
        },
        
        
    } //return

})();


$(function(e){ //ready
    
    //szcExec.addCurrent(); 
    //szcExec.scrollFunc();

    //szcExec.slideMenu();
    
    //szcExec.scrEve();
    //szcExec.addAnim();
    //szcExec.searchAnim();
    //szcExec.contentPosi();
    
    szcExec.scrFunc();
    //szcExec.setFilterSize();
    szcExec.contentPosi();
    szcExec.scrEve();
    szcExec.settingSize();
    szcExec.historyLink();
    szcExec.typeWriter();
    //szcExec.aaa();
    //if(szcExec.isLocal()) szcExec.checkWidth();
});


/* Easing */
$.easing['jswing'] = $.easing['swing'];

$.extend( $.easing,
{
	def: 'easeOutQuad',
	swing: function (x, t, b, c, d) {
		//alert($.easing.default);
		return $.easing[$.easing.def](x, t, b, c, d);
	},
	easeInQuad: function (x, t, b, c, d) {
		return c*(t/=d)*t + b;
	},
	easeOutQuad: function (x, t, b, c, d) {
		return -c *(t/=d)*(t-2) + b;
	},
	easeInOutQuad: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t + b;
		return -c/2 * ((--t)*(t-2) - 1) + b;
	},
	easeInCubic: function (x, t, b, c, d) {
		return c*(t/=d)*t*t + b;
	},
	easeOutCubic: function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t + 1) + b;
	},
	easeInOutCubic: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t + b;
		return c/2*((t-=2)*t*t + 2) + b;
	},
	easeInQuart: function (x, t, b, c, d) {
		return c*(t/=d)*t*t*t + b;
	},
	easeOutQuart: function (x, t, b, c, d) {
		return -c * ((t=t/d-1)*t*t*t - 1) + b;
	},
	easeInOutQuart: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t*t + b;
		return -c/2 * ((t-=2)*t*t*t - 2) + b;
	},
	easeInQuint: function (x, t, b, c, d) {
		return c*(t/=d)*t*t*t*t + b;
	},
	easeOutQuint: function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t*t*t + 1) + b;
	},
	easeInOutQuint: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t*t*t + b;
		return c/2*((t-=2)*t*t*t*t + 2) + b;
	},
	easeInSine: function (x, t, b, c, d) {
		return -c * Math.cos(t/d * (Math.PI/2)) + c + b;
	},
	easeOutSine: function (x, t, b, c, d) {
		return c * Math.sin(t/d * (Math.PI/2)) + b;
	},
	easeInOutSine: function (x, t, b, c, d) {
		return -c/2 * (Math.cos(Math.PI*t/d) - 1) + b;
	},
	easeInExpo: function (x, t, b, c, d) {
		return (t==0) ? b : c * Math.pow(2, 10 * (t/d - 1)) + b;
	},
	easeOutExpo: function (x, t, b, c, d) {
		return (t==d) ? b+c : c * (-Math.pow(2, -10 * t/d) + 1) + b;
	},
	easeInOutExpo: function (x, t, b, c, d) {
		if (t==0) return b;
		if (t==d) return b+c;
		if ((t/=d/2) < 1) return c/2 * Math.pow(2, 10 * (t - 1)) + b;
		return c/2 * (-Math.pow(2, -10 * --t) + 2) + b;
	},
	easeInCirc: function (x, t, b, c, d) {
		return -c * (Math.sqrt(1 - (t/=d)*t) - 1) + b;
	},
	easeOutCirc: function (x, t, b, c, d) {
		return c * Math.sqrt(1 - (t=t/d-1)*t) + b;
	},
	easeInOutCirc: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return -c/2 * (Math.sqrt(1 - t*t) - 1) + b;
		return c/2 * (Math.sqrt(1 - (t-=2)*t) + 1) + b;
	},
	easeInElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		return -(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
	},
	easeOutElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		return a*Math.pow(2,-10*t) * Math.sin( (t*d-s)*(2*Math.PI)/p ) + c + b;
	},
	easeInOutElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d/2)==2) return b+c;  if (!p) p=d*(.3*1.5);
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		if (t < 1) return -.5*(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
		return a*Math.pow(2,-10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )*.5 + c + b;
	},
	easeInBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		return c*(t/=d)*t*((s+1)*t - s) + b;
	},
	easeOutBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		return c*((t=t/d-1)*t*((s+1)*t + s) + 1) + b;
	},
	easeInOutBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158; 
		if ((t/=d/2) < 1) return c/2*(t*t*(((s*=(1.525))+1)*t - s)) + b;
		return c/2*((t-=2)*t*(((s*=(1.525))+1)*t + s) + 2) + b;
	},
	easeInBounce: function (x, t, b, c, d) {
		return c - $.easing.easeOutBounce (x, d-t, 0, c, d) + b;
	},
	easeOutBounce: function (x, t, b, c, d) {
		if ((t/=d) < (1/2.75)) {
			return c*(7.5625*t*t) + b;
		} else if (t < (2/2.75)) {
			return c*(7.5625*(t-=(1.5/2.75))*t + .75) + b;
		} else if (t < (2.5/2.75)) {
			return c*(7.5625*(t-=(2.25/2.75))*t + .9375) + b;
		} else {
			return c*(7.5625*(t-=(2.625/2.75))*t + .984375) + b;
		}
	},
	easeInOutBounce: function (x, t, b, c, d) {
		if (t < d/2) return $.easing.easeInBounce (x, t*2, 0, c, d) * .5 + b;
		return $.easing.easeOutBounce (x, t*2-d, 0, c, d) * .5 + c*.5 + b;
	}
});

})(jQuery);
