$(document).ready(function () {
    ScrollOut({
        threshold: .2,
        once: true
    });
    windowOnScroll();
});

function windowOnScroll() {
    $(window).on("scroll", function (e) {
        if ($(window).scrollTop() == $(document).height() - $(window).height()) {
            if ($(".post-item").length < $("#total_count").val()) {
                var lastId = $(".post-item:last").attr("id");
                getMorePosts(lastId);
            }
        }
    });
}

function getMorePosts(lastId) {
    $(window).off("scroll");
    $.ajax({
        url: '../php/getMorePosts.php?lastId=' + lastId,
        type: "get",
        beforeSend: function () {
            $('.ajax-loader').show();
        },
        success: function (data) {
            setTimeout(function () {
                $('.ajax-loader').hide();
                $("#post-list").append(data);
                windowOnScroll();
            }, 1000);
        }
    });
}

function submitComment() {
    var comment = $('#comment').val();
    var postId = $('#postId').val();
    $('#comment').val("");

    $.ajax({
        url: '../php/comments.php',
        type: "post",
        data: {comment: comment, postId: postId}
    }); 
    $('.add-close')[0].click();

    return false;
}

function getComments(postId) {
    $('#postId').val(postId);
    $.ajax({
        url: '../php/comments.php',
        type: "post",
        data: {currentId: postId},
        success: function (data) {
            $('.comments-area').html(data);
        }
    }); 
}