$('.message a').click(function () {
    $('form').animate({ height: "toggle", opacity: "toggle" }, "slow");
});

$('.close').click(function () {
    $('.login-page')[0].classList.add('animateOut');
    setTimeout(() => {
        $('.login-page')[0].style.display = 'none';
        $('.login-page')[0].classList.remove('animateOut');
    }, 400);
})

$(document).ready(function () {
    $('#SignBtn').click(function () {
        // Ваш код обработчика события клика на элемент
        $('.login-page')[0].style.display = 'block';
        $('.login-page')[0].classList.add('animate');
    })
});


