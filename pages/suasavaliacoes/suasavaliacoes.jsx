$(document).ready(function () {
    var page = 1;
    var current_page = 1;
    var total_page = 0;
    var is_ajax_fire = 0;

    createHeadTable();
    manageData();

    function manageData() {
        $.ajax({
            dataType: 'json',
            url: '../../api/getFilmeUsuario.php',
            data: { page: page }
        }).done(function (data) {
            total_page = Math.ceil(data.total / 10);
            current_page = page;
            $('#pagination').twbsPagination({
                totalPages: total_page,
                visiblePages: current_page,
                onPageClick: function (event, pageL) {
                    page = pageL;
                    if (is_ajax_fire != 0) {
                        getPageData();
                    }
                }
            });

            manageRow(data.data);
            is_ajax_fire = 1;
        });
    }

    function getPageData() {
        $.ajax({
            dataType: 'json',
            url: '../../api/getFilmeUsuario.php',
            data: { page: page }
        }).done(function (data) {
            manageRow(data.data);
        });
    }

    function manageRow(data) {
        dataCon = data;
        var rows = '';
        $.each(data, function (key, value) {
            rows += '<tr>';
            rows += '<td>' + value.id + '</td>';
            rows += '<td>' + value.titulo + '</td>';
            rows += '<td>' + value.diretor + '</td>';
            rows += '<td>' + value.ano + '</td>';
            rows += '<td>' + value.nota + '</td>';
            rows += '<td><a href="../exibiravaliacao/exibiravaliacao.php?id=' + value.id + '" class="btn btn-info">Exibir Avaliação</a></td>';
            rows += '<td><a href="../alteraravaliacao/alteraravaliacao.php?id=' + value.id + '" class="btn btn-info">Alterar Avaliação</a></td>';
            rows += '</tr>';
        });
        $("tbody").html(rows);
    }

    function createHeadTable() {
        var rows = '<tr>';
        rows += '<th> ID </th>';
        rows += '<th> Título </th>';
        rows += '<th> Diretor </th>';
        rows += '<th> Ano </th>';
        rows += '<th> Nota </th>';
        rows += '<th> Avaliação </th>';
        rows += '<th> Alterar Avaliação </th>'
        rows += '</tr>';
        $("thead").html(rows);
    }
});
