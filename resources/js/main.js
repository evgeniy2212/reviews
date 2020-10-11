(function($) {
    var isCheckedTermOfCondition = true;
    setTimeout(function(){$('.close').click()}, 3000);
    $( document ).ready(function() {
        $(".submitLoginButton").click(function(event) {
            var form = $("#loginForm");
            validation(form, event);
        });

        $(".submitChangePassButton").click(function(event) {
            var form = $("#changePassForm");
            validation(form, event);
        });

        $(".submitRegisterButton").click(function(event) {
            var form = $("#registerForm");
            isCheckedTermOfCondition = $('#confirmTermOfConditions').is(':checked')
            isCheckedTermOfCondition ? $('#confirmTermOfConditions').removeClass('invalid-checkbox') : $('#confirmTermOfConditions').addClass('invalid-checkbox');
            validation(form, event);
        });

        $(".submitReviewButton").click(function(event) {
            var form = $("#createReviewForm");
            validation(form, event);
        });

        $(".submitTouchInfoButton").click(function(event) {
            var form = $("#sendTouchInfo");
            validation(form, event);
        });


        //Choosing region after country
        $('#selectCountry').change(function() {
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

        //Choosing region after country
        $('#selectCategoryGood').change(function() {
            $.ajax({
                url : "/ajax/groups/" + this.value,
                dataType:"json",
                success:function(data)
                {
                    $('#selectGroup').empty();
                    for(var k in data) {
                        $('#selectGroup').prepend('<option value="' + data[k].id + '">' + data[k].name + '</option>');
                    }
                }
            });

            $('#selectGroup').removeAttr("disabled");
        });

        $('#editProfileButton').click(function(){
            $('#personalForm input').each(function(){
                $(this).prop("disabled", false);
            });
            $('#selectCountry').prop("disabled", false);
            $('#cancelButton').prop("disabled", false);
            $('#saveButton').prop("disabled", false);
        });

        $("#password, #new-password").on('keyup', ValidatePassword);
        $("#password, #new-password").focus(function() {
            $('#password-rules').show();
            // $('.hide-when-show-rules').hide();
        }).blur(function() {
            $('#password-rules').hide();
            // $('.hide-when-show-rules').show();
        });

        if($('#selectCountry').length && $('#selectCountry').attr('data-country').length){
            $.ajax({
                url : "/ajax/regions/" + $('#selectCountry').attr('data-country'),
                dataType:"json",
                success:function(data)
                {
                    $('#registerLabel').text(data[0].region_naming);
                    $('#selectRegion').empty();
                    for(var k in data) {
                        $('#selectRegion').prepend('<option value="' + data[k].id + '">' + data[k].region + '</option>');
                    }
                    $('#selectCountry option[value=' + $('#selectCountry').attr('data-country') +']').prop('selected', true);
                    $('#selectRegion').removeAttr("disabled");
                    $('#selectRegion option[value=' + $('#selectRegion').attr('data-region') +']').prop('selected', true);
                }
            });
        }
    });

    var validation = function(form, event){
        let allPassRulesCnt = $('#password-rules').find("[type='checkbox']").length;
        let checkedPassRulesCnt = $('#password-rules').find("[type='checkbox']:checked").length;
        let isCheckPassInvalid = allPassRulesCnt != checkedPassRulesCnt;
        if(isCheckPassInvalid){
            $('#password, #new-password').addClass('invalid-input');
        } else {
            $('#password, #new-password').removeClass('invalid-input');
        }

        if (form[0].checkValidity() === false || isCheckPassInvalid || !isCheckedTermOfCondition) {
            event.preventDefault();
            event.stopPropagation();
        }

        form.addClass('was-validated');
    };

    /*Actual validation function*/
    function ValidatePassword() {
        /*Array of rules and the information target*/
        var rules = [{
            Pattern: "[A-Z]",
            Target: "UpperCase"
        },
            {
                Pattern: "[a-z]",
                Target: "LowerCase"
            },
            {
                Pattern: "[0-9]",
                Target: "Numbers"
            },
            {
                Pattern: "[!@@#$%^&*]",
                Target: "Symbols"
            }
        ];

        //Just grab the password once
        var password = $(this).val();
        /*Length Check, add and remove class could be chained*/
        /*I've left them seperate here so you can see what is going on */
        /*Note the Ternary operators ? : to select the classes*/
        $("#Length").prop('checked', password.length > 7 ? true : false);
        for (var i = 0; i < rules.length; i++) {
            $("#" + rules[i].Target).prop('checked', new RegExp(rules[i].Pattern).test(password) ? true : false);
        }
        let allPassRulesCnt = $('#password-rules').find("[type='checkbox']").length;
        let checkedPassRulesCnt = $('#password-rules').find("[type='checkbox']:checked").length;
        let isCheckPassInvalid = allPassRulesCnt != checkedPassRulesCnt;
        if(isCheckPassInvalid){
            $('#password, #new-password').addClass('invalid-input');
        } else {
            $('#password, #new-password').removeClass('invalid-input');
        }
    }
})(jQuery);
