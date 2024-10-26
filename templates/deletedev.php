<?php 

//superglobal allows us to access a veriable wherever we are in a proram irrespective of the scope(local, class scopes etc )
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $data = array(
        "name" => $name,
        "email" => $email,
        "phone" => $phone,
        "password" => $password,
    );

    $json_data = json_encode($data); 
    
    $baseurl = "https://sacsapi.pythonanywhere.com/test/".$email;
    $ch = curl_init($baseurl);    
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE"); // Set the request type to DELETE
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);  // Include data if needed
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
    'Content-Length: ' . strlen($json_data)
));

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $resp = curl_exec($ch);
    if ($e = curl_error($ch)) {
        echo $e;
    } else {
        echo "posted\n". $resp;
        echo "$email";
        echo "<br>";
        echo "jd $json_data";
        header("Location: class2.php");       
    }
    curl_close($ch);
} else {
    header("Location: forms.php");
}
