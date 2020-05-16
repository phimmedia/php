<!DOCTYPE html>
<html>
<head>
    <title>Google Drive</title>
    <meta name="robots" content="noindex,nofollow">
    <meta name="referrer" content="never"/>
    <style type="text/css">
        html{width:100%;height:100%;}
        *{margin:0;padding:0;font-weight:normal;box-sizing: border-box;}
        body{background:#08212f;color:#777;font-size:16px;font-family: arial;display: block;width:100%;height:100%;overflow:hidden;}
        .buffer-player,.error-player {
            position: absolute;
            z-index: 1;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
        }
        .buffer-player {
            background: rgba(0,0,0,0.6);
        }
        .hidden{display: none;}
        .error-player span, .buffer-player span {
            display: block;
            background: #333;
            color: #ccc;
            border: 1px solid #555;
            font-size:13px;
            padding: 4px;
            max-width: 230px;
            margin: 23% auto 0 auto;
            text-align: center;
        }
        .error-player button, .buffer-player button {
            display: block;
            margin: 10px auto;
            background: #1d55ff;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            padding: 4px 12px;
            color: white;
            border: 0;
            cursor: pointer;
        }
        .jw-rightclick {display:none !important;}
        .jw-logo-bar {
            background-image: url('URL');
            background-size: 100px 19px;
            background-repeat: no-repeat;
            background-position: center center;
            height: 30px;
            width: 110px;
            -webkit-transform: translateZ(0);
            -webkit-font-smoothing: antialiased;
        }

        .jw-logo-bar .player-tooltip {
            background: rgba(0,0,0,.4);
            font-size: 8px; /*11px*/
            font-weight: bold;
            line-height: 2.5em;
            font-family: sans-serif, Arial;
            bottom: 100%;
            text-transform: uppercase;
            color: #fff;
            display: block;
            left: -15px;
            margin-bottom: 15px;
            opacity: 0;
            padding: 0 10px;
            pointer-events: none;
            position: absolute;
            -webkit-transform: translateY(10px);
            -moz-transform: translateY(10px);
            -ms-transform: translateY(10px);
            -o-transform: translateY(10px);
            transform: translateY(10px);
            -webkit-transition: all .25s ease-out;
            -moz-transition: all .25s ease-out;
            -ms-transition: all .25s ease-out;
            -o-transition: all .25s ease-out;
            transition: all .25s ease-out;
            -webkit-box-shadow: 2px 2px 6px rgba(0,0,0,.28);
            -moz-box-shadow: 2px 2px 6px rgba(0,0,0,.28);
            -ms-box-shadow: 2px 2px 6px rgba(0,0,0,.28);
            -o-box-shadow: 2px 2px 6px rgba(0,0,0,.28);
            box-shadow: 2px 2px 6px rgba(0,0,0,.28);
        }

        .jw-logo-bar .player-tooltip:before {
            bottom: -20px;
            content: " ";
            display: block;
            height: 20px;
            left: 0;
            position: absolute;
            width: 100%;
        }

        .jw-logo-bar .player-tooltip:after {
            border-left: solid transparent 10px;
            border-right: solid transparent 10px;
            border-top: solid rgba(0,0,0,.4) 10px;
            bottom: -10px;
            content: " ";
            height: 0;
            left: 50%;
            margin-left: -13px;
            position: absolute;
            width: 0;
        }

        .jw-logo-bar:hover .player-tooltip {
            opacity: 1;
            pointer-events: auto;
            -webkit-transform: translateY(0);
            -moz-transform: translateY(0);
            -ms-transform: translateY(0);
            -o-transform: translateY(0);
            transform: translateY(0);
        }

        .jw-logo-bar .player-tooltip {
            display: none;
        }

        .jw-logo-bar:hover .player-tooltip {
            display: block;
        }
        .fuckyou{
            position:fixed;
            right:11px;
            top:11px;
            width:41px;
            height:43px;
            z-index:999;
            background:#222;
        }
    </style>
</head>
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
<body>

    <div class="fuckyou"></div>
    <iframe src="https://www.dailymotion.com/embed/video/<?=$_GET['phimmedia']?>?mute=0&info=0&logo=0&related=0&social=0&highlight=FFCC33" scrolling="no" frameborder="0" width="100%" height="100%" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>

</body>



       <style>
    img[src="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {
        display: none;
    }
</style>     
        
</html>