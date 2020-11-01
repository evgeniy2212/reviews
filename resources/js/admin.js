(function($) {
    $( document ).ready(function() {
        $( ".admin-filter-select" ).change(function() {
            let slug = $(this).attr('name');
            let item = $(this).children("option:selected").val();
            var str = window.location.search;
            // alert(str);
            str = replaceQueryParam(slug, item, str);
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
