$(document).ready(function() {
	function mySlider(speed, repeat_count){
		var i = 0;
		var countSlide = 0;
		var sliderMenu = $('#slider-posts').children('li');
		var slideLength = sliderMenu.length - 1;
		
		var slideInterval = setInterval(function(){
			countSlide++;
			sliderMenu.each(function(e){
				var currentClass = $(this).attr('class');

				if(i === 1){
					$('#slider-posts').children('li').removeClass('active');
					$(this).addClass('active');
					var currImgSrc = $(this).attr('data-src');
					$('.active-post-img img').attr('src', currImgSrc);
					i = 0;
				}

				if (currentClass == 'active') {
					if (slideLength !== e) {
						$(this).removeClass('active');
					}

					i = 1;
				}
			});
		}, speed);

		if (countSlide === repeat_count) {
			clearInterval(slideInterval);
		}
	}
	mySlider(3000, 10);

    if ($('#myChart1').length != 0) {
        var myChart1 = new Chart($('#myChart1'), {
            "type":"polarArea",
            "data":{
                "labels":["Red","Green","Yellow"],
                "datasets":[{
                    "label":"My First Dataset",
                    "data":[11,16,7],
                    "backgroundColor":["rgb(255, 99, 132)","rgb(75, 192, 192)","rgb(255, 205, 86)"]
                }]
            }
        });
    }

	if ($('#myChart2').length != 0) {
        var myChart2 = new Chart($('#myChart2'), {
            "type":"doughnut",
            "data":{
                "labels":["Red","Blue","Yellow"],
                "datasets":[{
                    "label":"My First Dataset",
                    "data":[300,50,100],
                    "backgroundColor":["rgb(255, 99, 132)","rgb(54, 162, 235)","rgb(255, 205, 86)"]
                }]
            }
        });
    }

	$('#catEdit').on('submit', function(e){
		e.preventDefault();
		var data = $(this).serialize();
		$.ajax({

            type: 'POST',

            url: '/admin/libraries/ajax.php',

            data: data,

            beforeSend: function(){
            	$('#preloader').addClass('active');
            },

            success: function(data) {

                $('#preloader').removeClass('active');
                var result = JSON.parse(data);
                var resultClass;
                if (result.result == 'true') {
                	resultClass = 'success';
                }else if(result.result == 'false'){
                	resultClass = 'error';
                }
                $('body').append('<div id="ajax-result" class=" '+resultClass+'">'+result.text+'</div>');
                setTimeout(function(){
                	$('#ajax-result').detach();
                }, 1000);
                window.location.replace("/admin/?page=category");

            },

            error:  function(xhr, str){

                console.log('Возникла ошибка: ' + xhr.responseCode);

            }

        });
	});
	$('.catDelete').on('click', function(e){
		e.preventDefault();

		var data = {
			id: $(this).attr('data-id'),
			csrf_token: $(this).attr('data-token')
		};
		$.ajax({

            type: 'POST',

            url: '/admin/libraries/ajax.php',

            data: data,

            beforeSend: function(){
            	$('#preloader').addClass('active');
            },

            success: function(data) {

                $('#preloader').removeClass('active');
                var result = JSON.parse(data);
                var resultClass;
                if (result.result == 'true') {
                	resultClass = 'success';
                }else if(result.result == 'false'){
                	resultClass = 'error';
                }
                $('body').append('<div id="ajax-result" class=" '+resultClass+'">'+result.text+'</div>');
                setTimeout(function(){
                	$('#ajax-result').detach();
                }, 1000);
                location.reload();

            },

            error:  function(xhr, str){

                console.log('Возникла ошибка: ' + xhr.responseCode);

            }

        });
	});

	$('#catAdd').on('submit', function(e){
		e.preventDefault();
		var data = $(this).serialize();
		$.ajax({

            type: 'POST',

            url: '/admin/libraries/ajax.php',

            data: data,

            beforeSend: function(){
            	$('#preloader').addClass('active');
            },

            success: function(data) {

                $('#preloader').removeClass('active');
                var result = JSON.parse(data);
                var resultClass;
                if (result.result == 'true') {
                	resultClass = 'success';
                }else if(result.result == 'false'){
                	resultClass = 'error';
                }
                $('body').append('<div id="ajax-result" class=" '+resultClass+'">'+result.text+'</div>');
                setTimeout(function(){
                	$('#ajax-result').detach();
                }, 1000);
                window.location.replace("/admin/?page=category");

            },

            error:  function(xhr, str){

                console.log('Возникла ошибка: ' + xhr.responseCode);

            }

        });
	});

	$('.postDelete').on('click', function(e){
		e.preventDefault();

		var data = {
			id: $(this).attr('data-id'),
			csrf_token: $(this).attr('data-token')
		};
		$.ajax({

            type: 'POST',

            url: '/admin/libraries/ajax.php',

            data: data,

            beforeSend: function(){
            	$('#preloader').addClass('active');
            },

            success: function(data) {

                $('#preloader').removeClass('active');
                var result = JSON.parse(data);
                var resultClass;
                if (result.result == 'true') {
                	resultClass = 'success';
                }else if(result.result == 'false'){
                	resultClass = 'error';
                }
                $('body').append('<div id="ajax-result" class=" '+resultClass+'">'+result.text+'</div>');
                setTimeout(function(){
                	$('#ajax-result').detach();
                }, 1000);
                location.reload();

            },

            error:  function(xhr, str){

                console.log('Возникла ошибка: ' + xhr.responseCode);

            }

        });
	});

	$('#postEdit').on('submit', function(e){
		e.preventDefault();
		var data = $(this).serialize();
		$.ajax({

            type: 'POST',

            url: '/admin/libraries/ajax.php',

            data: data,

            beforeSend: function(){
            	$('#preloader').addClass('active');
            },

            success: function(data) {

                $('#preloader').removeClass('active');
                var result = JSON.parse(data);
                var resultClass;
                if (result.result == 'true') {
                	resultClass = 'success';
                }else if(result.result == 'false'){
                	resultClass = 'error';
                }
                $('body').append('<div id="ajax-result" class=" '+resultClass+'">'+result.text+'</div>');
                setTimeout(function(){
                	$('#ajax-result').detach();
                }, 1000);
                window.location.replace("/admin/?page=post");

            },

            error:  function(xhr, str){

                console.log('Возникла ошибка: ' + xhr.responseCode);

            }

        });
	});

	$('#postAdd').on('submit', function(e){
		e.preventDefault();
		var data = $(this).serialize();
		$.ajax({

            type: 'POST',

            url: '/admin/libraries/ajax.php',

            data: data,

            beforeSend: function(){
            	$('#preloader').addClass('active');
            },

            success: function(data) {

                $('#preloader').removeClass('active');
                var result = JSON.parse(data);
                var resultClass;
                if (result.result == 'true') {
                	resultClass = 'success';
                }else if(result.result == 'false'){
                	resultClass = 'error';
                }
                $('body').append('<div id="ajax-result" class=" '+resultClass+'">'+result.text+'</div>');
                setTimeout(function(){
                	$('#ajax-result').detach();
                }, 1000);
                window.location.replace("/admin/?page=post");

            },

            error:  function(xhr, str){

                console.log('Возникла ошибка: ' + xhr.responseCode);

            }

        });
	});

	$(".dropdown-trigger").dropdown();
	$('select').material_select();

});