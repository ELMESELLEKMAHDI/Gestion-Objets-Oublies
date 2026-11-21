<?php
define('AUTH_LOGIN_PATH', '../login.php');
require_once __DIR__ . '/../../includes/auth_check.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

    <title>Rapport</title>

    <link href="css/stylesheets.css" rel="stylesheet" type="text/css" />
    <link href="css/app-layout.css" rel="stylesheet" type="text/css" />

    <link rel="icon" type="image/ico" href="favicon.ico"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script type='text/javascript' src='https://code.jquery.com/jquery-3.5.1.min.js'></script>
    <script type='text/javascript' src='js/plugins/jquery/jquery-ui-1.10.1.custom.min.js'></script>
    <script type='text/javascript' src='js/plugins/jquery/jquery-migrate-1.1.1.min.js'></script>
    <script type='text/javascript' src='js/plugins/bootstrap/bootstrap.min.js'></script>

    <script type='text/javascript' src='js/plugins/jflot/jquery.flot.js'></script>
    <script type='text/javascript' src='js/plugins/jflot/jquery.flot.pie.js'></script>
    <script type='text/javascript' src='js/plugins/jflot/jquery.flot.resize.js'></script>

    <script type='text/javascript' src='js/plugins.js'></script>
    <script type='text/javascript' src='js/actions.js'></script>
</head>

