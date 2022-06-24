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

    <!--Registers operation -->
    <form action='interface_op.php' method='post'>
        <h3>REGISTER A BOOK</h3>
        <label>Librarian ID:         </label><input type='number' name='librarian_id' /><br/>
        <label>Library ID:         </label><input type='number' name='library_id' /><br/>
        <label>Book ID:         </label><input type='number' name='book_id' /><br/>
        <label>ISBN:        </label><input type='number' name='isbn' /><br/>
        <label>Title: </label><input type='text' name='title' /><br/>
        <label>Author:    </label><input type='text' name='author' /><br/>
        <label>Language:  </label><input type='text' name='language' /><br/>
        <label>Page Number:  </label><input type='number' name='page_no' /><br/>
        <label>Publisher:         </label><input type='text' name='publisher' /><br/>
        <label>Publication Date:        </label><input type='date' name='publication_date' /><br/>
        <label>Rating: </label><input type='double' name='rating' /><br/>
        <label>Ratings Count:    </label><input type='number' name='ratings_count' /><br/>
        <label>Floor No:  </label><input type='number' name='floor_no' /><br/>
        <input name="register_book", value='Insert' type='submit'/></p>
    </form>
    <hr>

    <form action='interface_op.php' method='post'>
        <h3>DELETE A BOOK</h3>
        <label>Book ID:         </label><input type='number' name='book_id' /><br/>
        <input name="delete_book", value='Delete' type='submit'/></p>
    </form>
    <hr>

    <form action='interface_op.php' method='post'>
        <h3>UPDATE A BOOK</h3>
       <label >Choose Attribute:</label>
           <select name="method">
               <option>member_ID</option>
               <option>library_id</option>
               <option>isbn</option>
               <option>title</option>
               <option>floor_no</option>
               <option>librarian_id</option>
               <option>language</option>
               <option>ratings_count</option>
               <option>publication_date</option>
               <option>publisher</option>
               <option>page_number</option>
               <option>rating</option>
               <option>borrow_duration</option>
           </select><br/>
       <label>Book ID:</label><input type='number' name='book_id' /><br/>
       <label>Change to:</label><input type='text' name='change_to' /><br/>
       <input name="update_book", value='Update Book' type='submit'/></p>
   </form>
   <hr>
   
   <form action='interface_op.php' method='post'>
       <h3>HIRE/FIRE A STUDENT</h3>
      <label >Operation:</label>
          <select name="method1">
              <option>Hire</option>
              <option>Fire</option>
          </select><br/>
          <label >Library:</label>
              <select name="method2">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
              </select><br/>
      <label>Student ID:</label><input type='number' name='member_id' /><br/>
      <label>Date:</label><input type='date' name='op_date' /><br/>
      <input name="fire_hire", value='Approve' type='submit'/></p>
  </form>
  <hr>

  <form action='interface_op.php' method='post'>
      <h3>DEBT of STUDENT</h3>
      <label>Student ID:         </label><input type='number' name='student_id' /><br/>
      <input name="debt_calculate", value='Calculate' type='submit'/></p>
      <input name="debt_calculate2", value='Calculate for All Students' type='submit'/></p>
  </form>
  <hr>


  <form action='interface_op.php' method='post'>
      <h3>STUDENTS with the MOST WORK TIME</h3>
      <input name="student_most_work", value='Show' type='submit'/></p>
  </form>
  <hr>

  <form action='interface_op.php' method='post'>
      <h3>UTILITIES USAGE RANK</h3>
      <input name="show_rank_printer", value='Printer' type='submit'/></p>
      <input name="show_rank_studyroom", value='Study Room' type='submit'/></p>
  </form>
  <hr>


    <form action='interface_op.php' method='post'>
        <h3>REWARD YOUR SUPERVISEE!</h3>
        <label>Supervisor ID: (Your ID)   </label><input type='number' name='s_id' /><br/>
        <input name="reward_emp", value='Reward' type='submit'/></p>
    </form>
    <hr>

</body>

<!--Footer-->
 <footer class="bg-light text-lg-left" style="border:100;position:absolute; height:0%;">


<!-- Copyright -->
<div class="text p-3" >

    &copy; Copyright <script>new Date().getFullYear()>2017&&document.write(new Date().getFullYear());</script> <strong><span>MINI KULibrary</span></strong>. All Rights Reserved

</div>
<!-- Copyright -->
</footer>
<!--Footer-->

</html>
