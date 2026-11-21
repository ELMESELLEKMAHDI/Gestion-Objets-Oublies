<?php
define('AUTH_LOGIN_PATH', '../login.php');
require_once __DIR__ . '/../../includes/auth_check.php';

$registerSuccess = $_SESSION['register_success'] ?? '';
unset($_SESSION['register_success']);
$currentUserRole = $_SESSION['role'] ?? '';
?>


<!DOCTYPE html>
<html lang="en">
<head>        
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    
    <title>les objet oblies</title>
    
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
    
    .search-container input{
    border-radius: 6px;
    height: 40px;
    border: solid black;
    }
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
        top:0;
        left:0;
        width:100%;
        height:100%;
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
        width:100%;
        height:100%;
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

    #bigImage.loaded{
        opacity:1;
    }

    #bigImage.dragging{
        cursor:grabbing;
        transition:none;
    }

    #imgLoader{
        position:absolute;
        width:42px;
        height:42px;
        border:3px solid rgba(255,255,255,.15);
        border-top-color:#fff;
        border-radius:50%;
        animation:spinLoader .8s linear infinite;
        display:none;
    }

    @keyframes spinLoader{
        to { transform:rotate(360deg); }
    }

    #closeImage{
        position:absolute;
        top:16px;
        right:20px;
        color:white;
        font-size:30px;
        font-weight:400;
        line-height:1;
        cursor:pointer;
        z-index:100000;
        width:44px;
        height:44px;
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
        width:42px;
        height:42px;
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

    #zoomControls button:hover{
        background:rgba(255,255,255,.25);
    }

    #zoomControls button:active{
        transform:scale(0.92);
    }

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

    @media (max-width: 767px){
        #bigImage{
            max-width:96%;
            max-height:80%;
        }
        #closeImage{
            top:10px;
            right:10px;
            font-size:26px;
            width:40px;
            height:40px;
        }
        #zoomControls{
            bottom:16px;
            padding:6px;
        }
        #zoomControls button{
            width:38px;
            height:38px;
            font-size:16px;
        }
        #imgHint{
            font-size:11px;
        }
    }
    /* END IMAGE VIEWER */

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
    .search-container {
        display: inline-block;
        margin-right: 10px;
    }
    #appTopbarTitle { color:#fff; 
        font-size:16px; 
        font-weight:600; 
        letter-spacing:.3px;
     }
    
    td{
        background-color: white;
    }
   
  
    @media (max-width: 767px) {
        .form-group {
            margin-bottom: 15px;
        }
    }

    @media (max-width: 767px) {

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

        #statusFilter {
            display: block !important;
            width: 100% !important;
            margin-right: 0 !important;
            margin-bottom: 8px;
        }
        
        .panel-heading .form-inline .form-control {
            width: 100% !important; 
        }
        
        #openAddBtn, .close-btn {
            width: 100% !important;
            display: block;
        }
    }
    /*Table style*/
.table {
    
    border-collapse: separate;
    border-spacing: 0;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 1px 3px rgba(0,0,0,.08);
}

.table thead th {
    background-color: #3c577a;
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

.label-success {
    background-color: #1f8a3f;
    color: #ffffff;
}

.label-warning {
    background-color: #c9902f;
    color: #fdf6e8;
    border: 1px solid #eeddb3;
}

.liens .btn {
    border-radius: 4px;
    font-size: 12px;
    padding: 5px 10px;
    font-weight: 500;
    transition: transform .1s ease;
}

.liens .btn:hover {
    transform: translateY(-1px);
}

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

@media (max-width: 767px) {
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

#tiltelist.head.dark {
    background: #12151a !important;
    background-image: none !important;
    display: flex;
    align-items: center;
    padding: 14px 20px;
    border-radius: 8px 8px 0 0;
}

#tiltelist .icon {
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

#tiltelist .icon .icos-archive2 {
    color: #12151a;
    font-size: 15px;
}

#tiltelist h2 {
    color: #ffffff !important;
    text-shadow: none !important;
    font-size: 15px;
    font-weight: 700;
    padding: 0;
    margin: 0;
    flex: 1;
}

#tiltelist .head-dots {
    color: #10b981;
    font-size: 20px;
    font-weight: 700;
    letter-spacing: 1px;
    cursor: pointer;
    line-height: 1;
    padding: 4px 6px;
}

 .success-message {
    background: #f0fdf4;
    color: #166534;
    border: 1px solid #86efac;
    padding: 14px;
    border-radius: 10px;
    margin: 15px;
    text-align: center;
    font-weight: 500;
    font-size: 14px;
}

.panel.panel-default {
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 1px 3px rgba(0,0,0,.06);
}

.panel-heading {
    background: #ffffff;
    border-bottom: none;
    padding: 14px 20px !important;
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 10px;
}

