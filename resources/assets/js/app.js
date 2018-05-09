var spinnerIcon = '<i class="fas fa-spinner fa-spin gray"></i>';
var successIcon = '<i class="fas fa-check green"></i>'
var failIcon = '<i class="fas fa-exclamation red"></i>';

var typingTimer;
var value;
var $input;

$('.check-value').on('keyup', function () {
    clearTimeout(typingTimer);
    var $this = $(this);
    $(this).next().hide();

    typingTimer = setTimeout(function() {
        doneTyping($this);
    }, 300);
});

$('.check-value').on('keydown', function () {
    clearTimeout(typingTimer);
});

function doneTyping($input) {
    value = $input.val();
    if ($input.data('type') == 'password' || $input.data('type') == 'password-confirm') {
        alert('Şifre uygun değil');
    } else {

        $input.next().html(spinnerIcon);
        $input.next().show();

        $.ajax({
            method: 'POST',
            url: `register/check/${$($input).data('type')}`,
            data: { value: value, _token: $('meta[name="csrf-token"]').attr('content') }
        })
        .done(function(msg) {
            $input.next().html(successIcon);
        })
        .fail(function (msg) {
           $input.next().html(failIcon);
        });
    }
}

import './like.js';
import './chart.js';
