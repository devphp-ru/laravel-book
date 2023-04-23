$(function () {
    $(`#an_save-comment`).on(`click`, function () {
        const bookId = parseInt($(`#form_comment #book_id`).val());
        const userId = parseInt($(`#form_comment #user_id`).val());
        const username = $(`#form_comment #username`).val().trim();
        const comment = $(`#form_comment #comment`).val().trim();
        if (username.length <= 0) {
            $(`.input_box-error-username`).text('Заполните поле Имя');
        } else if (comment.length <= 0) {
            $(`.input_box-error-comment`).text('Заполните поле Комментарий');
        } else {
            $.ajax({
                url: `/api/v1/comments/add`,
                method: `POST`,
                dataType: `json`,
                cache: false,
                data: {
                    book_id: bookId,
                    user_id: userId,
                    username: username,
                    comment: comment,
                },
                success: function (data) {
                    const item = data.item;
                    $(`#comment_list`).append(`<div class="card">
                        <div class="card-body">
                            <h4>${item.username}</h4>
                            <p>${item.comment}</p>
                        </div>
                    </div>`);
                    $(`.input_box-message`).text(data.message);
                    $(`#form_comment #username`).val('');
                    $(`#form_comment #comment`).val('');
                },
                error: function (jqXHR) {
                    let responseText = jQuery.parseJSON(jqXHR.responseText);
                    $(`.input_box-message`).text(responseText.message);
                },
            });
        }
    });
});