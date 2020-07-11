<meta charset="UTF-8">
<script src="../vast15s/embed/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../vast15s/embed/jwplayer885k.js"></script>
<script type="text/javascript">jwplayer.key="MBvrieqNdmVL4jV0x6LPJ0wKB/Nbz2Qq/lqm3g==";</script>
<div id="adsmessage" class="adsmessage" style="display:none;"></div>
<div id="playerjw7"></div>
<script type="text/javascript">
var page_url = window.location.href;
console.log(page_url);

var arrPreroll = "../vast15s/ads.xml";
console.log(arrPreroll);
	var sources = [{file: '<?=$_GET['id']?>',
				type:'embed',
				label: '720p',
				default: false},];
	var tracks = [];
	var currentVolume;
	var skipDelay = 15,displaySkip = false,skipTimeOut	= false,reloadTimes=0, timeToSeek=0, manualSeek=false, seekTimeOut, playTimeout, playAds=0,maxAds=1;
	if(typeof arrPreroll=="undefined") {
		var arrPreroll=[];
		maxAds	= 0;
	}
	var advertising = {
		client:"vast",
		admessage: 'Quảng cáo còn XX giây.',
		skipoffset: 15,
		skiptext : 'Bỏ qua quảng cáo',
		skipmessage : 'Bỏ qua sau xxs',
		width: '100%',
		height: '100%',
		autostart: true,
		schedule: {
			preroll:{
				offset: 'pre',
				tag: arrPreroll,
			},
		}
	};
	
	var playerInstance = jwplayer('playerjw7');
	function setupVideo(){		
		var firstSource = [{file: '../vast15s/embed/1s_blank.mp4',type:'mp4',label: '360p',default: true}];	
		
		if (playAds<maxAds) {
		console.log(maxAds);
			playAds++;
			//$("#adsmessage").html("Quảng cáo").show();
			playerInstance.setup({				
				sources: firstSource,
				image: 'https://firebasestorage.googleapis.com/v0/b/local-8563f.appspot.com/o/Phimmedia.org.png?alt=media&token=657abc08-fe5f-46aa-8988-322fd122e6dd',
				tracks: tracks,
				captions: {
					color: '#FFCC00',
					fontSize: 17,
					backgroundOpacity: 0,
					fontfamily: "Tahoma",
					edgeStyle: "raised"
				},
				
				width: '100%',
				height: '100%',
				primary: "html5",
				controls: true,
				//aspectratio: '16:9',
				flashplayer: '../vast15s/embed/jwplayer.flash.swf',
				autostart: true,	
				advertising: advertising,						
			});
			setUpVideoEvent();
		} else {
			playAds++;
			$("#adsmessage").hide();				
			if(self.sources[0].type == "embed") {
				$("#playerjw7").html('<iframe width="100%" height="100%" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" src="'+self.sources[0].file+'" frameborder="0" allowfullscreen=""></iframe>');
			} else {
				playerInstance.setup({
					sources: sources,
					tracks: tracks,
					captions: {
						color: '#FFCC00',
						fontSize: 17,
						backgroundOpacity: 0,
						fontfamily: "Tahoma",
						edgeStyle: "raised"
					},
					
					width: '100%',
					height: '100%',
					primary: "html5",
					controls: true,
					//aspectratio: '16:9',
					flashplayer: '../vast15s/embed/jwplayer.flash.swf',
					autostart: false,	
				});
				setUpVideoEvent();
			}
		}
	}
	this.setUpVideoEvent	= function() {
		playerInstance.on('complete', function() {
		
			nextEpiV2();
			console.log(nextEpiV2());
		}).on('ready', function () {
			 if(seekTimeOut != null) {
				clearTimeout(seekTimeOut);
			 }
			
			if(timeToSeek > 8) seekTimeOut = setTimeout(function() { 
				playerInstance.seek(timeToSeek); 
				manualSeek = false;
			}, 500);
			 
			if(playTimeout != null) {
				clearTimeout(playTimeout); 
				playTimeout = null;
			}
			playTimeout = setTimeout(function(){
				playerInstance.play(true); 
				manualSeek = false;
			}, 1000);
		 }).on('error', function (message) {
			 var time = playerInstance.getPosition();
			if(time > 8 && (manualSeek == false)) timeToSeek = time;
			if(reloadTimes < 5) {
				reloadTimes++;
				if(message['message'] == 'Error loading media: File could not be played') {
					setTimeout(function() {
						jQuery("#playerjw7").find(".jw-title-primary").text("Có chút vấn đề khi load phim. Đang thử lại...").show();
					}, 100);
				}
				setTimeout(function(){
					playerInstance.remove();
					setupVideo();
				}, 2000);											 
			} else {
				 if(message['message'] == 'Error loading media: File could not be played') {
					setTimeout(function() {
						jQuery("#playerjw7").find(".jw-title-primary").text("Có chút vấn đề khi load phim").show();
						jQuery("#playerjw7").find(".jw-title-secondary").text("Chạy lại trang (ấn F5) hoặc mở link khác bên dưới").show();
					}, 100);
				}
			}
		 }).on('beforePlay', function () {
			var volume = readCookie('volume');
			if(volume == undefined || volume<1)  {
				createCookie('volume',75, 7);
			} 
			playerInstance.setVolume(volume);
		}).on('volume', function(event) {
			createCookie('volume', event.volume, 7);
		}).on('adPlay' , function() {
			currentVolume = playerInstance.getVolume();
			playerInstance.setVolume(50);
			skipTimeOut  = setTimeout(function() {
				if(displaySkip == false) {
					$("#skipad-inner").show();
					$("#skipad-inner").click(function() {
						$("#skipad-inner").hide();
						playerInstance.remove();
						setupVideo();
					});
					displaySkip = true;
				}
			}, 1000 + skipDelay *1000);
		}).on('play', function () {
			playerInstance.setCurrentCaptions(1);
			$("#skipad-inner").hide();
			clearTimeout(skipTimeOut);
			if(playAds <= maxAds) {
				playerInstance.remove();
				setupVideo();
			} else {
				if(currentVolume > 0) {playerInstance.setVolume(currentVolume);currentVolume = 0}	
			}
		}).on('seek', function (event) {
			manualSeek = true;
			timeToSeek = event.offset;
		}).on('seeked', function (event) {
			manualSeek = false;
		}).on('adTime' , function(event) {
			 if(event.position > skipDelay && (displaySkip == false)) {
				$("#skipad-inner").show();
				setTimeout(function(){ $("#skipad-inner").hide();}, 10000);
				$("#skipad-inner").click(function() {
					$("#skipad-inner").hide();
					playerInstance.remove();
					setupVideo();
				});
				displaySkip = true;
			}
		}).on('adSkipped', function (event) {
			$("#skipad-inner").hide();
			displaySkip = true;
		}).on('adComplete', function (event) {
			$("#skipad-inner").hide();
			displaySkip = true;
		});
	}
	setupVideo();
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