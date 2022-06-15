(function () { 
    var testResult;
    var regex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*_])(?=.{6,12}$)");
  
    $('.error').hide();
    $('.fa-check-circle').hide();
  
    $('.password-field').on('change', function () {
        console.log($('.password-field').val());
        testResult = regex.test($('.password-field').val());
        console.log(testResult);
        if (testResult) {
            $('.password-field').css('border-color', 'green');
            $('.error').hide();
            $('.fa-check-circle').show();
        }
        else {
            $('.error').show().css('color', 'red');
            $('.password-field').css('border-color', 'red');
            $('.fa-check-circle').hide();
        }
    })

})();


/*
(?=.*[a-z]) : matches letters lowercase .
(?=.*[A-Z]) : matches letters uppercase .
(?=.*[0-9]) : matches digit .
(?=.*[!@#\$%\^&\*_]) : matches special character .
(?=.{6,12}) : matches text length between 6 to 12 .
- for more info about regular expressions visit : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Regular_Expressions
*/