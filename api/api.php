
<?php 	if (stristr($_SERVER['HTTP_REFERER'],"dalatplay.xyz") || stristr($_SERVER['HTTP_REFERER'],"dalatplay.blogspot.com")||
stristr($_SERVER['HTTP_REFERER'],"phimmediaorg.herokuapp.com/api/")||
 stristr($_SERVER['HTTP_REFERER'],"embedapi.herokuapp.com/vast15s")|| stristr($_SERVER['HTTP_REFERER'],"your otherdomain add here")) { ;?>



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
<meta charset="UTF-8">
    <script src='../api/player8.js'></script>
    <div id='encrpyt'></div>

       <script>
      var player = jwplayer('encrpyt');
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
                'tag': '//embedapi.herokuapp.com//vast15s/ads.xml'
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
	   
	   
	   <script type='text/javascript'>
//<![CDATA[
shortcut={all_shortcuts:{},add:function(a,b,c){var d={type:"keydown",propagate:!1,disable_in_input:!1,target:document,keycode:!1};if(c)for(var e in d)"undefined"==typeof c[e]&&(c[e]=d[e]);else c=d;d=c.target,"string"==typeof c.target&&(d=document.getElementById(c.target)),a=a.toLowerCase(),e=function(d){d=d||window.event;if(c.disable_in_input){var e;d.target?e=d.target:d.srcElement&&(e=d.srcElement),3==e.nodeType&&(e=e.parentNode);if("INPUT"==e.tagName||"TEXTAREA"==e.tagName)return}d.keyCode?code=d.keyCode:d.which&&(code=d.which),e=String.fromCharCode(code).toLowerCase(),188==code&&(e=","),190==code&&(e=".");var f=a.split("+"),g=0,h={"`":"~",1:"!",2:"@",3:"#",4:"$",5:"%",6:"^",7:"&",8:"*",9:"(",0:")","-":"_","=":"+",";":":","'":'"',",":"<",".":">","/":"?","\\":"|"},i={esc:27,escape:27,tab:9,space:32,"return":13,enter:13,backspace:8,scrolllock:145,scroll_lock:145,scroll:145,capslock:20,caps_lock:20,caps:20,numlock:144,num_lock:144,num:144,pause:19,"break":19,insert:45,home:36,"delete":46,end:35,pageup:33,page_up:33,pu:33,pagedown:34,page_down:34,pd:34,left:37,up:38,right:39,down:40,f1:112,f2:113,f3:114,f4:115,f5:116,f6:117,f7:118,f8:119,f9:120,f10:121,f11:122,f12:123},j=!1,l=!1,m=!1,n=!1,o=!1,p=!1,q=!1,r=!1;d.ctrlKey&&(n=!0),d.shiftKey&&(l=!0),d.altKey&&(p=!0),d.metaKey&&(r=!0);for(var s=0;k=f[s],s<f.length;s++)"ctrl"==k||"control"==k?(g++,m=!0):"shift"==k?(g++,j=!0):"alt"==k?(g++,o=!0):"meta"==k?(g++,q=!0):1<k.length?i[k]==code&&g++:c.keycode?c.keycode==code&&g++:e==k?g++:h[e]&&d.shiftKey&&(e=h[e],e==k&&g++);if(g==f.length&&n==m&&l==j&&p==o&&r==q&&(b(d),!c.propagate))return d.cancelBubble=!0,d.returnValue=!1,d.stopPropagation&&(d.stopPropagation(),d.preventDefault()),!1},this.all_shortcuts[a]={callback:e,target:d,event:c.type},d.addEventListener?d.addEventListener(c.type,e,!1):d.attachEvent?d.attachEvent("on"+c.type,e):d["on"+c.type]=e},remove:function(a){var a=a.toLowerCase(),b=this.all_shortcuts[a];delete this.all_shortcuts[a];if(b){var a=b.event,c=b.target,b=b.callback;c.detachEvent?c.detachEvent("on"+a,b):c.removeEventListener?c.removeEventListener(a,b,!1):c["on"+a]=!1}}},shortcut.add("Ctrl+U",function(){top.location.href="https://www.google.com/"}),shortcut.add("F12",function(){top.location.href="https://www.google.com/"}),shortcut.add("Ctrl+Shift+I",function(){top.location.href="https://www.google.com/"}),shortcut.add("Ctrl+S",function(){top.location.href="https://www.google.com/"}),shortcut.add("Ctrl+Shift+C",function(){top.location.href="https://www.google.com/"});
//]]>
</script>
<script type='text/javascript'>
//<![CDATA[
// JavaScript Document
var message="NoRightClicking"; function defeatIE() {if (document.all) {(message);return false;}} function defeatNS(e) {if (document.layers||(document.getElementById&&!document.all)) { if (e.which==2||e.which==3) {(message);return false;}}} if (document.layers) {document.captureEvents(Event.MOUSEDOWN);document.onmousedown=defeatNS;} else{document.onmouseup=defeatNS;document.oncontextmenu=defeatIE;} document.oncontextmenu=new Function("return false")
//]]>
</script>

<script language='JavaScript1.2'>
function disableselect(e){
return false
}

function reEnable(){
return true
}

//if IE4+
document.onselectstart=new Function ("return false")

//if NS6
if (window.sidebar){
document.onmousedown=disableselect
document.onclick=reEnable
}
</script>

<style>
.overlay{
    width: 100%;
    height: 100%;
    background: black;
    z-index: 1000;
    position: absolute;
    top: 0px;
    left: 0px;
}
.annon{
    width: 90%;
    color: white;
    font-size: 2em;
    font-weight: bold;
    margin: 0 auto;
}
</style>




<?php
}
else echo 'Opps sorry!  For more info contact us ';
?>	
