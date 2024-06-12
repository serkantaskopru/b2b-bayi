var blockUI = null;
document.addEventListener("DOMContentLoaded", function () {
    $(document).off('focusin.modal');
    var target = document.querySelector("body");
    blockUI = new KTBlockUI(target, {
        overlayClass: "bg-black bg-opacity-25",
        state: 'danger',
        css: {'zIndex': 9999999999999},
        message: '<div class="bg-white rounded d-flex justify-content-center align-items-center p-2 fw-bold"><div class="spinner-border text-danger me-2" role="status">\n' + '  <span class="visually-hidden">Loading...</span>\n' + '</div>Lütfen bekleyin...</div>'
    });
});

function blockPage() {
    blockUI.block();
}

function unblockPage() {
    blockUI.release();
    $('.blockui-overlay').remove()
}

function toggleBlockPage() {
    if (blockUI.isBlocked()) {
        blockUI.release();
    } else {
        blockUI.block();
    }
}

function Notification(a, b, c, d, e) {
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toastr-top-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    if (a == 'error') {
        toastr.error(b);
    } else if (a == 'warning') {
        toastr.warning(b);
    } else if (a == 'info') {
        toastr.info(b);
    } else {
        toastr.success(b);
    }
}

function imposeMinMax(el) {
    if (el.value != "") {
        if (parseInt(el.value) < parseInt(el.min)) {
            el.value = el.min;
        }
        if (parseInt(el.value) > parseInt(el.max)) {
            el.value = el.max;
        }
    }
}

function loadOrderFiles(event) {
    let html = "";
    for (let i = 0; i < event.target.files.length; i++) {
        html += "<tr>";
        html += "<td style='text-align:center;width:60px'>";
        html += "<img style='height:50px;object-fit: contain;'  src='" + URL.createObjectURL(event.target.files[i]) + "' />";
        html += "</td>";
        html += "<td>";
        html += event.target.files[i].name;
        html += "</td>";
        html += "</tr>";
    }
    $("#tbl_order_images tbody").html(html);
}

function siparisOnayFormu(v) {
    Swal.fire({
        html: `Emin misiniz?`,
        icon: "warning",
        buttonsStyling: false,
        showCancelButton: true,
        reverseButtons: true,
        cancelButtonText: 'İptal Et',
        confirmButtonText: "Sil",

        customClass: {
            cancelButton: 'btn btn-light',
            confirmButton: "btn btn-danger",

        }
    }).then((e) => {
        if (e.isConfirmed) {
            $('#siparisDurumForm').submit();
            setTimeout(function () {
                location.reload();
            }, 1000)
        }
    });
}