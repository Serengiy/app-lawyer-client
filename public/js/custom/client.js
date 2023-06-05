$(document).ready(function() {
    // Получение айди заявление на изменение статуса
    let app_id

    // Открытие модального окна и получение айдишника заявления при запросе о смене статуса
    $('.openModal').click(function(event) {
        app_id=event.target.id
        $('#myModal').modal('show');
    });

    // Закрытие модального окна
    $('.close').click(function() {
        $('#myModal').fadeOut();
    });

    //Подтверждение изменение статуса заявки и обработка комментария
    $('#confirmStatusChange').click(function (){
        $(window).scrollTop(0);
        $('#myModal').modal('hide')
        $.ajax({
            method:'PATCH',
            url:'/api/application/update',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: app_id,
                comment: $('#comment').val()
            },

            success:function(data) {
                console.log(data)
                $('#changeSuccess').text(data['message']).show()
                $(`#status_${app_id}`).text('Завершена')
                $(`#${app_id}`).hide()
                setTimeout(function() {
                    $('#changeSuccess').fadeOut();
                }, 2000);
                app_id = null
                $('#comment').val('')
            }
        });
    })

//     Отправка нового заявления
    $('#applicationForm').on('submit', function(e) {
        e.preventDefault();
        let formData = new FormData(this);

        $.ajax({
            method: 'POST',
            url: '/api/application/store',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            processData: false,
            contentType: false,
            data: formData,
            success: function(data) {
                console.log(data)
                $('#newApplicationDiv').fadeOut()
                $('#applicationAccepted').show()
            }
        });
    });
});
