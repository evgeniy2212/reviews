(function($) {
    window.onload = function() {
        var loaded = sessionStorage.getItem('loaded');
        sessionStorage.setItem('loaded', true);
        // $('.home').show();
        if(loaded !== 'true') {
            $('.nav-gradient').addClass('nav-first-menu-showing');
            $('.navigate li a').addClass('first-menu-showing');
            for(let i = 0; i <= 2; i++){
                setTimeout(function(){
                    $('.navigate li a').each(function(i)
                    {
                        $(this).delay(700 * i).fadeTo( 500, 1 );
                        $(this).delay(350 * i).not(".menu-active a").fadeTo( 300, 0 );
                    });
                }, 4750 * i);
            }
            setTimeout(function(){
                $('.nav-gradient').removeClass('nav-first-menu-showing');
                $('.navigate li a').removeClass('first-menu-showing');
            }, 900000);

            $('.home-title, .home-main-content').show();
            $('.home-point img').each(function(index){
                $(this).delay(700 * (index + 1)).fadeTo( 500, 1 );
            });
            setTimeout(function(){
                $('.home-point .home-point-title').each(function(index){
                    $(this).delay(2500 * index)
                        .fadeTo( 500, 1 )
                        .fadeTo( 500, 0 )
                        .fadeTo( 500, 1 )
                        .fadeTo( 500, 0 )
                        .fadeTo( 500, 1 );
                });
            }, 8500);

            setTimeout(function(){
                let delay = 0;
                $('.home .home-point-show').each(function(index) {
                    let item = $(this);
                    setTimeout(function() {
                        // item.show();
                        item.fadeTo( 1000, 1 );
                        item.animate_Text();
                        if(item.hasClass('home-list')) {
                            item.parent().fadeTo( 1000, 1 );
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
                }, delay + 1000);
                setTimeout(function() {
                    if(localStorage.getItem('hideAlert') == 'false'){
                        $("#instructionModal").modal('show');
                    }
                }, delay + 3000);
            }, 38500);
        } else {
            $('.home *').show();
        }
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
