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
</html>

<?php


require_once 'include/dbConnect.php';
require_once 'include/functions_quiz.php';

//member_interface
if (isset($_POST['check_book'])){

    $book_name = $_POST["name_insert"];
    $library_id = $_POST["method"];

    if(check_string($book_name) !== true){
        exit("Wrong book name");
    }

    $result = check_book_info($conn,$book_name, $library_id);
    echo "Returned rows are: " . mysqli_num_rows($result);
    print_table('Book Info', $result);

}


if (isset($_POST['check_sug'])){

    $aca_staff_id = $_POST["academic_staff_id"];

    if(check_number($aca_staff_id) !== true){
        exit("Wrong academic_staff_id value");
    }

    $result = check_suggested_info($conn,$aca_staff_id);
    echo "Returned rows are: " . mysqli_num_rows($result);
    print_table('Book Info', $result);
}


if (isset($_POST['borrow_book'])){

    $member_id = $_POST["member_id_borrow"];
    $book_id = $_POST["book_id_borrow"];
    $duration = $_POST["duration_borrow"];

    if(check_number($member_id) !== true){
        exit("Wrong member_id value");
    }

    if(check_number($book_id) !== true){
        exit("Wrong book_id value");
    }

    if(check_number($duration) !== true){
        exit("Wrong duration value");
    }

    $result = borrow_book($conn,$book_id, $duration, $member_id);
    echo "You borrowed successfully!";
    /*
    ...*/
}

if (isset($_POST['return_book'])){

    $book_id = $_POST["book_id_return"];

    if(check_number($book_id) !== true){
        exit("Wrong book_id value");
    }
    if (is_contains($conn,$book_id,'book','book_ID')){
      $result = return_book($conn,$book_id);
      echo "You returned successfully!";
    }
    else{
      echo "Book ID can not be found!";
    }
    /*
    ...*/
}

if (isset($_POST['suggest_book'])){

    $member_id = $_POST["member_id_suggest"];
    $book_id = $_POST["book_id_suggest"];

    if(check_number($member_id) !== true){
        exit("Wrong member_id value");
    }

    if(check_number($book_id) !== true){
        exit("Wrong book_id value");
    }
    if (is_contains($conn,$book_id,'book','book_ID') && is_contains($conn,$member_id,'member','member_ID')){
        $result = suggest_book($conn, $book_id, $member_id);
        echo "You suggested successfully!";
      }
      else{
        echo "Book ID or member ID can not be found!";
    }
    
    
    /*
    ...*/
}

if (isset($_POST['use_utility'])){

    $utility = $_POST["method"];
    $member_id = $_POST["member_id_borrow"];

    if(check_number($member_id) !== true){
        exit("Wrong member_id value");
    }
    /*
    ...*/
}

///---------------------------------------------------------------------------

if (isset($_POST['register_book'])){

    $librarian_id = $_POST["librarian_id"];
    $library_id = $_POST["library_id"];
    $book_id = $_POST["book_id"];
    $isbn = $_POST["isbn"];
    $title = $_POST["title"];
    $author = $_POST["author"];
    $language = $_POST["language"];
    $page_no = $_POST["page_no"];
    $publisher = $_POST["publisher"];
    $publication_date = $_POST["publication_date"];
    $rating = $_POST["rating"];
    $ratings_count = $_POST["ratings_count"];
    $floor_no = $_POST["floor_no"];

    if(check_number($librarian_id) !== true){
        exit("Wrong librarian_id value");
    }
    if(check_number($library_id) !== true){
        exit("Wrong library_id value");
    }
    if(check_number($book_id) !== true){
        exit("Wrong book_id value");
    }
    if(check_number($isbn) !== true){
        exit("Wrong isbn value");
    }
    if(check_number($page_no) !== true){
        exit("Wrong page_no value");
    }
    if(check_number($ratings_count) !== true){
        exit("Wrong ratings_count value");
    }
    if(check_number($floor_no) !== true){
        exit("Wrong floor_no value");
    }
    if(check_string($title) !== true){
        exit("Wrong title name");
    }
    if(check_string($author) !== true){
        exit("Wrong author name");
    }
    if(check_string($language) !== true){
        exit("Wrong language name");
    }
    if(check_string($publisher) !== true){
        exit("Wrong publisher name");
    }
    $result = insert_book($conn, $librarian_id, $library_id,$book_id, $isbn,$title,$author,$language,$page_no,$publisher,$publication_date,$rating,$ratings_count,$floor_no);
    $result = insert_author($conn,$book_id,$author);
    /*
    ...*/
}

