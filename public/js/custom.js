// JavaScript Document

$(function(){


	//var windowWith =  $(window).width();
	//var docum = $(document).height()-60;
	//$('.leftDiv').height(docum)
	//$('.leftDiv').height()
	//$('.rightDiv').height(docum)
	//$('.rightDiv').height()


	//form jquery start
	/*$('form input[type=text],form input[type=email],form input[type=password], form textarea').each(function(){
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

	});	*/



	//$('.cat-list li a').attr('href','javascript:void(0)');

	$('.cat-list li').click(function(){
		//alert("ss");
			var cheClass = $(this).children('div.cat-cont').hasClass('activeWidth');
			var cheClassA = $(this).children('a').addClass('active');
			 $('.cat-list li').children('div.cat-cont').slideUp();
			 $('.cat-list li').children('div.cat-cont').removeClass('activeWidth');
			  $('.cat-list li').children('a').removeClass('active');

			  if(cheClass == false){
			   $(this).children('div.cat-cont').slideDown()
			    $(this).children('div.cat-cont').addClass('activeWidth');
				$(this).children('a').addClass('active');
			  }else{
			   $(this).children('div.cat-cont').slideUp();
			   $(this).children('div.cat-cont').removeClass('activeWidth');
			   $(this).children('a').removeClass('active');
			}
	});

	$('.gray-bottom-border').click(function(){
		//$('.announcements-section li').css('display','block');
	});



	$('.form-rt-align .addemail-btn').click(function(){
	  $('.recipient-pop').slideToggle();
	 });


	$('.question-add').click(function(){
	  $('.ques-drop').slideToggle();


	 });


	 $('.ques-drop Li').click(function(){
		 $('.gray-bg').removeClass('hide-section');
		 $('.ques-drop').slideUp();

		 //var docum = $(document).height()-60;
                //$('.leftDiv').height(docum)
		//$('.leftDiv').height()
		//$('.rightDiv').height(docum)
		//$('.rightDiv').height()
	 });

	 $('.announcement-save').click(function(){

		 var qustionTitle = $('#queTitle').val();
		 var qustext = $('#queText').val();
		 var statusCla = $('.announcements-section-outer').hasClass('show-section');
		 if(statusCla == false ){
		 	$('.announcements-section-outer').addClass('show-section');
		 }

			$('.announcements-section').append('<li><h4 class="announcement-header">'+qustionTitle+'</h4><p>'+qustext+'</p><div class="single-column"><input type="text" name=""></div><div class="single-column"><a class="edit-btn announcement-btn"><span>Edit</span></a><a class="delete-red-btn announcement-btn"><span>Delete</span></a></div></li>');
			 $('.gray-bg').addClass('hide-section');
			 $('.form-rt-align input').val('');
		 $('.form-rt-align textarea').val('');


	 });

	 $('.announcement-cancel').click(function(){
		 $('.gray-bg').addClass('hide-section');
		 $('.form-rt-align input').val('');
		 $('.form-rt-align textarea').val('');
	 });

	$('.update-status').click(function(){
		var updateStatus = $("#status").val();
		var lightBoxId = "#"+updateStatus+'1';
		$.fancybox(lightBoxId);
	});


	// show more post
	 var size_li = $(".comment-list li").size();
     var x=3;

    $('.comment-list li:lt('+x+')').show();
    $('#loadMore').click(function () {

        x = (x+5 <= size_li) ? x+5 : size_li;

        $('.comment-list li:lt('+x+')').show();

		if( x === size_li){
			$('#loadMore').addClass('hide-load-more');
		}
    });


	//hide more post

   /* $('#showLess').click(function () {
        x=(x-5<0) ? 3 : x-5;
        $('.comment-list li').not(':lt('+x+')').hide();
    });*/

	/*$('.news-select select').change(function() {
		var optionVal =  $(this).val();
		if(optionVal === 'nul'){
			$('#create-category').slideUp();
		}else if(optionVal === 'nul1'){
			$('#create-venue').slideUp();
		}else{
			$('#'+optionVal).slideDown();
		}
	});*/

	$('.temp_category select').change(function() {
		var optionVal =  $(this).val();
		if(optionVal != 'create-category'){
			$('#create-category').slideUp();
		}else{
			$('#'+optionVal).slideDown();
		}
	});

	$('.temp_venue select').change(function() {
		var optionVal =  $(this).val();
		if(optionVal != 'create-venue'){
			$('#create-venue').slideUp();
		}else{
			$('#'+optionVal).slideDown();
		}
	});

	$('.temp_template select').change(function() {
		var optionVal =  $(this).val();
		if(optionVal != 'create-template'){
			$('#create-template').slideUp();
		}else{
			$('#'+optionVal).slideDown();
		}
	});
//$('.fancybox').fancybox();

});