.panel-heading .pull-right-mobile.pull-right {
    display: flex;
    align-items: center;
    gap: 10px;
    float: none;
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
    width: 16px;
    height: 16px;
    background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%2394a3b8' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3ccircle cx='11' cy='11' r='8'%3e%3c/circle%3e%3cline x1='21' y1='21' x2='16.65' y2='16.65'%3e%3c/line%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-size: contain;
    z-index: 1;
    pointer-events: none;
}

#statusFilter {
    display: inline-block;
    height: 42px;
    width: 170px;
    border: 1.5px solid #e2e8f0;
    border-radius: 21px;
    background-color: #f8fafc;
    padding: 0 14px;
    font-size: 14px;
    color: #37474f;
    margin-right: 12px;
    vertical-align: middle;
    transition: all .25s ease;
}

#statusFilter:focus {
    border-color: #12151a;
    background-color: #fff;
    box-shadow: 0 0 0 4px rgba(57, 84, 104, 0.12);
    outline: none;
}

#openSearchBtn {
    height: 42px;
    border-radius: 21px;
    padding: 0 22px;
    font-weight: 600;
    font-size: 14px;
    letter-spacing: .3px;
    margin-right: 10px;
    border: 1.5px solid #dde3ea;
    background-color: #201f1f;
    color: #ffffff;
    position: relative;
}



#searchActiveBadge {
    background-color: #10b981;
    margin-left: 6px;
}

.BOX-search {
    background-color: #f8fafc;
    border-top: 1px solid #eceff1;
    border-bottom: 1px solid #eceff1;
}

.BOX-search .form-group label {
    color: #12151a;
    font-weight: 600;
    font-size: 13px;
    letter-spacing: .2px;
    margin-bottom: 6px;
    display: block;
}

.BOX-search .form-control {
    height: 40px;
    border: 1.5px solid #e2e8f0;
    border-radius: 10px;
    background-color: #fff;
    padding: 0 14px;
    font-size: 14px;
}

#applySearchBtn {
    background-color: #163f1f;
    border-color: #12151a;
    color: #fff;
    height: 42px;
    border-radius: 21px;
    padding: 0 26px;
    font-weight: 600;
    font-size: 14px;
    letter-spacing: .3px;
    margin-top: 10px;
    transition: all .2s ease;
    box-shadow: 0 3px 8px rgba(57, 84, 104, 0.25);
}
#applySearchBtn:hover {
    background-color: #45c750;
    border-color: #10b981;
    color: #fff;
    box-shadow: 0 4px 12px rgba(16,185,129, 0.35);
    transform: translateY(-1px);
}

#resetSearchBtn {
    height: 42px;
    border-radius: 21px;
    padding: 0 26px;
    font-weight: 600;
    font-size: 14px;
    letter-spacing: .3px;
    margin-top: 10px;
    margin-left: 8px;
    border: 1.5px solid #e2e8f0;
    background-color:white ;
    border: solid #111;
    color: #2e2d2e;
    transition: all .2s ease;
}


#closeSearchBtn {
    height: 42px;
    line-height: 42px;
    padding: 0 12px;
    background: red;
    border-radius: 15px;
    margin-top: 10px;
    font-weight: 600;
    font-size: 14px;
    letter-spacing: .3px;
    color: #ffff;
    text-decoration: none;
}
#closeSearchBtn:hover {
    text-decoration: none;
}

@media (max-width: 767px) {
    #applySearchBtn, #resetSearchBtn {
        display: block;
        width: 100%;
        margin-left: 0;
        margin-top: 10px;
        border-radius: 10px;
        text-align: center;
    }
    #closeSearchBtn {
        display: block;
        width: 100%;
        text-align: center;
        float: none !important;
    }
}

@media (max-width: 767px) {
    #openSearchBtn {
        border-radius: 10px;
        width: 100%;
        margin-right: 0;
        margin-bottom: 8px;
    }
}

#openAddBtn {
    background-color: #10b981;
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
    color: black;
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
    .panel-heading {
        display: flex;
        flex-direction: column;
        align-items: stretch;
    }
    .search-container input {
        width: 100%;
    }
    #openAddBtn, .close-btn {
        border-radius: 10px;
    }
}

/*  Style  form */
#objectForm .form-group label {
    color: #12151a;
    font-weight: 600;
    font-size: 13px;
    letter-spacing: .2px;
    margin-bottom: 6px;
    display: block;
}

#objectForm .form-control {
    height: 40px;
    border: 1.5px solid #e2e8f0;
    border-radius: 10px;
    background-color: #f8fafc;
    padding: 0 14px;
    font-size: 14px;
    color: #37474f;
    transition: all .25s ease;
    box-shadow: none;
}

#objectForm textarea.form-control {
    height: auto;
    padding: 10px 14px;
    border-radius: 10px;
    resize: vertical;
}

