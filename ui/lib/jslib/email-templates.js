$(document).ready(function () {

    var $modal = $('#ajax-modal');
    var sysrender = $('#sysfrm_ajaxrender');


    sysrender.on('click', '.ve', function(e){
        e.preventDefault();
        var vid = this.id;
        var id = vid.replace("f", "");
         id = id.replace("s", "");


        // var id = $(this).closest('tr').attr('id');
        // create the backdrop and wait for next modal to be triggered
        $('body').modalmanager('loading');

        setTimeout(function(){
            $modal.load('index.php?_route=settings/email-templates-view/' + id, '', function(){
                $modal.modal();
                $('.sysedit').summernote({
                    height: 400
                });
            });
        }, 1000);
    });


    $modal.on('click', '#update', function(){
        $modal.modal('loading');
        setTimeout(function(){


            var _url = $("#_url").val();
            $.post(_url + 'settings/update-email-template', {


                message: $('.sysedit').code(),
                subject: $('#subject').val(),

                id: $('#sid').val(),
                send: $('#send').val()

            }).done(function (data) {

                setTimeout(function () {

                    var _url = $("#_url").val();
                    $modal
                        .modal('loading')
                        .find('.modal-body')
                        .prepend('<div class="alert alert-success fade in">' + data +

                        '</div>');
                }, 2000);
            });
        }, 1000);

    });

    $modal.on('click', '#suspend', function(){
        $modal.modal('loading');
        setTimeout(function(){


            var _url = $("#_url").val();
            $.post(_url + 'plugins/flmcs/init/ajaxsuspend', $('#edit_form').serialize(), function(data){

                setTimeout(function () {
                    var id = $("#sid").val();
                    $modal.load('index.php?_route=plugins/flmcs/init/ajax_status/' + id, '', function(){
                        $modal.modal();
                        $modal
                            .modal('loading')
                            .find('.modal-body')
                            .prepend('<div class="alert alert-success fade in">' + data +

                            '</div>');
                    });
                }, 2000);
            });
        }, 1000);

    });

    $modal.on('click', '#unsuspend', function(){
        $modal.modal('loading');
        setTimeout(function(){


            var _url = $("#_url").val();
            $.post(_url + 'plugins/flmcs/init/ajaxunsuspend', $('#edit_form').serialize(), function(data){

                setTimeout(function () {
                    var id = $("#sid").val();
                    $modal.load('index.php?_route=plugins/flmcs/init/ajax_status/' + id, '', function(){
                        $modal.modal();
                        $modal
                            .modal('loading')
                            .find('.modal-body')
                            .prepend('<div class="alert alert-success fade in">' + data +

                            '</div>');
                    });
                }, 2000);
            });
        }, 1000);

    });

    $modal.on('hidden.bs.modal', function () {
        location.reload();
    })



});