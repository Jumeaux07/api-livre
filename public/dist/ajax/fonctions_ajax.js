$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
//----------------------SHOW METHOD---------------------
function showUser(id) {
    $.ajax({
        type: 'GET',
        url: 'http://localhost:8000/api/users/'+id,
        contentType: 'application/json',
        dataType: 'json',
        converters: {
            'json': jQuery.parseJSON,
        },
        success: function(data) {
            document.getElementById('user_nom').innerHTML = data['user'].nom+' '+data['user'].prenoms;
            document.getElementById('user_email').innerHTML = data['user'].email;
            document.getElementById('user_phone').innerHTML = data['user'].phone;
            document.getElementById('user_adresse').innerHTML = data['user'].adresse;
            document.getElementById('user_score').innerHTML = data['user'].score;
            var status = data['user'].status;
            if (status == 0) {
                document.getElementById('user_status').innerHTML = "<span class=\"label label-table label-danger\">Désactivé</span>";
            }
            if (status == 1) {
                document.getElementById('user_status').innerHTML = "<span class=\"label label-table label-success\">Active</span>";
            }
            if (status == 2) {
                document.getElementById('user_status').innerHTML = "<span class=\"label label-table label-warning\">En attente</span>";
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(JSON.stringify(jqXHR));
            console.log(textStatus+': '+errorThrown);
        }
    });

}
//----------------------SHOW TO EDIT METHOD---------------------
function editUser(id) {
    $.ajax({
        type: 'GET',
        url: 'http://localhost:8000/api/users/'+id,
        contentType: 'application/json',
        dataType: 'json',
        converters: {
            'json': jQuery.parseJSON,
        },
        success: function(data) {
            $('#nom').val(data['user'].nom);
            $('#prenoms').val(data['user'].prenoms);
            $('#phone').val(data['user'].phone);
            $('#email').val(data['user'].email);
            $('#adresse').val(data['user'].adresse);
            $('#score').val(data['user'].score);
            $('#user_id').val(id);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(JSON.stringify(jqXHR));
            console.log(textStatus+': '+errorThrown);
        }
    });
    return user;

}
function editMatiere(id) {
    $.ajax({
        type: 'GET',
        url: 'http://localhost:8000/api/matieres/'+id,
        contentType: 'application/json',
        dataType: 'json',
        converters: {
            'json': jQuery.parseJSON,
        },
        success: function(data) {
            $('#designation_matiere').val(data['matiere'].designation);
            $('#matiere_id').val(id);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(JSON.stringify(jqXHR));
            console.log(textStatus+': '+errorThrown);
        }
    });
    return user;

}
//----------------------UPDATE METHOD---------------------
function updateUser() {

    var nom = $('#nom').val();
    var prenoms = $('#prenoms').val();
    var phone = $('#phone').val();
    var email = $('#email').val();
    var adresse = $('#adresse').val();
    var score = $('#score').val();
    var user_id = $('#user_id').val();
    var data = {nom:nom, prenoms:prenoms, phone:phone, email:email, adresse:adresse, score:score}
    $.ajax({
        type: 'PUT',
        url: 'http://localhost:8000/api/users/'+user_id,
        contentType: 'application/json',
        data:JSON.stringify(data),
        dataType: 'json',
        converters: {
            'json': jQuery.parseJSON,
        },
        success: function(data) {
            document.getElementById('user_update').innerHTML = '<h4 class="card-title mt-4"></h4> <div class="text-center"> <div class="spinner-border text-success" role="status"> <span class="sr-only">Loading...</span> </div> </div>';
            $('body').load('#');
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(JSON.stringify(jqXHR));
            console.log(textStatus+': '+errorThrown);
        }
    });

}
function updateMatiere() {

    var designation = $('#designation_matiere').val();
    var matiere_id = $('#matiere_id').val();
    var data = {designation:designation}
    $.ajax({
        type: 'PUT',
        url: 'http://localhost:8000/api/matieres/'+matiere_id,
        contentType: 'application/json',
        data:JSON.stringify(data),
        dataType: 'json',
        converters: {
            'json': jQuery.parseJSON,
        },
        success: function(data) {
            document.getElementById('matiere_update').innerHTML = '<h4 class="card-title mt-4"></h4> <div class="text-center"> <div class="spinner-border text-success" role="status"> <span class="sr-only">Loading...</span> </div> </div>';
            $('body').load('#');
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(JSON.stringify(jqXHR));
            console.log(textStatus+': '+errorThrown);
        }
    });

}
//----------------------ACTIVATE METHOD---------------------
function activerUser(id) {
    $.ajax({
        type: 'GET',
        url: 'http://localhost:8000/api/user_status_activer/'+id,
        contentType: 'application/json',
        dataType: 'json',
        converters: {
            'json': jQuery.parseJSON,
        },
        success: function(data) {
            document.getElementById('table_btn').innerHTML = '<h4 class="card-title mt-4"></h4> <div class="text-center"> <div class="spinner-border text-success" role="status"> <span class="sr-only">Loading...</span> </div> </div>'
            $('body').load('#');
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(JSON.stringify(jqXHR));
            console.log(textStatus+': '+errorThrown);
        }
    });

}
function activerMatiere(id) {
    $.ajax({
        type: 'GET',
        url: 'http://localhost:8000/api/matiere_status_activer/'+id,
        contentType: 'application/json',
        dataType: 'json',
        converters: {
            'json': jQuery.parseJSON,
        },
        success: function(data) {
            document.getElementById('table_btn').innerHTML = '<h4 class="card-title mt-4"></h4> <div class="text-center"> <div class="spinner-border text-success" role="status"> <span class="sr-only">Loading...</span> </div> </div>'
            $('body').load('#');
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(JSON.stringify(jqXHR));
            console.log(textStatus+': '+errorThrown);
        }
    });

}
//----------------------DESACTIVATE METHOD---------------------
function desactiverUser(id) {
    $.ajax({
        type: 'GET',
        url: 'http://localhost:8000/api/user_status_desactiver/'+id,
        contentType: 'application/json',
        dataType: 'json',
        converters: {
            'json': jQuery.parseJSON,
        },
        success: function(data) {
            document.getElementById('table_btn').innerHTML = '<h4 class="card-title mt-4"></h4> <div class="text-center"> <div class="spinner-border text-danger" role="status"> <span class="sr-only">Loading...</span> </div> </div>'
            $('body').load('#');
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(JSON.stringify(jqXHR));
            console.log(textStatus+': '+errorThrown);
        }
    });

}
function desactiverMatiere(id) {
    $.ajax({
        type: 'GET',
        url: 'http://localhost:8000/api/matiere_status_desactiver/'+id,
        contentType: 'application/json',
        dataType: 'json',
        converters: {
            'json': jQuery.parseJSON,
        },
        success: function(data) {
            document.getElementById('table_btn').innerHTML = '<h4 class="card-title mt-4"></h4> <div class="text-center"> <div class="spinner-border text-danger" role="status"> <span class="sr-only">Loading...</span> </div> </div>'
            $('body').load('#');
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(JSON.stringify(jqXHR));
            console.log(textStatus+': '+errorThrown);
        }
    });

}
