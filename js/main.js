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
        verse: verse,
        chapter: $(".chapter select").val(),
        book: $(".books").val(),
        lang_1: $(".lang-1 select").val(),
        lang_2: $(".lang-2 select").val()
    }

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
                $('#myModal h4.book-1').text($(".books option:selected").text() + ' ' + data.chapter + ':' + data.verse);
            }
            if (data.lang_2 != '') {
                $('#myModal p.lang-2').text(data.verse + ' ' + getVerseLang(data.lang_2, response));
                $('#myModal h4.book-2').text($(".books option:selected").text() + ' ' + data.chapter + ':' + data.verse);
            }
            if (data.lang_1 == '' && data.lang_2 == '') {
                $('#myModal p.lang-2').text(data.verse + ' ' + response.ENGLISH);
                $('#myModal h4.book-1').text($(".books option:selected").text() + ' ' + data.chapter + ':' + data.verse);
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
    console.log(div);
    $(div).css('opacity', '1');
    background = $(div).css('background-image');
}

function Next() {
    var selected_index = $(".verse select option:selected").index();
    if ($(".verse select").val((selected_index + 1)).length == 1) {
        var val = $(".verse select option").eq((selected_index + 1)).val();
        $(".verse select").val(val).trigger("change");
    } else {
        alert("End of the list");
    }
}

function Previous() {
    var selected_index = $(".verse select option:selected").index();
    if ($(".verse select").val((selected_index - 1)).length == 1) {
        var val = $(".verse select option").eq((selected_index - 1)).val();
        $(".verse select").val(val).trigger("change");
    } else {
        alert("End of the list");
    }
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
                $(".books").empty().append(response.books);
                $(".chapter select").empty().append(response.chapter);
                $(".verse select").empty().append(response.verse);
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
                $(".books").empty().append(response.books);
                $(".chapter select").empty().append(response.chapter);
                $(".verse select").empty().append(response.verse);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR, textStatus, errorThrown);

            }
        });
    }
}