/*jQuery(document).ready(function(){
	setTimeout(function(){
		var docum = $(document).height()-60;
		$('.leftDiv').height(docum);
          $('.rightDiv').height(docum); return false;}, 300);
});*/




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



function change_status(id,status,field_id,table,controller){//alert(base_url);
    var st = '1';
    $.ajax({
	type: "POST",
	async: false,
	url: base_url+"kaizen/"+controller+"/ajaxChangeStatus/",
	data: {id:id,status:status,field_id:field_id,table:table,controller:controller},
	success: function(data){
            //alert(data);
            if(data==1){
                if(status=='0'){
                    st = '1';
                    var img = base_url+'public/images/locked_icon.gif';
                    var alt = 'Inactive';
                }else{
                    st = '0';
                    var img = base_url+'public/images/unlock_icon.gif';
                    var alt = 'Active';
                }
                $('#'+field_id+id).html('');
                $('#'+field_id+id).html('<a href="javascript:void(0)" onclick="change_status(\''+id+'\',\''+st+'\',\''+field_id+'\',\''+table+'\',\''+controller+'\')" title="'+alt+'" ><img src='+img+' alt="'+alt+'"/></a>');
                $('#status_mesage').show();
                $('#status_mesage').html('Status Changed Successfully.');
                $('#status_mesage').hide(3000);
            }else{
                $('#status_mesage').show();
                $('#status_mesage').html('Status Not Changed Successfully.');
                $('#status_mesage').hide(3000);
            }
	},
    });
}


function imagedelete(id,field_name,table_name,folder_name){
    if(confirm("Are you sure want to delete image?")){
            window.location.href=base_url+"kaizen/"+current_class+"/imagedelete/"+"?deleteid="+id+"&field_name="+field_name+"&table_name="+table_name+"&folder_name="+folder_name+"&module_name="+current_class;
    }
    else{
            return false;
    }
}
function rowdelete(id,table_name){
    if(confirm("Are you sure want to delete?")){
            window.location.href=base_url+"kaizen/"+current_class+"/rowdelete/"+"?deleteid="+id+"&table_name="+table_name+"&module_name="+current_class;
    }
    else{
            return false;
    }
}

function showseopanel(x){
    $('.droplists').hide();
    $('#'+x).slideToggle('slow');
}


function imagedeletecommon(deleteid,field_id,fieldname,tablename,controller,folder_name,hidden_id,msgdiv,imgdiv){
    if(typeof msgdiv=='undefined'){
        msgdiv='imagedeletesuccess';
    }
    if(typeof imgdiv=='undefined'){
        imgdiv='banner_photodiv';
    }
    //alert(msgdiv);
          	$.ajax({
          			    type: "POST",
                                    async: false,
          				url : base_url+"kaizen/"+controller+"/imagedeletecommon/",
          				data: { deleteid:deleteid,fieldname:fieldname,tablename:tablename,controller:controller,folder_name:folder_name,field_id:field_id},
          				dataType : "html",
          				success: function(data)
          				{
                    if(data){
                        //alert("#"+msgdiv);
                      $("#"+msgdiv).html(data);
                    }
                    else{
                      $("#"+msgdiv).html("<p style='color:red;font-size: 14px;font-weight: bold;'>Image deleted successfully.</p>");
					  $("#"+hidden_id).val('');
                      $("#"+imgdiv).hide();
                    }
          				},
          				error : function()
          				{
		                $("#"+msgdiv).html("<p style='color:red;font-size: 14px;font-weight: bold;'>Sorry, The requested property could not be found.</p>");
          					//alert("Sorry, The requested property could not be found.");
          				}
          			});
          }


function checkDuplicate(id,table,field,currentData,message_div,current_id){
    $.ajax({
	type: "POST",
	async: false,
	url: base_url+'kaizen/user/checkDuplicateValue',
	data: {id:id,table:table,field:field,currentData:currentData},
	success: function(data){
		if(data!=0){
                    $('#'+message_div).html(data);
                    $('#'+current_id).val('');
                    $('#'+current_id).focus();
                }else{
                    $('#'+message_div).html('');
                }
	},
    });
}
