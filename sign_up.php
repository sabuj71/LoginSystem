<?php
// Check if form is submitted

if ($_SERVER["REQUEST_METHOD"] == "POST")   {
    // Get form data and sanitize
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Erro Message Array
    $errors = [];
    //validation
    if(empty($name)){
        $errors[] = "Name is required";
    }
    if(empty($email)){
        $errors [] ="Email is required .";
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors [] = "Invalid email format";
    }
    if(empty($password)){
        $errors [] ="Password is required .";
    }elseif(strlen($password)<6){
        $errors [] = "Password must be at least  6 charachters";
    }

    // if no errors , you can proceed
    if(empty($errors)){
        echo "<p style= 'color:green;'> Form submitted successfully !</p>";
        echo "Name : " .$name ."<br>";
        echo "email : " .$email ."<br>";
        echo "Password :" .$password;
    }else{
        echo "<ul style = 'color:red;'>";
        foreach($errors as $error){
            echo "<li>".htmlspecialchars($error). "</li>";
        }
        echo "</ul>";
    }
}
?>