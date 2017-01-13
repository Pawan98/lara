$('.like').on('click', function(event) {
    event.preventDefault();
    
    var isLike = event.target.previousElementSibling == null;
    $.ajax({
        method: 'POST',
        url: urlLike,
        data: {isLike: isLike,_token: token}
    })