if (isset($_POST['delete_book'])){

    $book_id = $_POST["book_id"];

    if(check_number($book_id) !== true){
        exit("Wrong book_id value");
    }
    if (is_contains($conn,$book_id,'book','book_ID')){
        $result = remove_book($conn, $book_id);
        echo "You suggested successfully!";
      }
      else{
        echo "Book ID can not be found!";
    }
   
    /*
    ...*/
}

if (isset($_POST['update_book'])){

    $attr = $_POST["method"];
    $book_id = $_POST["book_id"];
    $change_to = $_POST["change_to"];
    if (is_contains($conn,$book_id,'book','book_ID')){
        if($attr == "member_id" || $attr == "floor_no" || $attr == "library_id" ||$attr == "librarian_id" ||$attr == "isbn" || $attr == "page_numer"|| $attr == "ratings_count"){
            $book_id_int = intval($book_id);
            $result = update_book($conn,$attr, $book_id_int, $change_to);
          }elseif ($attr == "rating") {
            $book_id_float = floatval($book_id);
            $result = update_book($conn,$attr, $book_id_float, $change_to);
          }else{
            $result = update_book($conn,$attr, $book_id, $change_to);
          }
      }
      else{
        echo "Book ID can not be found!";
    }
    if(check_number($book_id) !== true){
        exit("Wrong book_id value");
    }
    

}

if (isset($_POST['fire_hire'])){

    $operation = $_POST["method1"];
    $library_id = $_POST["method2"];
    $member_id = $_POST["member_id"];
    $op_date = $_POST["op_date"];

    if(check_number($member_id) !== true){
        exit("Wrong member_id value");
    }
    if (is_contains($conn,$member_id,'student','member_ID')){

      $result = hire_fire_student($conn,$operation, $library_id, $member_id, $op_date);

    }else{
        exit("Wrong student id value");
    }
}

if (isset($_POST['debt_calculate'])){

    $member_id = $_POST["student_id"];

    if(check_number($member_id) !== true){
        exit("Wrong member_id value");
    }

    if (is_contains($conn,$member_id,'student','member_ID')){

        $result = dept_student($conn,$member_id);
        print_table('Student Debt Info', $result);

    }else{
        exit("Wrong student id value");
    }
}

if (isset($_POST['debt_calculate2'])){
    
    $result = dept_student2($conn);
    print_table('Student Debt Info', $result);
}

if (isset($_POST['student_most_work'])){
  $result = student_most_work_time($conn);
  echo "STUDENTS with the MOST WORK TIME";
  print_table('Student Work Info', $result);

    /*
    ...*/
}

if (isset($_POST['show_rank_printer'])){
  $result = printer_freq($conn);
  echo "Printer Usage Rank";
  print_table('Printer Info', $result);



    /*
    ...*/
}

if (isset($_POST['show_rank_studyroom'])){
  $result = study_room_freq($conn);
  echo "Study Room Usage Rank";
  print_table('Study Room Info', $result);

    /*
    ...*/
}


if (isset($_POST['reward_emp'])){
  $sid = $_POST["s_id"];

  $result = reward_emp($conn, $sid);
  print_table('REWARDING Info', $result);

    /*
    ...*/
}


if (isset($_POST['check_out_utility'])){
  $uid = $_POST["utility_id"];
  $mem_id = $_POST["m_id_utility"];
  if (is_contains($conn,$uid,'utilities','utility_ID') && is_contains($conn,$mem_id,'member','member_ID')){
    $result = fill_uses($conn, $mem_id, $uid);
    $result = check_out_utility($conn, $uid);
    echo "Utility is reserved for you";
  }
  else{
    echo "Member ID or utility ID can not be found!";
}
  

    /*
    ...*/
}



if (isset($_POST['utility_id_leave'])){
  $uid = $_POST["utility_id"];
 
  if (is_contains($conn,$uid,'utilities','utility_ID')){
    $result = return_utility($conn, $uid);
    echo "Utility is reserved for you";
  }
  else{
    echo "Utility ID can not be found!";
}
 

    /*
    ...*/
}
