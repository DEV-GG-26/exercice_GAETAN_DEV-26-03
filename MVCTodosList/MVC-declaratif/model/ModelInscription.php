<?php

$message = '';
$userList = '';

if(isset($_POST['submit'])){
    if(!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['password'])){
        if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){

            if(mb_strlen($_POST['password'],'UTF-8')>= 12){
                $prenom = trim($_POST['prenom']);
                $nom = trim($_POST['nom']);
                $email = trim($_POST['email']);

                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                try{
                    $pdo = new PDO('mysql:host=localhost;dbname=todos','root','root',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
                    $request = $pdo->prepare('SELECT u.firstname, u.lastname, u.email FROM users u WHERE u.email = ?');
                    $request->bindParam(1,$email,PDO::PARAM_STR);
                    $request->execute();
                    $data = $request->fetch(PDO::FETCH_ASSOC);
                    if(empty($data)){
                        $request = $pdo->prepare('INSERT INTO users (firstname, lastname, email, `password`) VALUES(?, ?, ?, ?)');
                        $request->bindParam(1,$prenom,PDO::PARAM_STR);
                        $request->bindParam(2,$nom,PDO::PARAM_STR);
                        $request->bindParam(3,$email,PDO::PARAM_STR);
                        $request->bindParam(4,$password,PDO::PARAM_STR);
                        $request->execute();
                        $message = "L'utilisateur a été enregistré :  {$prenom} {$nom} - {$email}";
                    }else{
                        $message = "Cette email est déjà utilisé par un autre compte.";
                    }
                }catch(EXCEPTION $error){
                    die($error->getMessage());
                }
            }else{
                $message = "Votre mot de passe doit faire au moins 12 caractères.";
            }
        }else{
            $message = "Votre email n'est pas au bon format.";
        }
    }else{
        $message = "Veuillez remplir tous les champs du formulaire.";
    }

}
?>
