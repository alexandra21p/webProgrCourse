
            // actions when clicking on menu buttons
$(document).ready(function () {
    $('#add').click(function () {
        $('#gc').hide();
        $('#txtHint').hide();
        $('#delform').hide();
        $('#updateform').hide();
        $('#addform').css('display', 'block');

    });

    $('#delete').click(function () {
        $('#gc').hide();
        $('#addform').hide();
        $('#updateform').hide();
        $('#delform').css('display', 'block');
        $('#txtHint').css({ 'display': 'block', 'margin-top': '150px', 'width': '80%' });
        showAlll();

    });

    $('#update').click(function () {
        $('#txtHint').hide();
        $('#gc').hide();
        $('#delform').hide();
        $('#addform').hide();
        $('#updateform').css('display', 'block');

    });

    $('#show').click(function () {
        $('#txtHint').hide();
        $('#delform').hide();
        $('#addform').hide();
        $('#updateform').hide();
        $('#gc').css('display', 'block');
        $('#txtHint').css({ 'display': 'block', 'top': '0', 'margin-bottom':'30px'});
        //document.getElementById("txtHint").innerHTML = showAlll();
        showAlll();

    });

});

function showAlll() {
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("txtHint").innerHTML = xmlhttp.responseText;

        }
    }
    xmlhttp.open("GET", "showAll.php", true);
    xmlhttp.send();
}




function showDest(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;

            }
        };
        xmlhttp.open("GET", "getDest.php?q=" + str, true);
        xmlhttp.send();
    }
}

$(function () {
    $(".submitAdd").click(function () {
        var loc = $("#location").val();
        var countr = $("#country").val();
        var descr = $("#descr").val();
        var tour = $("#tour").val();
        var cost = $("#cost").val();
        var dataString = 'location=' + loc + '&country=' + countr + '&descr=' + descr + '&tour=' + tour + '&cost=' + cost;

        if (loc == '' || countr == '' || descr == '' || tour == '' || cost == '') {
            $('.success').fadeOut(200).hide();
            $('.error').fadeOut(200).show();
        }
        else {
            $.ajax({
                type: "POST",
                url: "addDest.php",
                data: dataString,
                success: function (result) {
                    $('.success').fadeIn(200).show();
                    $('.error').fadeOut(200).hide();
                    //$("#addform").hide();
                    $("#txtHint2").html(result);
                    $('#myForm').trigger("reset");
                }
            });
        }
        return false;
    });
});


$(function () {
    $(".submitDel").click(function () {
        var id = $("#id").val();
        var dataString = 'id=' + id;

        if (id == '') {
            $('.success').fadeOut(200).hide();
            $('.error').fadeOut(200).show();
        }
        else {
            $.ajax({
                type: "POST",
                url: "delete.php",
                data: dataString,
                success: function (result) {
                    $('.success').fadeIn(200).show();
                    $('.error').fadeOut(200).hide();
                    $("#txtHint").html(result);
                    $('#deleteForm').trigger("reset");

                }
            });
        }
        return false;
    });
});

$(function () {
    $(".submitMod").click(function () {
        var loc = $("#location2").val();
        var countr = $("#country2").val();
        var descr = $("#descr2").val();
        var tour = $("#tour2").val();
        var cost = $("#cost2").val();
        var dataString = 'location=' + loc + '&country=' + countr + '&descr=' + descr + '&tour=' + tour + '&cost=' + cost;
        //console.log(dataString);

        if (loc == '' || countr == '' || descr == '' || tour == '' || cost == '') {
            $('.success').fadeOut(200).hide();
            $('.error').fadeOut(200).show();
        }
        else {
            $.ajax({
                type: "POST",
                url: "updateDest.php",
                data: dataString,
                success: function (result) {
                    $('.success').fadeIn(200).show();
                    $('.error').fadeOut(200).hide();
                    $("#txtHint2").html(result);
                    $('#upform').trigger("reset");
                }
            });
        }
        return false;
    });
});

