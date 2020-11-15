(function($) {
    $( document ).ready(function() {
        $( ".admin-filter-select" ).change(function() {
            let slug = $(this).attr('name');
            let item = $(this).children("option:selected").val();
            var str = window.location.search;
            str = replaceQueryParam(slug, item, str);
            str = replaceQueryParam('page', 1, str);
            window.location = window.location.pathname + str
        });

        var minDate = $("#adminDatepickerDifMinRange").length > 0 ? $("#adminDatepickerDifMinRange").val() : 0;
        var maxDate = $("#adminDatepickerDifMaxRange").length > 0 ? $("#adminDatepickerDifMaxRange").val() : 0;
        $( function() {
            $( ".adminReviewdatepicker" ).datepicker({
                minDate: -minDate,
                maxDate: maxDate
            });
        } );

        $(".adminFilterButton").click(function (event) {
            var str = window.location.search;
            str = replaceQueryParam(
                $(".adminFilters .select").attr('name'),
                $(".adminFilters .select").val(),
                str
            );
            str = replaceQueryParam(
                'from',
                $(".adminFilterDatepicker [name='from']").val(),
                str
            );
            str = replaceQueryParam(
                'to',
                $(".adminFilterDatepicker [name='to']").val(),
                str
            );
            str = replaceQueryParam('page', 1, str);
            window.location = window.location.pathname + str
        });
    });

    function replaceQueryParam(param, newval, search) {
        var regex = new RegExp("([?;&])" + param + "[^&;]*[;&]?");
        var query = search.replace(regex, "$1").replace(/&$/, '');

        return (query.length > 2 ? query + "&" : "?") + (newval ? param + "=" + newval : '');
    }
})(jQuery);
