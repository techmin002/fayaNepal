@extends('frontend.layouts.master')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.6.0/leaflet.css" />
<style>
  * {
    box-sizing: border-box;
  }

  #map-container {
    position: relative;
    width: 100%;
    height: 100vh;
  }

  #map {
    width: 100%;
    height: 100%;
  }

  #hover-label {
    position: absolute;
    background-color: rgba(0, 0, 0, 0.8);
    color: white;
    padding: 4px 8px; /* Adjusted padding for a cleaner look */
    border-radius: 4px;
    font-size: 12px; /* Smaller font size */
    pointer-events: none; /* Prevent interaction with the label */
    display: none; /* Initially hidden */
    z-index: 1000;
  }

  .leaflet-container {
    background: #bbb;
  }
</style>

@section('content')
<div class="pager-header">
  <div class="container">
    <div class="page-content">
      <h2>Coverage</h2>
      <p>Coverage / Where we are</p>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Coverage</li>
      </ol>
    </div>
  </div>
</div>

<div id="map-container">
  <div id="map"></div>
  <div id="hover-label"></div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.6.0/leaflet.js"></script>
<script src="https://jenishshrestha.github.io/leaflet-nepal/nepal-province.js"></script>
<script>
  var provinceMap, provinceGeoJson, hoverLabel;

  // Initialize map
  provinceMap = L.map("map", {
    scrollWheelZoom: false,
    touchZoom: false,
    doubleClickZoom: false,
    zoomControl: true,
    dragging: true
  }).setView([28.3949, 84.124], 8);

  // Add GeoJSON data
  provinceGeoJson = L.geoJson(provinceData, {
    style: style,
    onEachFeature: onEachFeature
  }).addTo(provinceMap);

  // Fit bounds
  var bounds = provinceGeoJson.getBounds();
  provinceMap.fitBounds(bounds);

  // Hover label element
  hoverLabel = document.getElementById("hover-label");

  // Styling for provinces
  function style(feature) {
    return {
      weight: 2,
      opacity: 1,
      color: "#FFF",
      dashArray: "1",
      fillOpacity: 0.7,
      fillColor: getProvinceColor(feature.properties.Province)
    };
  }

  // Highlight province on hover
  function highlightFeature(e) {
    var layer = e.target;

    layer.setStyle({
      weight: 2,
      color: "black",
      dashArray: "",
      fillOpacity: 1,
    });

    const provinceName = `Province ${layer.feature.properties.Province}`;
    const mouseEvent = e.originalEvent;

    // Display hover label
    hoverLabel.textContent = provinceName;
    hoverLabel.style.display = "block";
    hoverLabel.style.left = `${mouseEvent.pageX + 5}px`; // Closer horizontal offset
    hoverLabel.style.top = `${mouseEvent.pageY - 5}px`; // Closer vertical offset
  }

  // Reset province style on mouseout
  function resetHighlight(e) {
    provinceGeoJson.resetStyle(e.target);
    hoverLabel.style.display = "none";
  }

  // Zoom to province on click
  function zoomToProvince(e) {
    provinceMap.fitBounds(e.target.getBounds());
  }

  // Attach event listeners to each province
  function onEachFeature(feature, layer) {
    layer.on({
      mouseover: highlightFeature,
      mouseout: resetHighlight,
      click: zoomToProvince,
      mousemove: function (e) {
        const mouseEvent = e.originalEvent;
        hoverLabel.style.left = `${mouseEvent.pageX + 5}px`; // Closer horizontal offset
        hoverLabel.style.top = `${mouseEvent.pageY - 5}px`; // Closer vertical offset
      }
    });
  }

  // Get province colors
  function getProvinceColor(province) {
    switch (province) {
      case 1: return "lightblue";
      case 2: return "lightblue";
      case 3: return "lightblue";
      case 4: return "lightblue";
      case 5: return "lightblue";
      case 6: return "lightblue";
      case 7: return "brown";
      default: return "lightblue";
    }
  }
</script>
@endsection
