;(function(){

	// Namespace pyrocms docs functions
	pyrodocs = {

		auto_heading_anchors : function() {

			var me = this;
			var content = $('#content');
			// Select all heading tags
			var headings = $('h1,h2,h3,h4,h5,h6', content);

			headings.each(function(index) {
    			
    			var element = $(this);

				var slug = index+'_'+me.generate_slug(element.text());

				var url = location.protocol+'//'+document.domain+location.pathname+'#'+slug;

				element.prepend('<a name="'+slug+'" class="anchor hidden" href="'+url+'">&nbsp;</a>');

			});

			var anchors = $('a.anchor');

			headings.hover(
			  function () {
			    $('a.anchor', this).removeClass('hidden');
			  }, 
			  function () {
			    $('a.anchor', this).addClass('hidden');
			  }
			);

			$('a.anchor').hover(
			  function () {
			    $(this).removeClass('hidden');
			  }, 
			  function () {
			    $(this).addClass('hidden');
			  }
			);

		},

		generate_slug : function(string, separator) {

			separator = separator || '_', string = string || '';

	        var slug = string.toString().toLowerCase()
	        .replace(/\s+/g, separator)			// Replace spaces with -
	        .replace(/[^\w\-]+/g, '')			// Remove all non-word chars
	        .replace(/\-\-+/g, separator)		// Replace multiple - with single -
	        .replace(/^-+/, '')					// Trim - from start of text
	        .replace(/-+$/, '');				// Trim - from end of text

	        // console.log('Generated slug : ' + slug);

	        return slug;

		}

	}

	jQuery(document).ready(function($) {
  		
  		pyrodocs.auto_heading_anchors();
	
	});

})();