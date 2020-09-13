(function($) {
    $( document ).ready(function() {
        $('.deleteReview').click(function(){
            console.log('deleteReview');
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
    });

    function setModalData(name){
        $("#reviewName").text(name);
    }
})(jQuery);
