/**
 * Affichage d'une (et une seule) modal
 */
var modal = (function($) {

    var $modal = $('<div id="modal" class="modal fade" role="dialog" />');

    function show() {
        $modal.modal('show');
    }

    /**
     * Close & execute un callback optionnel
     */
    function close(callback) {

        if (callback) {
            $modal.one('hidden.bs.modal', callback);
        }

        $modal.modal('hide');
    }

    // les 3 params sont "obligatoire" pour l'instant, recoder si besoin
    function fill(title, content, footer) {
        var html = 	'<div class="modal-dialog"><div class="modal-content">';
        html += 		'<div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h3>'+title+'</h3></div>';
        html += 		'<div class="modal-body"><p>'+content+'</p></div>';
        html += 		'<div class="modal-footer">'+footer+'</div>';
        html += 	'</div></div>';
        $modal.html(html);
    }

    // init
    //------

    // Au document ready on ajoute la modal
    $(function() {
        $('body').append($modal);
    });

    // les liens rel=["modal"] vont dans la modal en ajax
    $('body').on('click', 'a[rel="modal"]', function() {
        $modal.modal();
        $.get($(this).attr('href'))
        .done(function(response) {
            $modal.html(response);
        });

        return false;
    });

    // les liens à l'intérieur vont dans la modal en ajax

    // les formulaires se postent en ajax dans la modal
    $modal.on('submit', 'form', function(e) {
        e.preventDefault();

        var form = $(this);
        var formData = new FormData(this);

        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: formData,
            contentType: false, // TODO en fonction du form (upload or not)
            processData: false
        })
        .done(function(response) {
            $modal.html(response);
        });
    });

    // les liens en "target=_parent" vont dans le parent !
    $modal.on('click', 'a[target="_parent"]', function() {
        var url = $(this).attr('href');
        modal.close(function() {
            document.location.href = url;
        });
    });

    // Affiche un message de confirmation sur des liens dangeureux (genre supression)
    $('[data-confirm]').on('click', function(e) {
        e.preventDefault();
        var message = $(this).attr('data-confirm') || 'Confirmation';
        var url = $(this).attr('href');
        fill('Confirmez', message, '<a target="_parent" href="'+url+'" class="btn btn-primary">Confirmer</a><a href="#" class="btn btn-default" data-dismiss="modal">Annuler</a>');
        show();
    });

    // module
    //-------
    return {
        show: show,
        close: close
    }
})($);
