
<?php 
function decode($string)
{
$output = false;
$encrypt_method = "AES-256-CBC";
$secret_key = '0D4EE605BA20B35A7A07994AF47CA95580B6BA17250AADF4D7E273BD399E130';
$secret_iv = 'VYo5FTXD3Mu6K8td';
$key = hash('sha256', $secret_key);
$iv = substr(hash('sha256', $secret_iv), 0, 16);
$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
return $output;
}
$url = decode($_GET['id']);
include("encode.php");

?>
<!DOCTYPE html><html><head><title>Video DalatPlay.XyZ</title>
<meta charset="UTF-8">
    <script src='../player8.js'></script>
    <div id='player'></div>

       <script>
      var player = jwplayer('player');
player.setup({
    width: '100%',
    image: 'https://firebasestorage.googleapis.com/v0/b/phimmedia-ff307.appspot.com/o/dalat-play%2Fintro-dalatplay.xyz.png?alt=media&token=141eee00-77ed-4440-b73d-23fede2c945a',
    skin: {
        'name': 'seven'
    },
    primary: 'html5',
    sources: [<?php echo "{file:'http://phimmediaorg.herokuapp.com/api/stream.php?api=".openssl($url)."',type:'video/mp4'}";?>],
		
    playbackRateControls: [0.25, 0.5, 1, 1.5, 2],
    abouttext: 'Contact me : 09777.xxx.xxx',
    aboutlink: 'https://google.com',
    autostart: 'true',
    advertising: {
        client: 'vast',
        admessage: 'Quảng cáo còn XX giây.',
        skiptext: 'Bỏ qua quảng cáo',
        skipmessage: 'Bỏ qua sau xxs',
        schedule: {
            'qc1': {
                'offset': 'pre',
                'skipoffset': '10',
                'tag': '../vast15s/ads.xml'
            },
            'qc2': {
                'offset': '70%',
                'skipoffset': '15',
                'tag': '/'
            }, 
        }
    },
    tracks: [{
        file: '/',
        label: 'Vietnamese',
        kind: 'captions',
        default: 'true'
    }]
});
player.on('adImpression', function (e) {
    jwplayer().setVolume(50)
});
player.on('adComplete', function (e) {
    jwplayer().setVolume(90)
});
player.on('adSkipped', function (e) {
    jwplayer().setVolume(90)
});
       </script>

</body></html>



