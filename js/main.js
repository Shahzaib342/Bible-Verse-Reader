var background = 'url("http://localhost/Bible-Verse-Reader/img/bg-1.jpg")';
var testament = 'old';
var current_verse = '';

$(document).ready(function() {
    $(document).keypress(function(e) {
        if (e.keyCode === 27) {
            $("#myModal").modal('hide');
        }
    });
});

document.onkeydown = function(e) {
    switch (e.which) {
        case 37:
            $(".verse-btns button").first().trigger("click");
            break;
        case 39:
            $(".verse-btns button").last().trigger("click");
            break;
    }
    e.preventDefault();
};

function displayCurrentVerse() {
    if (current_verse == '') {
        alert("No previous verse found.");
    } else {
        getVerse("", current_verse);
    }
}

function getVerse(verse, display_current_verse = "") {
    if (display_current_verse == "") {
        data = {
            verse: verse.val(),
            chapter: verse.parent().parent().find(".chapter select").val(),
            book: verse.parent().parent().parent().parent().attr("id"),
            lang_1: $(".lang-1 select").val(),
            lang_2: $(".lang-2 select").val(),
            bok_name: verse.parent().parent().parent().parent().find("span").text(),
            index: verse.attr("id")
        }
    } else {
        data = display_current_verse;
    }

    current_verse = data;

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
                $('#myModal h4.book-1').text(data.bok_name + ' ' + data.chapter + ':' + data.verse);
            }
            if (data.lang_2 != '') {
                $('#myModal p.lang-2').text(data.verse + ' ' + getVerseLang(data.lang_2, response));
                $('#myModal h4.book-2').text(data.bok_name + ' ' + data.chapter + ':' + data.verse);
            }
            if (data.lang_1 == '' && data.lang_2 == '') {
                $('#myModal p.lang-2').text(data.verse + ' ' + response.ENGLISH);
                $('#myModal h4.book-1').text(data.bok_name + ' ' + data.chapter + ':' + data.verse);
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
        if (current_verse.index == $(this).find("select").attr("id")) {
            var selected_index = $(this).find("select option:selected").index();
            var len = $(this).find("select option").length;
            if ($(this).find("select").val((selected_index + 1)).length == 1 && (selected_index + 1) < len) {
                var val = $(this).find("select option").eq((selected_index + 1)).val();
                $(this).find("select").val(val).trigger("change");
                return false;
            } else {
                return true;
            }
        }
    });
}

function Previous() {
    $(".verse").each(function(index) {
        if (current_verse.index == $(this).find("select").attr("id")) {
            var selected_index = $(this).find("select option:selected").index();
            var len = $(this).find("select option").length;
            if ($(this).find("select").val((selected_index - 1)).length == 1 && (selected_index - 1) >= 0) {
                var val = $(this).find("select option").eq((selected_index - 1)).val();
                $(this).find("select").val(val).trigger("change");
                return false;
            } else {
                return true;
            }
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