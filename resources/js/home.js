(function($) {
    window.onload = function() {
        console.log('document.getElementById(audio): ', document.getElementById('audio'));
        // consol.log('slider: ', slider);
        // var myAudio = $("#audio")[0];
        // myAudio.play();
        var loaded = sessionStorage.getItem('loaded');
        sessionStorage.setItem('loaded', true);
        // $('.home *').show();
        // if(loaded !== 'true') {
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
                    }, 34000 * index);
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
                            animateContent('down');
                        }
                    }, mainContentDelay);
                    mainContentDelay = (item.text().length * 3) + mainContentDelay;
                });
            }, 9500);

            setTimeout(function(){
                $('.home-point img').each(function(index){
                    $(this).delay(250 * (index + 1)).fadeTo( 200, 1 );
                });
            }, 12000);
            setTimeout(function(){
                $('.home .home-point-title').each(function(index){
                    if ($('.home').height() > $('.home-content-place').height()) {
                        animateContent('down');
                    }
                    if(index > 0){
                        $(this).delay(1250 * index)
                            .fadeTo( 250, 1 )
                            .fadeTo( 250, 0 )
                            .fadeTo( 250, 1 )
                            .fadeTo( 250, 0 )
                            .fadeTo( 250, 1 );
                    } else {
                        $(this).delay(1250 * index)
                            // .fadeTo( 500, 1 )
                            // .fadeTo( 500, 0 )
                            // .fadeTo( 500, 1 )
                            // .fadeTo( 500, 0 )
                            .fadeTo( 250, 1 )
                            .fadeTo( 250, 0 )
                            .fadeTo( 250, 1 )
                            .fadeTo( 250, 0 )
                            .fadeTo( 250, 1 );
                    }
                });
            }, 16000);

            setTimeout(function(){
                if ($('.home').height() > $('.home-content-place').height()) {
                    animateContent('up');
                }
                let delay = 0;
                $('.home-point-show').each(function(index) {
                    let item = $(this);
                    $("#audio")[0].play();
                    setTimeout(function() {
                        $("#audio")[0].play();
                        item.parent().fadeTo( 500, 1 );
                        item.fadeTo( 250, 1 );
                        item.animate_Text();
                        if ($('.home').height() > $('.home-content-place').height()) {
                            console.log('index: ', index);
                            if(index >= 10){
                                animateContent('down', 7*(index-9), 300)
                            } else if(index <=1){

                            } else {
                                animateContent('down');
                            }
                        }
                    }, delay);
                    delay = (item.text().length * 3) + delay;
                });
                setTimeout(function() {
                    if ($('.home').height() > $('.home-content-place').height()) {
                        animateContent('up');
                    }
                }, delay + 2000);
                setTimeout(function() {
                    // if(localStorage.getItem('hideAlert') == 'false'){
                        $("#instructionModal").modal('show');
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
                setTimeout(function(){ $(el).addClass('div_opacity'); }, 3 * i);
            });
        });
    };

    function animateContent(direction, inputAddingHeight = 0, animateSpeed = 500) {
        var animationOffset = $('.home-content-place').height() - $('.home').height();
        if (direction == 'up') {
            animationOffset = 0;
        }
        $('.home').animate({ "marginTop": (animationOffset-inputAddingHeight)+ "px" }, animateSpeed);
    }
})(jQuery);
