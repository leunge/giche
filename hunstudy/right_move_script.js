$(document).ready(function(){
/* Executed on DOM load */

	
	
	$("#quotes-hide").mousemove(function(e){
		/* The scrollable quote container */

		if(!this.hideDiv)
		{
			/* These variables are initialised only the firts time the function is run: */
			
			this.hideDiv = $(this);
			this.scrollDiv = $('#quotes-slide');

			this.pos = this.hideDiv.offset();
			this.pos.left-=30;
			/* Adding a 20px offset, so that the scrolling begins 20px from the top */
			
			
			this.slidewidth = this.scrollDiv.width();
			
			this.width = this.hideDiv.width();
			this.width-=-10;
			/* Adding a bottom offset */
						
			this.totScroll = this.slidewidth-this.width;
		}
		
		this.scrollDiv.css({
			/* Remember that this.scrollDiv is a jQuery object, as initilised above */
			
			marginLeft:'-'+this.totScroll*(Math.max(e.pageX-this.pos.left,0)/this.width)+'px'
			/* Assigning a negative top margin according to the position of the mouse cursor, passed
			   with e.pageY; It is relative to the page, so we substract the position of the scroll container */
		});
		
	});

});
