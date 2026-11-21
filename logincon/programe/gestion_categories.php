<?php
define('AUTH_LOGIN_PATH', '../login.php');
require_once __DIR__ . '/../../includes/auth_check.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>        
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    
    <title>Gestion des catégories</title>
    
    <link href="css/stylesheets.css" rel="stylesheet" type="text/css" />
    <link href="css/app-layout.css" rel="stylesheet" type="text/css" />
         
    <link rel="icon" type="image/ico" href="favicon.ico"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script type='text/javascript' src='https://code.jquery.com/jquery-3.5.1.min.js'></script>
    <script type='text/javascript' src='js/plugins/jquery/jquery-ui-1.10.1.custom.min.js'></script>
    <script type='text/javascript' src='js/plugins/jquery/jquery-migrate-1.1.1.min.js'></script>
    
    <script type='text/javascript' src='js/plugins/jquery/globalize.js'></script>
    <script type='text/javascript' src='js/plugins/other/excanvas.js'></script>
   
    <script type='text/javascript' src='js/plugins/other/jquery.mousewheel.min.js'></script>
        
    <script type='text/javascript' src='js/plugins/bootstrap/bootstrap.min.js'></script>            
    
    <script type='text/javascript' src='js/plugins/cookies/jquery.cookies.2.2.0.min.js'></script>
    
    <script type='text/javascript' src='js/plugins/fancybox/jquery.fancybox.pack.js'></script>
    
    <script type='text/javascript' src='js/plugins/jflot/jquery.flot.js'></script>    
    <script type='text/javascript' src='js/plugins/jflot/jquery.flot.stack.js'></script>    
    <script type='text/javascript' src='js/plugins/jflot/jquery.flot.pie.js'></script>
    <script type='text/javascript' src='js/plugins/jflot/jquery.flot.resize.js'></script>
    
    <script type='text/javascript' src='js/plugins/epiechart/jquery.easy-pie-chart.js'></script>
    <script type='text/javascript' src='js/plugins/knob/jquery.knob.js'></script>
    
    <script type='text/javascript' src='js/plugins/sparklines/jquery.sparkline.min.js'></script>    
    
    <script type='text/javascript' src='js/plugins/pnotify/jquery.pnotify.min.js'></script>
    
    <script type='text/javascript' src='js/plugins/fullcalendar/fullcalendar.min.js'></script>        
    
    <script type='text/javascript' src='js/plugins/wookmark/jquery.wookmark.js'></script>        
    
    <script type='text/javascript' src='js/plugins/jbreadcrumb/jquery.jBreadCrumb.1.1.js'></script>
    
    <script type='text/javascript' src='js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js'></script>
    
    <script type='text/javascript' src="js/plugins/uniform/jquery.uniform.min.js"></script>
    <script type='text/javascript' src="js/plugins/select/select2.min.js"></script>
    <script type='text/javascript' src='js/plugins/tagsinput/jquery.tagsinput.min.js'></script>
    <script type='text/javascript' src='js/plugins/maskedinput/jquery.maskedinput-1.3.min.js'></script>
    <script type='text/javascript' src='js/plugins/multiselect/jquery.multi-select.min.js'></script>    
    
    <script type='text/javascript' src='js/plugins/validationEngine/languages/jquery.validationEngine-en.js'></script>
    <script type='text/javascript' src='js/plugins/validationEngine/jquery.validationEngine.js'></script>        
    <script type='text/javascript' src='js/plugins/stepywizard/jquery.stepy.js'></script>
        
    <script type='text/javascript' src='js/plugins/animatedprogressbar/animated_progressbar.js'></script>
    <script type='text/javascript' src='js/plugins/hoverintent/jquery.hoverIntent.minified.js'></script>
    
    <script type='text/javascript' src='js/plugins/media/mediaelement-and-player.min.js'></script>    
    
    <script type='text/javascript' src='js/plugins/cleditor/jquery.cleditor.js'></script>
    
    <script type='text/javascript' src='js/plugins/shbrush/XRegExp.js'></script>
    <script type='text/javascript' src='js/plugins/shbrush/shCore.js'></script>
    <script type='text/javascript' src='js/plugins/shbrush/shBrushXml.js'></script>
    <script type='text/javascript' src='js/plugins/shbrush/shBrushJScript.js'></script>
    <script type='text/javascript' src='js/plugins/shbrush/shBrushCss.js'></script>    
        
    <script type='text/javascript' src='js/plugins/filetree/jqueryFileTree.js'></script>
    
    <script type='text/javascript' src='js/plugins/slidernav/slidernav-min.js'></script>    
    <script type='text/javascript' src='js/plugins/isotope/jquery.isotope.min.js'></script>    
    <script type='text/javascript' src='js/plugins/jnotes/jquery-notes_1.0.8_min.js'></script>
    <script type='text/javascript' src='js/plugins/jcrop/jquery.Jcrop.min.js'></script>
    <script type='text/javascript' src='js/plugins/ibutton/jquery.ibutton.min.js'></script>
    
    <script type='text/javascript' src='js/plugins/scrollup/jquery.scrollUp.min.js'></script>
    
    <script type='text/javascript' src='js/plugins.js'></script>
    <script type='text/javascript' src='js/charts.js'></script>
    <script type='text/javascript' src='js/actions.js'></script>
