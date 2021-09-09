$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});

$('body').on('click', '#btn-login', function(e){
    e.preventDefault();
    const target = $(this).attr('href');

    $.ajax({
        url: target,
        success: function(res){
            $('#modal').modal('show');
            $('.modal-title').text('MeMart');
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
            if(res.status_code == 200){
                Toast.fire({
                    icon: 'success',
                    title: res.message
                });

                $('#modal').modal('hide');

                setTimeout(() => {
                    window.location.href = '/home';
                }, 3200);
            }
        },
        error: function(err){
            if(err.responseJSON.status_code === 401)
            {
                Toast.fire({
                    icon: 'error',
                    title: err.responseJSON.message
                });
            }
        }
    });
});

$('body').on('submit', '#form-logout', function(e){
    e.preventDefault();

    const url = $(this).attr('action'),
        form = $(this).serialize();

    Swal.fire({
        icon: 'question',
        title: 'Are you sure ?',
        showCancelButton: true,
        confirmButtonColor:'#d42215',
        cancelButtonColor: '#666666',
    }).then((res) => {
        if(res.value){
            $.ajax({
                url: url,
                method:'POST',
                data: form,
                success: function(res){
                    Swal.fire({
                        icon:'success',
                        title: res.msg
                    });

                    setTimeout(() => {
                        window.location.href = '/';
                    }, 2200);
                }
            });
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
