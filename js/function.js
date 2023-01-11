jQuery(function(){
	
	function initFunction(){
		jQuery('[data-toggle="tooltip"]').tooltip();
		jQuery("form input[type=tel]").mask("+7 (999) 999 99-99");
		
		jQuery('.services_card .serve.btn').click( function(){
			var str = jQuery(this).attr('data-card');
			jQuery('#service-form select option:contains("'+str+'")').prop('selected', true);
			jQuery('#service-model').modal('show');
		});

		jQuery(function(f){
			var element = jQuery('#cur_up');
			f(window).scroll(function(){
			element['fade'+ (f(this).scrollTop() > 600 && jQuery(document).width() > 991 ? 'In': 'Out')](600);
			});
		});
		
		jQuery('#cur_up, .nav-item a.nav-link.href').click( function(){
			var El = jQuery(this).attr('href');
			if (jQuery(El).length !== 0){
				jQuery('html, body').animate({ scrollTop: jQuery(El).offset().top + 3}, 800);
			}
			return false;
		});

		jQuery('#phone-form').submit(function(){
			jQuery('#phone-form').find('button[type="submit"]').attr('disabled','disabled');
			var name = jQuery('#exname').val();
			var phone = jQuery('#exphone').val();
			jQuery.ajax({
				url: "/wp-admin/admin-ajax.php",
				method: 'post',
				data: {
					action: 'phone_form',
					name: name,
					phone: phone
				},
				success: function(msg){
					jQuery('#exname').removeClass('is-invalid');
					switch(JSON.parse(msg)){
						case 'error_name':
							jQuery('#exname').addClass('is-invalid').focus();
						break;
						case 'error_send':
							jQuery('#phone-model').modal('hide');
							jQuery('header .container-lg').prepend('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Внимание!</strong> Ошибка почтового сервера. Попробуйте повторить позднее.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
							setTimeout(function(){jQuery('header .alert').remove()}, 4600);
						break;
						case 'form_send':
							jQuery('#phone-model').modal('hide');
							jQuery('#exphone,#exname').val('').removeClass('is-invalid');
							jQuery('header .container-lg').prepend('<div class="alert alert-info alert-dismissible fade show" role="alert"><strong>Спасибо!</strong> Ваше сообщение успешно отправлено, мы свяжемся с вами в ближайшее время.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
							setTimeout(function(){jQuery('header .alert').remove()}, 3600);
					}

					jQuery('#phone-form').find('button[type="submit"]').attr('disabled', false);
				}
			});

			return false;
		});
		
		jQuery('#service-form').submit(function(){
			jQuery('#service-form').find('button[type="submit"]').attr('disabled','disabled');
			var name = jQuery('#sename').val();
			var phone = jQuery('#sephone').val();
			var service = jQuery('#seservice').val();
			jQuery.ajax({
				url: "/wp-admin/admin-ajax.php",
				method: 'post',
				data: {
					action: 'service_form',
					name: name,
					phone: phone,
					service: service
				},
				success: function(msg){
					jQuery('#sename').removeClass('is-invalid');
					switch(JSON.parse(msg)){
						case 'error_name':
							jQuery('#sename').addClass('is-invalid').focus();
						break;
						case 'error_send':
							jQuery('#service-model').modal('hide');
							jQuery('header .container-lg').prepend('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Внимание!</strong> Ошибка почтового сервера. Попробуйте повторить позднее.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
							setTimeout(function(){jQuery('header .alert').remove()}, 4600);
						break;
						case 'form_send':
							jQuery('#service-model').modal('hide');
							jQuery('#sephone,#sename').val('').removeClass('is-invalid');
							jQuery('header .container-lg').prepend('<div class="alert alert-info alert-dismissible fade show" role="alert"><strong>Спасибо!</strong> Ваше сообщение успешно отправлено, мы свяжемся с вами в ближайшее время.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
							setTimeout(function(){jQuery('header .alert').remove()}, 3600);
					}

					jQuery('#service-form').find('button[type="submit"]').attr('disabled', false);
				}
			});

			return false;
		});
		
		jQuery('#calculate-form').submit(function(){
			jQuery('#calculate-form').find('button[type="submit"]').attr('disabled','disabled');
			var name = jQuery('#caname').val();
			var phone = jQuery('#caphone').val();
			var service = jQuery('#caservice').val();
			var square = jQuery('#casquare').val();
			var caheight = jQuery('#caheight').val();
			var sides = jQuery('#casides').val();
			var glass = jQuery('#caglass').val();
			jQuery.ajax({
				url: "/wp-admin/admin-ajax.php",
				method: 'post',
				data: {
					action: 'calc_form',
					name: name,
					phone: phone,
					service: service,
					square: square,
					height: caheight,
					sides: sides,
					glass: glass
				},
				success: function(msg){
					jQuery('#caname').removeClass('is-invalid');
					
					switch(JSON.parse(msg)){
						case 'error_name':
							jQuery('#caname').addClass('is-invalid').focus();
						break;
						case 'error_send':
							jQuery('#calculate-model').modal('hide');
							jQuery('header .container-lg').prepend('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Внимание!</strong> Ошибка почтового сервера. Попробуйте повторить позднее.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
							setTimeout(function(){jQuery('header .alert').remove()}, 4600);
						break;
						case 'form_send':
							jQuery('#calculate-model').modal('hide');
							jQuery('#caphone,#caname').val('').removeClass('is-invalid');
							jQuery('#casquare,#caheight,#casides,#caglass').val('0');
							jQuery('header .container-lg').prepend('<div class="alert alert-info alert-dismissible fade show" role="alert"><strong>Спасибо!</strong> Ваше сообщение успешно отправлено, мы свяжемся с вами в ближайшее время.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
							setTimeout(function(){jQuery('header .alert').remove()}, 3600);
					}

					jQuery('#calculate-form').find('button[type="submit"]').attr('disabled', false);
				}
			});

			return false;
		});
		
		var swiperInfo = new Swiper('#advantages .swiper-container', {
      		slidesPerView: 1,
      		spaceBetween: 5,
			loop: true,
			autoplay: {
    			delay: 4500,
  			},
      		pagination: false,
			navigation: {
    			nextEl: '.swiper-button-next',
    			prevEl: '.swiper-button-prev',
  			},
      		breakpoints: {
        		360: {
          			slidesPerView: 1,
          			spaceBetween: 0,
        		},
        		400: {
          			slidesPerView: 1,
          			spaceBetween: 0,
        		},
        		768: {
          			slidesPerView: 2,
          			spaceBetween: 0,
        		},
        		1200: {
          			slidesPerView: 3,
          			spaceBetween: 0,
        		},
      		}
    	});
		
		var swiperGalwork = new Swiper('#galworks .swiper-container', {
      		slidesPerView: 1,
      		spaceBetween: 11,
			loop: true,
			autoplay: {
    			delay: 5500,
  			},
      		pagination: {
    			el: '.swiper-pagination'
  			},
			navigation: {
    			nextEl: '.swiper-button-next',
    			prevEl: '.swiper-button-prev',
  			},
      		breakpoints: {
        		360: {
          			slidesPerView: 1,
          			spaceBetween: 0,
        		},
        		400: {
          			slidesPerView: 1,
          			spaceBetween: 0,
        		},
        		768: {
          			slidesPerView: 2,
          			spaceBetween: 0,
        		},
        		1200: {
          			slidesPerView: 3,
          			spaceBetween: 0,
        		},
      		}
    	});
		
		var swiperTrusted = new Swiper('#trusted .swiper-container', {
      		slidesPerView: 1,
      		spaceBetween: 15,
			loop: true,
			autoplay: {
    			delay: 4500,
  			},
      		pagination: false,
			navigation: false,
      		breakpoints: {
        		360: {
          			slidesPerView: 3,
          			spaceBetween: 0,
        		},
        		400: {
          			slidesPerView: 3,
          			spaceBetween: 0,
        		},
        		768: {
          			slidesPerView: 4,
          			spaceBetween: 0,
        		},
        		1200: {
          			slidesPerView: 5,
          			spaceBetween: 0,
        		},
      		}
    	});

		
	}
	
	initFunction();
});