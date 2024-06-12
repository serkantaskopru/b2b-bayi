function initAjaxFormListener(){
    $('form[data-ajax="true"]').on('submit', function (e) {
        console.log(e)
        e.preventDefault();
        blockPage();
        var form = this;
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method') ? $(this).attr('method') : 'post',
            data: formData,
            cache: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            contentType: false,
            processData: false,
        }).done(function (msg) {
            unblockPage()
            if (msg.code == 88 || msg.code == 1) {
                try{
                    $('.dropzone-add').attr('data-parent',msg.parent_id);
                    setTimeout(function(){
                        _dropzone.processQueue();
                    },250)
                }catch (exception){console.error(exception)}

            }
            if (msg.code == 88) {
                Notification('success', msg.message, 4000, true, false)
                setTimeout(function () {
                    window.location.reload();
                }, 500);
                return;
            }
            msg.code == 1 || msg.code == 88 ? Notification('success', msg.message, 4000, true, false) : Notification('error', msg.message, 4000, true, false);
        }).fail(function (jqXHR) {
            unblockPage()
            if(jqXHR.status == 403){
                Notification('error', "Bu işlem için yetkiniz bulunmamaktadır.", 4000, true, false);
                return false;
            }
            if (jqXHR.responseJSON.msg != null) {
                Notification('error', jqXHR.responseJSON.msg, 4000, true, false);
            } else {
                Notification('error', jqXHR.responseJSON.message, 4000, true, false);
            }

        });
        return false;
    })
}
document.addEventListener("DOMContentLoaded", function () {
    initAjaxFormListener();
});
function ajaxProcess(url, type = 'get', reload = false) {
    blockPage();
    $.ajax({
        url: url,
        type: type,
        cache: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        contentType: false,
        processData: false,
    }).done(function (msg) {
        unblockPage()
        if (msg.code == 1) {
            Notification('success', msg.message, 4000, true, false);
        } else {
            if (msg.code == 88) {
                Notification('info', msg.message, 4000, true, false);
                setTimeout(function () {
                    window.location.reload();
                }, 500);
            }else{
                Notification('error', msg.message, 4000, true, false);
            }
        }
        if (reload == true) {
            setTimeout(function () {
                window.location.reload();
            }, 500);
        }
    }).fail(function (jqXHR, textStatus) {
        unblockPage();
        if(jqXHR.status == 403){
            Notification('error', "Bu işlem için yetkiniz bulunmamaktadır.", 4000, true, false);
            return false;
        }
        if(jqXHR.responseJSON.message != null)
            Notification('error', jqXHR.responseJSON.message, 4000, true, false);
        else
            Notification('error', jqXHR.responseJSON.msg, 4000, true, false);
    });
}
function approveAjax(url, type = 'get', reload = false) {
    Swal.fire({
        html: `Dikkat, bu geri dönüşü olmayan bir işlem olabilir. Devam etmek istiyorsanız tamam butonuna tıklayın.`,
        icon: "warning",
        buttonsStyling: false,
        showCancelButton: true,
        reverseButtons: true,
        cancelButtonText: 'İptal Et',
        confirmButtonText: "Tamam",
        customClass: {
            cancelButton: 'btn btn-light',
            confirmButton: "btn btn-danger",

        }
    }).then((e) => {
        if (e.isConfirmed) {
            blockPage();
            $.ajax({
                url: url,
                type: type,
                cache: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                contentType: false,
                processData: false,
            }).done(function (msg) {
                unblockPage()
                if (msg.code == 1) {
                    Notification('success', msg.message, 4000, true, false);
                } else {
                    if (msg.code == 88) {
                        Notification('info', msg.message, 4000, true, false);
                        setTimeout(function () {
                            window.location.reload();
                        }, 500);
                    }else{
                        Notification('error', msg.message, 4000, true, false);
                    }
                }
                if (reload == true) {
                    setTimeout(function () {
                        window.location.reload();
                    }, 500);
                }
            }).fail(function (jqXHR, textStatus) {
                unblockPage();
                if(jqXHR.status == 403){
                    Notification('error', "Bu işlem için yetkiniz bulunmamaktadır.", 4000, true, false);
                    return false;
                }
                if(jqXHR.responseJSON.message != null)
                    Notification('error', jqXHR.responseJSON.message, 4000, true, false);
                else
                    Notification('error', jqXHR.responseJSON.msg, 4000, true, false);
            });
        }
    });
}
function reloadAjaxListener(){
    $('form[data-f-ajax="true"]').on('submit', function (e) {
        blockPage();
        e.preventDefault();
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method') ? $(this).attr('method') : 'post',
            data: formData,
            cache: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            contentType: false,
            processData: false,
        }).done(function (msg) {
            unblockPage();
            if (msg.code == 1) {
                Notification('success', msg.message)
            } else if (msg.code == 88) {
                Notification('info', msg.message)
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Notification('error', msg.message)
            }
        }).fail(function (jqXHR, textStatus) {
            unblockPage();
            if(jqXHR.responseJSON.message != null)
                Notification('error', jqXHR.responseJSON.message);
            else
                Notification('error', jqXHR.responseJSON.msg);
        });
        return false;
    })
}