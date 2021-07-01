(function($) {
    window.onload = function() {
        console.log('document.getElementById(audio): ', document.getElementById('audio'));
        // $('#audio').play();
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

            setTimeout(function(){
                $('.home .home-main-content').fadeTo( 1000, 1 );
            }, 4000);

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
                }, 80000 * index);
            });

            setTimeout(function(){
                $('.home-point img').each(function(index){
                    $(this).delay(700 * (index + 1)).fadeTo( 500, 1 );
                });
            }, 5000);
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
                            .fadeTo( 500, 1 )
                            .fadeTo( 500, 0 )
                            .fadeTo( 500, 1 )
                            .fadeTo( 500, 0 )
                            .fadeTo( 500, 1 )
                            .fadeTo( 500, 0 )
                            .fadeTo( 500, 1 )
                            .fadeTo( 500, 0 )
                            .fadeTo( 500, 1 );
                    }
                });
            }, 14500);

            setTimeout(function(){
                let delay = 0;
                $('.home-point-show').each(function(index) {
                    let item = $(this);
                    console.log('item: ', item);
                    setTimeout(function() {
                        // item.show();
                        // $(this).css('opacity',0).animate({'opacity': 1, 'display': 'inline-block'}, 1000);
                        item.parent().fadeTo( 1000, 1 );
                        item.fadeTo( 1000, 1 );
                        item.animate_Text();
                        if(item.hasClass('home-list')) {
                            // setTimeout(function(){
                            //     item.parent().fadeTo( 1000, 1 );
                            // }, 3000);
                        }else if ($('.home').height() > $('.home-content-place').height()) {
                            animateContent('down');
                        }
                    }, delay);
                    delay = (item.text().length * 10) + delay;
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
                }, delay + 5000);
            }, 44500);
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
                setTimeout(function(){ $(el).addClass('div_opacity'); }, 10 * i);
            });
        });
    };

    function animateContent(direction) {
        var animationOffset = $('.home-content-place').height() - $('.home').height();
        if (direction == 'up') {
            animationOffset = 0;
        }
        $('.home').animate({ "marginTop": (animationOffset)+ "px" }, 2000);
    }
})(jQuery);
