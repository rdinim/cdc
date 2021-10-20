<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <script> 
        $(function(){
          $("#header").load("header.html"); 
          $("#footer").load("footer.html"); 
        });
    </script>
    
</head>
<body>
    <div class="topnav">
        <a class="active" href="{{ route('homepage') }}">Home</a>
        <a href=" ">Tentang</a>
        <a href="#contact">Layanan</a>
        <a href="#about">Tracer Study</a>
        <a href="#about">Agenda</a>
        <a href="#about">Media</a>
        <a href="#about">PTW</a>
        
    </div>
</body>
</html>