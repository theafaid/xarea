$('[data-fancybox="product-card"]').fancybox({
  
    // Change open/close animation
    animationEffect   : "fade",
    animationDuration : 330,

		// Change gallery item transition effect
		transitionEffect : 'slide',

		// Disable unnecessary modules
		thumbs     : false,
		fullScreen : false,
		slideShow  : false,

		// Disable vertical drag
		touch : {
			vertical : false
		},
  
    // Close only if clicked around quick-view area
    clickOutside : 'close',
		clickSlide   : 'zoom',

		// Custom template
		baseTpl :

			'<div class="fancybox-container qv-container" role="dialog" tabindex="-1">' +
				'<div class="fancybox-bg"></div>' +
        '<div class="fancybox-outer">' +
				  '<div class="fancybox-inner">' +
					  '<button data-fancybox-prev title="{{PREV}}" class="fancybox-arrow fancybox-arrow--left" />' +
					  '<button data-fancybox-next title="{{NEXT}}" class="fancybox-arrow fancybox-arrow--right" />' +
					  '<button data-fancybox-close class="qv-close">X</button>' +
				  	'<div class="fancybox-stage"></div>' +
          '</div>' +
				'</div>' +
			'</div>',

		// Add form inside modal
    beforeShow : function(instance, current, firstRun) {

      // Remove any previously created form
      $("#qv-form-clone").remove();

      // Get current product id
      var qvID = current.opts.$orig.data('qv-id');

      // Find product form
      var $qvForm  = $( '#' + qvID + '-form' );

      // Clone form and add inside modal
      $qvForm.clone( true ).attr('id', 'qv-form-clone').appendTo( instance.$refs.container.find('.fancybox-outer') ).show().on("submit", function() {
        
        // You can choose what to do after user submits the form
        // for eample, display login form or a cart
        $.fancybox.open('<div><h2>Thank you!</h2><p>An email confirmation has been sent to you</p></div>', {
          beforeClose : function() {
            instance.close();
          }
        });
        
        return false;
      });
		}

});
