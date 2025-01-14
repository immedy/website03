// Edit Username
$(document).ready(function() {
    $('table').on('click', '#Username', function() {
        var usernameURL = $(this).data('url');
        $.get(usernameURL, function(data) {
            $('#CariUsername').modal('show');
            $('#user-nama').text(data.nama);
            $('#id').val(data.id);
            $('#user-user').val(data.user.username)
            
            
        });
    });

    var confirmationInput = document.getElementById("confirm-password");
    var passwordInput = document.getElementById('user-password');
    var submitButton = document.getElementById("validasi-password");
    var confirmationError = document.getElementById("error");

    confirmationInput.addEventListener("input", function() {
        var password = passwordInput.value;
        var password_confirmation = this.value;

        if (password !== password_confirmation) {
            confirmationError.classList.remove("d-none");
            submitButton.disabled = true;
        } else {
            confirmationError.classList.add("d-none");
            submitButton.disabled = false;
        }
    });
});


//Edit Pegawai
$(document).ready(function() {
    $('table').on('click', '#Pegawai', function() {
        var pegawaiURL = $(this).data('url');
        $.get(pegawaiURL, function(data) {
            $('#EditPegawai').modal('show');
            $('#user-nip').val(data.nip);
            $('#user-id').val(data.id);
            $('#user-namapegawai').val(data.nama)
        })
    });

});

//JadwalDokter
$(document).ready(function() {
    $('table').on('click', '#JadwalDokter', function() {
        var dokterURL = $(this).data('url');
        $.get(dokterURL, function(data) {
            $('#JadwalDokterModal').modal('show');
            $('#dokter-nama').text(data.nama);
            $('#dokter-id').val(data.id)
        })
    });

});

$(document).ready(function(){
    $('table').on('click','#deleteDokter', function(){
        var dokterURL = $(this).data('url');
        $.get(dokterURL, function(data){
            $('#deleteDokterModal').modal('show');
            $('#nama').text(data.nama);
            $('#id').val(data.id);
        })
    });

});