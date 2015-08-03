$(function() {
    "use strict";
    $('#data').dataTable( {
        "language": {
            "sEmptyTable":      "Нет записей",
            "sInfo":            "с _START_ по _END_ из _TOTAL_ записи",
            "sInfoEmpty":       "с 0 по 0 из 0 записи",
            "sInfoFiltered":    "(из _MAX_)",
            "sInfoPostFix":     "",
            "sInfoThousands":   ".",
            "sLengthMenu":      "_MENU_ записей на странице",
            "sLoadingRecords":  "Wird geladen...",
            "sProcessing":      "Bitte warten...",
            "sSearch":          "Поиск",
            "sZeroRecords":     "ничего не найдено.",
            "oPaginate": {
                "sFirst":       "первая",
                "sPrevious":    "предыдущая",
                "sNext":        "следующая",
                "sLast":        "последняя"
            },
        }
    });

    var table = $("#data").dataTable();
    table.fnSort([[0, 'DESC']]);

    $('#data tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );

    var parser = document.createElement('a');
    parser.href = window.location.href;

    /*
    * Sorting these categories
    */
    //$('#sortable').sortable();
    $('#sortable').disableSelection();

    $('#sortable').sortable({
        update: function( event, ui ) {
            var moveNode = ui.item.index();
            var otherNode = ui.item.index() + 1;
            var moveNodeId = $('#sortable tr:eq(' + moveNode + ') td:first').text();
            var otherNodeId = $('#sortable tr:eq(' + otherNode + ') td:first').text();
            $.ajax({
                method: 'POST',
                url: parser.pathname,
                data: {moveNodeId:moveNodeId, otherNodeId:otherNodeId}
            });
        }
    });

    /*
    *   remove these categories
    */
    $('.confirm').click(function(){
        if ( $('tbody tr').hasClass('selected') ) {
            $('#message').click();
        }
    });

    $("#message").confirm({
        text: "Вы уверены, что хотите удалить эту запись?",
        title: "Требуется подтверждение",
        confirm: function(button) {

            $.ajax({
                method: 'POST',
                url: parser.pathname + '/delete',
                data: {id: $('.selected td:first').text()}
            })

            .done(function() {
               $('.selected').remove();
            });
        },
        confirmButton: "Да",
        cancelButton: "Нет",
        confirmButtonClass: "btn-danger",
        cancelButtonClass: "btn-default"
    });

    /*
    *   edit these categories
    */
    $('.change').click(function() {
        if ( $('tbody tr').hasClass('selected') ) {
            window.location.href = parser.pathname + '/' + $('.selected td:first').text() +'/edit';
        }
    });
});