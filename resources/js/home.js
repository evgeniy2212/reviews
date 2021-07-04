(function($) {
    window.onload = function() {
        console.log('document.getElementById(audio): ', document.getElementById('audio'));
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
                    if(i >= 1){
                        setTimeout(function(){
                            $('.nav-gradient').removeClass('nav-first-menu-showing');
                        }, 1000);
                    }
                    $('.navigate li a').each(function(i)
                    {
                        $(this).delay(700 * i).fadeTo( 500, 1 );
                        $(this).delay(350 * i).not(".menu-active a").fadeTo( 300, 0 );
                    });
                }, 4750 * i);
            }
            setTimeout(function(){
                $('.navigate li a').removeClass('first-menu-showing');
            }, 900000);

            // setTimeout(function(){
            //     $('.home .home-main-content').fadeTo( 1000, 1 );
            // }, 4000);

            setTimeout(function(){
                $('.home .home-title').each(function(index){
                    let $this = $(this);
                    setTimeout(function(){
                        $this.delay(1500 * index)
                            .fadeTo( 500, 1 )
                            .fadeTo( 500, 0 )
                            .fadeTo( 500, 1 )
                            .fadeTo( 500, 0 )
                            .fadeTo( 500, 1 )
                            .fadeTo( 500, 0 )
                            .fadeTo( 500, 1 );
                    }, 65000 * index);
                });
            }, 15000);

            setTimeout(function(){
                let mainContentDelay = 0;
                $('.home-main-content').each(function(index) {
                    let item = $(this);
                    $("#audio")[0].play();
                    setTimeout(function() {
                        $("#audio")[0].play();
                        item.parent().fadeTo( 1000, 1 );
                        item.fadeTo( 500, 1 );
                        item.animate_Text();
                        if ($('.home').height() > $('.home-content-place').height()) {
                            animateContent('down');
                        }
                    }, mainContentDelay);
                    mainContentDelay = (item.text().length * 5) + mainContentDelay;
                });
            }, 19000);

            setTimeout(function(){
                $('.home-point img').each(function(index){
                    $(this).delay(700 * (index + 1)).fadeTo( 500, 1 );
                });
            }, 22600);
            setTimeout(function(){
                $('.home .home-point-title').each(function(index){
                    if(index > 0){
                        $(this).delay(2500 * index)
                            .fadeTo( 500, 1 )
                            .fadeTo( 500, 0 )
                            .fadeTo( 500, 1 )
                            .fadeTo( 500, 0 )
                            .fadeTo( 500, 1 );
                    } else {
                        $(this).delay(2500 * index)
                            // .fadeTo( 500, 1 )
                            // .fadeTo( 500, 0 )
                            // .fadeTo( 500, 1 )
                            // .fadeTo( 500, 0 )
                            .fadeTo( 500, 1 )
                            .fadeTo( 500, 0 )
                            .fadeTo( 500, 1 )
                            .fadeTo( 500, 0 )
                            .fadeTo( 500, 1 );
                    }
                });
            }, 32000);

            setTimeout(function(){
                let delay = 0;
                $('.home-point-show').each(function(index) {
                    let item = $(this);
                    $("#audio")[0].play();
                    setTimeout(function() {
                        $("#audio")[0].play();
                        item.parent().fadeTo( 1000, 1 );
                        item.fadeTo( 1000, 1 );
                        item.animate_Text();
                        if ($('.home').height() > $('.home-content-place').height()) {
                            if(index >= 10){
                                animateContent('down', 5*(index-9))
                            } else {
                                animateContent('down');
                            }
                        }
                    }, delay);
                    delay = (item.text().length * 5) + delay;
                });
                setTimeout(function() {
                    if ($('.home').height() > $('.home-content-place').height()) {
                        animateContent('up');
                    }
                }, delay + 4000);
                setTimeout(function() {
                    // if(localStorage.getItem('hideAlert') == 'false'){
                        $("#instructionModal").modal('show');
                    // }
                }, delay + 5000);
            }, 62000);
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
                setTimeout(function(){ $(el).addClass('div_opacity'); }, 5 * i);
            });
        });
    };

    function animateContent(direction, inputAddingHeight = 0) {
        var animationOffset = $('.home-content-place').height() - $('.home').height();
        // var addingHeight = addingHeight - inputAddingHeight;
        console.log('animationOffset: ', animationOffset);
        // console.log('addingHeight: ', addingHeight);
        console.log('animationOffset-inputAddingHeight: ', animationOffset - inputAddingHeight);
        if (direction == 'up') {
            animationOffset = 0;
        }
        $('.home').animate({ "marginTop": (animationOffset-inputAddingHeight)+ "px" }, 1000);
    }
})(jQuery);
