$(document).ready(function () {



    var $modal = $('#ajax-modal');


    var sysrender = $('#sysfrm_ajaxrender');


    sysrender.on('click', '#add_payment', function(e){
        e.preventDefault();
        var iid = $("#iid").val();

        $('body').modalmanager('loading');

        setTimeout(function(){
            $modal.load('index.php?_route=invoices/add-payment/' + iid, '', function(){
                $modal.modal();
                $('.amount').autoNumeric('init');
                $(".datepicker").datepicker();
                $("#account").select2();
                $("#cats").select2();
                $("#pmethod").select2();
            });
        }, 1000);
    });


    sysrender.on('click', '#mail_invoice_created', function(e){
        e.preventDefault();
        var iid = $("#iid").val();

        $('body').modalmanager('loading');

        setTimeout(function(){
            $modal.load('index.php?_route=invoices/mail_invoice_/' + iid + '/created', '', function(){
                $modal.modal();
                $('.sysedit').summernote({

                });
            });
        }, 1000);
    });

    sysrender.on('click', '#mail_invoice_reminder', function(e){
        e.preventDefault();
        var iid = $("#iid").val();

        $('body').modalmanager('loading');

        setTimeout(function(){
            $modal.load('index.php?_route=invoices/mail_invoice_/' + iid + '/reminder', '', function(){
                $modal.modal();
                $('.sysedit').summernote({

                });
            });
        }, 1000);
    });

    sysrender.on('click', '#mail_invoice_overdue', function(e){
        e.preventDefault();
        var iid = $("#iid").val();

        $('body').modalmanager('loading');

        setTimeout(function(){
            $modal.load('index.php?_route=invoices/mail_invoice_/' + iid + '/overdue', '', function(){
                $modal.modal();
                $('.sysedit').summernote({

                });
            });
        }, 1000);
    });

    sysrender.on('click', '#mail_invoice_confirm', function(e){
        e.preventDefault();
        var iid = $("#iid").val();

        $('body').modalmanager('loading');

        setTimeout(function(){
            $modal.load('index.php?_route=invoices/mail_invoice_/' + iid + '/confirm', '', function(){
                $modal.modal();
                $('.sysedit').summernote({

                });
            });
        }, 1000);
    });

    sysrender.on('click', '#mail_invoice_refund', function(e){
        e.preventDefault();
        var iid = $("#iid").val();

        $('body').modalmanager('loading');

        setTimeout(function(){
            $modal.load('index.php?_route=invoices/mail_invoice_/' + iid + '/refund', '', function(){
                $modal.modal();
                $('.sysedit').summernote({

                });
            });
        }, 1000);
    });


    $modal.on('click', '#send', function(){
        $modal.modal('loading');
        setTimeout(function(){


            var _url = $("#_url").val();
            $.post(_url + 'invoices/send_email', {


                message: $('.sysedit').code(),
                subject: $('#subject').val(),

                toname: $('#toname').val(),
                i_cid: $('#i_cid').val(),
                i_iid: $('#i_iid').val(),
                toemail: $('#toemail').val()

            }).done(function (data) {

                setTimeout(function () {

                    var _url = $("#_url").val();
                    $modal
                        .modal('loading')
                        .find('.modal-body')
                        .prepend(data);
                }, 2000);
            });
        }, 1000);

    });

    $modal.on('click', '#save_payment', function(){
        $modal.modal('loading');
        setTimeout(function(){


            var _url = $("#_url").val();
            $.post(_url + 'invoices/add-payment-post', {


                account: $('#account').val(),
                date: $('#date').val(),
                iid: $('#iid').val(),

                amount: $('#amount').val(),
                cats: $('#cats').val(),
                description: $('#description').val(),
                payer: $('#payer').val(),
                pmethod: $('#pmethod').val()

            }).done(function (data) {

                setTimeout(function () {

                    var _url = $("#_url").val();
                    if ($.isNumeric(data)) {
                        location.reload();
                    }
                    else {
                        $modal
                            .modal('loading')
                            .find('.modal-body')
                            .prepend(data);
                    }

                }, 2000);
            });
        }, 1000);

    });

    $("#mark_paid").click(function (e) {
        e.preventDefault();


        bootbox.confirm("Are you sure?", function(result) {
            if(result){
                var iid = $("#iid").val();
                $.post( "index.php?_route=invoices/markpaid", { iid: iid })
                    .done(function( data ) {
                        location.reload();
                    });
            }
        });

    });


    $("#mark_unpaid").click(function (e) {
        e.preventDefault();


        bootbox.confirm("Are you sure?", function(result) {
           if(result){
               var iid = $("#iid").val();
               $.post( "index.php?_route=invoices/markunpaid", { iid: iid })
                   .done(function( data ) {
                       location.reload();
                   });
           }
        });

    });

    $("#mark_cancelled").click(function (e) {
        e.preventDefault();
        bootbox.confirm("Are you sure?", function(result) {
            if(result){
                var iid = $("#iid").val();
                $.post( "index.php?_route=invoices/markcancelled", { iid: iid })
                    .done(function( data ) {
                        location.reload();
                    });
            }
        });

    });

    $("#mark_partially_paid").click(function (e) {
        e.preventDefault();
        bootbox.confirm("Are you sure?", function(result) {
            if(result){
                var iid = $("#iid").val();
                $.post( "index.php?_route=invoices/markpartiallypaid", { iid: iid })
                    .done(function( data ) {
                        location.reload();
                    });
            }
        });

    });

    $modal.on('hidden.bs.modal', function () {
        location.reload();
    })

});