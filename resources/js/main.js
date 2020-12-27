(function($) {
    var isCheckedTermOfCondition = true;
    var isCheckedYearsOld = true;
    var isExistBadWords = false;
    var isSubmitFormAccept = true;
    var isCheckedCountryRegion = true;

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

            if ($('#selectRegion option:selected').val() == 'Select'){
                $('#selectRegion').addClass('invalid-selector');
                isCheckedCountryRegion = false;
            } else {
                isCheckedCountryRegion = true;
                $('#selectRegion').removeClass( "invalid-selector" )
            }

            if ($('#selectCountry option:selected').val() == 'Select'){
                $('#selectCountry').addClass('invalid-selector');
                isCheckedCountryRegion = false;
            } else {
                isCheckedCountryRegion = true;
                $('#selectCountry').removeClass( "invalid-selector" )
            }

            isCheckedTermOfCondition = $('#confirmTermOfConditions').is(':checked')
            isCheckedTermOfCondition ? $('#confirmTermOfConditions').removeClass('invalid-checkbox') : $('#confirmTermOfConditions').addClass('invalid-checkbox');
            // isCheckedYearsOld = $('#confirmYearsOld').is(':checked')
            // isCheckedYearsOld ? $('#confirmYearsOld').removeClass('invalid-checkbox') : $('#confirmYearsOld').addClass('invalid-checkbox');
            validation(form, event);
        });

        $(".submitReviewButton").click(function(event) {
            var form = $("#createReviewForm").length > 0 ? $("#createReviewForm") : $("#editReviewForm");
            isExistBadWords = form.find('mark').length ? true : false;
            isSubmitFormAccept = $('#submitFormAccept').val() > 0 ? true : false;
            if(!isSubmitFormAccept){
                $('#acceptFormModal').modal('show');
                event.preventDefault();
            } else {
                validation(form, event);
            }
        });

        // $('.slider__item').click(function(){
        //     $('#addPostRedirect').modal('show');
        // });

        $('#acceptModal').click(function(){
            $('#submitFormAccept').val(1);
            $('#acceptFormModal').modal('hide');
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
                    var length = data.length - 1;
                    for(var k in data) {
                        $('#selectGroup').prepend('<option value="' + data[k].id + '"'+ (length == k ? "selected" : "") +' >' + data[k].name + '</option>');
                    }
                }
            });

            $('#selectGroup').removeAttr("disabled");
        });

        $('[id^="enableInputsButton"]').click(function(){
            let editForm = $(this).data('form');
            $('#' + editForm +' input, textarea').each(function(){
                $(this).prop("disabled", false);
            });
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
        }).blur(function() {
            $('#password-rules').hide();
        });

        // console.log($('#selectCountry').attr('data-country'));
        if($('#selectCountry') !== null && $('#selectCountry').length && $('#selectCountry').attr('data-country').length){
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

        $('.shortcut').click(function(event) {
            let instructionTitle = $(this).parent();
            let showList = instructionTitle.find('ol');
            event.preventDefault();
            // hide all span
            $('#shortcutInstructionModal li ol').not(showList).slideUp(500, 'swing');

            if(showList.is(":visible")){
                $('#shortcutInstructionModal .shortcut').not($(this)).removeClass('disabled');
            } else {
                $('#shortcutInstructionModal .shortcut').not($(this)).addClass('disabled');
            }
            // here is what I want to do
            showList.slideToggle(750, 'swing');
            $(this).removeClass('disabled');
        });

        $('[id^="adminComplaintButton"]').click(function(event) {
            let review = $(this).parent().parent().parent();
            let complains = review.find('.complain');
            complains.each(function( index ) {
                if($(this).text().trim()) {
                    $(this).toggle(750);
                    $(this).css('display', 'flex');
                }
            });
            review.find('.review-textarea').toggle(750);
            $(this).text().trim() !== 'Close' ? $(this).text('Close') : $(this).text('Complains (' + $(this).data('complains') + ')');
        });

        if($( "#review-create-text, #review-text" ).length){
            let badWords = [];
            $.ajax({
                url : "/ajax/bad-words",
                dataType:"json",
                success:function(data)
                {
                    badWords = data;
                    $('#review-create-text, #review-text').highlightWithinTextarea({
                        highlight: badWords,
                        className: 'red'
                    });
                },
                error: function(){
                    $('#review-create-text, #review-text').highlightWithinTextarea({
                        highlight: [],
                        className: 'red'
                    });
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
        if(isExistBadWords){
            // alert('Your review contain Bad Words! You must delete Bad Words!');
            $('#errorBadWords').modal('show');
        }

        if (form[0].checkValidity() === false
            || isCheckPassInvalid
            || !isCheckedTermOfCondition
            || !isCheckedYearsOld
            || isExistBadWords
            || !isCheckedCountryRegion
            || !isSubmitFormAccept)
        {
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