</head>

<style>

    .table img {
        max-width: 100px;
        height: auto;
        object-fit: cover;
        cursor: pointer;
        border-radius: 4px;
        transition: transform .15s ease, box-shadow .15s ease;
    }
    .table img:hover {
        transform: scale(1.05);
        box-shadow: 0 2px 10px rgba(0,0,0,.25);
    }

    #imageModal{
        display:none;
        position:fixed;
        top:0; left:0;
        width:100%; height:100%;
        background:rgba(10,12,15,.97);
        backdrop-filter: blur(6px);
        -webkit-backdrop-filter: blur(6px);
        z-index:99999;
        overflow:hidden;
        justify-content:center;
        align-items:center;
        animation: fadeInModal .2s ease;
    }

    @keyframes fadeInModal {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    #imageModal .modal-inner{
        position:relative;
        width:100%; height:100%;
        display:flex;
        justify-content:center;
        align-items:center;
        touch-action:none;
    }

    #bigImage{
        max-width:92%;
        max-height:88%;
        cursor:grab;
        transition:transform .15s ease-out, opacity .2s ease;
        transform:translate(0,0) scale(1);
        user-select:none;
        -webkit-user-drag:none;
        border-radius:6px;
        box-shadow:0 10px 40px rgba(0,0,0,.6);
        opacity:0;
        background:#111;
    }
    #bigImage.loaded{ opacity:1; }
    #bigImage.dragging{ cursor:grabbing; transition:none; }

    #imgLoader{
        position:absolute;
        width:42px; height:42px;
        border:3px solid rgba(255,255,255,.15);
        border-top-color:#fff;
        border-radius:50%;
        animation:spinLoader .8s linear infinite;
        display:none;
    }
    @keyframes spinLoader{ to { transform:rotate(360deg); } }

    #closeImage{
        position:absolute;
        top:16px; right:20px;
        color:white;
        font-size:30px;
        font-weight:400;
        line-height:1;
        cursor:pointer;
        z-index:100000;
        width:44px; height:44px;
        display:flex;
        align-items:center;
        justify-content:center;
        border-radius:50%;
        background:rgba(255,255,255,.08);
        transition:background .2s ease, transform .2s ease;
    }
    #closeImage:hover{
        background:rgba(255,255,255,.18);
        transform:rotate(90deg);
    }

    #zoomControls{
        position:absolute;
        bottom:22px;
        left:50%;
        transform:translateX(-50%);
        display:flex;
        gap:10px;
        background:rgba(255,255,255,.08);
        padding:8px;
        border-radius:30px;
        z-index:100000;
    }
    #zoomControls button{
        width:42px; height:42px;
        border-radius:50%;
        border:none;
        background:rgba(255,255,255,.12);
        color:#fff;
        font-size:18px;
        cursor:pointer;
        display:flex;
        align-items:center;
        justify-content:center;
        transition:background .2s ease;
    }
    #zoomControls button:hover{ background:rgba(255,255,255,.25); }
    #zoomControls button:active{ transform:scale(0.92); }

    #imgHint{
        position:absolute;
        top:20px;
        left:50%;
        transform:translateX(-50%);
        color:rgba(255,255,255,.65);
        font-size:12px;
        letter-spacing:.4px;
        background:rgba(255,255,255,.08);
        padding:5px 14px;
        border-radius:20px;
        z-index:100000;
        pointer-events:none;
        transition:opacity .4s ease;
    }

    #close {
        position: absolute;
        top: 20px;
        right: 30px;
        color: white;
        font-size: 40px;
        cursor: pointer;
    }
    .liens {
        display: flex;
        gap: 5px;
    }
    table{ border-radius: 4px; }
    td{ background-color: white; }

    /* Table  */
    .table {
        border-collapse: separate;
        border-spacing: 0;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 1px 3px rgba(0,0,0,.08);
    }
    .table thead th {
        background-color: #314c70;
        color: #ffffff;
        font-weight: 700;
        font-size: 13px;
        letter-spacing: .5px;
        padding: 16px 12px;
        border: none;
        border-bottom: 2px solid #eef1f4;
        vertical-align: middle;
    }
    
    .table tbody td {
        padding: 12px;
        vertical-align: middle;
        font-size: 14px;
        color: #37474f;
        border-top: 1px solid #eceff1;
    }
    .table tbody tr {
        transition: background-color .15s ease;
    }
    .table tbody tr:hover {
        background-color: #f5f8fa;
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #fafbfc;
    }

    .label {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .3px;
    }
    .label-success { background-color: #1f8a3f; color: #fff; }
    .label-warning { background-color:#c9902f; color: #fdf6e8; border: 1px solid #eeddb3; }

    .liens .btn {
        border-radius: 4px;
        font-size: 12px;
        padding: 5px 10px;
        font-weight: 500;
        transition: transform .1s ease;
    }
    .liens .btn:hover { transform: translateY(-1px); }
    .liens .btn-primary {
        background-color: #12151a;
        border-color: #12151a;
        border-radius: 20px;
        padding: 6px 16px;
    }
    .liens .btn-danger {
        background-color: #e74c3c;
        border-color: #e74c3c;
    }

    .btn-danger{ height: 33px; }

    .widget .head.dark {
        background: #12151a !important;
        background-image: none !important;
        display: flex;
        align-items: center;
        padding: 14px 20px;
        border-radius: 8px 8px 0 0;
    }
    .widget .head.dark .icon {
        float: none;
        margin: 0 12px 0 0;
        padding: 0;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #10b981;
        border-radius: 8px;
    }
    .widget .head.dark .icon .icos-archive2 {
        color: #12151a;
        font-size: 15px;
    }
    .widget .head.dark h2 {
        color: #ffffff !important;
        text-shadow: none !important;
        font-size: 15px;
        font-weight: 700;
        padding: 0;
        margin: 0;
        flex: 1;
    }

    .panel-heading {
        background: #ffffff;
        border-bottom: 1px solid #eceff1;
        border-top: 3px solid #10b981;
        padding: 18px 20px !important;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-radius: 8px 8px 0 0;
    }
    .panel-title {
        font-size: 18px;
        font-weight: 700;
        color: #263238;
        letter-spacing: .2px;
    }

    .search-container {
        display: inline-block;
        margin-right: 12px;
        position: relative;
    }
    .search-container input {
        height: 42px;
        width: 260px;
        border: 1.5px solid #e2e8f0;
        border-radius: 21px;
        background-color: #f8fafc;
        padding: 0 18px 0 40px;
        font-size: 14px;
        color: #37474f;
        transition: all .25s ease;
    }
    .search-container input:focus {
        border-color: #12151a;
        background-color: #fff;
        box-shadow: 0 0 0 4px rgba(57, 84, 104, 0.12);
        outline: none;
    }
    .search-container::before {
        content: '';
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        width: 16px; height: 16px;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%2394a3b8' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3ccircle cx='11' cy='11' r='8'%3e%3c/circle%3e%3cline x1='21' y1='21' x2='16.65' y2='16.65'%3e%3c/line%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-size: contain;
        z-index: 1;
        pointer-events: none;
    }

    #openAddBtn {
        background-color: #10b981;
        border-color: #10b981;
        color: #12151a;
        height: 42px;
        border-radius: 21px;
        padding: 0 26px;
        font-weight: 700;
        font-size: 14px;
        letter-spacing: .3px;
        transition: all .2s ease;
        box-shadow: 0 3px 8px rgba(16,185,129, 0.35);
    }
    #openAddBtn:hover {
        background-color: #c9902f;
        border-color: #c9902f;
        color: #12151a;
        box-shadow: 0 4px 12px rgba(201, 144, 47, 0.45);
        transform: translateY(-1px);
    }
    .close-btn {
        height: 42px;
        border-radius: 21px;
        padding: 0 26px;
        font-weight: 600;
        font-size: 14px;
        letter-spacing: .3px;
    }

    @media (max-width: 767px) {
        .form-group {
            margin-bottom: 15px;
        }

        .panel-heading {
            display: flex;
            flex-direction: column;
            align-items: stretch;
            padding: 10px !important;
        }
        .panel-heading .pull-left {
            float: none !important;
            display: block;
            text-align: center;
            line-height: normal !important;
            margin-bottom: 12px;
        }
        .panel-heading .pull-right-mobile {
            float: none !important;
            display: flex;
            flex-direction: column;
            gap: 8px;
            width: 100%;
        }

        .search-container {
            display: block;
            width: 100%;
            margin-right: 0;
        }
        .search-container input {
            width: 100%;
        }

        .panel-heading .form-inline .form-control {
            width: 100% !important;
        }

        #openAddBtn, .close-btn {
            width: 100% !important;
            display: block;
            border-radius: 10px;
        }

        .table thead th,
        .table tbody td {
            padding: 8px 6px;
            font-size: 12px;
        }
        .liens {
            flex-direction: column;
            gap: 4px;
        }
        .liens .btn {
            width: 100%;
        }
    }

