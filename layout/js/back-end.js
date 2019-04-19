$(function(){

		'use strict';
    
        //Dashboard plus and minus signs for toggling the lists
    
        $('.toggle-info').click(function(){
            $(this).toggleClass('selected').parent().next('.panel-body').fadeToggle(100);
            
            if($(this).hasClass('selected')){
                $(this).html('<i class="fa fa-minus fa-lg"></i>');
            }else{
                $(this).html('<i class="fa fa-plus fa-lg"></i>');
            }
            
        });
    
        //Trigger The SelectBox
        $("select").selectBoxIt();//("select) is each select box in my site
              
		//Hide Placeholder On From Focus

		$('[placeholder]').focus(function(){

			$(this).attr('data-text', $(this).attr('placeholder'));
			$(this).attr('placeholder', '');

		}).blur(function(){


			$(this).attr('placeholder', $(this).attr('data-text'))

		});

		// Add Asterisk On Required Fields *

		$('input').each(function(){

			if($(this).attr('required') === 'required'){

				$(this).after('<span class="asterisk">*</span>');

			}

		});

		// Convert Password Field  To Text Field On Hover

		var field = $('.password');

		$('.show-pass').hover(function(){

			field.attr('type', 'text');

		}, function(){

			field.attr('type', 'password');

		});

		// Confirmation Message On Button

		$('.confirm').click(function(){

			return confirm('Are you sure you want to delete this member');

		});
    
        // Category View Option
        $('.cat h3').click(function(){
            $(this).next('div').fadeToggle();
        });
    
        $('.option span').click(function(){
            $(this).addClass('active').siblings('span').removeClass('active');
            
            if($(this).data('view') === 'full'){
                $('.panel-body .cat .view').fadeIn();
            }else{
                $('.panel-body .cat .view').fadeOut();
            }
        });
    
});