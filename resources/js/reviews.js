(function($) {
    $( document ).ready(function() {
        // Rating stars options
        var options = {
            max_value: 5,
            step_size: 1,
            initial_value: 0,
            selected_symbol_type: 'utf8_star', // Must be a key from symbols
            cursor: 'default',
            readonly: false,
            change_once: false, // Determines if the rating can only be set once
        }

        $(".rating").rate(options);

        $(".submitReviewButton").click(function(event) {
            if ($('#selectRegion option:selected').val() == ''){
                $('#selectRegion').addClass('invalid-selector');
            } else {
                $('#selectRegion').removeClass( "invalid-selector" )
            }

            if ($('#selectCountry option:selected').val() == ''){
                $('#selectCountry').addClass('invalid-selector');
            } else {
                $('#selectCountry').removeClass( "invalid-selector" )
            }
        });

        $(".like-reaction").click(function(event) {
            var wasReaction = sessionStorage.getItem('wasReaction'+this.id);
            var $label = $("label[for='"+this.id+"']");
            var $id = $(this).data('reviewId');
            var $reaction = $(this).data('reactionName');
            if(wasReaction !== 'true'){
                $label.text(Number.parseInt($label.text()) + 1);
                sessionStorage.setItem('wasReaction'+this.id, true);
            } else if(wasReaction == 'true'){
                $label.text(Number.parseInt($label.text()) - 1);
                sessionStorage.setItem('wasReaction'+this.id, false);
            }
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type:'POST',
                url:'/ajax/review-reaction',
                data: {_token: CSRF_TOKEN, reaction: $(this).data('reactionName'), value: Number.parseInt($label.text()), id: $id},
                success:function(data){
                    console.log(data);
                }
            });
        });

        $('[id^="commentButton"]').click(function(event) {
            let review = $(this).parent().parent();
            // profile-review-item
            let comments = review.find('.comment');
            if(!comments.length) {
                review = $(this).parent().parent().parent().find('.profile-review-item');
                comments = review.find('.comment');
            }
            console.log(!comments.length);
            review.find('.comment').each(function( index ) {
                $( this ).toggle(750);
            });
            review.find('.review-textarea').toggle(750);
            $(this).text().trim() == 'Reply' ? $(this).text('Close') : $(this).text('Reply');
        });

        $('[id^="addCommentButton"]').click(function(event) {
            let review = $(this).parent().parent();
            let text = review.find('textarea').val();
            let reviewId = review.data("reviewId");
            if(text.trim()){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type:'POST',
                    url:'/ajax/review-add-comment',
                    data: {_token: CSRF_TOKEN, body: text, review_id: reviewId},
                    success:function(data){
                        let elem = review.parent().find('.comment:last');
                        let cloneElem = elem.clone();
                        cloneElem.text(text).insertAfter(elem).hide().show(750);
                        review.find('textarea').val('');
                    }
                });
            } else {
                alert('Comment is empty!');
            }
        });

    });
})(jQuery);
