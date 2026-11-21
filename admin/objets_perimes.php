<?php
define('AUTH_LOGIN_PATH', '../login.php');
require_once __DIR__ . '/../includes/auth_check.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

    <title>Objets non réclamés (+1 an)</title>

    <link href="css/stylesheets.css" rel="stylesheet" type="text/css" />
    <link href="css/app-layout.css" rel="stylesheet" type="text/css" />

    <link rel="icon" type="image/ico" href="favicon.ico"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script type='text/javascript' src='https://code.jquery.com/jquery-3.5.1.min.js'></script>
    <script type='text/javascript' src='js/plugins/jquery/jquery-ui-1.10.1.custom.min.js'></script>
    <script type='text/javascript' src='js/plugins/jquery/jquery-migrate-1.1.1.min.js'></script>
    <script type='text/javascript' src='js/plugins/bootstrap/bootstrap.min.js'></script>
    <script type='text/javascript' src='js/plugins.js'></script>
    <script type='text/javascript' src='js/actions.js'></script>
</head>

<style>
    .table img { 
     max-width: 100px;
     height: auto; 
     object-fit: cover;
     border-radius: 4px; }

    .table {
        border-collapse: separate; border-spacing: 0; border-radius: 8px;
        overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,.08);
    }
    .table thead th {
        background-color: #213753; color: #ffffff; font-weight: 700; font-size: 13px;
        letter-spacing: .5px; padding: 16px 12px; border: none; border-bottom: 2px solid #eef1f4; vertical-align: middle;
    }
    .table tbody td { padding: 12px; vertical-align: middle; font-size: 14px; color: #37474f; border-top: 1px solid #eceff1; }
    .table-striped tbody tr:nth-of-type(odd) { background-color: #fafbfc; }
    td { background-color: white; }

    .label { padding: 6px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; letter-spacing: .3px; }
    .label-success { background-color: #1f8a3f; color: #fff; }
    .label-warning { background-color: #c9902f; color:#fdf6e8 ; border: 1px solid #eeddb3; }

    .liens .btn-primary { background-color: #12151a; border-color: #12151a; border-radius: 20px; }

    .panel-heading {
        background: #ffffff; border-bottom: 1px solid #eceff1; border-top: 3px solid #10b981; padding: 18px 20px !important;
        display: flex; align-items: center; justify-content: space-between; border-radius: 8px 8px 0 0;
    }
    .panel-title { font-size: 18px; font-weight: 700; color: #263238; letter-spacing: .2px; }

    .search-container { display: inline-block; margin-right: 12px; }
    .search-container input {
        height: 42px; width: 260px; border: 1.5px solid #e2e8f0; border-radius: 21px;
        background-color: #f8fafc; padding: 0 18px; font-size: 14px; color: #37474f;
    }

    .intro-note {
        background: #fff8e6; color: #7a5b00; border: 1px solid #f0d98c;
        padding: 12px 16px; border-radius: 8px; margin-bottom: 16px; font-size: 13px;
    }

    @media (max-width: 767px) {
        .panel-heading { flex-direction: column; align-items: stretch; }
        .search-container { width: 100%; margin-right: 0; margin-bottom: 8px; }
        .search-container input { width: 100%; }
    }
</style>

<body>

<?php
$pageTitle  = 'Objets non réclamés (+1 an)';
$activePage = 'perimes';
include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/sidebar.php';
?>

    <div class="content">
        <div class="workplace">
            <div class="row">
                <div class="col-md-12">

                    <div class="intro-note">
                        Cette page affiche les objets trouvés il y a plus d'un an et toujours dans le système. Vous pouvez les supprimer définitivement d'ici.
                    </div>

                    <div class="widget">
                        <div class="panel panel-default">
                            <div class="panel-heading clearfix">
                                <span class="panel-title">Liste des objets (+1 an)</span>
                                <div class="pull-right-mobile pull-right">
                                    <div class="search-container">
                                        <input type="text" id="search" class="form-control" placeholder="Rechercher un objet...">
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nom d'object</th>
                                                <th>Catégorie</th>
                                                <th>Description</th>
                                                <th>Chambre</th>
                                                <th>Date de trouvé</th>
                                                <th>Photo</th>
                                                <th>Statut</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="objectdata"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function(){
        getdata();

        $(document).on('click', '#appMenuBtn', function(e){
            e.preventDefault();
            $('#appSidebar').toggleClass('mobile-open');
            $('#appOverlay').toggleClass('mobile-open');
        });

        $(document).on('click', '#appOverlay', function(){
            $('#appSidebar').removeClass('mobile-open');
            $('#appOverlay').removeClass('mobile-open');
        });

        function getdata(searchVal){
            searchVal = searchVal || "";
            $.ajax({
                type: "GET",
                url: "code_perimes.php",
                data: { search: searchVal },
                dataType: "json",
                success: function(response){
                    $('.objectdata').html("");

                    if(response.length === 0) {
                        $('.objectdata').append('<tr><td colspan="8" class="text-center">Aucun objet de plus d\'un an</td></tr>');
                        return;
                    }
                    $.each(response, function(key, value){
                        var imgTag = value.photo ? '<img src="../../shared/images/'+value.photo+'">' : 'Pas d\'image';
                        var statusBadge = (value.status === 'rendu')
                            ? '<span class="label label-success">Rendu</span>'
                            : '<span class="label label-warning">Trouvé</span>';

                        $('.objectdata').append(
                            '<tr>\
                            <td>'+value.name+'</td>\
                            <td>'+value.categorie+'</td>\
                            <td>'+value.description+'</td>\
                            <td>'+value.chambre+'</td>\
                            <td>'+value.date+'</td>\
                            <td>'+imgTag+'</td>\
                            <td>'+statusBadge+'</td>\
                            <td>\
                            <div class="liens">\
                                <button class="btn btn-xs btn-danger deletebtn" value="'+value.id+'"><span class="glyphicon glyphicon-trash"></span> Supprimer</button>\
                            </div>\
                            </td>\
                            </tr>'
                        );
                    });
                },
                error: function(xhr){
                    console.log(xhr.responseText);
                }
            });
        }

        $("#search").keyup(function(){
            getdata($(this).val());
        });

        $(document).on("click", ".deletebtn", function(e){
            e.preventDefault();
            var id = $(this).val();
            if(confirm("Voulez-vous vraiment supprimer définitivement cet objet ?")) {
                $.ajax({
                    type: "POST",
                    url: "control.php",
                    data: { delete_id: id },
                    success: function(response){
                        alert(response);
                        getdata($("#search").val());
                    }
                });
            }
        });
    });
    </script>
</body>
</html>
