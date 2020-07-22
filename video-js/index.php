<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Video STR</title>
  

</head>
<body>
<!-- partial:index.partial.html -->
<html>
  <head>
    <!-- Load dependent stylesheets. -->
    <link rel="stylesheet" href="//googleads.github.io/videojs-ima/node_modules/video.js/dist/video-js.min.css" />
    <link rel="stylesheet" href="//googleads.github.io/videojs-ima/node_modules/videojs-contrib-ads/dist/videojs.ads.css" />
    <link rel="stylesheet" href="//googleads.github.io/videojs-ima/dist/videojs.ima.css" />
  </head>

  <body>
    <video oncontextmenu="return false;" id="content_video" class="video-js vjs-default-skin"
        controls controlsList="nodownload" preload="auto" width="640" height="360">
      <source src="<?=$_GET['id']?>"
          type="video/mp4" />
    </video>
    <!-- Load dependent scripts -->
    <script src="//googleads.github.io/videojs-ima/node_modules/video.js/dist/video.min.js"></script>
    <script src="//imasdk.googleapis.com/js/sdkloader/ima3.js"></script>
    <script src="//googleads.github.io/videojs-ima/node_modules/videojs-contrib-ads/dist/videojs.ads.min.js"></script>
    <script src="//googleads.github.io/videojs-ima/dist/videojs.ima.js"></script>
  </body>
</html>
<!-- partial -->
  <script  src="vast/script.js"></script>

</body>
</html>
