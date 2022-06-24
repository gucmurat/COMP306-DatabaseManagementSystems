<!--
    COMP306-

-->
<html>
<head>
  <style>
  h1 {text-align: center;}
  p {text-align: center;}
  div {text-align: center;}
  form {text-align: center;}
  body {
    background-image: url('bg.jpeg');
    color: white;
    margin: 100;
  }
  </style>
</head>
<body>
    <h1> LIBRARY LOGIN </h1>
    <!--Insert operation -->
    <form action='library_interface.php' method='post'>
        <input name="LoginLibrarian", value='Login as a Librarian' type='submit'/></p>
    </form>
    <hr>

    <form action='member_interface.php' method='post'>
        <input name="LoginMember", value='Login as a Member' type='submit'/></p>
    </form>
    <hr>
</body>

<!--Footer-->
 <footer class="bg-light text-lg-left" style="position:absolute;bottom:0;width:100%;">


<!-- Copyright -->
<div class="text p-3" >

    &copy; Copyright <script>new Date().getFullYear()>2017&&document.write(new Date().getFullYear());</script> <strong><span>MINI KULibrary</span></strong>. All Rights Reserved

</div>
<!-- Copyright -->
</footer>
<!--Footer-->

</html>
