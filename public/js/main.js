$(document).on('ready', function () {
	/*PopUpLogin*/
	$('.btn-PopUpLogin').on('click', function () {
		var PopUpLogin = $('.PopUpLogin');
		if (PopUpLogin.css('display') == "none") {
			PopUpLogin.fadeIn('fast');
		} else {
			PopUpLogin.fadeOut('fast');
		}
	});
	/*Buscador movil*/
	$('.btn-search-mobile').on('click', function () {
		var search = $('.Search-mobile');
		if (search.css('display') == "none") {
			search.fadeIn('fast');
		} else {
			search.fadeOut('fast');
		}
	});
	/*Menu movil*/
	$('.show-menu-mobile').on('click', function () {
		var menu = $('.NavBar-Nav');
		if (menu.hasClass('NavBar-Nav-show')) {
			menu.removeClass('NavBar-Nav-show');
		} else {
			menu.addClass('NavBar-Nav-show');
		}
	});
	/*Anuncios*/
	$('.btn-change-post').on('click', function () {
		var post = $('.post');
		if (post.hasClass('post-block')) {
			post.removeClass('post-block');
			$(this).removeClass('fa-list').addClass('fa-th-large');
		} else {
			post.addClass('post-block');
			$(this).removeClass('fa-th-large').addClass('fa-list');
		}
	});
	/* Menus Desplegables*/
	$('.btn-dropdown-conatiner').on('click', function () {
		var containerDropdown = $(this).attr('data-drop-cont');
		$(containerDropdown).slideToggle('fast');
	});
	/*Input file*/
	$(".custom-input-file input:file").change(function () {
		$(".archivo").html($(this).val());
	});
	/*Mostrar respuesta de mensajes*/
	$('.btn-res').on('click', function () {
		var resMsj = $(this).next('.res-msj');
		resMsj.slideToggle('fast');
	});
});
(function ($) {
	$(window).load(function () {
		$(".menu-mobile-c")({
			theme: "dark-thin",
			scrollbarPosition: "inside",
			autoHideScrollbar: true,
			scrollButtons: { enable: true }
		});
	});
});


// QRIOUS
$(function () {
	$(".gfgenlace").click(function () {
		var id = $(this).closest("tr").find(".gfgid").text();
		var enlace = "https://www.vivu.com.co/vivuWeb/cursosReg.php?poa=" + id;
		$("#enlaceCompartir").val(enlace);

		// Limpia el contenedor QR antes de generar uno nuevo
		$("#qrCode").empty();

		// Genera el código QR en el contenedor
		var qrCode = new QRious({
			element: document.createElement('canvas'),
			value: enlace,
			size: 200
		});

		// Agrega el canvas generado al contenedor QR
		$("#qrCode").append(qrCode.element);
	});

	// Descargar el QR como imagen
	$("#downloadQR").click(function () {
		var canvas = $("#qrCode").find("canvas")[0];
		var link = document.createElement('a');
		link.download = 'QR_POA.png';
		link.href = canvas.toDataURL("image/png");
		link.click();
	});
});
