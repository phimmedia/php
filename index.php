<?php 
error_reporting(E_ERROR | E_PARSE);
$sub = $_GET ['sub'];
if($_GET['img']){
    $imagen = $_GET['img'];
}else{
    $imagen = '';
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8"/>
<title>Dropbox</title>
<link rel="shortcut icon" href="" type="image/x-icon" />
<meta name="robots" content="noindex" />
<META NAME="GOOGLEBOT" CONTENT="NOINDEX" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link href="https://cdn.rawgit.com/ufilestorage/a/master/skins/jw-logo-bar.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="https://cdn.rawgit.com/ufilestorage/a/master/jquery-2.2.3.min.js"></script>
<script src="https://content.jwplatform.com/libraries/IDzF9Zmk.js"></script>
<script>jwplayer.key="Khpp2dHxlBJHC8MCmLnBuV2jK/DwDnJMniwF6EO9HC/riJ712ZmbHg==";</script>
<style type="text/css">body,html{margin:0;padding:0}#uplay{position:absolute;width:100%important!;height:100%important!;border:none;overflow:hidden;}</style>
</head>
<body>
<div id="compuphd"></div>
<script type="text/javascript">
var videoPlayer = jwplayer("compuphd");
videoPlayer.setup({
sources: [{file:"https://www.dropbox.com/s/<?=$_GET['v']?>?dl=1",label: "480p",type: "video/mp4","default":"true"},{file:"https://www.dropbox.com/s/<?=$_GET['v']?>?dl=1",label: "720p",type: "video/mp4"},{file:"https://www.dropbox.com/s/<?=$_GET['v']?>?dl=1",label: "1080p",type: "video/mp4"}],
width: "100%",
height: "100%",
controls: true,
displaytitle: false,
flashplayer: "https://p.jwpcdn.com/player/v/7.12.8/jwplayer.flash.swf",
fullscreen: "true",
primary: "html5",
autostart: false,
image:'<?=$imagen;?>',
tracks: [{
			file: "<?php echo $sub;?>",
			label: "Subs",
			aspectratio: "16:9",
						startparam: "start",
						primary: "html5",
						preload: "auto",
						autostart: false,
			kind:  "captions",
			default: "true",
			}],
			captions: {
			color: "#FFFF00",
			fontSize: 14,
			edgeStyle: "uniform",
			backgroundOpacity: 0,
			},
 logo: {
			file: "http://2.bp.blogspot.com/-YqS3rxqGtjs/V4RoACOb58I/AAAAAAAAAvs/_98Rf3Om9ps3iIkA1QhGJNVIgbkajNZtgCK4B/s1600/ss.png",
			logoBar: "",
			position: "top-left",
			link: "http://www.tutorialesecu.com/"
		},
			aboutlink:"https://www.youtube.com/channel/UCL6NakGHDMpo23wBmj9Iduw",
			abouttext:"WG Tutoriales",
});
videoPlayer.on("ready",function() {
		jwLogoBar.addLogo(videoPlayer);
	});
videoPlayer.addButton(
"https://icons.jwplayer.com/icons/white/download.svg",
"Download Video",
function() {
window.open(
"https://www.dropbox.com/s/<?=$_GET['v']?>?dl=1",
"_blank"
);
},
"download"
);
    
</script>
</body>
</html>
