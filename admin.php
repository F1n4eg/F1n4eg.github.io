   <!DOCTYPE html>
   <html lang="en">
   <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group list forming</title>
   </head>
   <body>
   <?php
        $count_group = $_POST["groups"]; //кількість груп

        $connection = mysqli_connect('localhost', 'root', '/Vev_yqTFFTzWmlM');
        $database = 'uni_project';
        $select_db = mysqli_select_db($connection, $database); 
        mysqli_query($connection, "SET NAMES 'utf8'");

        $budget = "бюджет";
        $query = "SELECT * FROM students WHERE Education='$budget' AND Grade >= 180";
		$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
		for ($highgrade_budget = []; $row = mysqli_fetch_assoc($result); $highgrade_budget[] = $row);

        $query = "SELECT * FROM students WHERE Education='$budget' AND (Grade >= 160 AND Grade < 180)";
		$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
		for ($middlegrade_budget = []; $row = mysqli_fetch_assoc($result); $middlegrade_budget[] = $row);

        $query = "SELECT * FROM students WHERE Education='$budget' AND Grade < 160";
		$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
		for ($lowgrade_budget = []; $row = mysqli_fetch_assoc($result); $lowgrade_budget[] = $row);

        $contract = "контракт";
        $query = "SELECT * FROM students WHERE Education='$contract' AND Grade >= 180";
		$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
		for ($highgrade_contract = []; $row = mysqli_fetch_assoc($result); $highgrade_contract[] = $row);

        $query = "SELECT * FROM students WHERE Education='$contract' AND (Grade >= 160 AND Grade < 180)";
		$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
		for ($middlegrade_contract = []; $row = mysqli_fetch_assoc($result); $middlegrade_contract[] = $row);

        $query = "SELECT * FROM students WHERE Education='$contract' AND Grade < 160";
		$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
		for ($lowgrade_contract = []; $row = mysqli_fetch_assoc($result); $lowgrade_contract[] = $row);
      
        function editTab($data, $connection, $count_group){
            $N_group = 1;
            $i = 0;
            $n = count($data);
            while($i < $n) {
                $x = $data[$i]["id"];
                $query = "UPDATE students SET Study_group = '$N_group' WHERE id='$x'";
                $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
                $i++; $N_group++;
                if($N_group > $count_group) {
                    $N_group = 1;
                }
            } 
        }
        editTab($highgrade_budget, $connection, $count_group);
        editTab($middlegrade_budget, $connection, $count_group);
        editTab($lowgrade_budget, $connection, $count_group);
        editTab($highgrade_contract, $connection, $count_group);
        editTab($middlegrade_contract, $connection, $count_group);
        editTab($lowgrade_contract, $connection, $count_group);

        /* $N_group = 1;
        $query = "SELECT * FROM students WHERE Study_group='$N_group'";
        $result = mysqli_query($connection, $query) or die(mysqli_error($connection)); 
        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
        echo "<pre>";
        print_r($data);
        echo "<pre>"; */

        echo "Співвідношення бюджетників та контрактників: <br>";
        $answer = $_POST["answer"];
        if($answer == "Так"){
            echo "Автобаланс...";
        }
        //mysqli_close($connection);
    ?>
    <form method="POST">
        Скільки груп вивести на друк?
        <!-- Надо сделать чтобы предлагались либо все, либо не надо, либо может по какой-то определенной -->
    </form>
   </body>
   </html>
   

