var modal = $('#myModal');
var form = $('#productForm');
var row = null;
$('#update').click(function () {
    $.ajax({
        type: 'POST',
        url: form.find('#productId').val() ? '/update.php' : '/create.php',
        data: form.serialize(),
        dataType: 'JSON',
        success: function (response) {
            if (response.updated) {
                $('#flash').removeClass('hide').fadeIn().fadeOut(5000);
                row.children('td').eq(1).text(response.name);
                row.children('td').eq(2).text(response.description);
                row.children('td').eq(3).text(
                    form.find('#category_id').children(':selected').text()
                );
                row.children('td').eq(4).text(response.price);
            }
            else if (response.created) {
                $('.table').append(
                    `<tr data-id='${response.id}'>
                        <td>${response.id}</td>
                        <td>${response.name}</td>
                        <td>${response.description}</td>
                        <td data-category_id='${response.category_id}'>${form.find('#category_id').children(':selected').text()}</td>
                        <td>${response.price}</td>
                        <td data-id="${response.id}" class="delete"><span class="glyphicon glyphicon-remove"></span></td></tr>`
                );
            }
            modal.modal('hide');
        }
    });
});

$('#showCreateForm').click(function () {
    form.trigger('reset');
    form.find('#productId').val(null);
    modal.find('#myModalLabel').text('Создать товар');
    form.attr('action', '/create.php');
    modal.modal('show');
});

$(document).on('click', 'tbody tr', function () {
    if ($(event.target).is('span') || $(event.target).hasClass('delete')) {
        return;
    }
    modal.find('#myModalLabel').text('Редактировать товар');
    row = $(event.target).parent();
    modal.find('#productId').val(
        row.data('id')
    );
    modal.find('#productName').val(
        row.children('td').eq(1).text()
    );
    modal.find('#description').val(
        row.children('td').eq(2).text()
    );

    modal.find('#category_id').val(
        row.children('td').eq(3).data('category_id')
    );
    modal.find('#price').val(
        row.children('td').eq(4).text()
    );

    modal.modal('show');
});

$(document).on('click', 'td.delete', function () {
    row = $(event.target).closest('tr');
    $.ajax({
        type: 'POST',
        url: 'destroy.php',
        data: {'id': $(event.target).data('id')},
        dataType: 'JSON',
        success: function (response) {
            if (response.success) {
                row.fadeOut(1000);
                $('#flash').removeClass('hide').fadeIn().fadeOut(2000);
            }
        }
    });
});