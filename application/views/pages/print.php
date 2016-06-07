<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <script type="text/javascript">
  window.onload = function() {
  var img = window.open("me-smiling.png");
  img.print();
}

  </script>
  <style media="screen">
  @media print {
 * {
   display:none;
 }
 img#me-smiling {
   display:block;
 }
}
  </style>
    <body onload="window.print();">
      ok
    </body>
</html>
