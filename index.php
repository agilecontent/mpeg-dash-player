<!DOCTYPE html>
<? $url = $_GET['url']; ?>
<!-- saved from url=(0214)http://dash-mse-test.appspot.com/dash-player.html?url=http%3A%2F%2Fyt-dash-mse-test.commondatastorage.googleapis.com%2Fmedia%2Foops_cenc-20121114-signedlicenseurl-manifest.mpd&autoplay=on&adapt=auto&flavor=widevine -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>MPEG-DASH / Media Source demo</title>
    <link rel="stylesheet" href="http://dash-mse-test.appspot.com/style.css">
    <script type="text/javascript" src="focus-manager.js"></script>
    <script type="text/javascript">
(function() {

// Log messages to stdio console. This avoids having to load developer tools in
// debug builds, which is painfully slow.
var LOG_CONSOLE=true;

var start_time = Date.now();

function log() {
  if (!LOG_CONSOLE)
    console.log.apply(console, arguments);

  var t = Math.round(Date.now() - start_time);
  var vals = [];
  for (var i = 0; i < arguments.length; i++) {
    var v = '' + arguments[i];
    if (v.slice(0, 4) == '[obj') continue;
    vals.push(v);
  }
  var msg = t + ': ' + vals.join(', ');
  var box = document.getElementById('console');
  if (box) box.value += msg + '\n';
  if (LOG_CONSOLE) console.log(msg);
}
window.log = log;

// TODO(strobe): Add on-page verbosity level control
var DLOG_LEVEL=4;

function dlog(level) {
  if (level <= DLOG_LEVEL) {
    log.apply(null, arguments);
  }
}
window.dlog = dlog;

})();
    </script>
    <script type="text/javascript" src="dash-manifest.js"></script>
    <script type="text/javascript" src="dash-eme.js"></script>
    <script type="text/javascript" src="segmentindex.js"></script>
    <!-- Including this script on the page enables support for browsers
    implementing MSE-v0.5 through MSE-latest, including all known prefixes. The
    application can use the object-oriented, unprefixed Media Source interface,
    even on MSE-v0.5 implementations. -->
    <script type="text/javascript" src="media-source-portability.js"></script>
  <style type="text/css"></style></head>
  <body>
    <div class="content">
      <header>
        <h1><a href="http://dash-mse-test.appspot.com/">MPEG-DASH / Media Source demo</a></h1>
        <div class="linkbar">
          <a href="http://dash-mse-test.appspot.com/">Index</a> ·
          <a href="http://dash-mse-test.appspot.com/media.html">Sample media</a> ·
          <a href="http://dash-mse-test.appspot.com/decoder-test.html">Decoder test media</a> ·
          <strong><a href="http://dash-mse-test.appspot.com/dash-player.html">Demo player</a></strong> ·
          <a href="http://dash-mse-test.appspot.com/release-notes.html">Release notes</a> ·
          <a href="http://dash-mse-test.appspot.com/fullscreen-player.html?url=http%3A%2F%2Fyt-dash-mse-test.commondatastorage.googleapis.com%2Fcar-20120827-manifest.mpd&autoplay=on&adapt=auto&flavor=">Fullscreen player</a>
        </div>
      </header>
      <p class="" id="choose_example">Choose an example MPD:</p>
      <p>From Cloud Storage:
      <a href="index.php?url=http://yt-dash-mse-test.commondatastorage.googleapis.com/media/car-20120827-manifest.mpd">car</a>
      <a href="index.php?url=http://yt-dash-mse-test.commondatastorage.googleapis.com/media/oops_cenc-20121114-signedlicenseurl-manifest.mpd">oops_cenc</a>
      <a href="index.php?url=http://yt-dash-mse-test.commondatastorage.googleapis.com/media/feelings_vp9-20130806-manifest.mpd">feelings_vp9</a>
      </p>
      <form action="index.php" id="player-conf">
        <input id="url" type="text" name="url" size="80" required="" placeholder="URL of DASH .mpd" value="<? echo $url ?>">
        <input type="submit">
        <br>
        <input id="autoplay" type="checkbox" name="autoplay" checked="">
        <label for="autoplay">Autoplay</label>
        <label for="adapt">Adaptive</label>
        <select id="adapt" name="adapt">
          <option value="auto">Automatic</option>
          <option value="no">Disabled</option>
          <option value="random">Random</option>
        </select>
        <label for="flavor">CDM</label>
        <select id="flavor" name="flavor">
          <option value="">auto</option>
          <option value="clearkey">Clear Key</option>
          <option value="playready">PlayReady</option>
          <option value="widevine">Widevine</option>
        </select>
      </form>

      <div id="dashcontrols">
        <form id="seekform">
          <label for="time">Time:</label>
          <input type="text" size="8" name="time" placeholder="seconds">
          <input type="button" id="seekbtn" name="seek" value="Seek">
        </form>
        <form id="repform">Representations:<select><option value="0">33k</option><option value="1">130k</option><option value="2">258k</option></select><select><option value="0">283k</option><option value="1">973k</option><option value="2">1158k</option><option value="3">101k</option><option value="4">3009k</option><option value="5">6021k</option></select></form>
      </div>

      <video id="v" controls=""></video>

      <div id="bufbar" class="progressbox">
        <div class="sizelbl">1920x1080</div>
        <div class="posbar" style="left: 3.382419821592495%;"></div>
      <div class="bufblock vidbuf" style="left: 0%; width: 10.301585828063994%; top: 0%; height: 33.333333333333336%;"></div><div class="bufblock" style="left: 0%; width: 12.349462715454225%; top: 33.333333333333336%; height: 33.333333333333336%;"></div><div class="bufblock" style="left: 0%; width: 10.301585828063994%; top: 66.66666666666667%; height: 33.333333333333336%;"></div></div>

      <textarea readonly="true" rows="12" id="console"></textarea>

    <script type="text/javascript" src="player.js"></script>

  

</div></body></html>