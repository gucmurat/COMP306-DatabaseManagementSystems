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


    <!-- Search for operation -->
    <form action='interface_op.php' method='post'>
        <h3>CHECK BOOK INFO</h3>
        <p>Returns the book you selected in the library. If the book is not in the library, it returns where you can find it.  </p>
        <label >Choose an library to search:</label>
            <select name="method">
                <option>1</option>
                <option>2</option>
                <option>3</option>
            </select><br/>
        <label>Book Name:       </label><input type='text' name='name_insert' /><br/>

        <input name="check_book", value='Check' type='submit'/></p>
    </form>
    <hr>

    <!-- Search for operation -->
    <form action='interface_op.php' method='post'>
        <h3>SUGGESTED BOOKS INFO</h3>
        <label>Academic Staff ID: </label><input type='number' name='academic_staff_id' /><br/>
        <input name="check_sug", value='Check' type='submit'/></p>
    </form>
    <hr>

    <!--Insert operation -->
    <form action='interface_op.php' method='post'>
        <h3>BORROW A BOOK</h3>
        <label>Member ID:         </label><input type='number' name='member_id_borrow' /><br/>
        <label>Book ID:         </label><input type='number' name='book_id_borrow' /><br/>
        <label>Duration: </label><input type='number' name='duration_borrow' /><br/>
        <input name="borrow_book", value='Borrow' type='submit'/></p>
    </form>
    <hr>

    <!--Return operation -->
    <form action='interface_op.php' method='post'>
        <h3>RETURN A BOOK</h3>
        <label>Book ID:         </label><input type='number' name='book_id_return' /><br/>
        <input name="return_book", value='Return' type='submit'/></p>
    </form>
    <hr>


    <!--Return operation -->
    <form action='interface_op.php' method='post'>
        <h3>SUGGEST A BOOK - only allowed to academic staff</h3>
        <label>Member ID:         </label><input type='number' name='member_id_suggest' /><br/>
        <label>Book ID:         </label><input type='number' name='book_id_suggest' /><br/>
        <input name="suggest_book", value='Suggested' type='submit'/></p>
    </form>
    <hr>

     <!-- Please write Question 4 GUI Here -->
     <form action='utilities.php' method='post'>
       <h3>CHECK OUT UTILITY</h3>
        <label >Choose an utility to use:</label>
            <select name="method">
                <option>Printer</option>
                <option>Study Room</option>
            </select><br/>
        <input name="use_utility", value='Get Available Utilities' type='submit'/></p>
    </form>
    <hr>


    <form action='interface_op.php' method='post'>
        <h3>LEAVE UTILITY</h3>
        <label>Utility ID:         </label><input type='number' name='utility_id' /><br/>
        <input name="utility_id_leave", value='Leave' type='submit'/></p>
    </form>
    <hr>

</body>

 <!--Footer-->
 <footer class="bg-light text-lg-left">


<!-- Copyright -->
 <footer class="bg-light text-lg-left" style="border:100;position:absolute; height:0%;">

    &copy; Copyright <script>new Date().getFullYear()>2017&&document.write(new Date().getFullYear());</script> <strong><span>MINI KULibrary</span></strong>. All Rights Reserved

</div>
<!-- Copyright -->
</footer>
<!--Footer-->
</html>
