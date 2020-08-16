(function($) {
    setTimeout(function(){$('.close').click()}, 3000);
    $( document ).ready(function() {
        $(".submitLoginButton").click(function(event) {
            var form = $("#loginForm");
            validation(form, event);
        });

        $(".submitRegisterButton").click(function(event) {
            var form = $("#registerForm");
            validation(form, event);
        });

        $(".submitReviewButton").click(function(event) {
            var form = $("#createReviewForm");
            validation(form, event);
        });

        //Choosing region after country
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
                        $('#selectRegion').prepend('<option value="' + data[k].id + '">' + data[k].region + '</option>');
                    }
                }
            });

            $('#selectRegion').removeAttr("disabled");
        });

        $('#editProfileButton').click(function(){
            $('#personalForm input').each(function(){
                $(this).prop("disabled", false);
            });
            $('#selectCountry').prop("disabled", false);
            $('#cancelButton').prop("disabled", false);
            $('#saveButton').prop("disabled", false);
        });
    });


    var validation = function(form, event){
        console.log(form);
        if (form[0].checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }

        form.addClass('was-validated');
    }
})(jQuery);
