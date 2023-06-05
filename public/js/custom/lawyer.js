$(document).ready(function() {

    // Получение айдишника заявления для привязки юристу или просмотра анкеты
    let appl_number
    // Открытие модального окна и получение айдишника заявления при принятии заявления
    $('.openModal').click(function(event) {
        appl_number = event.target.id
        event.preventDefault();
        $('#myModal').modal('show');
    });
    // Закрытие модального окна
    $('.close').click(function() {
        $('#myModal').fadeOut();
    });

//     Подтверждение принятия заявления
    $('#confirmApplication').click(function (e){
        $(window).scrollTop(0);
        $('#myModal').modal('hide')
        $(`#application_${appl_number}`).fadeOut()
        $.ajax({
            method:'POST',
            url:'/api/lawyer/store',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: appl_number,
                lawyer_id: $('#lawyer_id').val()
            },
            success:function(data) {
                $('#changeSuccess').text(data.message).show()
                setTimeout(function() {
                    $('#changeSuccess').fadeOut();
                }, 2000);
            }
        });
        appl_number = null
    })

//     Открытие модального окна для просмотра заявки
    $('.openAplModal').click(function (event){
        event.preventDefault()
        appl_number = event.target.id
        $('#myModalApl').modal('show')
        $('#modalTitle').text('Заявление № '+ $(`#appId_${appl_number}`).val())
        $('#modalClient').text( $(`#appName_${appl_number}`).val())
        $('#modalClientPhone').text( $(`#appPhone_${appl_number}`).val())
        $('#modalContent').text( $(`#appContent_${appl_number}`).val())
        $(`#appComment_${appl_number}`).val() ? $('#dropCommentArea').show(): $('#dropCommentArea').hide()
        $('#modalComment').text( $(`#appComment_${appl_number}`).val())
        $('#modalImage').attr("src", $(`#appImage_${appl_number}`).val())
    })

//  Вызов кнопок очистки и применения фильра
        $('#filterBar').on('input', function (){
            $('.filter-btns').fadeIn()
        })

//      Очистка инпутов
    function cleanInputs(){
        $('.filter-btns').fadeOut()
        $('#filterForm').trigger('reset');
    }
    $('#cleanFilter').click(function (){
        cleanInputs()
        event.preventDefault()
        // console.log(formData)
        $.ajax({
            method:'POST',
            url:'/api/application/index',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data) {
                console.log(data)
                $('#applicationTable').html(data);
            }
        });
    })

//     Применить фильтр
    $('#confirmFilter').click(function (event){
        event.preventDefault()
        formData = new FormData($('#filterForm')[0])
        // console.log(formData)
        $.ajax({
            method:'POST',
            url:'/api/application/index',
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            success:function(data) {
                console.log(data)
                $('#applicationTable').html(data);
            }
        });
        // cleanInputs()
    })

});