</style>

<body>    

<?php
$pageTitle  = 'Gestion des catégories';
$activePage = 'categories';
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/sidebar.php';
?>

    <div class="content">
        <div class="workplace">
            <div class="row">
                <div class="col-md-12">

                    <div class="row stats-row" id="statsCardsRow">
                        <div class="col-xs-6 col-sm-3">
                            <div class="stat-card stat-categories">
                                <div class="stat-icon"><i class="fas fa-layer-group"></i></div>
                                <div class="stat-body">
                                    <div class="stat-value" id="statTotalCategories">0</div>
                                    <div class="stat-label">Catégories</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-3">
                            <div class="stat-card stat-objects">
                                <div class="stat-icon"><i class="fas fa-box-open"></i></div>
                                <div class="stat-body">
                                    <div class="stat-value" id="statTotalObjects">0</div>
                                    <div class="stat-label">Objets au total</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-3">
                            <div class="stat-card stat-rendus">
                                <div class="stat-icon"><i class="fas fa-check-circle"></i></div>
                                <div class="stat-body">
                                    <div class="stat-value" id="statTotalRendus">0</div>
                                    <div class="stat-label">Objets rendus</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-3">
                            <div class="stat-card stat-non-rendus">
                                <div class="stat-icon"><i class="fas fa-exclamation-circle"></i></div>
                                <div class="stat-body">
                                    <div class="stat-value" id="statTotalNonRendus">0</div>
                                    <div class="stat-label">Objets non rendus</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="widget">
                        <div class="toolbar">
                            <div class="panel panel-default">
                                <div class="panel-heading clearfix">
                                <h4 class="panel-title pull-left" style="line-height: 34px;">Catégories des objets</h4>
                                <div class="pull-right-mobile pull-right">
                                    <div class="search-container">
                                        <input type="text" id="search" class="form-control" placeholder="Rechercher une catégorie...">
                                    </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                        <div class="toolbar-fluid"></div>
                    </div>

                    <div class="widget">
                        <div class="panel-body">
                            <div class="row" id="categoriesGrid"></div>
                        </div>
                    </div>

                    <div class="widget" id="objectsPanel" style="display:none;">
                        <div class="head dark">
                            <div class="icon"><span class="icos-archive2"></span></div>
                            <h2 id="objectsPanelTitle">Objets</h2>
                            <button class="btn btn-xs btn-danger pull-right" id="closeObjectsPanel" style="margin-top:0px;">Fermer</button>
                        </div>                
                        <div class="panel-body">

                            <div class="panel-body BOX-form" id="editObjectBox" style="display:none;">
                                <form id="editObjectForm">
                                    <input type="hidden" name="object_id" id="edit_object_id">
                                    <div class="row">
                                        <div class="form-group col-xs-12 col-sm-4">
                                            <label for="edit_date_rendement">Date de restitution :</label>
                                            <input type="date" class="form-control" name="date_rendement" id="edit_date_rendement" max="<?= date('Y-m-d') ?>">
                                            <span class="field-error-msg" id="edit_date_rendement_error"></span>
                                        </div>
                                    </div>
                                    <p class="text-muted">Le statut de l'objet sera automatiquement mis à jour vers <strong>Rendu</strong>.</p>
                                    <button type="submit" class="btn btn-success" id="editObjectSave">Confirmer la restitution</button>
                                    <button type="button" class="btn btn-default" id="cancelEditBtn">Annuler</button>
                                </form>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nom d'object</th>
                                            <th>Description</th>
                                            <th>Chambre</th>
                                            <th>Date</th>
                                            <th>Date de restitution</th>
                                            <th>Photo</th>
                                            <th>Statut</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="objectsByCategorieData"></tbody>
                                </table>
                            </div>
                        </div> 
                    </div>                
                </div>
            </div>
        </div>
    </div>

