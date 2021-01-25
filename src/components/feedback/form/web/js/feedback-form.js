$(document).ready(function(){
    $('body').on("submit", "#feedback", function(e) {
        e.preventDefault();
        var form = $(this);

        ajax('POST', getFormUrl(form), getFormData(form), {
            success: function (data) {
                clearForm(form);
            },
            error: function (data) {
                sendFormError(form, data.message);
            }
        });
    });
});

function ajax(method, url, data, callback) {
    $.ajax({
        url: url,
        method: method,
        dataType: 'json',
        data: data,
        success: function (data) {
            if (data.success) {
                if (typeof callback !== 'undefined' && callback.success !== 'undefined')
                    callback.success(data);
            } else {
                if (typeof callback !== 'undefined' && callback.error !== undefined)
                    callback.error(data);
            }
        },
        error: function (xhr, status) {
            if (typeof callback !== 'undefined' && callback.error !== undefined)
                callback.error({success: false, message: xhr.statusText});
        }
    });
}

function getFormUrl(form) {
    var controller = $(form).attr("id");
    var action = $(form).attr("action");
    return "/" + controller + "/" + action;
}

function getFormData(form) {
    return $(form).serialize();
}

function sendFormError(form, message) {
    var error_summary = $(".error-summary", form);
    $("ul li", error_summary).remove();
    $("ul", error_summary).append("<li>"+message+"</li>");
    $(error_summary).show();
}

function clearFormError(form) {
    var error_summary = $(".error-summary", form);
    $("ul li", error_summary).remove();
    $(error_summary).hide();
}

function clearForm(form) {
    $(form).trigger("reset");
    clearFormError(form);
}