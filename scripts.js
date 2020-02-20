		$('document').ready(function(){
			$('#file').on('change', function(){
				 checkfile(this);			 
			});
			
			$('input[name=delivery]').change(function(){
				if ($(this).val() == 'collection'){
					$('#step4b').slideUp(); 
					$('#step4a').slideDown(); 						
				}				
				else{
					$('#step4a').slideUp();
					$('#step4b').slideDown(); 					
				}	
				
				total();			
			});
			
			$('.info1').keyup(function(){
				$('#basket').css('background','url(img/basketfull.png)');
				$('#basket').css('background-position','0 0');
				$('#basket').addClass('full');
			});
			
			$('.info2').keyup(function(){
				$('#basket').css('background','url(img/basketfull.png)');
				$('#basket').css('background-position','0 0');
				$('#basket').addClass('full');
			});			
			
			$('input[name=format]').change(function(){
				$('#step2').slideDown(); 
				total();	 	
			});
			
			$('.numbersOnly').keyup(function () { 
				 $('#step3').slideDown(); 
   				 this.value = this.value.replace(/[^0-9\.]/g,''); 
   				 total();
			});
			
			function total(){				
				 if ($('input:radio[name=delivery]:checked').val() == 'home' || $('input:radio[name=delivery]:checked').val() == 'post')
   				 	delivery = 5;	
   				 else 
   				 	delivery = 0;
   				 	
   				 	
   				 if ($('.numbersOnly').val() != 0)	
   				 	pages = $('.numbersOnly').val();	
   				 else	
   				 	pages = 0;
   				 		
   				 if ($('input:radio[name=format]:checked').val() == 'colour')
   				 	$('#price').val(Math.round((pages * 0.25 + delivery) * 100)/100);
   				 else  
   				 	$('#price').val(Math.round((pages * 0.1 + delivery) * 100)/100);
			}
			
			$('#basket').click(function(){
				if ($('.info1').val() != '' || $('.info2').val() != ''){
					$('#form').submit();
				}
					
			});
			
			$('#basket')
			.mouseenter(function(){
				$(this).css('background-position','0 -300px');
				if ($(this).hasClass('full'))
					$('#basket_text_post').show();
				else
					$('#basket_text_pre').show();
			})
			.mouseleave(function(){
				$(this).css('background-position','0 0');
				if ($(this).hasClass('full'))
					$('#basket_text_post').hide();
				else
					$('#basket_text_pre').hide();				
			});
			
			function checkfile(sender) {
		    var validExts = new Array(".txt", ".pdf", ".doc", ".docx", ".xlsx", ".xls", ".odt");
		    var fileExt = sender.value;
		    fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
			    if (validExts.indexOf(fileExt) < 0) {
			      	alert("Invalid file selected, valid files are of " +
			               validExts.toString() + " types.");
			               $('#step5').slideUp(); 
			      	return false;
			    	}
			    else {
			    	$('#step5').slideDown(); 
			    	$('#file_container').css('background','url(img/upload_green.png)');
			    	return true;
			    }
		        
			}
							
		});