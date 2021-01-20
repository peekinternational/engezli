$(document).ready(function () {
	// Change to arabic style
	$(".arabic-format").on("click", function (e) {
		e.preventDefault();

		$("html").attr("dir", "rtl").attr("lang", "ar");
		$("body").addClass("arabic");
	});
	// Change to noramal style
	$(".english-format").on("click", function (e) {
		e.preventDefault();

		$("html").attr("dir", "ltr").attr("lang", "en");
		$("body").removeClass("arabic");
	});
});
// Language change

// Select2
$(".select2").select2();
// Select2

// slick slider js
// $(document).ready(function () {
// 	$(".test").slick({
// 		slidesToShow: 4,
// 		slidesToScroll: 1,
// 		arrows: true,
// 		fade: false,
// 		responsive: [
// 			{
// 				breakpoint: 1099,
// 				settings: {
// 					slidesToShow: 4,
// 				},
// 			},
// 			{
// 				breakpoint: 1024,
// 				settings: {
// 					slidesToShow: 3,
// 				},
// 			},
// 			{
// 				breakpoint: 600,
// 				settings: {
// 					slidesToShow: 2,
// 				},
// 			},
// 		],
// 	});
// });
// slick slider js

// menu slider
$(function () {
	var print = function (msg) {
		alert(msg);
	};

	var setInvisible = function (elem) {
		elem.css("visibility", "hidden");
	};
	var setVisible = function (elem) {
		elem.css("visibility", "visible");
	};

	var elem = $(".menu-list-group .scrolling-menu");
	var items = elem.children();

	// Inserting Buttons
	elem.prepend(
		'<div id="right-button" style="visibility: hidden;"><a href="#"><i class="fa fa-angle-left"></i></a></div>'
	);
	elem.append(
		'  <div id="left-button"><a href="#"><i class="fa fa-angle-right"></i></a></div>'
	);

	// Inserting Inner
	items.wrapAll('<ul id="inner" />');

	// Inserting Outer
	elem.find("#inner").wrap('<div id="outer"/>');

	var outer = $("#outer");

	var updateUI = function () {
		var maxWidth = outer.outerWidth(true);
		var actualWidth = 0;
		$.each($("#inner >"), function (i, item) {
			actualWidth += $(item).outerWidth(true);
		});

		if (actualWidth <= maxWidth) {
			setVisible($("#left-button"));
		}
	};
	updateUI();

	$("#right-button").click(function () {
		var leftPos = outer.scrollLeft();
		outer.animate(
			{
				scrollLeft: leftPos - 100,
			},
			800,
			function () {
				if ($("#outer").scrollLeft() <= 0) {
					setInvisible($("#right-button"));
				}
			}
		);
	});

	$("#left-button").click(function () {
		setVisible($("#right-button"));
		var leftPos = outer.scrollLeft();
		outer.animate(
			{
				scrollLeft: leftPos + 100,
			},
			800
		);
	});

	$(window).resize(function () {
		updateUI();
	});
});

// menu slider
