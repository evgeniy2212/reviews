(function($) {
    window.onload = function() {
        var startHomeHeight = 0;
        // var containerMainHeight = $('.main').outerHeight();
        var containerMainHeight = $('.home-content-place').outerHeight();
        console.log('containerMainHeight: ', containerMainHeight);
        console.log('document.getElementById(audio): ', document.getElementById('audio'));
        // consol.log('slider: ', slider);
        // var myAudio = $("#audio")[0];
        // myAudio.play();
        var loaded = sessionStorage.getItem('loaded');
        sessionStorage.setItem('loaded', true);
        // $('.home *').show();
        // if(loaded !== 'true') {
        sessionStorage.setItem('slider_enable', false);
            $('.nav-gradient').addClass('nav-first-menu-showing');
            $('.navigate li a').addClass('first-menu-showing');
            for(let i = 0; i <= 2; i++){
                setTimeout(function(){
                    // if(i >= 1){
                    //     setTimeout(function(){
                    //         $('.nav-gradient').removeClass('nav-first-menu-showing');
                    //     }, 1000);
                    // }
                    $('.navigate li a').each(function(i)
                    {
                        $(this).delay(250 * i).fadeTo( 200, 1 );
                        $(this).delay(200 * i).not(".menu-active a").fadeTo( 100, 0 );
                    });
                }, 2250 * i);
            }
            setTimeout(function(){
                $('.nav-gradient').removeClass('nav-first-menu-showing');
                if ($(window).width() < 860) {
                    $('.navigate li a').each(function(i)
                    {
                        $(this).delay(250 * i).fadeTo( 200, 1 );
                    });
                }
            }, 7500);
            setTimeout(function(){
                $('.navigate li a').removeClass('first-menu-showing');
            }, 22500);

            // setTimeout(function(){
            //     $('.home .home-main-content').fadeTo( 1000, 1 );
            // }, 4000);

            setTimeout(function(){
                $('.home .home-title').each(function(index){
                    let $this = $(this);
                    setTimeout(function(){
                        $this.delay(750 * index)
                            .fadeTo( 250, 1 )
                            .fadeTo( 250, 0 )
                            .fadeTo( 250, 1 )
                            .fadeTo( 250, 0 )
                            .fadeTo( 250, 1 )
                            .fadeTo( 250, 0 )
                            .fadeTo( 250, 1 );
                    }, 31000 * index);
                });
            }, 7500);

            setTimeout(function(){
                let mainContentDelay = 0;
                $('.home-main-content').each(function(index) {
                    let item = $(this);
                    $("#audio")[0].play();
                    setTimeout(function() {
                        $("#audio")[0].play();
                        item.parent().fadeTo( 250, 1 );
                        item.fadeTo( 250, 1 );
                        item.animate_Text();
                        if ($('.home').height() > $('.home-content-place').height()) {
                            console.log('home-main-content down');
                            animateContent('down');
                        }
                    }, mainContentDelay);
                    mainContentDelay = (item.text().length * 3) + mainContentDelay;
                });
            }, 9500);

            setTimeout(function(){
                startHomeHeight = $('.home').height();
                let heightIndex = 0;
                console.log('start Home', $('.home').height());
                $('.home-point img').each(function(index){
                    // console.log('img getBoundingClientRect: ', $(this).getBoundingClientRect());
                    // console.log('img position: ', $(this).position().top);
                    // animateContent('down');
                    let $this = $(this);
                    $(this).delay(250 * (index + 1)).fadeTo( 200, 1 );
                    // console.log('home.point img: ', $this.offset());
                    setTimeout(function(){
                        // let isElementInView = Utils.isElementInView($(this), false);
                        // console.log('home-point img down');
                        // console.log('home-point img isElementInView: ', $this.offset().top);
                        // console.log('container: ', $('.container').outerHeight());
                        // console.log('home-point img addingHeight: ', $('.home-point').height() * index + startHomeHeight);
                        // console.log('home addingHeight: ', $('.home').height());
                        // console.log('home-content-place addingHeight: ', $('.home-content-place').height());
                        // if (($('.home-point').height() * index + startHomeHeight) > $('.home-content-place').height()) {
                        if (($('.home-point').height() * index + startHomeHeight) > containerMainHeight) {
                            ++heightIndex;
                            // console.log('heightIndex img: ', heightIndex);
                            // console.log('addingHeight img: ', $('.home-point').height() * heightIndex);
                            animateContent('down', (50 * heightIndex), 200);
                            // alert();
                        }
                        // animateContent('down', $this.offset().top, 200);
                    }, 250 * (index + 1));
                });
                // animateContent('up');
            }, 12000);
            setTimeout(function() {
                // if ($('.home').height() > $('.home-content-place').height()) {
                if ($('.home').height() > containerMainHeight) {
                    // console.log('home height: ', $('.home').height());
                    // console.log('home-content-place: ', $('.home-content-place').height());
                    console.log('img up startHomeHeight', startHomeHeight + $('.home-point').height());
                    animateContent('up', ($('.home-point').height() + 50), 100);
                }
                // }
            }, 15300);
            setTimeout(function(){
                // var startHomePointTitle = $( ".home-point img" ).first().position().top;
                // console.log('title startHomeHeight: ', $( ".home-point img" ).first().position().top);
                console.log('title startHomeHeight: ', startHomeHeight);
                let heightIndex = 0;
                $('.home .home-point-title').each(function(index){
                    // if ($('.home').height() > $('.home-content-place').height()) {
                    //     console.log('home-point-title down');
                    //     animateContent('down');
                    // }
                    // console.log('home-point-title: ', ($('.home-point-title').height() * index + startHomeHeight));
                    // console.log('home-content-place: ', containerMainHeight);

                    setTimeout(function(){
                        if (($('.home-point').height() * index + startHomeHeight + 20) > containerMainHeight) {

                            let degree = ($('.home-point').outerHeight() * heightIndex) + startHomeHeight + 20;
                            console.log('degree title: ', degree);
                            console.log('heightIndex title: ', heightIndex);
                            console.log('home-point-title', $('.home-point').height());
                            animateContent('down', (degree), 100);
                            ++heightIndex;
                        }
                    }, 1250 * index);
                    if(index > 0){
                        $(this).delay(1250 * index)
                            .fadeTo( 175, 1 )
                            .fadeTo( 175, 0 )
                            .fadeTo( 175, 1 )
                            .fadeTo( 175, 0 )
                            .fadeTo( 175, 1 );
                    } else {
                        $(this).delay(1250 * index)
                            // .fadeTo( 500, 1 )
                            // .fadeTo( 500, 0 )
                            // .fadeTo( 500, 1 )
                            // .fadeTo( 500, 0 )
                            .fadeTo( 175, 1 )
                            .fadeTo( 175, 0 )
                            .fadeTo( 175, 1 )
                            .fadeTo( 175, 0 )
                            .fadeTo( 175, 1 );
                    }
                });
            }, 15500);

            setTimeout(function(){
                if ($('.home').height() > containerMainHeight) {
                    // console.log('home height: ', $('.home').height());
                    // console.log('home-content-place: ', $('.home-content-place').height());
                    animateContent('up', );
                }
                console.log('Home points: ', $('.home-point'));
                let delay = 0;
                let textHeightDegree = startHomeHeight;
                let homePointIndex = 0;
                $('.home-point-show').each(function(index) {
                    let item = $(this);
                    $("#audio")[0].play();
                    setTimeout(function() {
                        $("#audio")[0].play();
                        item.parent().fadeTo( 200, 1 );
                        item.fadeTo( 150, 1 );
                        item.animate_Text();
                        // console.log('Home point offset' + index + ': ', $($('.home-point')[homePointIndex]).offset().top);
                        // console.log('Home point position' + index + ': ', $($('.home-point')[homePointIndex]).position());
                        console.log('item parent height: ', item.parent().height());
                        if (($('.home').height() - startHomeHeight) > containerMainHeight) {
                            if(index < 10 || index > 13 && index <= 16){
                                textHeightDegree = (item.parent().height()) + textHeightDegree;
                            } else {
                                textHeightDegree = (item.height()) + textHeightDegree + 50;
                            }
                            // textHeightDegree = (item.parent().height()) + textHeightDegree;
                            console.log('item textHeightDegree ' + index + ' : ', textHeightDegree);
                            console.log('item containerMainHeight: ', containerMainHeight);
                            console.log('index: ', index);
                            animateContent('down', (textHeightDegree), 50)
                            // if(index >= 10){
                            //     // console.log('home-point-show down index >= 10');
                            //     // console.log('item.outerHeight() + 70', item.outerHeight() + 70);
                            //     animateContent('down', (textHeightDegree), 150)
                            // } else if(index <=1){
                            //
                            // } else {
                            //     // console.log('home-point-show down');
                            //     // console.log('item.outerHeight() + 70: ', containerMainHeight + item.outerHeight() + 70);
                            //     //todo home - main content it will be max down
                            //     animateContent('down', (textHeightDegree), 150);
                            // }
                        }
                    }, delay);
                    // if(index < 10 && index > 13){
                    //     homePointIndex++;
                    // }
                    delay = (item.text().length * 2) + delay;
                    // console.log('text item.outerHeight(): ', item.outerHeight());
                });
                setTimeout(function() {
                    if ($('.home').height() > containerMainHeight) {
                        console.log('after home-point-show up');
                        animateContent('up');
                    }
                }, delay + 2000);
                setTimeout(function() {
                    // if(localStorage.getItem('hideAlert') == 'false'){
                        $("#instructionModal").modal('show');
                        sessionStorage.setItem('slider_enable', true);
                    // }
                }, delay + 2500);
            }, 31000);
        // } else {
        //     $('.home *').show();
        // }
    };

    $.fn.animate_Text = function() {
        var string = $.trim(this.text());
        return this.each(function(){
            var $this = $(this);
            $this.html(string.replace(/./g, '<span class="new">$&</span>'));
            $this.find('span.new').each(function(i, el){
                setTimeout(function(){ $(el).addClass('div_opacity'); }, 2 * i);
            });
        });
    };

    function animateContent(direction, inputAddingHeight = 0, animateSpeed = 500) {
        // var animationOffset = $('.home-content-place').height() - $('.home').height();
        // var animationOffset = $('.home-content-place').height();
        // // var animationOffset = $('.container').outerHeight() + $('.main').outerHeight();
        // if (direction == 'up') {
        //     animationOffset = 0;
        // }
        // console.log('homeContentOuterHeight: ', $('.home-content-place').outerHeight());
        // console.log('homeOuterHeight: ', $('.home').outerHeight());
        // console.log('inputAddingHeight: ', inputAddingHeight);
        console.log('-inputAddingHeight: ', inputAddingHeight, -(inputAddingHeight));
        // console.log('animationOffset: ', animationOffset);
        // console.log('animationContent: ', -animationOffset-inputAddingHeight);
        $('.home').animate({ "marginTop": -(inputAddingHeight)+ "px" }, animateSpeed);
    }

    function Utils() {

    }

    Utils.prototype = {
        constructor: Utils,
        isElementInView: function (element, fullyInView) {
            var pageTop = $(window).scrollTop();
            var pageBottom = pageTop + $(window).height();
            var elementTop = $(element).offset().top;
            var elementBottom = elementTop + $(element).height();

            if (fullyInView === true) {
                return ((pageTop < elementTop) && (pageBottom > elementBottom));
            } else {
                return ((elementTop <= pageBottom) && (elementBottom >= pageTop));
            }
        }
    };

    var Utils = new Utils();
})(jQuery);
