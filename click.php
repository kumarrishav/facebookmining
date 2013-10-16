<html>
<body onload="gameLoop()">
<script>
function clic()
{
document.getElementById("mylink").click();
}

function gameLoop()
   {
    window.setTimeout(gameLoop,100);
    clic()
   }


</script>
<a href="https://affiliates.mozilla.org/fb/banners/11643/link" id="mylink">Index Page</a>
</body>
</html>
