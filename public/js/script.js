$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('body').on('click', '#btn-login', function(e){
    e.preventDefault();
    const target = $(this).attr('href');

    $.ajax({
        url: target,
        success: function(res){
            $('#modal').modal('show');
            $('.modal-title').text('App Name');
            $('.modal-body').html(res);
        }
    });
});

$('body').on('submit', '#form-login', function(e){
    e.preventDefault();

    const url = $(this).attr('action'),
        form = $(this).serialize();

    $.ajax({
        url: url,
        method:'POST',
        data: form,
        success: function(res){
            if(res.msg == 'success'){
                window.location.href = '/home';
            }
        }
    });
});

$('body').on('submit', '#form-logout', function(e){
    e.preventDefault();

    const url = $(this).attr('action'),
        form = $(this).serialize();

    $.ajax({
        url: url,
        method:'POST',
        data: form,
        success: function(res){
            alert(res.msg);
            window.location.href = '/';
        }
    });
});

$('body').on('click', '#btn-show', function(){
   const url = $(this).data('url'),
       name = $(this).data('name');

   $.ajax({
       url:url,
       success:function(res){
           $('.modal-body').html(res);
           $('.modal-title').html("Profit " + name);
           $('#modal').modal('show');
       }
   })
});
