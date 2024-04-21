/*!***************************************!*\
  !*** ./resources/js/general_index.js ***!
  \***************************************/
var FormIndex = function () {
    "use strict";
    // Password can see or not
    var DefBtnPw = function DefBtnPw() {
        $('.rs_pw', this).click(function () {
            $(this).closest('div').children('.rs_pw_hide').show();
            $(this).hide();
            $(this).closest('.input-group').children('input').attr('type', 'text');
        });
        $('.rs_pw_hide', this).click(function () {
            $(this).closest('div').children('.rs_pw').show();
            $(this).hide();
            $(this).closest('.input-group').children('input').attr('type', 'password');
        });
    };
    return {
        //main function to initiate template pages
        init: function init(data_str) {
            DefBtnPw(data_str);

        }
    };
}();
