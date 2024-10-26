<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <link href="../src/output.css" rel="stylesheet">
    <title>Class 1</title>

</head>
<body >
    <?php 
    //a function is a reuseable block
    $pdo = "";
    function greetings($name){
        $message = "welcome" . $name;
        return $message;
    }

    // echo greetings("Peters");
    // echo "<br>";
    // echo greetings("Sammy");
    // echo "<br>";

    $i = 0;
    // while($i < 10){
    //     echo"Welcome to SACS computers". "<br>";
    //     $i++;
    // }
    // do{
    //     echo "Welcome to SACS computers" . "<br>";
    //     $i++;
    // }while($i< 20)
        //this is a associative  array 
        //each keys comes with its value
    $assoc_arr = [
        "id" => 1,
        "name" => "jeans",
        "price" => 40000
    ];
    $fruits = [
        "Mango",
        "Banana",
        "Guava",
        "Orange",
    ];
    foreach ($assoc_arr as $assoc){
        echo "We got $assoc" . "<br>";
        
    }
    echo "<br>";
    echo "<h3><u>For the fruits we got</h3></u>". " <br>";
    echo "<br>";
    $flag = 0;
    ?>
    <ol><?php
    foreach ($fruits as $f){
        if ($f == "Orange"){
            echo "<li style='background-color:green; width: 27%;'> Finally the last in the array is <b>$f</b></li></blink>";
        }
        elseif ($flag == 0){
             echo "<li style='background-color:green; width: 25%;'>The first is <b>$f</b>.". "<br></li>";
        }
        else{
            echo "<li style='background-color:white; width: 26%;'>And <b>$f</b>. <br></li>";
        }
        $flag++;
    }
    
   ?></ol>
   <?php 
    // Next class CRUD
    // study php form handling

    $fid = [
        "M" => "Mango",
        "O" => "Orange",
        "G" => "Guava",
        "B" => "Banana"
    ];
    // if ($_POST["name"]){
    //     if ($_POST["name"] == "M" || $_POST["name"] == "m"){
    //         echo "M matches to Mango";
    //     }
    //     elseif($_POST["name"] == "B" || $_POST["name"] == "b"){
    //         echo "B matches Banana";
    //     }
    //     elseif($_POST["name"]=="G" || $_POST["name"] == "m"){
    //         echo "G matches Guava";
    //     }
    //     elseif($_POST["name"] == "O" || $_POST["name"] == "o"){
    //         echo "O matches orange";
    //     }
    //     else{
    //         echo "Not found";
    //     }
    // }

    // A better approach :)
    if ($_POST["name"]){
        $user_input = strtoupper($_POST["name"]) ;
        $matched = $fid[strtoupper($_POST['name'])];
        if (array_key_exists($user_input, $fid)) {
            echo "$user_input maps to $matched";
        }
        elseif (empty($user_input)){

            echo "Enter something broooooooo". "$user_input";
        }
        elseif(strlen($user_input)>1){
            echo "<p style='background-color:red;'> <b> Just one Character please </b></p>";
        }
        else{
            echo "Sorry no match for $user_input found in array db :)";
        }
        
    }
        
    ?>
    <!-- <form action="class1.php", method="POST">
        Enter the First letter of the fruit you want to check: <input type="text" name="name" > 
        <input type="submit">
    </form>   -->

    <form class="w-full max-w-sm" action="class1.php" method="POST"> 
  <div class="flex items-center border-b border-teal-500 py-2">
    <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="m" aria-label="First char of the fruit" name="name">
    <button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded" type="submit">
      CHECK FRUIT
    </button>
  </div>
</form>
    <?php

    ?>
</body>
</html>