<div id="imageModal">
    <div class="modal-inner">
        <div id="imgLoader"></div>
        <img id="bigImage" src="" alt="Aperçu">
        <span id="closeImage">&times;</span>
        <div id="zoomControls">
            <button type="button" id="zoomOutBtn" title="Zoom arrière">&minus;</button>
            <button type="button" id="zoomResetBtn" title="Réinitialiser">&#8635;</button>
            <button type="button" id="zoomInBtn" title="Zoom avant">&plus;</button>
        </div>
    </div>
</div>

    <style>
        .categorie-card {
            background: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            padding: 18px;
            margin-bottom: 20px;
            cursor: pointer;
            transition: box-shadow 0.2s ease, transform 0.15s ease, border-color .2s ease, background .2s ease;
        }
        .categorie-card:hover {
            box-shadow: 0 3px 10px rgba(0,0,0,0.15);
            transform: translateY(-2px);
        }
        .categorie-card h4 {
            margin: 0 0 8px 0;
            font-size: 16px;
            font-weight: 700;
            color: #263238;
        }
        .categorie-card .badge-count {
            display: inline-block;
            background: #2196F3;
            color: #fff;
            border-radius: 12px;
            padding: 3px 12px;
            font-size: 13px;
            font-weight: 600;
        }
        .categorie-card.active-categorie {
            border-color: #12151a;
            box-shadow: 0 0 0 2px rgba(57, 84, 104, 0.25);
            background: #f7f9fa;
        }
        .categorie-card.active-categorie h4 {
            color: #12151a;
        }
        .categorie-card .cat-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 12px;
        }
        .categorie-card .cat-icon {
            width: 42px;
            height: 42px;
            flex: 0 0 auto;
            border-radius: 10px;
            background: #eef2f7;
            color: #12151a;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }
        .categorie-card.active-categorie .cat-icon {
            background: #10b981;
            color: #12151a;
        }
        .categorie-card h4 {
            margin: 0;
        }
        .categorie-card .cat-stats {
            display: flex;
            flex-direction: column;
            gap: 6px;
            margin-top: 10px;
        }
        .categorie-card .cat-total-line {
            color: #607080;
            font-size: 13px;
        }
        .categorie-card .cat-rendu,
        .categorie-card .cat-non-rendu {
            font-size: 13px;
            font-weight: 600;
        }
        .categorie-card .cat-rendu {
            color: #1f8a3f;
        }
        .categorie-card .cat-non-rendu {
            color: #c9902f;
        }
        .categorie-card .cat-rendu i,
        .categorie-card .cat-non-rendu i {
            margin-right: 5px;
        }

        /* Stats cards */
        .stats-row {
            margin-bottom: 20px;
        }
        .stat-card {
            background: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 18px 16px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 14px;
            box-shadow: 0 1px 3px rgba(0,0,0,.06);
        }
        .stat-card .stat-icon {
            width: 46px;
            height: 46px;
            flex: 0 0 auto;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: #fff;
        }
        .stat-card .stat-body .stat-value {
            font-size: 22px;
            font-weight: 700;
            color: #263238;
            line-height: 1.1;
        }
        .stat-card .stat-body .stat-label {
            font-size: 12px;
            color: #78909c;
            font-weight: 600;
            letter-spacing: .2px;
        }
        .stat-card.stat-categories .stat-icon { background: #12151a; }
        .stat-card.stat-objects .stat-icon { background: #2196F3; }
        .stat-card.stat-rendus .stat-icon { background: #1f8a3f; }
        .stat-card.stat-non-rendus .stat-icon { background: #10b981; }

        #editObjectBox {
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            margin-bottom: 20px;
            padding: 0;
            background: #fff;
            overflow: hidden;
        }
        #editObjectBox::before {
            content: "Restituer l'objet";
            display: block;
            background: #12151a;
            color: #fff;
            font-weight: 700;
            font-size: 15px;
            letter-spacing: .2px;
            padding: 14px 20px;
        }
        #editObjectForm {
            padding: 20px;
        }
        #editObjectForm .form-group label {
            color: #12151a;
            font-weight: 600;
            font-size: 13px;
            letter-spacing: .2px;
            margin-bottom: 6px;
            display: block;
        }
        #editObjectForm .form-control {
            height: 40px;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            background-color: #f8fafc;
            padding: 0 14px;
            font-size: 14px;
            transition: all .2s ease;
        }
        #editObjectForm textarea.form-control {
            height: auto;
            padding: 10px 14px;
        }
        #editObjectForm .form-control:focus {
            border-color: #12151a;
            background-color: #fff;
            box-shadow: 0 0 0 4px rgba(57, 84, 104, 0.12);
            outline: none;
        }
        #editObjectForm select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%2394a3b8' stroke-width='2'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 14px center;
            background-size: 14px;
            cursor: pointer;
        }
        #editObjectForm .field-error-msg {
            display: block;
            color: #e74c3c;
            font-size: 12px;
            margin-top: 4px;
        }
        #editObjectForm .field-invalid {
            border-color: #e74c3c !important;
            box-shadow: 0 0 0 1px rgba(231, 76, 60, .25) !important;
        }

        /* Photo picker */
        #editObjectForm .input-group {
            display: flex;
            width: 100%;
            align-items: stretch;
        }
        #editObjectForm .input-group-btn {
            flex: 0 0 auto !important;
            width: auto !important;
            display: flex !important;
        }
        #editObjectForm .input-group-btn .btn {
            height: 40px;
            width: auto;
            border-radius: 10px 0 0 10px;
            background-color: #10b981;
            color: #fff;
            border: none;
            font-weight: 600;
            font-size: 13px;
            padding: 0 18px;
            display: flex;
            align-items: center;
            white-space: nowrap;
            justify-content: center;
            margin: 0;
            transition: background-color .2s ease;
        }
        #editObjectForm .input-group-btn .btn:hover {
            background-color: #b38f1f;
        }
        #editObjectForm #edit_photo_text {
            flex: 1;
            min-width: 0;
            height: 40px;
            border-radius: 0 10px 10px 0;
            border: 1.5px solid #e2e8f0;
            border-left: none;
            background-color: #f8fafc;
            font-size: 13px;
            color: #94a3b8;
        }

        /* Boutons */
        #editObjectSave {
            height: 44px;
            border-radius: 12px;
            background-color: #27ae60;
            border-color: #27ae60;
            font-weight: 700;
            font-size: 14px;
            letter-spacing: .3px;
            padding: 0 26px;
            transition: all .2s ease;
            box-shadow: 0 3px 8px rgba(39, 174, 96, 0.3);
        }
        #editObjectSave:hover {
            background-color: #219150;
            border-color: #219150;
            box-shadow: 0 4px 12px rgba(39, 174, 96, 0.4);
            transform: translateY(-1px);
        }
        #cancelEditBtn {
            height: 44px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 14px;
            letter-spacing: .3px;
            padding: 0 26px;
            border: 1.5px solid #e2e8f0;
            background-color: #f8fafc;
            color: #37474f;
            transition: all .2s ease;
            margin-left: 8px;
        }
        #cancelEditBtn:hover {
            background-color: #eef2f5;
            border-color: #cbd5e1;
        }

        @media (max-width: 767px) {
            #editObjectForm .form-control {
                font-size: 16px;
            }
            #editObjectForm .input-group {
                flex-direction: column;
            }
            #editObjectForm .input-group-btn .btn {
                border-radius: 10px 10px 0 0;
                width: 100%;
                justify-content: center;
            }
            #editObjectForm #edit_photo_text {
                border-radius: 0 0 10px 10px;
                border-left: 1.5px solid #e2e8f0;
                border-top: none;
            }
            #editObjectSave, #cancelEditBtn {
                display: block;
                width: 100%;
                margin-left: 0;
                margin-top: 10px;
                text-align: center;
            }
        }
    </style>

    <script>
    $(document).ready(function(){
        loadCategories();
        loadStats();

        var categorieIcons = {
            'Téléphone': 'fa-mobile-alt',
            'Ordinateur': 'fa-laptop',
            'Sac': 'fa-shopping-bag',
            'Clés': 'fa-key',
            'Vêtement': 'fa-tshirt',
            'Autre': 'fa-box'
        };
        function getCategorieIcon(categorie) {
            return categorieIcons[categorie] || 'fa-box';
        }

        function loadStats() {
            $.ajax({
                type: "GET",
                url: "code_categorie.php",
                dataType: "json",
                success: function(response){
                    var totalCategories = response.length;
                    var totalObjects = 0, totalRendus = 0, totalNonRendus = 0;
                    $.each(response, function(key, value){
                        totalObjects += parseInt(value.nb, 10) || 0;
                        totalRendus += parseInt(value.rendu, 10) || 0;
                        totalNonRendus += parseInt(value.non_rendu, 10) || 0;
                    });
                    $('#statTotalCategories').text(totalCategories);
                    $('#statTotalObjects').text(totalObjects);
                    $('#statTotalRendus').text(totalRendus);
                    $('#statTotalNonRendus').text(totalNonRendus);
                },
                error: function(xhr){
                    console.log(xhr.responseText);
                }
            });
        }

        $(document).on('click', '#appMenuBtn', function(e){
            e.preventDefault();
            $('#appSidebar').toggleClass('mobile-open');
            $('#appOverlay').toggleClass('mobile-open');
        });

        $(document).on('click', '#appOverlay', function(){
            $('#appSidebar').removeClass('mobile-open');
            $('#appOverlay').removeClass('mobile-open');
        });

        function loadCategories(searchVal = "") {
            $.ajax({
                type: "GET",
                url: "code_categorie.php",
                data: { search: searchVal },
                dataType: "json",
                success: function(response){
                    $('#categoriesGrid').html("");
                    if(response.length === 0) {
                        $('#categoriesGrid').append('<div class="col-xs-12 text-center">Aucune catégorie trouvée</div>');
                        return;
                    }
                    $.each(response, function(key, value){
                        var icon = getCategorieIcon(value.categorie);
                        var nb = parseInt(value.nb, 10) || 0;
                        var rendu = parseInt(value.rendu, 10) || 0;
                        var nonRendu = parseInt(value.non_rendu, 10) || 0;
                        var objetLabel = nb > 1 ? 'objets' : 'objet';
                        var renduLabel = rendu > 1 ? 'rendus' : 'rendu';
                        var nonRenduLabel = nonRendu > 1 ? 'non rendus' : 'non rendu';
                        $('#categoriesGrid').append(
                            '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">\
                                <div class="categorie-card" data-categorie="'+value.categorie+'">\
                                    <div class="cat-header">\
                                        <div class="cat-icon"><i class="fas '+icon+'"></i></div>\
                                        <h4>'+value.categorie+'</h4>\
                                    </div>\
                                    <div class="cat-stats">\
                                        <span class="cat-total-line">'+nb+' '+objetLabel+'</span>\
                                        <span class="cat-rendu"><i class="fas fa-check-circle"></i>'+rendu+' '+renduLabel+'</span>\
                                        <span class="cat-non-rendu"><i class="fas fa-exclamation-circle"></i>'+nonRendu+' '+nonRenduLabel+'</span>\
                                    </div>\
                                </div>\
                            </div>'
                        );
                    });
                },
                error: function(xhr){
                    console.log(xhr.responseText);
                }
            });
        }

        $("#search").keyup(function(){
            loadCategories($(this).val());
        });

        function loadObjectsByCategorie(categorie) {
            $.ajax({
                type: "GET",
                url: "objects_by_categorie.php",
                data: { categorie: categorie },
                dataType: "json",
                success: function(response){
                    $('.objectsByCategorieData').html("");
                    if(response.length === 0) {
                        $('.objectsByCategorieData').append('<tr><td colspan="8" class="text-center">Aucun objet dans cette catégorie</td></tr>');
                        return;
                    }
                    $.each(response, function(key, value){
                        var imgTag = value.photo ? '<img src="../../shared/images/'+value.photo+'" class="img-thumbnail">' : 'Pas d\'image';
                        var statusBadge = '';
                        if(value.status === 'rendu') {
                            statusBadge = '<span class="label label-success">Rendu</span>';
                        } else {
                            statusBadge = '<span class="label label-warning">Trouvé</span>';
                        }
                        var dateRendementAffiche = value.date_rendement;
                        if(!dateRendementAffiche || dateRendementAffiche === "0000-00-00" || dateRendementAffiche === "null") {
                        dateRendementAffiche = "";
                         }
                        var renduBtnHtml = (value.status !== 'rendu')
                            ? '<button class="btn btn-xs btn-success rendubtn-cat" value="'+value.id+'" data-date-trouve="'+value.date+'"><span class="glyphicon glyphicon-ok"></span> Restituer</button>'
                            : '';

                        $('.objectsByCategorieData').append(
                            '<tr>\
                            <td>'+value.name+'</td>\
                            <td>'+value.description+'</td>\
                            <td>'+value.chambre+'</td>\
                            <td>'+value.date+'</td>\
                            <td>'+dateRendementAffiche+'</td>\
                            <td>'+imgTag+'</td>\
                            <td>'+statusBadge+'</td>\
                            <td>\
                            <div class="liens">\
                                '+renduBtnHtml+'\
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

        var currentCategorieView = null;

        $(document).on("click", ".categorie-card", function(){
            $(".categorie-card").removeClass("active-categorie");
            $(this).addClass("active-categorie");

            var categorie = $(this).data("categorie");
            currentCategorieView = categorie;
            $("#objectsPanelTitle").text("Objets - " + categorie);
            $("#objectsPanel").slideDown();

            loadObjectsByCategorie(categorie);

            $('html, body').animate({ scrollTop: $("#objectsPanel").offset().top - 60 }, 300);
        });

        $("#closeObjectsPanel").click(function(){
            $("#objectsPanel").slideUp();
            $(".categorie-card").removeClass("active-categorie");
            currentCategorieView = null;
        });

        function resetEditObjectFormErrors(){
            $("#edit_date_rendement_error").text("");
            $("#edit_date_rendement").css("border-color", "");
        }

        var renduCatObjectData = null;

        $(document).on("click", ".rendubtn-cat", function(e){
            e.preventDefault();
            var id = $(this).val();
            var dateTrouve = $(this).data("date-trouve");

            $.ajax({
                type: "POST",
                url: "control.php",
                data: { edit_id: id },
                dataType: "json",
                success: function(response){
                    renduCatObjectData = response;
                    resetEditObjectFormErrors();

                    $("#edit_object_id").val(response.id);

                    var today = new Date().toISOString().slice(0, 10);
                    $("#edit_date_rendement").val(today);
                    $("#edit_date_rendement").attr("min", dateTrouve || response.date);
                    $("#edit_date_rendement").attr("max", today);

                    $("#editObjectBox").slideDown();
                    $('html, body').animate({ scrollTop: $("#editObjectBox").offset().top - 80 }, 300);
                }
            });
        });

        $("#cancelEditBtn").click(function(){
            $("#editObjectForm")[0].reset();
            $("#edit_object_id").val("");
            resetEditObjectFormErrors();
            renduCatObjectData = null;
            $("#editObjectBox").slideUp();
        });

        $("#editObjectForm").submit(function(e){
            e.preventDefault();

            if(!renduCatObjectData){
                return;
            }

            var chosenDate = $("#edit_date_rendement").val();
            var dateTrouve = renduCatObjectData.date;
            var todayStr = new Date().toISOString().slice(0, 10);

            resetEditObjectFormErrors();

            if(!chosenDate){
                $("#edit_date_rendement_error").text("La date de restitution est obligatoire.");
                $("#edit_date_rendement").css("border-color", "#e74c3c");
                return;
            }
            if(chosenDate < dateTrouve){
                $("#edit_date_rendement_error").text("La date de restitution doit être supérieure ou égale à la date de trouvé.");
                $("#edit_date_rendement").css("border-color", "#e74c3c");
                return;
            }
            if(chosenDate > todayStr){
                $("#edit_date_rendement_error").text("La date de restitution ne peut pas être dans le futur.");
                $("#edit_date_rendement").css("border-color", "#e74c3c");
                return;
            }

            var formData = new FormData();
            formData.append("object_id", renduCatObjectData.id);
            formData.append("name", renduCatObjectData.name);
            formData.append("categorie", renduCatObjectData.categorie);
            formData.append("description", renduCatObjectData.description);
            formData.append("chambre", renduCatObjectData.chambre);
            formData.append("date_trouve", renduCatObjectData.date);
            formData.append("date_rendement", chosenDate);
            formData.append("statut", "rendu");

            $.ajax({
                url: "control.php",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response){
                    if (response && typeof response === 'object' && response.success === false){
                        $("#edit_date_rendement_error").text(
                            (response.errors && response.errors.date_rendement) ? response.errors.date_rendement : "Erreur de validation."
                        );
                        return;
                    }
                    $("#editObjectForm")[0].reset();
                    $("#edit_object_id").val("");
                    renduCatObjectData = null;
                    $("#editObjectBox").slideUp();
                    loadCategories($("#search").val());
                    loadStats();
                    if(currentCategorieView){
                        loadObjectsByCategorie(currentCategorieView);
                    }
                },
                error: function(xhr){
                    var data = null;
                    try { data = JSON.parse(xhr.responseText); } catch(ex) {}
                    if (data && data.errors && data.errors.date_rendement){
                        $("#edit_date_rendement_error").text(data.errors.date_rendement);
                    } else {
                        alert("Une erreur est survenue lors de la restitution.");
                    }
                }
            });
        });

//view image
        var scale = 1, minScale = 1, maxScale = 5;
        var posX = 0, posY = 0;
        var startX = 0, startY = 0;
        var isDragging = false;
        var pinchStartDist = 0, pinchStartScale = 1;
        var $bigImage = $("#bigImage");
        var $modalInner = $(".modal-inner");
        var hintTimeout;

        function applyTransform(withTransition){
            $bigImage.css('transition', withTransition ? 'transform .15s ease-out' : 'none');
            $bigImage.css('transform', 'translate('+posX+'px,'+posY+'px) scale('+scale+')');
        }

        function resetTransform(){
            scale = 1; posX = 0; posY = 0;
            applyTransform(true);
        }

        function clampScale(s){
            return Math.min(maxScale, Math.max(minScale, s));
        }

        $(document).on("click", ".objectsByCategorieData img", function(){
            var src = $(this).attr("src");
            $bigImage.removeClass('loaded');
            $("#imgLoader").show();
            resetTransform();
            $("#imageModal").css("display", "flex");

            var tempImg = new Image();
            tempImg.onload = function(){
                $bigImage.attr("src", src);
                $("#imgLoader").hide();
                $bigImage.addClass('loaded');
            };
            tempImg.src = src;

            clearTimeout(hintTimeout);
            $("#imgHint").css('opacity', 1);
            hintTimeout = setTimeout(function(){
                $("#imgHint").css('opacity', 0);
            }, 2500);
        });

        $("#imageModal").on("wheel", function(e){
            e.preventDefault();
            var delta = e.originalEvent.deltaY < 0 ? 0.15 : -0.15;
            scale = clampScale(scale + delta);
            if(scale === minScale){ posX = 0; posY = 0; }
            applyTransform(true);
        });

        $bigImage.on("mousedown", function(e){
            if(scale <= minScale) return;
            isDragging = true;
            $bigImage.addClass('dragging');
            startX = e.clientX - posX;
            startY = e.clientY - posY;
        });

        $(document).on("mousemove", function(e){
            if(!isDragging) return;
            posX = e.clientX - startX;
            posY = e.clientY - startY;
            applyTransform(false);
        });

        $(document).on("mouseup", function(){
            isDragging = false;
            $bigImage.removeClass('dragging');
        });

        var touchStartY = 0;
        var singleTouchStartX = 0, singleTouchStartY = 0;
        var swipeClosing = false;

        $modalInner.on("touchstart", function(e){
            var touches = e.originalEvent.touches;
            if(touches.length === 2){
                pinchStartDist = getDist(touches);
                pinchStartScale = scale;
            } else if(touches.length === 1){
                singleTouchStartX = touches[0].clientX - posX;
                singleTouchStartY = touches[0].clientY - posY;
                touchStartY = touches[0].clientY;
                swipeClosing = (scale === minScale);
            }
        });

        $modalInner.on("touchmove", function(e){
            var touches = e.originalEvent.touches;
            e.preventDefault();

            if(touches.length === 2){
                var newDist = getDist(touches);
                scale = clampScale(pinchStartScale * (newDist / pinchStartDist));
                applyTransform(false);
                swipeClosing = false;
            } else if(touches.length === 1){
                if(swipeClosing){
                    var dy = touches[0].clientY - touchStartY;
                    if(dy > 0){
                        $("#imageModal").css('opacity', Math.max(0.3, 1 - dy/300));
                        posY = dy;
                        applyTransform(false);
                    }
                } else if(scale > minScale){
                    posX = touches[0].clientX - singleTouchStartX;
                    posY = touches[0].clientY - singleTouchStartY;
                    applyTransform(false);
                }
            }
        });

        $modalInner.on("touchend", function(){
            if(swipeClosing && posY > 100){
                $("#imageModal").hide().css('opacity', 1);
                resetTransform();
            } else if(swipeClosing){
                posY = 0;
                $("#imageModal").css('opacity', 1);
                applyTransform(true);
            }
            if(scale === minScale){
                posX = 0; posY = 0;
                applyTransform(true);
            }
        });

        function getDist(touches){
            var dx = touches[0].clientX - touches[1].clientX;
            var dy = touches[0].clientY - touches[1].clientY;
            return Math.sqrt(dx*dx + dy*dy);
        }

        $("#zoomInBtn").on("click", function(){
            scale = clampScale(scale + 0.5);
            applyTransform(true);
        });

        $("#zoomOutBtn").on("click", function(){
            scale = clampScale(scale - 0.5);
            if(scale === minScale){ posX = 0; posY = 0; }
            applyTransform(true);
        });

        $("#zoomResetBtn").on("click", function(){
            resetTransform();
        });

        var lastTap = 0;
        $bigImage.on("dblclick", function(){
            scale = (scale > minScale) ? minScale : 2.5;
            if(scale === minScale){ posX = 0; posY = 0; }
            applyTransform(true);
        });

        $bigImage.on("touchend", function(e){
            var now = Date.now();
            if(now - lastTap < 300){
                scale = (scale > minScale) ? minScale : 2.5;
                if(scale === minScale){ posX = 0; posY = 0; }
                applyTransform(true);
            }
            lastTap = now;
        });

        $("#closeImage").on("click", function(){
            $("#imageModal").hide();
            resetTransform();
        });

        $("#imageModal").on("click", function(e){
            if(e.target.id === "imageModal"){
                $("#imageModal").hide();
                resetTransform();
            }
        });

        $(document).on("keydown", function(e){
            if(e.key === "Escape" && $("#imageModal").is(":visible")){
                $("#imageModal").hide();
                resetTransform();
            }
        });
    });
    </script>
</body>
</html>