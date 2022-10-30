
<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("button").click(function(){
    $.post("https://corsany-where.herokuapp.com/https://delta.rapidstreams.io/gt.rstrm/",
    {
      name: "Donald Duck",
      city: "Duckburg"
    },
    function(data,status){
      location.replace("http://n1.mtfxg.xyz:8081/ind2/aajtaknews/playlist.m3u8"+data);
    });
  });
});
</script>
</head>
<body>

<button>Send an HTTP POST request to a page and get the result back</button>

</body>
</html>
