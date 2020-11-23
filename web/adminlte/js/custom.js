jQuery(function($) {

    // Active item
    $('#main-menu a').each(function() {
        if (location.href === this.href) {
            $(this).addClass('active')
        }
    })

    function showModal(title, body, footer) {
        $('.modal-title').text(title)
        $('.modal-body').html(body)

        var button = $('#actionBtn')
        button.text(footer.text)
        button.addClass(footer.class)

        $('#exampleModal').modal('show')
    }

    $('.modal-body').on('change', '.custom-file-input', function () {
        let file = $('.custom-file-input')[0].files[0]
        $('.custom-file-label').text(file.name);
        let UrlImg = URL.createObjectURL(file)
        $('#uploadImg').attr('src', UrlImg)
    })

    // Actions
    $('.action-view').on('click', function () {
        var id = $(this).data('id')
        var url = $(this).attr('href')

        $.get(url, function(data, status){
            var obj = JSON.parse(data)

            var body = '<table class="table">'
            var i
            for (i in obj) {
                body += '<tr>'+'<th>' + i + '</th>'+'<td>'+ obj[i] +'</td>'+'</tr>'    
            }
            body += '</table>'

            let title = $('.card-title').text() + ' # ' + id
            let footer = {class: "d-none"}
            showModal(title, body, footer)
        })

        return false
    })
    
    var csrfToken = $('meta[name="csrf-token"]').attr("content")

    $('.action-create').on('click', function () {
        let url = $(this).attr('href')

        $.get(url, function(data, status){
            let title = $('.card-title').text() + ' : new '
            let footer = {class: "btn-primary d-inline", text: "Save"}
            showModal(title, data, footer)
        })

        $('#actionBtn').on('click', function ( event ) {
            let mainForm = document.querySelector('.modal-body form')
            var formData = new FormData(mainForm)
            
            if ( $('.modal-body form input[type=file]').length ) {
                let file = $('.modal-body form input[type=file]')[0].files[0]
                formData.append('img', file)    
            }

            $.ajax({
                type: "POST",
                url: url,
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                dataType : 'json',
                success: function(msg){
                    location.reload()
                }
            })
        })

        return false
    })

    $('.action-edit').on('click', function () {    
        let id = $(this).data('id')
        let url = $(this).attr('href')

        $.get(url, function(data, status){
            let title = $('.card-title').text() + ' # ' + id + ' : update'
            let footer = {class: "btn-warning d-inline", text: "Save"}
            showModal(title, data, footer)
        })

        $('#actionBtn').on('click', function ( event ) {
            let mainForm = document.querySelector('.modal-body form')
            var formData = new FormData(mainForm)
            
            if ( $('.modal-body form input[type=file]').length ) {
                let file = $('.modal-body form input[type=file]')[0].files[0]
                formData.append('img', file)    
            }

            $.ajax({
                type: "POST",
                url: url,
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                dataType : 'json',
                success: function(msg){
                    location.reload()
                }
            })
        })

        return false
    })

    $('.action-delete').on('click', function () {
        var id = $(this).data('id')
        var url = $(this).attr('href')

        let title = $('.card-title').text() + ' # ' + id + ' : delete'
        let body = 'Вы уверены, что хотите удалить элемент?'
        let footer = {class: "btn-danger d-inline", text: "Delete"}
        showModal(title, body, footer)
        
        $('#actionBtn').on('click', function () {
            $.post(url, {"_csrf": csrfToken}, function(data, status) {
                location.reload()
            })
        })

        return false
    })
})