#objectForm .form-control:focus {
    border-color: #12151a;
    background-color: #fff;
    box-shadow: 0 0 0 4px rgba(57, 84, 104, 0.12);
    outline: none;
}

#objectForm select.form-control {
    appearance: none;
    background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%2394a3b8' stroke-width='2'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 14px center;
    background-size: 14px;
    cursor: pointer;
}

#objectForm .input-group {
    display: flex;
    width: 90%;
    align-items: stretch;
}

#objectForm .input-group-btn {
    flex: 0 0 auto !important;
    width: auto !important;
    display: flex !important;
}

#objectForm .input-group-btn .btn {
    height: 30px;
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
}

#objectForm .input-group-btn .btn:hover {
    background-color: #b38f1f;
}

#objectForm #photo_text {
    flex: 1;
    min-width: 0;
    height: 30px;
    border-radius: 0 10px 10px 0;
    border: 1.5px solid #e2e8f0;
    border-left: none;
    background-color: #f8fafc;
    font-size: 13px;
    color: #94a3b8;
}

/* Bouton Enregistrer */
#objectForm #save {
    height: 46px;
    border-radius: 12px;
    background-color: #27ae60;
    border: none;
    font-weight: 700;
    font-size: 15px;
    letter-spacing: .3px;
    margin-top: 10px;
    transition: all .2s ease;
    box-shadow: 0 3px 8px rgba(39, 174, 96, 0.3);
}

#objectForm #save:hover {
    background-color: #219150;
    box-shadow: 0 4px 12px rgba(39, 174, 96, 0.4);
    transform: translateY(-1px);
}

/* Panel body containing the form */
.panel-body.BOX-form, .panel-body.BOX-rendu {
    background-color: #fff;
    padding: 0 !important;
    border-top: 1px solid #eceff1;
}
.panel-body.BOX-form {
    padding: 24px 20px !important;
}

/* Carte "Restituer" / "Supprimer" */
.confirm-card {
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 18px rgba(0,0,0,.12);
    border: 1px solid #eceff1;
}
.confirm-card-header {
    background: #12151a;
    color: #fff;
    padding: 16px 20px;
    font-size: 16px;
    font-weight: 700;
}
.confirm-card-header.danger {
    background: #7a1f1f;
}
.confirm-card-body {
    padding: 22px 20px;
}
.confirm-card-actions {
    display: flex;
    gap: 12px;
    margin-top: 18px;
}
.confirm-card-actions .btn {
    flex: 1;
    height: 46px;
    border-radius: 12px;
    font-weight: 700;
    font-size: 14px;
    letter-spacing: .3px;
    transition: all .2s ease;
}
.confirm-card-actions .btn-success {
    background-color: #27ae60;
    border: none;
    box-shadow: 0 0 0 4px rgba(39, 174, 96, 0.18);
}
.confirm-card-actions .btn-success:hover {
    background-color: #219150;
    box-shadow: 0 0 0 5px rgba(39, 174, 96, 0.28);
}
.confirm-card-actions .btn-danger {
    background-color: #c0392b;
    border: none;
    box-shadow: 0 0 0 4px rgba(192, 57, 43, 0.18);
}
.confirm-card-actions .btn-danger:hover {
    background-color: #a93226;
    box-shadow: 0 0 0 5px rgba(192, 57, 43, 0.28);
}
.confirm-card-actions .btn-default {
    background-color: #f1f3f5;
    border: 1px solid #e2e8f0;
    color: #475569;
}
.confirm-card-actions .btn-default:hover {
    background-color: #e9ecef;
}

/* Validation des dates : bordure rouge + message d'erreur */
.field-invalid {
    border-color: #e74c3c !important;
    box-shadow: 0 0 0 1px rgba(231, 76, 60, .25) !important;
}
.field-error-msg {
    display: block;
    color: #e74c3c;
    font-size: 12px;
    margin-top: 4px;
    line-height: 1.3;
}

