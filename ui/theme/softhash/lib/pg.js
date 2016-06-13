$(document).ready(function () {

    $("#emsg").hide();
    $("#submit").click(function (e) {
        e.preventDefault();
        $(this).html('<i class="fa fa-circle-o-notch fa-spin"></i> Working ...');
        $(this).addClass("btn-danger");
        var _url = $("#_url").val();
        $.post(_url + 'settings/pg-post/', {


            pgid: $('#pgid').val(),
            value: $('#value').val(),
            status: $('#status').val(),
            c1: $('#c1').val(),
            c2: $('#c2').val(),
            c3: $('#c3').val(),
            c4: $('#c4').val(),
            c5: $('#c5').val()
        })
            .done(function (data) {

                setTimeout(function () {
                    var sbutton = $("#submit");
                    var _url = $("#_url").val();
                    if ($.isNumeric(data)) {

                        location.reload();
                    }
                    else {
                        sbutton.html('<i class="fa fa-check"></i> Submit');
                        sbutton.removeClass("btn-danger");
                        var body = $("html, body");
                        body.animate({scrollTop:0}, '1000', 'swing');
                        $("#emsgbody").html(data);
                        $("#emsg").show("slow");
                    }
                }, 2000);
            });
    });
});