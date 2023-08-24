$(document).ready(function() {
    $('table').on('click', '#pesan', function() {
        var pesanURL = $(this).data('url');
        $.get(pesanURL, function(data) {
            $('#pesanShowModal').modal('show');
             $('#kritiksaran').text(data.kritiksaran);
            
        })
    });

});