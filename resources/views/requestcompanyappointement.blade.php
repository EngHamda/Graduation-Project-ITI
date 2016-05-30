<head>
 <meta charset="utf-8">
      <title>jQuery UI Datepicker functionality</title>
      <link href="/css/jquery-ui.min.css" rel="stylesheet">
      <script src="/js/jquery-1.12.4.min.js"></script>
      <script src="/js/jquery-ui.min.js"></script>
 <script>
         $(function() {
            $( "#datepicker-1" ).datepicker();
         
         });
      </script>
	<title>requestform</title>
</head>
<body>
<form method="POST" action="{{ url('physician/storecompanyrequest') }}">

<input type="hidden" name="_token" value="{{ csrf_token() }}">

<input type="hidden" value="{{ $advertisementid}}" name="advertisementid">


 
enter time :<input type="text"  id="imepicker" name="time" >
   
    <p id="error"> 
     
  
      <p>Enter Date: <input type="text" id="datepicker-1" name="date"></p>
   </body>
</html>

  <button type="submit" class="btn btn-primary">submit </button>




</form>
</body>
</ht
