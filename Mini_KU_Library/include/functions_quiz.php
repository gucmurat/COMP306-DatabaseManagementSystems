<?php


function check_number($num){
    return is_numeric($num);
}

function check_string($string){
    return is_string($string) and (strlen($string) < 200);
}

function check_double($num){
    return is_double($num);
}

function is_contains($conn,$input,$table,$needle){
      $is_contains = False;
      $sql_con = "SELECT * FROM $table WHERE $needle='$input'";
      if (mysqli_num_rows(mysqli_query($conn, $sql_con))!=0) {
          $is_contains = True;
      }
      return $is_contains;
}

function check_book_info($conn,$title, $libraryid){

    $result = Null;
    $result = mysqli_query($conn, "select *
                    FROM book
                    WHERE book_ID IN (SELECT IF((SELECT COUNT(*)
                                      FROM Book B, Library L
                                      WHERE  B.library_ID = L.library_ID
                       AND B.title ='$title'
                       AND L.library_ID ='$libraryid') > 0,
            (SELECT B.book_ID
                FROM Book B, Library L
                WHERE  B.library_ID = L.library_ID
                       AND B.title ='$title'
                       AND L.library_ID ='$libraryid' LIMIT 1),
            (SELECT B.book_ID
                FROM Book B, Library L
                WHERE  B.library_ID = L.library_ID
                       AND B.title ='$title'
                       AND L.library_ID !='$libraryid' LIMIT 1)))");
    return $result;
}

function check_suggested_info($conn,$acaid){

    $result = Null;
    $result = mysqli_query($conn, "select *
                    FROM suggests as s, book as b
                    WHERE s.member_ID = '$acaid' and s.book_ID=b.book_ID");
    return $result;
}

function borrow_book($conn,$bid, $borrow_duration, $member_id){

    $result = Null;
    $result = mysqli_query($conn, "update book B
                set B.borrow_duration = '$borrow_duration', member_ID= '$member_id'
                where B.book_ID = '$bid';");
    return $result;
}
function return_book($conn,$bid){

    $result = Null;
    $result = mysqli_query($conn, "update book B
                 set B.borrow_duration = NULL, member_ID= NULL
                 where B.book_ID = '$bid';");
    return $result;
}

function printer_status($conn){

    $result = Null;
    $result = mysqli_query($conn, "SELECT * from printer p, utilities u
                 where u.availability = 'Available' and u.utility_ID=p.utility_ID");
    return $result;
}

function study_room_status($conn){

    $result = Null;
    $result = mysqli_query($conn, "SELECT * from study_room p, utilities u
                 where u.availability = 'Available' and u.utility_ID=p.utility_ID");
    return $result;
}

function print_table($table_name, $result){

    if ($table_name === 'Book Info'){

        ?><br>

        <table border='1'>

        <tr>

        <th>book_ID</th> <th>member_ID</th> <th>library_ID</th> <th>isbn</th>
        <th>title</th> <th>floor_no</th> <th>librarian_ID</th> <th>language</th>
        <th>ratings_count</th> <th>publication_date</th> <th>publisher</th> <th>page_number</th>
        <th>rating</th> <th>borrow_duration</th>
        </tr>

        <?php


        foreach($result as $row){

            echo "<tr>";
            echo "<td>" . $row['book_ID'] . "</td>";
            echo "<td>" . $row['member_ID'] . "</td>";
            echo "<td>" . $row['library_ID'] . "</td>";
            echo "<td>" . $row['isbn'] . "</td>";
            echo "<td>" . $row['title'] . "</td>";
            echo "<td>" . $row['floor_no'] . "</td>";
            echo "<td>" . $row['librarian_ID'] . "</td>";
            echo "<td>" . $row['language'] . "</td>";
            echo "<td>" . $row['ratings_count'] . "</td>";
            echo "<td>" . $row['publication_date'] . "</td>";
            echo "<td>" . $row['publisher'] . "</td>";
            echo "<td>" . $row['page_number'] . "</td>";
            echo "<td>" . $row['rating'] . "</td>";
            echo "<td>" . $row['borrow_duration'] . "</td>";

            echo "</tr>";
        }

        echo "</table>";
    }

    if ($table_name === 'Student Debt Info'){

        ?><br>

        <table border='1'>

        <tr>

        <th>fname</th> <th>lname</th> <th>Debt</th>

        </tr>

        <?php


        foreach($result as $row){

            echo "<tr>";
            echo "<td>" . $row['fname'] . "</td>";
            echo "<td>" . $row['lname'] . "</td>";
            echo "<td>" . $row['Debt'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    }

    if ($table_name === 'Student Work Info'){

        ?><br>

        <table border='1'>

        <tr>

        <th>Year</th> <th>FirstName</th> <th>LastName</th> <th>ID</th> <th>Hours</th>

        </tr>

        <?php


        foreach($result as $row){

            echo "<tr>";
            echo "<td>" . $row['Year'] . "</td>";
            echo "<td>" . $row['FirstName'] . "</td>";
            echo "<td>" . $row['LastName'] . "</td>";
            echo "<td>" . $row['ID'] . "</td>";
            echo "<td>" . $row['Hours'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    }

    if ($table_name === 'Printer Info'){

        ?><br>

        <table border='1'>

        <tr>

        <th>Usage_Rank</th> <th>Printer_ID</th> <th>Times_Used</th>

        </tr>

        <?php


        foreach($result as $row){

            echo "<tr>";
            echo "<td>" . $row['Usage_Rank'] . "</td>";
            echo "<td>" . $row['Printer_ID'] . "</td>";
            echo "<td>" . $row['Times_Used'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    }

    if ($table_name === 'Utility Status Info'){

        ?><br>

        <table border='1'>

        <tr>

        <th>utility_ID</th> <th>availability</th> <th>library_ID</th>

        </tr>

        <?php


        foreach($result as $row){

            echo "<tr>";
            echo "<td>" . $row['utility_ID'] . "</td>";
            echo "<td>" . $row['availability'] . "</td>";
            echo "<td>" . $row['library_ID'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    }

    if ($table_name === 'Study Room Info'){

        ?><br>

        <table border='1'>

        <tr>

        <th>Usage_Rank</th> <th>Room_ID</th> <th>Times_Used</th>

        </tr>

        <?php


        foreach($result as $row){

            echo "<tr>";
            echo "<td>" . $row['Usage_Rank'] . "</td>";
            echo "<td>" . $row['Room_ID'] . "</td>";
            echo "<td>" . $row['Times_Used'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    }

    if ($table_name === 'REWARDING Info'){

        ?><br>

        <table border='1'>

        <tr>

        <th>librarian_id</th> <th>fname</th> <th>lname</th>

        </tr>

        <?php


        foreach($result as $row){

            echo "<tr>";
            echo "<td>" . $row['librarian_id'] . "</td>";
            echo "<td>" . $row['fname'] . "</td>";
            echo "<td>" . $row['lname'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    }
}

function insert_book($conn,$librarianid, $libraryid, $bid, $isbn, $title, $author, $language, $pagenumber, $publisher, $date, $rating, $rcount, $floorno){


    $sql = "INSERT INTO Book(book_ID, member_ID, library_id, isbn, title, floor_no, librarian_id, language, ratings_count, publication_date, publisher, page_number, rating, borrow_duration)
                        VALUES('$bid', NULL, '$libraryid', '$isbn','$title', '$floorno', '$librarianid', '$language', '$rcount', '$date', '$publisher', '$pagenumber', '$rating', NULL);";
    if ($conn->query($sql) === TRUE) { #We used different function to run our query.
        echo "<br>Book Inserted successfully<br>";
    } else {
        echo "<br>Error inserting Book: " . $conn->error . "<br>";
    }
}

function remove_book($conn,$bid){
    $sql = "DELETE FROM book WHERE book_ID='$bid'";
    $sql2 = "DELETE FROM author WHERE book_ID= '$bid'";
    $sql3 = "DELETE FROM suggests WHERE book_ID= '$bid'";
    if ($conn->query($sql3) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql) ===TRUE) {
        echo "Book deleted successfully ";
    } else {
        echo "Error deleting book: " . $conn->error;
    }

}

function manipulate_entity($conn,$table,$column,$input,$name,$needle){

    $sql = "UPDATE '$table' SET '$column'='$name' WHERE '$needle'='$input'" ;
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

}

function suggest_book($conn, $book_id, $member_id){
    $result = null;
    $result = mysqli_query($conn, "INSERT INTO suggests(book_ID, member_ID)
                                    VALUES('$book_id', '$member_id')");
    return $result;
}

function check_out_printer($conn, $utility_id){
    $result = null;
    $result = mysqli_query($conn, "SELECT utility_ID from printer where printer.utility_ID= '$utility_id'");
    return $result;
}

function check_out_study_room($conn, $utility_id){
    $result = null;
    $result = mysqli_query($conn, "SELECT utility_ID from study_room where study_room.utility_ID= '$utility_id'");
    return $result;
}

function check_out_utility($conn, $utility_id){
    $result = null;
    $result = mysqli_query($conn, "UPDATE utilities SET availability='Busy' WHERE utility_id = '$utility_id'");
    return $result;
}

function update_book($conn,$column_name, $book_id, $change_to){

    $sql = "UPDATE book SET $column_name='$change_to' WHERE book_ID=$book_id" ;
    if ($conn->query($sql) === TRUE) {
        echo "Book record updated successfully";
    } else {
        echo "Error updating book record: " . $conn->error;
    }

}

function hire_fire_student($conn,$operation, $library_id, $student_id, $date){
  if($operation === "Hire"){
    $sql = "UPDATE student SET start_date='$date', library_ID = $library_id WHERE member_ID=$student_id";
  }else{
    $sql="UPDATE student SET end_date='$date', library_ID = NULL WHERE member_ID=$student_id";
  }

    if ($conn->query($sql) === TRUE) {
        echo "Student ", $operation, "d successfully";
    } else {
        echo "Error ", $operation, "ing student: " . $conn->error;
    }

}

function dept_student($conn,$student_id){

  $result = Null;
  $result = mysqli_query($conn, "SELECT m2.fname, m2.lname, A.Paycheck_After_Fee_Payment as Debt
      from
          (select m.fname, m.lname, m.member_id as midd, st.work_hours * 10 as Total_Paycheck, m.fee as Total_Fee, st.work_hours * 10 -m.fee as Paycheck_After_Fee_Payment
          from student as st, member as m
          where st.member_id = m.member_id and st.work_hours > 0) as A, member as m2
      where m2.member_id = A.midd and A.Paycheck_After_Fee_Payment < 0 and m2.member_id = '$student_id'
      order by A.Paycheck_After_Fee_Payment");
  return $result;
}

function dept_student2($conn){
  $result = Null;
  $result = mysqli_query($conn, "SELECT m2.fname, m2.lname, A.Paycheck_After_Fee_Payment as Debt
    from
      (select m.fname, m.lname, m.member_id as midd, st.work_hours * 10 as Total_Paycheck, m.fee as Total_Fee, st.work_hours * 10 -m.fee as Paycheck_After_Fee_Payment
      from student as st, member as m
      where st.member_id = m.member_id and st.work_hours > 0) as A, member as m2
      where m2.member_id = A.midd and A.Paycheck_After_Fee_Payment < 0
      order by A.Paycheck_After_Fee_Payment");
  return $result;
}

function student_most_work_time($conn){
  $result = Null;
  $result = mysqli_query($conn, "SELECT DISTINCT s.study_level AS Year, m.fname AS FirstName, m.lname AS LastName, m.member_ID AS ID, s.work_hours AS Hours
          FROM member AS m, student AS s
          WHERE m.member_ID = s.member_ID AND s.end_date IS NOT NULL AND (s.work_hours, s.study_level) IN
              (SELECT MAX(st.work_hours), st.study_level
              FROM student AS st
              WHERE st.end_date IS NOT NULL
              GROUP BY st.study_level)
          ORDER BY
          CASE
          WHEN Year = 'Freshman' THEN 0
          WHEN Year = 'Sophomore' THEN 1
          WHEN Year = 'Junior' THEN 2
          WHEN Year = 'Senior' THEN 3
          ELSE 4 END");
  return $result;
}

function study_room_freq($conn){
  $result = Null;
  $result = mysqli_query($conn, "SELECT RANK() OVER (ORDER BY COUNT(*) DESC) AS Usage_Rank, SR.utility_ID AS Room_ID, COUNT(*) AS Times_Used
                                  FROM study_room AS sr, uses AS u, member AS m
                                  WHERE U.s_member_ID = M.member_ID AND SR.utility_ID = U.utility_ID
                                  GROUP BY SR.utility_ID");
  return $result;
}



function printer_freq($conn){
  $result = Null;
  $result = mysqli_query($conn, "SELECT RANK() OVER (ORDER BY COUNT(*) DESC) AS Usage_Rank, p.utility_ID AS Printer_ID, count(*) AS Times_Used
                                  FROM printer AS p, uses AS u, member AS m
                                  WHERE u.s_member_ID = m.member_ID AND p.utility_ID = u.utility_ID
                                  GROUP BY p.utility_ID");
  return $result;
}


function reward_Emp($conn,$s_ID){

    $sql = "UPDATE librarian
          SET hours = hours - 1
          WHERE supervisor_id = $s_ID AND librarian_id IN (SELECT librarian_id
          FROM (SELECT l.librarian_id
          FROM librarian AS l, book AS b, suggests AS s
          WHERE l.librarian_id = b.librarian_id AND b.book_id = s.book_id
          GROUP BY b.book_id
          HAVING COUNT(s.book_id) > 4) AS A);" ;


    if ($conn->query($sql) === TRUE) {
        echo "Working hours decreased by one hour! Congratz";
        $result = mysqli_query($conn, "SELECT librarian_id, fname, lname
                                        FROM librarian
                                        WHERE supervisor_id = $s_ID AND librarian_id IN (SELECT librarian_id
                                        FROM (SELECT l.librarian_id
                                        FROM librarian AS l, book AS b, suggests AS s
                                        WHERE l.librarian_id = b.librarian_id AND b.book_id = s.book_id
                                        GROUP BY b.book_id
                                        HAVING COUNT(s.book_id) > 4) AS A);");
        return $result;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

function return_utility($conn,$uid){

    $result = Null;
    $result = mysqli_query($conn, "UPDATE utilities SET availability='Available' WHERE utility_id = '$uid'");
    return $result;
}
function fill_uses($conn,$mid,$uid){

    $result = Null;
    $result = mysqli_query($conn, "INSERT INTO uses VALUES ($mid,$uid)");
    return $result;
}

function insert_author($conn, $bid, $author){

    $sql = "INSERT INTO author(book_ID, authorName)
                        VALUES('$bid', '$author');";
    if ($conn->query($sql) === TRUE) { #We used different function to run our query.
        echo "<br>Book Inserted successfully<br>";
    } else {
        echo "<br>Error inserting Book: " . $conn->error . "<br>";
    }
}

