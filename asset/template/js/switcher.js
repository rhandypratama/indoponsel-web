		jQuery(document).ready(function($){
			$('.preset-list li a').on('click',function(event){
				event.preventDefault();
				var color = $(this).data('color'),
					url = 'css/presets/'+color+'.css';
					logoSrc = 'img/presets/'+color+'/logo.png';
				
				$('#logo img').attr('src', logoSrc);
				$('#preset').attr('href', url);
			});

			$('.toggoler').on('click',function(){
				$(this).toggleClass('hide-icon')
				$('.style-chooser').toggleClass('active');
			});
		});