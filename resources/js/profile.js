(function($) {
    $( document ).ready(function() {
        $('.deleteReview').click(function(){
            var id = $(this).data("reviewId");
            var name = $(this).data("reviewName");
            console.log(name);
            var url =  $("#deleteReviewForm").data('action');
            url = url.replace(':id', id);
            $("#deleteReviewForm").attr('action', url);
            setModalData(name);
        });

        $('#editReview').click(function(){
            var name = $(this).data("reviewName");
            setModalData(name);
        });

        // $('#confirmReviewButton').click(function(){
        //     console.log('confirmReviewButton');
        //     console.log($('[id^="ReviewForm"]'));
        //     $('[id^="ReviewForm"]').submit();
        // });

        $( function() {
            $( ".datepicker" ).datepicker({
                minDate: 0
            });
        } );

        $('#imgBanner').change(function() {
            readURL(this);
        });

        $("#bannerButton").click(function (event) {
            var form = $("#bannerForm");
            if ($('#bannerCategory option:selected').val() == '') {
                $('#bannerCategory').addClass('invalid-selector');
            } else {
                $('#bannerCategory').removeClass("invalid-selector");
            }

            if ($('#imgBanner').val() == '') {
                $('.bannerFileUpload').addClass('invalid-selector');
            } else {
                $('.bannerFileUpload').removeClass("invalid-selector");
            }

            validation(form, event);
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    function setModalData(name){
        $("#reviewName").text(name);
    }

    var validation = function(form, event){
        // let allPassRulesCnt = $('#password-rules').find("[type='checkbox']").length;
        // let checkedPassRulesCnt = $('#password-rules').find("[type='checkbox']:checked").length;
        // let isCheckPassInvalid = allPassRulesCnt != checkedPassRulesCnt;
        // if(isCheckPassInvalid){
        //     $('#password, #new-password').addClass('invalid-input');
        // } else {
        //     $('#password, #new-password').removeClass('invalid-input');
        // }
        // if(isExistBadWords){
        //     // alert('Your review contain Bad Words! You must delete Bad Words!');
        //     $('#errorBadWords').modal('show');
        // }
        //
        if (form[0].checkValidity() === false)
        {
            event.preventDefault();
            event.stopPropagation();
        }

        form.addClass('was-validated');
    };
})(jQuery);
