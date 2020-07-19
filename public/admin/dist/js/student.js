$(document).ready(function() {
    baseUrl = window.location.origin;
    $("#btn_import").click(function(e) {
        e.preventDefault();
        $("#error_message").empty();
        var inputFile = $("#inputFile").val();
        var type_file = inputFile
            .split(".")
            .pop()
            .toLowerCase();
        if (inputFile == "") {
            Noti(1, "Lỗi !", "Vui lòng chọn tệp")
            setTimeout(Destroy, 5000);
        } else {
            if ($.inArray(type_file, ["xlsx", "xls"]) >= 0) {
                var form_data = new FormData($("#file_form")[0]);
                form_data.append(
                    "inputFile",
                    $("input[type=file]")[0].files[0]
                );
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        )
                    },
                    url: baseUrl + "/admin/student/import",
                    type: "POST",
                    contentType: false,
                    processData: false,
                    data: form_data,
                    mimeType: "multipart/form-data",
                    success: function(result) {
                        var json_data = $.parseJSON(result);
                        if (json_data.status) {
                            window.location.replace(baseUrl + "/admin/student");
                        } else {
                            Noti(1, "Lỗi !", "Không nhập được File.")
                            setTimeout(Destroy, 5000);
                        }
                    },
                    error: function() {
                        Noti(1, "Lỗi !", "Không nhập được File.")
                        setTimeout(Destroy, 5000);
                    }
                });
            } else {
                Noti(1, "Lỗi !", "Vui lòng chọn tệp Excel")
                setTimeout(Destroy, 5000);
            }
        }
    });

    $(".btn-isActive").click(function(e) {
        e.preventDefault();
        $("#error_message").empty();
        var btn = $(this);
        var id = btn.data("id");
        var text = btn.attr("title") === "Đã Thi" ? "chưa thi" : "đã thi";
        if (
            confirm("Bạn muốn cập nhật cho học sinh này thành " + text + " ?")
        ) {
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "POST",
                url: baseUrl + "/admin/student/changeactive",
                data: { id: id },
                dataType: "json",
                success: function(response) {
                    if (response.status == true) {
                        btn.attr("title", "Đã Thi");
                        btn.removeClass("fa-eye-slash").addClass("fa-eye");
                    } else {
                        btn.attr("title", "Chưa Thi");
                        btn.removeClass("fa-eye").addClass("fa-eye-slash");
                    }
                },
                error: function(response) {
                    alert(response.message);
                }
            });
        }
    });

    $("#btn-save").click(function(e) {
        e.preventDefault();
        var subject_list = [];
        $("#error_message").empty();
        var id = $("#idusername").val();
        var cmnd = $("#inputcmnd").val();
        var date_of_birth = moment(
            $("#datepicker").datepicker("getDate")
        ).format("Y-M-D");
        var gender = $("#inputgender").val();
        var nation = $("#inputnation").val();
        var id_school = $("#inputidschool").val();
        var address = $("#inputaddress").val();
        subject_list = $("#inputsubjectlist").val();
        console.log(subject_list);

        if (
            cmnd.length == 0 ||
            gender.length == 0 ||
            nation.length == 0 ||
            address.length == 0 ||
            subject_list.length == 0
        ) {
            Noti(1, "Lỗi !", "Vui lòng nhập đầy đủ thông tin.")
            setTimeout(Destroy, 5000);
        } else {
            if (confirm("Bạn muốn cập nhật cho học sinh này ?")) {
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        )
                    },
                    type: "POST",
                    url: baseUrl + "/admin/student/update",
                    data: {
                        id: id,
                        cmnd: cmnd,
                        date_of_birth: date_of_birth,
                        gender: gender,
                        nation: nation,
                        id_school: id_school,
                        address: address,
                        subject_list: subject_list
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response == false) {
                            Noti(1, "Lỗi !", "Đã có lỗi phát sinh. Xin thử lại sau.")
                            setTimeout(Destroy, 5000);
                        } else {
                            Noti(0, "Thành Công !", "Cập nhật học sinh thành công.")
                            setTimeout(Destroy, 5000);

                        }
                    },
                    error: function(response) {
                        alert(response.message);
                    }
                });
            }
        }
    });
});

function Noti(type, title, message) {
    if (type == 1) {
        $("#error_message").html(
            '<div class="callout callout-danger">' +
            "<h4>" + title + "</h4>" +
            "" + message + "" +
            "</div>"
        );
    } else {
        $("#error_message").html(
            '<div class="callout callout-info">' +
            "<h4>" + title + "</h4>" +
            "" + message + "" +
            "</div>"
        );
    }
}

function Destroy() {
    $("#error_message").empty()
}