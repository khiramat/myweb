<?php
$copyright = "Copyright(C)2002-";
$copyright .= date("Y");
$copyright .= " hiramatsu.be all rights reserved";
?>

<title><?=$title?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"; />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta name="author" content="Kiyoshi Hiramatsu" />
<meta name="Reply-to" content="kyo@hiramatsu.be" />
<meta name="Description" content="Kiyoshi Hiramatsu's Diving Log" />
<meta name="copyright" content="<?=$copyright?>" />
<!--
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Cache-Control" content="no-cache" />
-->
<meta name="robots" content=none">
<link href="css/base.css" rel="stylesheet" type="text/css" />
<link rel="Shortcut icon" href="/favicon.ico">

<!-- rss -->
<link rel="alternate" type="application/rss+xml" title="RSS" href="http://hiramatsu.be/diary/diary.xml">

<!-- light box
<link rel="stylesheet" href="/css/lightbox.css" type="text/css" media="screen" />
<script type="text/javascript" src="/js/lightbox/prototype.js"></script>
<script type="text/javascript" src="/js/lightbox/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="/js/lightbox/lightbox.js"></script>
 -->

<!-- Highcharts -->
<script type="text/javascript" src="/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/js/highcharts/highcharts.js"></script>
<!-- 1a) Optional: add a theme file
<script type="text/javascript" src="/js/highcharts/themes/dark-blue.js"></script>
<script type="text/javascript" src="/js/highcharts/themes/dark-green.js"></script>
<script type="text/javascript" src="/js/highcharts/themes/gray.js"></script>
<script type="text/javascript" src="/js/highcharts/themes/skies.js"></script> -->
<script type="text/javascript" src="/js/highcharts/themes/grid.js"></script>

<!-- 1b) Optional: the exporting module -->
<script type="text/javascript" src="/js/highcharts/modules/exporting.js"></script>


<!-- Google maps -->
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<style type="text/css">
  html { height: 100% }
  body { height: 100%; margin: 0px; padding: 0px }
  #map_canvas { height: 100% }
</style>

<script type="text/javascript"
    src="http://maps.google.com/maps/api/js?sensor=true">
</script>

<!--
<script type="text/javascript">
  function initialize() {
    var latlng = new google.maps.LatLng(-34.397, 150.644);
    var myOptions = {
      zoom: 8,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("map_canvas"),
        myOptions);
  }

</script>
-->

<!-- Google analytics -->
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-25509634-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

