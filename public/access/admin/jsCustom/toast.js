var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});

function toastSuccess(status) {
    toastr.success('Dữ liệu ' + status + ' thành công!');
};

function toastMessage(message) {
    toastr.warning(message);
};

function toastError(status) {
    toastr.error('Dữ liệu ' + status + ' thất bại! Vui lòng kiểm tra lại thông tin!');
};
   