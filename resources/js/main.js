(function($) {
    setTimeout(function(){$('.close').click()}, 3000);
    $( document ).ready(function() {
        $(".submitLoginButton").click(function(event) {
            var form = $("#loginForm")
            validation(form, event);
        });

        $(".submitRegisterButton").click(function(event) {
            var form = $("#registerForm")
            validation(form, event);
        });

        $('#selectCountry').change(function() {
            // $('#selectRegion').prop("disabled", true);
            $.ajax({
                url : "/ajax/regions/" + this.value,
                dataType:"json",
                success:function(data)
                {
                    $('#registerLabel').text(data[0].region_naming);
                    $('#selectRegion').empty();
                    for(var k in data) {
                        $('#selectRegion').prepend('<option value="' + k + '">' + data[k].region + '</option>');
                    }
                }
            })
            $('#selectRegion').removeAttr("disabled");
        });

        $('#editProfileButton').click(function(){
            $('#personalForm input').each(function(){
                console.log($(this).prop("disabled", false))
            });
            $('#selectCountry').prop("disabled", false);
        });
    });

    var validation = function(form, event){
        if (form[0].checkValidity() === false) {
            event.preventDefault()
            event.stopPropagation()
        }

        form.addClass('was-validated');
    }
})(jQuery);
