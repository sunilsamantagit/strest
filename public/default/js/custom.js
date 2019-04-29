// JavaScript Document

$(function(){
	
	//equalheight jquery start
	$(window).bind("load", function() {
		equalHeight($(".home-testi ul li .block"));
	});
	
		
	//form jquery start	
	$('form input[type=text],form input[type=email],form input[type=password], form textarea').each(function(){
		var textVal = $(this).val();
		var idVal = $(this).attr('id');
		
		$('#'+idVal).focus(function(){
			if($(this).val() == textVal)
				$(this).val('');
		});
		
		$('#'+idVal).blur(function(){
			if($(this).val() == '')
				$(this).val(textVal);
		});
		
	});
	
	
	//slider jquery start
	$('.rslides_tabs').wrap('<div class="banner-tab"></div>');
	
	
	//link jquery start
	$('.featured-products ul li').click(function(){
		var linkVal = $(this).children('a').attr('href');
		
		window.location.href = linkVal;

	});
	
	
});


$(window).resize(function() {	
			 
	$(".home-testi ul li .block").css('height','auto');
			 
	equalHeight($(".home-testi ul li .block"));
		
});


function equalHeight(group) {
	 var tallest = 0;
	 group.each(function() {
	 var thisHeight = jQuery(this).height();
	 if(thisHeight > tallest) {
	 tallest = thisHeight;
	 }
	 });
	 group.height(tallest);
}


var onImgLoad = function(selector, callback){
    $(selector).each(function(){
        if (this.complete || /*for IE 10-*/ $(this).height() > 0) {
            callback.apply(this);
        }
        else {
            $(this).on('load', function(){
                callback.apply(this);
            });
        }
    });
};



$(function($, window, document, undefined ) { 
   //https://osvaldas.info/nav-btn-equal-height-blocks
	var $list       = $( '.equalheight' ),
	   $items      = $list.find( '.list__item' ),
	   setHeights  = function()
	   {
		   $items.css( 'height', 'auto' );
	
		   var perRow = Math.floor( $list.width() / $items.width() );
		   if( perRow == null || perRow < 2 ) return true;
	
		   for( var i = 0, j = $items.length; i < j; i += perRow )
		   {
			   var maxHeight   = 0,
				   $row        = $items.slice( i, i + perRow );
	
			   $row.each( function()
			   {
				   var itemHeight = parseInt( $( this ).outerHeight() );
				   if ( itemHeight > maxHeight ) maxHeight = itemHeight;
			   });
			   $row.css( 'height', maxHeight );
		   }
	   };
	
	setHeights();
	$( window ).on( 'resize', setHeights );
	 });