<style>
    .stat-cards {
        display: flex;
        flex-wrap: wrap;
        gap: 16px;
        margin-bottom: 20px;
    }
    .stat-card {
        flex: 1 1 200px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 1px 3px rgba(0,0,0,.08);
        padding: 20px;
        border-left: 5px solid #12151a;
    }
    .stat-card.trouve { border-left-color: #f39c12; }
    .stat-card.rendu { border-left-color: #2ecc71; }
    .stat-card.perimes { border-left-color: #e74c3c; }
    .stat-card.taux { border-left-color: #2196F3; }
    .stat-card .label-txt {
        font-size: 13px;
        color: #7a8894;
        font-weight: 600;
        letter-spacing: .3px;
        text-transform: uppercase;
        margin-bottom: 6px;
    }
    .stat-card .value-txt {
        font-size: 32px;
        font-weight: 700;
        color: #263238;
    }
    .report-widget {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 1px 3px rgba(0,0,0,.08);
        margin-bottom: 20px;
        overflow: hidden;
    }
    .report-widget .rw-head {
        padding: 16px 20px;
        border-bottom: 1px solid #eceff1;
        font-size: 16px;
        font-weight: 700;
        color: #263238;
    }
    .report-widget .rw-body {
        padding: 20px;
    }
    .chart-box {
        width: 100%;
        max-width: 100%;
    }
    .chart-box svg {
        display: block;
        width: 100%;
        height: auto;
    }
    .cat-row {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        font-size: 13px;
    }
    .cat-row .cat-name {
        width: 140px;
        color: #37474f;
        font-weight: 600;
    }
    .cat-row .cat-bar-outer {
        flex: 1;
        background: #eceff1;
        border-radius: 20px;
        height: 14px;
        margin: 0 10px;
        overflow: hidden;
    }
    .cat-row .cat-bar-inner {
        background: #12151a;
        height: 100%;
        border-radius: 20px;
    }
    .cat-row .cat-nb {
        width: 30px;
        text-align: right;
        color: #7a8894;
        font-weight: 600;
    }
    #printReportBtn {
        height: 42px;
        border-radius: 21px;
        padding: 0 26px;
        font-weight: 600;
        font-size: 14px;
    }

    
    .pie-chart-wrap {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 18px;
        padding: 10px 0 4px;
    }
    .pie-visual {
        width: 100%;
        max-width: 180px;
        flex-shrink: 0;
    }
    .pie-visual svg {
        display: block;
        width: 100%;
        height: auto;
    }
    .pie-legend {
        width: 100%;
        max-width: 320px;
    }
    .pie-legend-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 8px 4px;
        border-bottom: 1px solid #eceff1;
        font-size: 14px;
        color: #37474f;
    }
    .pie-legend-row:last-child { border-bottom: none; }
    .pie-legend-left {
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 600;
    }
    .pie-swatch {
        width: 13px;
        height: 13px;
        border-radius: 4px;
        display: inline-block;
        flex-shrink: 0;
    }
    .pie-legend-nb {
        color: #7a8894;
        font-weight: 600;
    }
    .pie-legend-pct {
        font-weight: 700;
        color: #263238;
        min-width: 48px;
        text-align: right;
    }

    @media print {
        #appSidebar, #appTopbar, #printReportBtn { display: none !important; }
        .content { margin: 0 !important; }

        
        * {
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
            color-adjust: exact !important;
        }
        .report-widget, .stat-card { box-shadow: none !important; border: 1px solid #ddd; }
        .row { display: block !important; }
        .col-md-6 { width: 50% !important; float: left !important; }
        .chart-box svg, .pie-visual svg { width: 100% !important; height: auto !important; }
    }
</style>

<body>

<?php
$pageTitle  = 'Rapport';
$activePage = 'rapport';
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/sidebar.php';
?>

    <div class="content">
        <div class="workplace">
            <div class="row">
                <div class="col-md-12">

                    <div class="panel-heading clearfix" style="background:#fff;border-radius:8px;margin-bottom:16px;box-shadow:0 1px 3px rgba(0,0,0,.08);">
                        <span class="panel-title">Rapport général</span>
                        <div class="pull-right-mobile pull-right">
                            <button class="btn btn-default" id="printReportBtn">
                                <span class="glyphicon glyphicon-print"></span> Imprimer
                            </button>
                        </div>
                    </div>

                    <div class="stat-cards">
                        <div class="stat-card">
                            <div class="label-txt">Total des objets</div>
                            <div class="value-txt" id="statTotal">-</div>
                        </div>
                        <div class="stat-card trouve">
                            <div class="label-txt">Trouvés (en attente)</div>
                            <div class="value-txt" id="statTrouve">-</div>
                        </div>
                        <div class="stat-card rendu">
                            <div class="label-txt">Rendus</div>
                            <div class="value-txt" id="statRendu">-</div>
                        </div>
                        <div class="stat-card taux">
                            <div class="label-txt">Taux de restitution</div>
                            <div class="value-txt" id="statTaux">-</div>
                        </div>
                        <div class="stat-card perimes">
                            <div class="label-txt">Non réclamés (+1 an)</div>
                            <div class="value-txt" id="statPerimes">-</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="report-widget">
                                <div class="rw-head">Répartition par statut</div>
                                <div class="rw-body">
                                    <div class="pie-chart-wrap">
                                        <div id="pieVisual" class="pie-visual"></div>
                                        <div id="pieLegend" class="pie-legend"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="report-widget">
                                <div class="rw-head">Objets trouvés par mois (12 derniers mois)</div>
                                <div class="rw-body">
                                    <div id="chartMonth" class="chart-box"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="report-widget">
                                <div class="rw-head">Répartition par catégorie</div>
                                <div class="rw-body" id="catList"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="report-widget">
                                <div class="rw-head">Top chambres (nombre d'objets trouvés)</div>
                                <div class="rw-body" id="chambreList"></div>
                            </div>
                        </div>
                    </div>

                    <div class="report-widget">
                        <div class="rw-head">Délai moyen de restitution</div>
                        <div class="rw-body">
                            <p id="delaiMoyenTxt" style="font-size:14px;color:#37474f;margin:0;">Chargement...</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function(){

        $(document).on('click', '#appMenuBtn', function(e){
            e.preventDefault();
            $('#appSidebar').toggleClass('mobile-open');
            $('#appOverlay').toggleClass('mobile-open');
        });

        $(document).on('click', '#appOverlay', function(){
            $('#appSidebar').removeClass('mobile-open');
            $('#appOverlay').removeClass('mobile-open');
        });

        $('#printReportBtn').click(function(){
            window.print();
        });
    });

    var COLORS = ['#12151a', '#10b981', '#2ecc71', '#e74c3c', '#3498db', '#9b59b6', '#f39c12', '#1abc9c'];

    
    function polarToCartesian(cx, cy, r, angleDeg){
        var rad = (angleDeg - 90) * Math.PI / 180.0;
        return { x: cx + r * Math.cos(rad), y: cy + r * Math.sin(rad) };
    }

    function pieSlicePath(cx, cy, r, startAngle, endAngle){
        
        if (endAngle - startAngle >= 359.999) { endAngle = startAngle + 359.999; }
        var start = polarToCartesian(cx, cy, r, startAngle);
        var end   = polarToCartesian(cx, cy, r, endAngle);
        var largeArcFlag = (endAngle - startAngle) > 180 ? 1 : 0;
        return ['M', cx, cy, 'L', start.x, start.y, 'A', r, r, 0, largeArcFlag, 1, end.x, end.y, 'Z'].join(' ');
    }

    function niceMax(v){
        v = Math.max(v, 1);
        if (v <= 4) return 4;
        var mag = Math.pow(10, Math.floor(Math.log(v) / Math.LN10));
        return Math.ceil(v / mag) * mag;
    }

    function esc(s){
        return String(s == null ? '' : s).replace(/[&<>"']/g, function(c){
            return { '&':'&amp;', '<':'&lt;', '>':'&gt;', '"':'&quot;', "'":'&#39;' }[c];
        });
    }

    function drawPieStatus(data){
        var trouve = parseInt(data.total_trouve) || 0;
        var rendu  = parseInt(data.total_rendu) || 0;
        var total  = trouve + rendu;

        var $visual = $('#pieVisual');
        var $legend = $('#pieLegend');
        $legend.html('');

        if (total === 0) {
            $visual.html('<svg viewBox="0 0 180 180"><circle cx="90" cy="90" r="88" fill="#eceff1" /></svg>');
            $legend.html('<p class="text-muted" style="text-align:center;">Aucune donnée.</p>');
            return;
        }

        var pctTrouve = Math.round((trouve / total) * 1000) / 10; // 1 decimale
        var pctRendu  = Math.round((rendu  / total) * 1000) / 10;
        var angleTrouve = (trouve / total) * 360;

        var svg = '<svg viewBox="0 0 180 180" xmlns="http://www.w3.org/2000/svg">';
        if (trouve > 0) {
            svg += '<path d="' + pieSlicePath(90, 90, 88, 0, angleTrouve) + '" fill="#f39c12" />';
        }
        if (rendu > 0) {
            svg += '<path d="' + pieSlicePath(90, 90, 88, angleTrouve, 360) + '" fill="#2ecc71" />';
        }
        svg += '</svg>';
        $visual.html(svg);

        $legend.append(
            '<div class="pie-legend-row">' +
                '<div class="pie-legend-left"><span class="pie-swatch" style="background:#f39c12;"></span>Trouvé</div>' +
                '<div class="pie-legend-nb">' + trouve + '</div>' +
                '<div class="pie-legend-pct">' + pctTrouve + '%</div>' +
            '</div>' +
            '<div class="pie-legend-row">' +
                '<div class="pie-legend-left"><span class="pie-swatch" style="background:#2ecc71;"></span>Rendu</div>' +
                '<div class="pie-legend-nb">' + rendu + '</div>' +
                '<div class="pie-legend-pct">' + pctRendu + '%</div>' +
            '</div>'
        );
    }

    function drawMonthChart(data){
        var rows = data.by_month || [];
        var W = 640, H = 260;
        var padL = 34, padR = 12, padT = 10, padB = 34;
        var plotW = W - padL - padR;
        var plotH = H - padT - padB;

        var maxVal = 0;
        $.each(rows, function(i, row){ maxVal = Math.max(maxVal, parseInt(row.nb) || 0); });
        var topVal = niceMax(maxVal);

        var svg = '<svg viewBox="0 0 ' + W + ' ' + H + '" xmlns="http://www.w3.org/2000/svg" font-family="Arial, sans-serif">';

        for (var g = 0; g <= 4; g++) {
            var val = Math.round((topVal * g / 4));
            var y = padT + plotH - (plotH * g / 4);
            svg += '<line x1="' + padL + '" y1="' + y + '" x2="' + (W - padR) + '" y2="' + y + '" stroke="#eceff1" stroke-width="1" />';
            svg += '<text x="' + (padL - 8) + '" y="' + (y + 4) + '" font-size="11" fill="#7a8894" text-anchor="end">' + val + '</text>';
        }

        // Barres
        var n = rows.length;
        if (n > 0) {
            var slot = plotW / n;
            var barW = Math.min(slot * 0.55, 46);
            $.each(rows, function(i, row){
                var val = parseInt(row.nb) || 0;
                var barH = topVal > 0 ? (val / topVal) * plotH : 0;
                var xCenter = padL + slot * i + slot / 2;
                var x = xCenter - barW / 2;
                var y = padT + plotH - barH;
                svg += '<rect x="' + x + '" y="' + y + '" width="' + barW + '" height="' + Math.max(barH, 0) + '" rx="2" fill="#12151a" />';
                svg += '<text x="' + xCenter + '" y="' + (H - padB + 18) + '" font-size="11" fill="#7a8894" text-anchor="middle">' + esc(row.mois) + '</text>';
            });
        } else {
            svg += '<text x="' + (W/2) + '" y="' + (H/2) + '" font-size="13" fill="#7a8894" text-anchor="middle">Aucune donnée.</text>';
        }

        svg += '</svg>';
        $('#chartMonth').html(svg);
    }

    function renderReport(data){
        $('#statTotal').text(data.total);
        $('#statTrouve').text(data.total_trouve);
        $('#statRendu').text(data.total_rendu);
        $('#statTaux').text(data.taux_restitution + '%');
        $('#statPerimes').text(data.total_perimes);

        if (data.delai_moyen_jours !== null) {
            $('#delaiMoyenTxt').text(
                'En moyenne, un objet rendu est restitué en ' + data.delai_moyen_jours + ' jour(s) après avoir été trouvé.'
            );
        } else {
            $('#delaiMoyenTxt').text("Pas encore assez de données (aucun objet rendu).");
        }

        drawPieStatus(data);
        drawMonthChart(data);

        // Répartition par catégorie 
        var maxCat = 0;
        $.each(data.by_categorie, function(i, row){ maxCat = Math.max(maxCat, parseInt(row.nb)); });
        var $catList = $('#catList');
        $catList.html('');
        if (data.by_categorie.length === 0) {
            $catList.html('<p class="text-muted">Aucune donnée.</p>');
        } else {
            $.each(data.by_categorie, function(i, row){
                var pct = maxCat > 0 ? Math.round((row.nb / maxCat) * 100) : 0;
                var color = COLORS[i % COLORS.length];
                $catList.append(
                    '<div class="cat-row">' +
                        '<div class="cat-name">' + (row.categorie || 'Autre') + '</div>' +
                        '<div class="cat-bar-outer"><div class="cat-bar-inner" style="width:' + pct + '%;background:' + color + ';"></div></div>' +
                        '<div class="cat-nb">' + row.nb + '</div>' +
                    '</div>'
                );
            });
        }

        // Top chambres
        var maxCh = 0;
        $.each(data.by_chambre, function(i, row){ maxCh = Math.max(maxCh, parseInt(row.nb)); });
        var $chList = $('#chambreList');
        $chList.html('');
        if (data.by_chambre.length === 0) {
            $chList.html('<p class="text-muted">Aucune donnée.</p>');
        } else {
            $.each(data.by_chambre, function(i, row){
                var pct = maxCh > 0 ? Math.round((row.nb / maxCh) * 100) : 0;
                var color = COLORS[i % COLORS.length];
                $chList.append(
                    '<div class="cat-row">' +
                        '<div class="cat-name">Chambre ' + row.chambre + '</div>' +
                        '<div class="cat-bar-outer"><div class="cat-bar-inner" style="width:' + pct + '%;background:' + color + ';"></div></div>' +
                        '<div class="cat-nb">' + row.nb + '</div>' +
                    '</div>'
                );
            });
        }
    }

    
    $.ajax({
        type: 'GET',
        url: 'code_rapport.php',
        dataType: 'json',
        success: function(data){
            renderReport(data);
        },
        error: function(xhr){
            console.log(xhr.responseText);
        }
    });
    </script>

</body>
</html>