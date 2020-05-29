<br />
ADSENSE CODE - 1
<br>
<div dir="ltr" style="text-align: left;" trbidi="on">
<script>
   var count = 15; // Number of remaining seconds.
   var counter; // Handle for the countdown event.
   
   function start() {
    counter = setInterval(timer, 1000);
   }

   function timer() {
    // Show the number of remaining seconds on the web page.
    var output = document.getElementById("displaySeconds");
    output.innerHTML = count;
    
    // Decrease the remaining number of seconds by one.
    count--;
    
    // Check if the counter has reached zero.
    if (count < 0) { // If the counter has reached zero...
     // Stop the counter.
     clearInterval(counter);
     
     // Start the download.
     window.location.href = "https://drive.google.com/uc?export=download&id=<?=$_GET['id']?>";
     return;
    }
   }  
   // Start the countdown timer when the page loads. 
   window.addEventListener("load", start, false);
  </script>

<br />
Your download will begin in <span id="displaySeconds">15</span> seconds.<br />
<br />
ADSENSE CODE - 2
<br>
<a href="https://drive.google.com/file/d/<?=$_GET['id']?>/view?usp=sharing">Click here if your download does not begin.</a></div>
