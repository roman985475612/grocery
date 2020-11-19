jQuery(function($) {

    $('#main-menu a').each(function() {
        if (location.href === this.href) {
            $(this).addClass('active')
        }
    })

    $('.action-view').on('click', function () {
        var id = $(this).data('id')
        var url = '/admin/order/' + id

        $.get(url, function(data, status){
            var order = JSON.parse(data)

            var table = '<table class="table">'
            var i
            for (i in order) {
                table += '<tr>'+'<th>' + i + '</th>'+'<td>'+ order[i] +'</td>'+'</tr>'    
            }

            table += '</table>'

            $('#actionBtn').css('display', 'none')
            $('.modal-title').text('Заказ №' + order.id)
            $('.modal-body').html(table)
            $('#exampleModal').modal('show')
        })

        return false
    })

    $('.action-edit').on('click', function () {
        var id = $(this).data('id')
        var url = '/admin/order/' + id + '/edit'

        $.get(url, function(data, status){
            $('#actionBtn').text('Save').css('display', 'block').addClass('btn-warning')

            $('.modal-title').text('Редактирование заказа №' + id)
            $('.modal-body').html(data)
            $('#exampleModal').modal('show')
        })

        $('#actionBtn').on('click', function () {
            var csrfToken = $('meta[name="csrf-token"]').attr("content")

            $.post(url, {
                "_csrf": csrfToken,
                "Order[note]": $('#order-note').val(),
                "Order[address]": $('#order-address').val()
            }, function(data, status) {
                location.reload()
            })
        })

        return false
    })

    $('.action-delete').on('click', function () {
        var id = $(this).data('id')
        var url = '/admin/order/' + id + '/delete'

        $('.modal-title').text('Удаление заказа №' + id)
        $('.modal-body').text('Вы уверены, что хотите удалить заказ?')
        $('#actionBtn').text('Delete').css('display', 'block').addClass('btn-danger')
        $('#exampleModal').modal('show')

        var csrfToken = $('meta[name="csrf-token"]').attr("content")
        
        $('#actionBtn').on('click', function () {
            $.post(url, {"_csrf": csrfToken}, function(data, status) {
                location.reload()
            })
        })

        return false
    })
})