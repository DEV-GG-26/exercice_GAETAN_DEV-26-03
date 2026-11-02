<?php
$message = '';
$userList = '';

try{
    $pdo = new PDO('mysql:host=localhost;dbname=todos','root','root',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    $request = $pdo->prepare('SELECT u.firstname, u.lastname, u.email FROM users u');

    $request->execute();

    $data = $request->fetchAll(PDO::FETCH_ASSOC);

    foreach($data as $user){
        $userList = $userList."<li>{$user['firstname']} {$user['lastname']} - {$user['email']}</li>";
    }

}catch(EXCEPTION $error){
    die($error->getMessage());
}
?>
