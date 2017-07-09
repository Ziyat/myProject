 $(document).ready(function() {
 	$('select').material_select();
 	$('.collapsible').collapsible();
   
	$(".button-collapse").sideNav();

	$("#mobilePhone").mask('+000 (00) 000-00-00');
	$("#birthDate").mask('0000-00-00');
	$('.tooltipped').tooltip({delay: 50});

	var appeal_number = $('#appeal_number'),
		appeal_number_label = $('#appeal_number').next().text(),
		appeal_secret = $('#appeal_secret'),
		appeal_secret_label = $('#appeal_secret').next().text(),
		checkAppeal = $('#checkAppeal');
function validateInputAppeal(word) {
    var A = {};
    var result = '';

    A["'"] = "_";
    A["\""] = "_";
    A["OR"] = "_";
    A["="] = "_";
    A["|"] = "_";
    A["&"] = "_";
    A["SELECT"] = "_";
    A["*"] = "_";
    A["FROM"] = "_";
    A[" "] = "_";
    A["\\"] = "_";
    A["/"] = "_";
    A[":"] = "_";
    A[";"] = "_";
    A["%"] = "_";
    A["-"] = "_";

  for (var i = 0; i < word.length; i++) {
    var c = word.charAt(i);

    result += A[c] || c;
  }

  return result;
}
	appeal_number.keyup(function(){
		var oldText = $(this).val();
		var newText = validateInputAppeal(oldText);
		$(this).val(newText);
	});
	appeal_secret.keyup(function(){
		var oldText = $(this).val();
		var newText = validateInputAppeal(oldText);
		$(this).val(newText);
	});
	checkAppeal.click(function() {
		appeal_number_val = $('#appeal_number').val();
		appeal_secret_val = $('#appeal_secret').val();
		$(this).children().text('query_builder');
		$(this).toggleClass('grey');
		if(appeal_number_val.length > 15 || appeal_number_val.length < 5)
		{
			$(this).toggleClass('grey');
			$(this).children().text('done');
			$('#appeal_result').html('Ошибки: <br/><b class="red-text">'+appeal_number_label+' <br/> '+appeal_secret_label+'</b>');

		}else if(appeal_secret_val.length > 8 || appeal_secret_val.length < 5){

			$(this).toggleClass('grey');
			$(this).children().text('done');
			$('#appeal_result').html('Ошибки: <br/><b class="red-text">'+appeal_number_label+' <br/> '+appeal_secret_label+'</b>');
			
		}else{
			$.get( "/appeals/check/"+ appeal_number_val +"/"+ appeal_secret_val , function( data ) {
			  $('#appeal_result').html(data);
			});
			$(this).toggleClass('grey');
			$(this).children().text('done');
			
		}
	});
$('.materialboxed').materialbox();
var dataAjax;
function missingPerebor(val){
	if(undefined === val)
	{
		$('#result_search_missing').attr('style','display: none');
	}else
	{
		val = (val.toUpperCase());
		$.ajax({
				  url: "/missing/search/result/"+ val,
				}).done(function(data) {
				  try{
					  dataAjax = JSON.parse(data);
					}
					catch(e) {
						dataAjax = '';
					}

					$('#result_search_missing').attr('style','display: ""');
					$('#img_search_missing').attr('src', dataAjax.img);
					$('#fio_search_missing').text(dataAjax.name);
					$('#birthday_search_missing').text(dataAjax.birth_day);
				})
	}
	
}

$('#missing-input').keyup(function(){
	var $me = $(this);
	var thisVal = $(this).val();
	if(thisVal.length >= 2)
	{
		thisVal = (thisVal.toUpperCase());
		
		$.ajax({
			  url: "/missing/search/"+ thisVal,
			}).done(function(data) {
			  try{
				  dataAjax = JSON.parse(data);
				}
				catch(e) {
					dataAjax = '';
				}
			})

		$me.autocomplete({
			data: dataAjax,
			limit: 20, 
			onAutocomplete: function(val) {
				missingPerebor(val);
			},
			minLength: 5,
		});

	} else if(thisVal.length === 0) {
		missingPerebor();
	}
});



function peoplePerebor(val){
	if(undefined === val)
	{
		$('#result_search_people').attr('style','display: none');
	}else
	{
		val = (val.toUpperCase());
		$.ajax({
				  url: "/people/search/result/"+ val,
				}).done(function(data) {
				  try{
					  dataAjax = JSON.parse(data);
					}
					catch(e) {
						dataAjax = '';
					}

					$('#result_search_people').attr('style','display: ""');
					$('#img_search_people').attr('src', dataAjax.img);
					$('#fio_search_people').text(dataAjax.name);
					$('#birthday_search_people').text(dataAjax.birth_day);
				})
	}
	
}
$('#people-input').keyup(function(){
	var $me = $(this);
	var thisVal = $(this).val();
	if(thisVal.length >= 2)
	{
		thisVal = (thisVal.toUpperCase());
		
		$.ajax({
			  url: "/people/search/"+ thisVal,
			}).done(function(data) {
			  try{
				  dataAjax = JSON.parse(data);
				}
				catch(e) {
					dataAjax = '';
				}
			})

		$me.autocomplete({
			data: dataAjax,
			limit: 20, 
			onAutocomplete: function(val) {
				peoplePerebor(val);
			},
			minLength: 5,
		});

	} else if(thisVal.length === 0) {
		peoplePerebor();
	}
});
function alimonyPerebor(val){
	if(undefined === val)
	{
		$('#result_search_alimony').attr('style','display: none');
	}else
	{
		val = (val.toUpperCase());
		$.ajax({
				  url: "/alimony/search/result/"+ val,
				}).done(function(data) {
				  try{
					  dataAjax = JSON.parse(data);
					}
					catch(e) {
						dataAjax = '';
					}

					$('#result_search_alimony').attr('style','display: ""');
					$('#img_search_alimony').attr('src', dataAjax.img);
					$('#fio_search_alimony').text(dataAjax.name);
					$('#birthday_search_alimony').text(dataAjax.birth_day);
					if($('#descRU_search_alimony')){
						$('#descUZ_search_alimony').text(dataAjax.descUZ);
					}else
					{
						$('#descRU_search_alimony').text(dataAjax.descRU);
					}
				})
	}
	
}
$('#alimony-input').keyup(function(){
	var $me = $(this);
	var thisVal = $(this).val();
	if(thisVal.length >= 2)
	{
		thisVal = (thisVal.toUpperCase());
		
		$.ajax({
			  url: "/alimony/search/"+ thisVal,
			}).done(function(data) {
			  try{
				  dataAjax = JSON.parse(data);
				}
				catch(e) {
					dataAjax = '';
				}
			})

		$me.autocomplete({
			data: dataAjax,
			limit: 20, 
			onAutocomplete: function(val) {
				alimonyPerebor(val);
			},
			minLength: 5,
		});

	} else if(thisVal.length === 0) {
		peoplePerebor();
	}
});  
	var body = $('html, body');

	$('#scrollTop').click(function(){
	    body.animate({scrollTop:0}, 500);
	    return false;
	});   


});
if($('.collection-item').length < 15){
	$('#moreComments').toggleClass('disabled');
	$('#moreComments').text('Комментарий нет');
}
$('#moreComments').click(function(){
	$(this).toggleClass('disabled');
	$(this).html('Загрузка <i class="material-icons left">schedule</i>');
	var newsId = $(this).attr("data-news-id"),
		offset = $('.collection-item').length;
	$.ajax({
		method: "get",
		url: "/comments/more/"+newsId+"/"+offset,
	}).done(function(data) {
		$('#moreComments').toggleClass('disabled');
		$('#moreComments').html('Показать еще');
		try{
			commentsAjax = JSON.parse(data);
			}
		catch(e){
			commentsAjax = '';
			}
		if(commentsAjax != "")
		{
			for (var i = 0; i < commentsAjax.length; i++) {
				// commentsAjax[i]
				$('.collection li:last-child').after('<li class="collection-item"><b class="title">'+commentsAjax[i].name+'</b><p>'+commentsAjax[i].text+'</p><p class="right-align grey-text text-darken-1">'+commentsAjax[i].create_at+'</p></li>');
			}
			
			if(commentsAjax.length < 15)
			{
				$('#moreComments').toggleClass('disabled');
				$('#moreComments').text('Комментарий нет');
			}
			
		}else{
			$('#moreComments').toggleClass('disabled');
			$('#moreComments').text('Комментарий нет');
		}
	});
});