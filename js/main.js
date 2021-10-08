var background = '';

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
            $('#myModal h4.book').text($(".books option:selected").text() + ' ' + data.chapter);
            if (data.lang_1 != '') {
                $('#myModal p.lang-1').text(data.verse + ' ' + getVerseLang(data.lang_1, response));
            }
            if (data.lang_2 != '') {
                $('#myModal p.lang-2').text(data.verse + ' ' + getVerseLang(data.lang_2, response));
            }
            if (data.lang_1 == '' && data.lang_2 == '') {
                $('#myModal p.lang-2').text(data.verse + ' ' + response.ENGLISH);
            }
            $(".modal-body").css("background-image", background);
            $('#myModal').modal('show');
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR, textStatus, errorThrown);
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