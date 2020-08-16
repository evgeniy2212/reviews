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
            // ajax_method: 'POST',
            // url: 'http://localhost/test.php',
            // additional_data: {} // Additional data to send to the server
        }

        $(".rating").rate(options);

        $(".submitReviewButton").click(function(event) {
            // console.log($('#selectRegion option:selected').length);
            // console.log($('#selectRegion option:selected').val() == '');
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
            // var liked = sessionStorage.getItem('liked');
            // var disliked = sessionStorage.getItem('disliked');
            // var likeReaction = sessionStorage.getItem('likeReaction'+this.id);
            var wasReaction = sessionStorage.getItem('wasReaction'+this.id);
            // var dislikeReaction = sessionStorage.getItem('dislikeReaction'+this.id);
            // console.log('Loaded: ', sessionStorage.getItem('loaded'));

            var $label = $("label[for='"+this.id+"']");
            var $id = $(this).data('reviewId');
            var $reaction = $(this).data('reactionName');
            console.log($reaction, wasReaction);
            if(wasReaction !== 'true'){
                // if($reaction == 'like'){
                    $label.text(Number.parseInt($label.text()) + 1);
                    sessionStorage.setItem('wasReaction'+this.id, true);
                // }
            } else if(wasReaction == 'true'){
                // if($reaction == 'like'){
                    $label.text(Number.parseInt($label.text()) - 1);
                    sessionStorage.setItem('wasReaction'+this.id, false);
                // }
            }
            console.log($(this).data('reactionName'));
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type:'POST',
                url:'/ajax/review-reaction',
                data: {_token: CSRF_TOKEN, reaction: $(this).data('reactionName'), value: Number.parseInt($label.text()), id: $id},
                success:function(data){
                    console.log(data);
                }
                // url : "/ajax/regions/" + this.value,
                // dataType:"json",
                // success:function(data)
                // {
                //     $('#registerLabel').text(data[0].region_naming);
                //     $('#selectRegion').empty();
                //     for(var k in data) {
                //         $('#selectRegion').prepend('<option value="' + data[k].id + '">' + data[k].region + '</option>');
                //     }
                // }
            });

            // if($reaction == 'like' && wasReaction !== 'true'){
            //     $label.text(Number.parseInt($label.text()) + 1);
            //     sessionStorage.setItem('likeReaction'+this.id, true);
            // } else if($reaction == 'like' && likeReaction == 'true') {
            //     $label.text(Number.parseInt($label.text()) - 1);
            //     sessionStorage.setItem('likeReaction'+this.id, false);
            // }
            //
            // if($reaction == 'dislike' && likeReaction !== 'true' && dislikeReaction !== 'true'){
            //     $label.text(Number.parseInt($label.text()) + 1);
            //     sessionStorage.setItem('dislikeReaction'+this.id, true);
            // } else if($reaction == 'dislike' && dislikeReaction == 'true'){
            //     $label.text(Number.parseInt($label.text()) - 1);
            //     sessionStorage.setItem('dislikeReaction'+this.id, false);
            // }
            console.log('set reaction: ' ,$reaction, wasReaction, $label);
            // console.log($(this).attr('id'), $(this).data('reviewId'), );
            // $(this).attr('id');data-review-id
        });
    });
})(jQuery);
