$(function(){

  $('.search').on('keypress', function (e) {
         if(e.which === 13){
            var content = $(this).val();
            var url = $(this).data('url');
            window.location = url + '/' + content;
         }
   });
    
	$('.book div.noliked').click(function(){
  		id = $(this).attr('id');
  		url = $(this).data('url');
  		$.ajax({
  			headers: {
    			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  			},
            method: 'POST',
            url: url,
            data: {
	            'book_id': id,
	            'type': 'like'
        	}
        });
        var score = parseInt($(this).parent().children('.total').text());
        $(this).parent().children('.total').text(score+1);
        $(this).parent().children('.liked').show();
	    $(this).hide();
	});

	$('.book div.liked').click(function(){
  		id = $(this).attr('id');
  		url = $(this).data('url');
  		$.ajax({
  			headers: {
    			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  			},
            method: 'POST',
            url: url,
            data: {
	            'book_id': id,
	            'type': 'dislike'
        	}
        });
        var score = parseInt($(this).parent().children('.total').text());
        $(this).parent().children('.total').text(score-1);
        $(this).parent().children('.noliked').show();
	    $(this).hide();
	});

	$('.book div.nointerested').click(function(){
  		id = $(this).attr('id');
  		url = $(this).data('url');
  		$.ajax({
  			headers: {
    			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  			},
            method: 'POST',
            url: url,
            data: {
	            'book_id': id,
	            'type': 'interest'
        	}
        });
        var score = parseInt($(this).parent().children('.total').text());
        $(this).parent().children('.total').text(score+1);
        $(this).parent().children('.interested').show();
	    $(this).hide();
	});

	$('.book div.interested').click(function(){
  		id = $(this).attr('id');
  		url = $(this).data('url');
  		$.ajax({
  			headers: {
    			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  			},
            method: 'POST',
            url: url,
            data: {
	            'book_id': id,
	            'type': 'disinterest'
        	}
        });
        var score = parseInt($(this).parent().children('.total').text());
        $(this).parent().children('.total').text(score-1);
        $(this).parent().children('.nointerested').show();
	    $(this).hide();
	});

  $('.books .book div.comment-symbol').click(function(){
      url = $(this).data('url');
      window.location.href = url;
  });

  $('.book.view div.comment-symbol').click(function(){
     $("html, body").animate({
      scrollTop : $('#comments').offset().top
      }, 'slow');
  });

  $('.star').click(function(){
    n = $(this).attr('id');
    id = $(this).parent().attr('id');
    url = $(this).parent().data('url');
    $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
            method: 'POST',
            url: url,
            data: {
              'book_id': id,
              'note': n,
              'type': 'note'
          }
    });
    $('.star').each(function() {
      if(parseInt($(this).attr('id')) <= parseInt(n)){
        $(this).addClass('gold');
      }
      else{
        $(this).removeClass('gold');
      }
    });
  });

});