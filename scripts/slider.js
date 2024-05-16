$(document).ready(function () {
	const $cont = $('.cont');
	const $slider = $('.slider');
	const $nav = $('.nav');
	const winW = $(window).width();
	const animSpd = 750; // Change also in CSS
	const distOfLetGo = winW * 0.2;
	let curSlide = 1;
	let animation = false;
	let autoScrollVar = true;
	let diff = 0;

	const bulletsCount = $('.slider').children().length;
	// Generating slides
	let generateBullets = function (bulletsAmount) {
		for (let i = 1; i <= bulletsAmount; i++) {
			let frag = $(document.createDocumentFragment());
			const numSlide = i;

			const navSlide = $(`<li data-target="${numSlide}" class="nav__slide nav__slide--${numSlide}"></li>`);
			frag.append(navSlide);
			$nav.append(frag);

		}
	};

	generateBullets(bulletsCount);
	$('.nav__slide--1').addClass('nav-active');

	// Navigation
	function bullets(dir) {
		$('.nav__slide--' + curSlide).removeClass('nav-active');
		$('.nav__slide--' + dir).addClass('nav-active');
	}

	function timeout() {
		animation = false;
	}

	function pagination(direction) {
		animation = true;
		diff = 0;
		$slider.addClass('animation');
		$slider.css({
			'transform': 'translate3d(0, -' + ((curSlide - direction) * 100) + '%, 0)'
		});

		$slider.find('.slide__darkbg').css({
			'transform': 'translate3d(0, ' + ((curSlide - direction) * 50) + '%, 0)'
		});
	}

	function navigateDown() {
		if (!autoScrollVar) return;
		if (curSlide >= bulletsCount) return;
		pagination(0);
		setTimeout(timeout, animSpd);
		bullets(curSlide + 1);
		curSlide++;
	}

	function navigateUp() {
		if (curSlide <= 1) return;
		pagination(2);
		setTimeout(timeout, animSpd);
		bullets(curSlide - 1);
		curSlide--;
	}

	function toDefault() {
		pagination(1);
		setTimeout(timeout, animSpd);
	}

	// Events
	// $(document).on('mousedown touchstart', '.slide', function (e) {
	// 	if (animation) return;
	// 	let target = +$(this).attr('data-target');
	// 	let startY = e.pageY || e.originalEvent.touches[0].pageY;
	// 	$slider.removeClass('animation');

	// 	$(document).on('mousemove touchmove', function (e) {
	// 		let y = e.pageY || e.originalEvent.touches[0].pageY;
	// 		diff = startY - y;
	// 		if (target === 1 && diff < 0 || target === bulletsCount && diff > 0) return;

	// 		$slider.css({
	// 			'transform': 'translate3d(0, -' + ((curSlide - 1) * 100 + (diff / 30)) + '%, 0)'
	// 		});

	// 		$slider.find('.slide__darkbg').css({
	// 			'transform': 'translate3d(0, ' + ((curSlide - 1) * 50 + (diff / 60)) + '%, 0)'
	// 		});
	// 	})
	// })

	// $(document).on('mouseup touchend', function (e) {
	// 	$(document).off('mousemove touchmove');

	// 	if (animation) return;

	// 	if (diff >= distOfLetGo) {
	// 		navigateDown();
	// 	} else if (diff <= -distOfLetGo) {
	// 		navigateUp();
	// 	} else {
	// 		toDefault();
	// 	}
	// });

	$(document).on('click', '.nav__slide:not(.nav-active)', function () {
		let target = +$(this).attr('data-target');
		bullets(target);
		curSlide = target;
		pagination(1);
	});

	$(document).on('keydown', function (e) {
		if (e.which === 39) navigateDown();
		if (e.which === 37) navigateUp();
	});

	$(document).on('mousewheel DOMMouseScroll', function (e) {
		if (animation) return;
		let delta = e.originalEvent.wheelDelta;

		if (delta > 0 || e.originalEvent.detail < 0) navigateUp();
		if (delta < 0 || e.originalEvent.detail > 0) navigateDown();
	});
});
