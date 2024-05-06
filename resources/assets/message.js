$(document).ready(function () {
    $(".message-button").on("click", function () {
        var id = $(this).data("id");
        $("#dataId").val(id);
        $("#messageModal").modal("show");
    });
});

$(document).ready(function () {
    $("#messageForm").on("submit", function (event) {
        event.preventDefault();
        var formData = new FormData($("#messageForm")[0]);
        $.ajax({
            url: route("messages.store"),
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                $("#messageModal").modal("hide");
                $("#messageForm")[0].reset();
            },
            error: function (error) {
                console.log(error);
            },
        });
    });
});

$(document).ready(function () {
    $("#messageModal").on("hidden.bs.modal", function () {
        $("#messageForm")[0].reset();
    });
});

$(document).ready(function () {
    $(".seen-message").on("click", function () {
        var id = $(this).data("id");
        $("#dataId").val(id);
        $("#messageDecryptModal").modal("show");
    });
});

$(document).ready(function () {
    $("#decryptMessageForm").on("submit", function (event) {
        event.preventDefault();
        var formData = new FormData($("#decryptMessageForm")[0]);
        $.ajax({
            url: route("messages.decrypt"),
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                $("#messageDecryptModal").modal("hide");
                $("#decryptMessageForm")[0].reset();
                window.location.reload();
            },
            error: function (error) {
                $("#showError").html("Invalid Token");
            },
        });
    });
});

$(document).ready(function () {
    $("#messageDecryptModal").on("hidden.bs.modal", function () {
        $("#decryptMessageForm")[0].reset();
    });
});

$(document).ready(function () {
    $('#messageContainer').scrollTop($('#messageContainer')[0].scrollHeight);
})
