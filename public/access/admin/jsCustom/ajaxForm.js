var element = '';
function sendAjax(url, data, method = 'POST') {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    return $.ajax({
        url: url,
        data: data,
        method: method,
        processData: false,
        contentType: false,
        async: false,
        typeData: 'json'
    });
}

function getAjax(url, data, method = 'POST') {
    var ajax = sendAjax(url, data, method = 'POST');
    ajax = JSON.parse(ajax.responseText);
    if (ajax == 1) {
        toastSuccess('mới được thêm');
    } else {
        toastError('được thêm');
        return ajax.errors;
    }
}

function ajaxLogin(url, data, method = 'POST') {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var ajax = $.ajax({
        url: url,
        data: data,
        method: method,
        processData: false,
        contentType: false,
        async: false,
        typeData: 'json'
    });
    ajaxJson = JSON.parse(ajax.responseText);
    if (ajaxJson.success) {
        return ajaxJson.success;
    } else {
        return ajaxJson.errors;
    }
}

function getDataTable(elementID, url, columns = []) {

    $('#' + elementID).DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "bDestroy": true,
        ajax: url,
        columns: columns
    });
    return element = elementID;
}

function deleteItemAjax(url) {
    var confirm = window.confirm('Bạn có muốn xóa dòng dữ liệu này! Sau khi xóa dữ liệu không thể khôi phục lại! Cẩn thận!');
    if (confirm) {
        var ajax = sendAjax(url, '', 'DELETE');
        ajax = JSON.parse(ajax.status);
        if (ajax == 200) {
            toastSuccess('đã được xóa');
            $('#' + element).DataTable().clear().draw();
        } else {
            toastError('được xóa');
        }
    }
}

