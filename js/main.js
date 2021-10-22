var background = '';
var testament = 'old';

$(document).ready(function() {
    $(document).keypress(function(e) {
        console.log(e.keyCode);
        if (e.keyCode === 27) {
            $("#myModal").modal('hide');
        }
    });
});

function getVerse(verse) {

    data = {
        verse: verse.val(),
        chapter: verse.parent().parent().find(".chapter select").val(),
        book: verse.parent().parent().parent().parent().attr("id"),
        lang_1: $(".lang-1 select").val(),
        lang_2: $(".lang-2 select").val()
    }

    var bok_name = verse.parent().parent().parent().parent().find("span").text();

    $.ajax({
        url: "all.php?action=getVerse",
        type: "post",
        dataType: "json",
        data: data,
        success: function(response) {
            $('#myModal p.lang-2').text("");
            $('#myModal p.lang-1').text("");
            $('#myModal h4.book-1').text("");
            $('#myModal h4.book-2').text("");
            if (data.lang_1 != '') {
                $('#myModal p.lang-1').text(data.verse + ' ' + getVerseLang(data.lang_1, response));
                $('#myModal h4.book-1').text(bok_name + ' ' + data.chapter + ':' + data.verse);
            }
            if (data.lang_2 != '') {
                $('#myModal p.lang-2').text(data.verse + ' ' + getVerseLang(data.lang_2, response));
                $('#myModal h4.book-2').text(bok_name + ' ' + data.chapter + ':' + data.verse);
            }
            if (data.lang_1 == '' && data.lang_2 == '') {
                $('#myModal p.lang-2').text(data.verse + ' ' + response.ENGLISH);
                $('#myModal h4.book-1').text(bok_name + ' ' + data.chapter + ':' + data.verse);
            }
            $(".modal-body").css("background-image", background);
            $('#myModal').modal('show');
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR, textStatus, errorThrown);
            alert("There are no verse exist against this combination in our database");
        }
    });
}

function getVerseLang(lang, response) {
    switch (lang.toUpperCase()) {
        case 'ENGLISH':
            return response.ENGLISH;
            break;
        case 'HINDI':
            return response.HINDI;
            break;
        case 'KANNADA':
            return response.KANNADA;
            break;
        case 'MALAYALAM':
            return response.MALAYALAM;
            break;
        case 'TAMIL':
            return response.TAMIL;
            break;
        case 'TELUGU':
            return response.TELUGU;
            break;
        default:
            return response.ENGLISH;
    }
}

function selectBackground(div) {
    $(div).css('opacity', '1');
    background = $(div).css('background-image');
}

function Next() {
    $(".verse").each(function(index) {
        console.log(index + ": " + $(this).text());
        var selected_index = $(this).find("select option:selected").index();
        var len = $(this).find("select option").length;
        console.log(len);
        if ($(this).find("select").val((selected_index + 1)).length == 1 && (selected_index + 1) < len) {
            var val = $(this).find("select option").eq((selected_index + 1)).val();
            $(this).find("select").val(val).trigger("change");
            return false;
        } else {
            return true;
        }
    });
}

function Previous() {
    $(".verse").each(function(index) {
        var selected_index = $(this).find("select option:selected").index();
        var len = $(this).find("select option").length;
        if ($(this).find("select").val((selected_index - 1)).length == 1 && (selected_index - 1) >= 0) {
            var val = $(this).find("select option").eq((selected_index - 1)).val();
            $(this).find("select").val(val).trigger("change");
            return false;
        } else {
            return true;
        }
    });
}

function toggleTestament(div) {
    if (testament == 'old') {
        testament = 'new';
        $.ajax({
            url: "all.php?action=getTestament",
            type: "post",
            dataType: "json",
            data: { 'testament': testament },
            success: function(response) {
                $(".all-books-list").empty().append(response.html);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR, textStatus, errorThrown);
            }
        });
    } else {
        testament = 'old';
        $.ajax({
            url: "all.php?action=getTestament",
            type: "post",
            dataType: "json",
            data: { 'testament': testament },
            success: function(response) {
                $(".all-books-list").empty().append(response.html);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR, textStatus, errorThrown);

            }
        });
    }
}