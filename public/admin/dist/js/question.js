$(document).ready(function() {
    baseUrl = window.location.origin;
    $("#inputFile").hover(function(e) {
        e.preventDefault();
        $("#error_message").empty();
    });
    $("#import_question").click(function(e) {
        e.preventDefault();
        $("#error_message").empty();
        var inputFile = $("#questionInputFile").val();
        var type_file = inputFile
            .split(".")
            .pop()
            .toLowerCase();
        if (inputFile == "") {
            $("#error_message").html(
                '<div class="callout callout-danger">' +
                "<h4>Lỗi!</h4>" +
                "Vui lòng chọn tệp." +
                "</div>"
            );
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
                    url: baseUrl + "/admin/question/import",
                    type: "POST",
                    contentType: false,
                    processData: false,
                    data: form_data,
                    mimeType: "multipart/form-data",
                    success: function(result) {
                        var json_data = $.parseJSON(result);
                        if (json_data.status) {
                            window.location.replace(baseUrl + "/admin/question");
                        } else {
                            $("#error_message").html(
                                '<div class="callout callout-danger">' +
                                "<h4>Lỗi!</h4>" +
                                "Vui lòng kiểm tra lại." +
                                "</div>"
                            );
                            setTimeout(Destroy, 5000);
                        }
                    }
                });
            } else {
                $("#error_message").html(
                    '<div class="callout callout-danger">' +
                    "<h4>Lỗi!</h4>" +
                    "Vui lòng chọn tệp Excel." +
                    "</div>"
                );
                setTimeout(Destroy, 5000);
            }
        }

    });
    $("#btn-update").click(function(e) {
        e.preventDefault();
        var id = $("#idquestion").val();
        var question_content = $("#question_content").val();
        var id_subject = $("#inputidsubject").val();
        var ans_1 = $("#ans_1").val();
        var ans_2 = $("#ans_2").val();
        var ans_3 = $("#ans_3").val();
        var ans_4 = $("#ans_4").val();
        var ans_correct = $("#ans_correct").val();

        if (
            question_content.length == 0 ||
            ans_1.length == 0 ||
            ans_2.length == 0 ||
            ans_3.length == 0 ||
            ans_4.length == 0 ||
            ans_correct.length == 0
        ) {
            $("#error_message").html(
                '<div class="callout callout-danger">' +
                "<h4>Lỗi!</h4>" +
                '<p>Vui lòng nhập đầy đủ thông tin.</p>' +
                "</div>"
            );
            setTimeout(Destroy, 5000);
        } else {
            if (confirm("Bạn muốn cập nhật thông tin cho câu hỏi này ?")) {
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        )
                    },
                    type: "POST",
                    url: baseUrl + "/admin/question/update",
                    data: {
                        id: id,
                        question_content: question_content,
                        ans_1: ans_1,
                        ans_2: ans_2,
                        ans_3: ans_3,
                        ans_4: ans_4,
                        ans_correct: ans_correct,
                        id_subject: id_subject
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response == false) {
                            $("#error_message").html(
                                '<div class="callout callout-danger">' +
                                "<h4>Lỗi!</h4>" +
                                "Đã có lỗi phát sinh. Xin thử lại sau." +
                                "</div>"
                            );
                        } else {
                            $("#error_message").html(
                                '<div class="callout callout-info">' +
                                "<h4> Success !</h4>" +
                                "<p>Cập nhật thành công.</p>" +
                                "</div>"
                            );
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