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

require_once 'include/functions_quiz.php';
require_once 'include/dbConnect.php';

if (isset($_POST['use_utility'])){

    $agg_type = $_POST["method"];

    echo "You are checking " .$agg_type;

if($agg_type==="Printer"){
    $result = printer_status($conn);
    print_table('Utility Status Info',$result);
}

if($agg_type==="Study Room"){
    $result = study_room_status($conn);
    print_table('Utility Status Info',$result);
}



    ?>

    <!--Return operation -->
    <form action='interface_op.php' method='post'>
        <label>Utility ID:         </label><input type='number' name='utility_id' /><br/>
        <label>Member ID:</label><input type='number' name='m_id_utility' /><br/>
        <input name="check_out_utility", value='Check Out' type='submit'/></p>
    </form>
    <hr>
    </tr>
    <?php
}
