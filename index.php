<?php 
/*
 	assetwebsite - viewer en aanvraagformulier voor verkeersmanagementassets
    Copyright (C) 2020 Gemeente Den Haag, Netherlands
    Developed by Jasper Vries
    Modified for Verkeersbordenkaart
    Copyright (C) 2020 Jasper Vries
 
    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.
 
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
 
    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <https://www.gnu.org/licenses/>.
*/
session_start();
include('dbconnect.inc.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Verkeersbordenkaart</title>
<link rel="stylesheet" type="text/css" href="bundled/jquery-ui/jquery-ui.min.css">
<link rel="stylesheet" type="text/css" href="bundled/leaflet/leaflet.css">
<link rel="stylesheet" type="text/css" href="style/style.css">
<link rel="icon" type="image/png" href="favicon.png">
<iframe name="hiddenIframe" style="position: absolute;width:0;height:0;border:0;"></iframe>
<!--For JOSM remote-control: shouldn't open a new tab, link to hidden Iframe (concect copied from Osmose) -->
<script src="bundled/jquery/jquery.min.js"></script>
<script src="bundled/jquery-ui/jquery-ui.min.js"></script>
<script src="bundled/js-cookie/js.cookie.min.js"></script>
<script src="bundled/leaflet/leaflet.js"></script>
<script src="bundled/leaflet-rotatedmarker/leaflet.rotatedMarker.js"></script>
<script src="bundled/OverlappingMarkerSpiderfier-Leaflet/oms.min.js"></script>
<script src="map.js"></script>
<script src="help.js"></script>
</head>
<body>

<div style="position: fixed; left: 0; top: 0; width: 100%; height: 100%">
	<div id="map" style="width: 100%; min-height: 100%"></div>
</div>

<div id="map-options-container">
	<fieldset>
    <legend>Lagen</legend>
    <ul id="map-layers">
        <li><input type="checkbox" id="map-layer-verkeersborden"><label for="map-layer-verkeersborden">Verkeersborden</label></li>
	</ul>
    </fieldset>
    <fieldset>
    <legend>Kaartachtergrond</legend>
        <ul id="map-tile"></ul>
    </fieldset>
    <fieldset>
    <legend>Kaartweergave</legend>	
		<ul id="map-style">
            <li><input type="radio" name="map-style" id="map-style-default"><label for="map-style-default">Standaard</label><br></li>
            <li><input type="radio" name="map-style" id="map-style-lighter"><label for="map-style-lighter">Lichter</label><br></li>
            <li><input type="radio" name="map-style" id="map-style-grayscale"><label for="map-style-grayscale">Grijswaarden</label><br></li>
            <li><input type="radio" name="map-style" id="map-style-dark"><label for="map-style-dark">Donker</label><br></li>
            <li><input type="radio" name="map-style" id="map-style-oldskool"><label for="map-style-oldskool">Vergeeld</label></li>
        </ul>
    </fieldset>
</div>

<div id="map-loading">
    <span>Bezig met laden...</span>
</div>
<div id="map-nolayersactive">
    <span class="info">Selecteer een kaartlaag in het menu aan de rechterzijde.</span>
</div>
<div id="map-zoomwarning">
    <span class="warning">Zoom verder in om verkeersborden te bekijken.</span>
</div>

<?php
include('menu.inc.php');
?>

</body>
</html>