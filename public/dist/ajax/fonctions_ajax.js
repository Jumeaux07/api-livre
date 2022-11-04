
  function showUser(id) {
    httpRequest = new XMLHttpRequest();

    if (!httpRequest) {
      alert('Abandon :( Impossible de créer une instance de XMLHTTP');
      return false;
    }
    httpRequest.onreadystatechange = alertContents;
    httpRequest.open('GET', 'http://localhost:8000/api/users/'+id);
    httpRequest.send();
  }

  function alertContents() {
    if (httpRequest.readyState === XMLHttpRequest.DONE) {
      if (httpRequest.status === 200) {
        var res = httpRequest.responseText;
        alert(res[5]);
      } else {
        alert('Il y a eu un problème avec la requête.');
      }
    }
  }
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
function activeUser(id) {
    $.ajax({
        type: 'GET',
        url: 'http://localhost:8000/api/user_status_activer/'+id,
        contentType: 'application/json',
        dataType: 'json',
        converters: {
            'json': jQuery.parseJSON,
        },
        success: function(data) {
            var status = data['user'].status;
            $('body').load('http://localhost:8000/admin/users');
            alert(status);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(JSON.stringify(jqXHR));
            console.log(textStatus+': '+errorThrown);
        }
    });

}