@media (max-width: 767px) {
    #objectForm .form-group {
        margin-bottom: 14px;
    }
    #objectForm .input-group {
        flex-direction: column;
    }
    #objectForm .input-group-btn .btn {
        border-radius: 10px 10px 0 0;
        width: 100%;
        justify-content: center;
    }
    #objectForm #photo_text {
        border-radius: 0 0 10px 10px;
        border-left: 1.5px solid #e2e8f0;
        border-top: none;
    }
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
.stat-card.stat-objects .stat-icon { background: #2196F3; }
.stat-card.stat-rendus .stat-icon { background: #1f8a3f; }
.stat-card.stat-non-rendus .stat-icon { background: #10b981; }

</style>

<body>    

<?php
$pageTitle  = 'Gestion des objet oblies';
$activePage = 'index';
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/sidebar.php';
?>

    <div class="content">

    <?php if (!empty($registerSuccess)): ?>
            <div class="success-message"><?= htmlspecialchars($registerSuccess) ?></div>
    <?php endif; ?>
        <div class="workplace">
            <div class="row">
                <div class="col-md-12">

                    <div class="row stats-row" id="statsCardsRow">
                        <div class="col-xs-6 col-sm-4">
                            <div class="stat-card stat-objects">
                                <div class="stat-icon"><i class="fas fa-box-open"></i></div>
                                <div class="stat-body">
                                    <div class="stat-value" id="statTotalObjects">0</div>
                                    <div class="stat-label">Objets au total</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-4">
                            <div class="stat-card stat-rendus">
                                <div class="stat-icon"><i class="fas fa-check-circle"></i></div>
                                <div class="stat-body">
                                    <div class="stat-value" id="statTotalRendus">0</div>
                                    <div class="stat-label">Objets rendus</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-4">
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
                                    <div class="pull-right-mobile pull-right">
                                        <button type="button" class="btn btn-default" id="openSearchBtn">
                                            <span class="glyphicon glyphicon-search"></span> Rechercher
                                            <span class="badge" id="searchActiveBadge" style="display:none;">1</span>
                                        </button>
                                        <button class="btn btn-primary" id="openAddBtn"><span class="glyphicon glyphicon-plus"></span> Ajouter</button>
                                        <button class="btn btn-danger close-btn" style="display:none;">Fermer</button>
                                    </div>
                                </div>


                                <div class="panel-body BOX-search" style="display: none;">
                                    <form id="searchForm">
                                        <div class="row">
                                            <div class="form-group col-xs-12 col-sm-6">
                                                <label for="s_name">Nom d'objet :</label>
                                                <input type="text" class="form-control" id="s_name" placeholder="Nom d'objet">
                                            </div>
                                            <div class="form-group col-xs-12 col-sm-6">
                                                <label for="s_categorie">Catégorie :</label>
                                                <select class="form-control" id="s_categorie">
                                                    <option value="">Toutes les catégories</option>
                                                    <option value="Téléphone">Téléphone</option>
                                                    <option value="Ordinateur">Ordinateur</option>
                                                    <option value="Sac">Sac</option>
                                                    <option value="Clés">Clés</option>
                                                    <option value="Vêtement">Vêtement</option>
                                                    <option value="Autre">Autre</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-xs-12">
                                                <label for="s_description">Description :</label>
                                                <input type="text" class="form-control" id="s_description" placeholder="Mot dans la description">
                                            </div>
                                            <div class="form-group col-xs-12 col-sm-3">
                                                <label for="s_chambre">Chambre :</label>
                                                <input type="number" class="form-control" id="s_chambre" placeholder="N° chambre">
                                            </div>
                                            <div class="form-group col-xs-12 col-sm-3">
                                                <label for="s_date_trouve">Date de trouvé :</label>
                                                <input type="date" class="form-control" id="s_date_trouve">
                                            </div>
                                            <div class="form-group col-xs-12 col-sm-3">
                                                <label for="s_date_rendement">Date de restitution :</label>
                                                <input type="date" class="form-control" id="s_date_rendement">
                                            </div>
                                            <div class="form-group col-xs-12 col-sm-3">
                                                <label for="s_statut">Statut :</label>
                                                <select class="form-control" id="s_statut">
                                                    <option value="">Tous les statuts</option>
                                                    <option value="trouve">Trouvé</option>
                                                    <option value="rendu">Rendu</option>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-success" id="applySearchBtn"><span class="glyphicon glyphicon-search"></span> Rechercher</button>
                                        <button type="button" class="btn btn-default" id="resetSearchBtn">Réinitialiser</button>
                                        <button type="button" class="btn btn-link pull-right" id="closeSearchBtn">Fermer</button>
                                    </form>
                                </div>

                                <div class="panel-body BOX-form" style="display: none;">
                                    <form id="objectForm" enctype="multipart/form-data">
                                        <input type="hidden" id="object_id" name="object_id">
                                        <div class="row">
                                            <div class="form-group col-xs-12 col-sm-6">
                                                <label for="name">Nom d'objet:</label>
                                                <input type="text" class="form-control" name="name" id="name" required>
                                            </div>
                                            <div class="form-group col-xs-12 col-sm-6">
                                                <label for="categorie">Catégorie :</label>
                                                <select class="form-control" name="categorie" id="categorie" required>
                                                    <option value="">Choisir une catégorie</option>
                                                    <option value="Téléphone">Téléphone</option>
                                                    <option value="Ordinateur">Ordinateur</option>
                                                    <option value="Sac">Sac</option>
                                                    <option value="Clés">Clés</option>
                                                    <option value="Vêtement">Vêtement</option>
                                                    <option value="Autre">Autre</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-xs-12">
                                                <label for="description">Description :</label>
                                                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                                            </div>
                                            <div class="form-group col-xs-12 col-sm-3">
                                                <label for="chambre">Chambre :</label>
                                                <input type="number" class="form-control" name="chambre" id="chambre" required>
                                            </div>
                                            <div class="form-group col-xs-12 col-sm-3">
                                                <label for="date_trouve">Date de trouvé :</label>
                                                <input type="date" class="form-control" name="date_trouve" id="date_trouve" required>
                                                <span class="field-error-msg" id="date_trouve_error"></span>
                                            </div>
                                            <div class="form-group col-xs-12 col-sm-3" id="date_rendement_group" style="display:none;">
                                                <label for="date_rendement">Date de restitution :</label>
                                                <input type="date" class="form-control" name="date_rendement" id="date_rendement">
                                                <span class="field-error-msg" id="date_rendement_error"></span>
                                            </div>
                                            <div class="form-group col-xs-12 col-sm-3" id="status_group" style="display:none;">
                                                <label for="status">Statut :</label>
                                                <select class="form-control" name="statut" id="status" required>
                                                    <option value="trouve">Trouvé</option>
                                                    <option value="rendu">Rendu</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-xs-12 col-sm-6">
                                                <label for="photo">Photo :</label>
                                                <div class="input-group">
                                                    <label class="input-group-btn">
                                                        <span class="btn btn-default">
                                                            Choisir... <input type="file" name="photo" id="photo" accept="image/*" style="display: none;">
                                                        </span>
                                                    </label>
                                                    <input type="text" id="photo_text" class="form-control" readonly placeholder="Aucun fichier">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-block" id="save">Enregistrer</button>
                                    </form>
                                </div>

                                <div class="panel-body BOX-rendu" style="display: none;">
                                    <div class="confirm-card">
                                        <div class="confirm-card-header">Restituer l'objet</div>
                                        <div class="confirm-card-body">
                                            <form id="renduForm">
                                                <input type="hidden" id="rendu_object_id">
                                                <div class="row">
                                                    <div class="form-group col-xs-12">
                                                        <label for="rendu_date_rendement">Date de restitution :</label>
                                                        <input type="date" class="form-control" id="rendu_date_rendement">
                                                        <span class="field-error-msg" id="rendu_date_rendement_error"></span>
                                                    </div>
                                                </div>
                                                <p class="text-muted">Le statut de l'objet sera automatiquement mis à jour vers <strong>Rendu</strong>.</p>
                                                <div class="confirm-card-actions">
                                                    <button type="submit" class="btn btn-success" id="confirmRenduBtn">Confirmer la restitution</button>
                                                    <button type="button" class="btn btn-default" id="cancelRenduBtn">Annuler</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>  
                        </div>
                        
                        <div class="toolbar-fluid"></div>
                    </div>

                    <div class="widget">
                        <div class="head dark" id="tiltelist">
                            <div class="icon"><span class="icos-archive2"></span></div>
                            <h2>Liste des objets</h2>
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
                                            <th>Date de restitution</th>
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

    <script>
    var activeFilters = {};

    $(document).ready(function(){
        getdata();
        loadObjectStats();

        function loadObjectStats() {
            $.ajax({
                type: "GET",
                url: "stats_objects.php",
                dataType: "json",
                success: function(response){
                    $('#statTotalObjects').text(response.total || 0);
                    $('#statTotalRendus').text(response.rendus || 0);
                    $('#statTotalNonRendus').text(response.non_rendus || 0);
                },
                error: function(xhr){
                    console.log(xhr.responseText);
                }
            });
        }

        /*  Validation des dates (trouvé / restitution) */
        var $dateTrouve = $("#date_trouve");
        var $dateRendement = $("#date_rendement");
        var $dateTrouveError = $("#date_trouve_error");
        var $dateRendementError = $("#date_rendement_error");

        function getTodayStr(){
            var d = new Date();
            var mm = String(d.getMonth() + 1).padStart(2, '0');
            var dd = String(d.getDate()).padStart(2, '0');
            return d.getFullYear() + '-' + mm + '-' + dd;
        }

        // Date maximale autorisée : aujourd'hui + 1 mois
function getMaxDateStr(){
    var d = new Date();
    return d.toISOString().split('T')[0];
}

function getMinDateStr(){
    var d = new Date();
    d.setMonth(d.getMonth()-1);
    return d.toISOString().split('T')[0];
}

        function showFieldError($field, $errorEl, message){
            $field.addClass('field-invalid');
            $errorEl.text(message);
        }

        function clearFieldError($field, $errorEl){
            $field.removeClass('field-invalid');
            $errorEl.text('');
        }

        // Convertit "YYYY-MM-DD" en timestamp comparable ; retourne null si le format n'est pas ISO
        function parseIsoDate(str){
            if (!/^\d{4}-\d{2}-\d{2}$/.test(str)) return null;
            var t = new Date(str + 'T00:00:00').getTime();
            return isNaN(t) ? null : t;
        }

        // Renvoie true si valide, false sinon (et affiche/efface le message correspondant)
        function validateDateTrouve(){

    var maxDate = getMaxDateStr();
    var minDate = getMinDateStr();

    var trouveVal = $dateTrouve.val();

    if(!trouveVal){

        showFieldError(
            $dateTrouve,
            $dateTrouveError,
            "La date de trouvé est obligatoire."
        );

        return false;
    }

    var trouveTs = parseIsoDate(trouveVal);
    var maxTs = parseIsoDate(maxDate);
    var minTs = parseIsoDate(minDate);

    if(trouveTs === null){

        showFieldError(
            $dateTrouve,
            $dateTrouveError,
            "La date de trouvé n'est pas valide."
        );

        return false;
    }

    if(trouveTs < minTs){

        showFieldError(
            $dateTrouve,
            $dateTrouveError,
            "La date de trouvé ne peut pas être antérieure à un mois."
        );

        return false;
    }

    if(trouveTs > maxTs){

        showFieldError(
            $dateTrouve,
            $dateTrouveError,
            "La date de trouvé ne peut pas être dans le futur."
        );

        return false;
    }

    clearFieldError($dateTrouve, $dateTrouveError);

    return true;
}

        function validateDateRendement(){
            var maxDate = getMaxDateStr();
            var trouveVal = $dateTrouve.val();
            var rendementVal = $dateRendement.val();

            // Le champ est facultatif
            if (!rendementVal){
                clearFieldError($dateRendement, $dateRendementError);
                return true;
            }
            var rendementTs = parseIsoDate(rendementVal);
            var maxTs = parseIsoDate(maxDate);
            if (rendementTs === null){
                showFieldError($dateRendement, $dateRendementError, "La date de restitution n'est pas valide.");
                return false;
            }
            if (trouveVal){
                var trouveTs = parseIsoDate(trouveVal);
                if (trouveTs !== null && rendementTs < trouveTs){
                    showFieldError($dateRendement, $dateRendementError, "La date de restitution doit être supérieure ou égale à la date de trouvé.");
                    return false;
                }
            }
            if (rendementTs > maxTs){
                showFieldError($dateRendement, $dateRendementError, "La date de restitution ne peut pas dépasser un mois à partir d'aujourd'hui.");
                return false;
            }
            clearFieldError($dateRendement, $dateRendementError);
            return true;
        }

function updateDateLimits(){

    var maxDate = getMaxDateStr();
    var minDate = getMinDateStr();

    $dateTrouve.attr("min", minDate);
    $dateTrouve.attr("max", maxDate);

    $dateRendement.attr("max", maxDate);

    if($dateTrouve.val() != ""){
        $dateRendement.attr("min", $dateTrouve.val());
    }else{
        $dateRendement.removeAttr("min");
    }
}

        updateDateLimits();

        // Revalidation immédiate, sans rechargement de page, dès que l'utilisateur modifie une date
        $dateTrouve.on('input change', function(){
            updateDateLimits();
            validateDateTrouve();
            // Si "date de restitution" avait une erreur liée à "date de trouvé", on la revérifie aussi
            if ($dateRendement.val()){
                validateDateRendement();
            }
        });

        $dateRendement.on('input change', function(){
            validateDateRendement();
        });

        /*  Fin validation des dates */

        $(document).on('click', '#appMenuBtn', function(e){
            e.preventDefault();
            $('#appSidebar').toggleClass('mobile-open');
            $('#appOverlay').toggleClass('mobile-open');
        });

        $(document).on('click', '#appOverlay', function(){
            $('#appSidebar').removeClass('mobile-open');
            $('#appOverlay').removeClass('mobile-open');
        });

        function getdata(filters) {
            filters = filters || activeFilters;
            $.ajax({
                type: "GET",
                url: "code.php",
                data: filters,
                dataType: "json",
                success: function(response){
                    $('.objectdata').html("");

                    if(response.length === 0) {
                        $('.objectdata').append('<tr><td colspan="9" class="text-center">Aucun objet trouvé</td></tr>');
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
                            ? '<button class="btn btn-xs btn-success rendubtn" value="'+value.id+'" data-date-trouve="'+value.date+'"><span class="glyphicon glyphicon-ok"></span> Restituer</button>'
                            : '';
                        var editBtnHtml = (value.status !== 'rendu')
                            ? '<button class="btn btn-xs btn-primary editbtn" value="'+value.id+'"><span class="glyphicon glyphicon-pencil"></span> Modifier</button>'
                            : '';
                        $('.objectdata').append(
                            '<tr>\
                            <td>'+value.name+'</td>\
                            <td>'+value.categorie+'</td>\
                            <td>'+value.description+'</td>\
                            <td>'+value.chambre+'</td>\
                            <td>'+value.date+'</td>\
                            <td>'+dateRendementAffiche+'</td>\
                            <td>'+imgTag+'</td>\
                            <td>'+statusBadge+'</td>\
                            <td>\
                            <div class="liens">\
                                '+editBtnHtml+'\
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

        $(document).on('change', '#photo', function() {
            var fileName = this.files[0] ? this.files[0].name : "";
            if(fileName !== "") {
                $("#photo_text").val(fileName);
            } else {
                $("#photo_text").val("");
            }
        });

        function resetObjectFormErrors(){
            clearFieldError($dateTrouve, $dateTrouveError);
            clearFieldError($dateRendement, $dateRendementError);
        }

        $("#openAddBtn").click(function(){
            // Le panneau "Ajouter" et le panneau "Recherche" ne doivent jamais être ouverts en même temps
            if ($(".BOX-search").is(":visible")){
                $(".BOX-search").slideUp();
            }
            if ($(".BOX-rendu").is(":visible")){
                $("#cancelRenduBtn").click();
            }
            $("#date_rendement").val("");
            $("#status").val("trouve");

            $(".BOX-form").slideDown();
            $(this).hide();
            $(".close-btn").show();
        });
        
        $(".close-btn").click(function(){
            $("#objectForm")[0].reset();
            $("#object_id").val("");
            $("#photo_text").val("");
            resetObjectFormErrors();
            $(".BOX-form").slideUp();
            $(".close-btn").hide();
            $("#openAddBtn").show();
        });

        $("#openSearchBtn").click(function(){
            // Le panneau "Ajouter" et le panneau "Recherche" ne doivent jamais être ouverts en même temps
            if ($(".BOX-form").is(":visible")){
                $(".close-btn").click();
            }
            if ($(".BOX-rendu").is(":visible")){
                $("#cancelRenduBtn").click();
            }
            $(".BOX-search").slideToggle();
        });

        $("#closeSearchBtn").click(function(){
            $(".BOX-search").slideUp();
        });

        $("#applySearchBtn").click(function(){
            activeFilters = {
                name: $("#s_name").val(),
                categorie: $("#s_categorie").val(),
                description: $("#s_description").val(),
                chambre: $("#s_chambre").val(),
                date_trouve: $("#s_date_trouve").val(),
                date_rendement: $("#s_date_rendement").val(),
                statut: $("#s_statut").val()
            };

            var hasFilter = Object.keys(activeFilters).some(function(k){
                return activeFilters[k] !== "" && activeFilters[k] !== null && typeof activeFilters[k] !== "undefined";
            });
            $("#searchActiveBadge").toggle(hasFilter);

            getdata(activeFilters);
            $(".BOX-search").slideUp();
        });

        $("#resetSearchBtn").click(function(){
            $("#searchForm")[0].reset();
            activeFilters = {};
            $("#searchActiveBadge").hide();
            getdata(activeFilters);
        });
        
var renduObjectData = null;
var currentUserRole = "<?= htmlspecialchars($currentUserRole, ENT_QUOTES) ?>";

$(document).on("click", ".editbtn", function(e){
    e.preventDefault();
    var id = $(this).val();

    $.ajax({
        type: "POST",
        url: "control.php",
        data: { edit_id: id },
        dataType: "json",
        success: function(response){
            $("#object_id").val(response.id);
            $("#name").val(response.name);
            $("#categorie").val(response.categorie);
            $("#description").val(response.description);
            $("#chambre").val(response.chambre);
            $("#date_trouve").val(response.date);
            $("#date_rendement").val("");
            $("#status").val("trouve");
            if(response.photo){
                $("#photo_text").val(response.photo);
            } else {
                $("#photo_text").val("");
            }

            resetObjectFormErrors();

            // Les panneaux Ajouter / Rechercher / Restituer ne doivent pas être ouverts en même temps
            if ($(".BOX-search").is(":visible")){
                $(".BOX-search").slideUp();
            }
            if ($(".BOX-rendu").is(":visible")){
                $("#cancelRenduBtn").click();
            }

            $(".BOX-form").slideDown();
            $("#openAddBtn").hide();
            $(".close-btn").show();

            setTimeout(function(){
                $('html, body').animate({
                    scrollTop: $(".BOX-form").offset().top - 80
                }, 400);
            }, 150);
        }
    });
});

$(document).on("click", ".rendubtn", function(e){
    e.preventDefault();
    var id = $(this).val();
    var dateTrouve = $(this).data("date-trouve");

    $.ajax({
        type: "POST",
        url: "control.php",
        data: { edit_id: id },
        dataType: "json",
        success: function(response){
            renduObjectData = response;

            $("#rendu_object_id").val(response.id);

            var today = new Date().toISOString().slice(0, 10);
            $("#rendu_date_rendement").val(today);
            $("#rendu_date_rendement").attr("min", dateTrouve || response.date);
            $("#rendu_date_rendement").attr("max", today);

            $("#rendu_date_rendement_error").text("");

            if ($(".BOX-search").is(":visible")){
                $(".BOX-search").slideUp();
            }
            if ($(".BOX-form").is(":visible")){
                $(".close-btn").click();
            }

            $(".BOX-rendu").slideDown();

            setTimeout(function(){
                $('html, body').animate({
                    scrollTop: $(".BOX-rendu").offset().top - 80
                }, 400);
            }, 150);
        }
    });
});

$("#cancelRenduBtn").click(function(){
    $("#renduForm")[0].reset();
    $("#rendu_object_id").val("");
    $("#rendu_date_rendement_error").text("");
    renduObjectData = null;
    $(".BOX-rendu").slideUp();
});

$("#renduForm").submit(function(e){
    e.preventDefault();

    if(!renduObjectData){
        return;
    }

    var chosenDate = $("#rendu_date_rendement").val();
    var dateTrouve = renduObjectData.date;

    if(!chosenDate){
        $("#rendu_date_rendement_error").text("La date de restitution est obligatoire.");
        return;
    }
    if(chosenDate < dateTrouve){
        $("#rendu_date_rendement_error").text("La date de restitution doit être supérieure ou égale à la date de trouvé.");
        return;
    }
    var todayStr = new Date().toISOString().slice(0, 10);
    if(chosenDate > todayStr){
        $("#rendu_date_rendement_error").text("La date de restitution ne peut pas être dans le futur.");
        return;
    }
    $("#rendu_date_rendement_error").text("");

    var formData = new FormData();
    formData.append("object_id", renduObjectData.id);
    formData.append("name", renduObjectData.name);
    formData.append("categorie", renduObjectData.categorie);
    formData.append("description", renduObjectData.description);
    formData.append("chambre", renduObjectData.chambre);
    formData.append("date_trouve", renduObjectData.date);
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
                $("#rendu_date_rendement_error").text(
                    (response.errors && response.errors.date_rendement) ? response.errors.date_rendement : "Erreur de validation."
                );
                return;
            }
            $("#renduForm")[0].reset();
            $("#rendu_object_id").val("");
            renduObjectData = null;
            $(".BOX-rendu").slideUp();
            getdata();
            loadObjectStats();
        },
        error: function(xhr){
            var data = null;
            try { data = JSON.parse(xhr.responseText); } catch(ex) {}
            if (data && data.errors && data.errors.date_rendement){
                $("#rendu_date_rendement_error").text(data.errors.date_rendement);
            } else {
                alert("Une erreur est survenue lors de la restitution.");
            }
        }
    });
});

        $("#objectForm").submit(function(e){
            e.preventDefault();

            var trouveOk = validateDateTrouve();
            var rendementOk = validateDateRendement();
            if (!trouveOk || !rendementOk){
                if (!trouveOk){
                    $dateTrouve.focus();
                } else {
                    $dateRendement.focus();
                }
                return false;
            }
            // Fin validation

            var formData = new FormData(this);
            $.ajax({
                url: "control.php",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response){
                    if (response && typeof response === 'object' && response.success === false){
                        applyServerValidationErrors(response.errors);
                        return;
                    }
                    alert(response);
                    $(".close-btn").click();
                    getdata();
                    loadObjectStats();
                },
                error: function(xhr){
                    var data = null;
                    try { data = JSON.parse(xhr.responseText); } catch(ex) {}

                    if (data && data.errors){
                        applyServerValidationErrors(data.errors);
                    } else {
                        alert("Une erreur est survenue lors de l'enregistrement.");
                    }
                }
            });
        });

        function applyServerValidationErrors(errors){
            errors = errors || {};
            if (errors.date_trouve){
                showFieldError($dateTrouve, $dateTrouveError, errors.date_trouve);
            } else {
                clearFieldError($dateTrouve, $dateTrouveError);
            }
            if (errors.date_rendement){
                showFieldError($dateRendement, $dateRendementError, errors.date_rendement);
            } else {
                clearFieldError($dateRendement, $dateRendementError);
            }
        }

        /*  IMAGE VIEWER */
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

        $(document).on("click", ".objectdata img", function(){
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

        // Drag to pan (PC mouse)
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


        var $successMsg = $(".success-message");
        if ($successMsg.length) {
            setTimeout(function(){
                $successMsg.fadeOut(500);
            }, 3000);
        }
    });

    
    </script>

   




</body>
</html>