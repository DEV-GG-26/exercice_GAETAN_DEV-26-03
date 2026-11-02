<?php
class ModelUtilisateur{

//ATTRIBUT

private string $firstname;
private string $lastname;
private string $email;
private PDO $pdo;

//CONSTRUCTEUR
    
public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

// GETTER

public function getFirstname():string{
        return $this->firstname;
    }
public function getLastname(): string{
        return $this->lastname;
    }
public function getEmail(): string{
        return $this->email;
    }
public function getPdo(): PDO{
        return $this->pdo;
    }


//  SETTER

public function setFirstname(string $newFirstname):void{
        $this->firstname = $newFirstname;
    }
public function setLastname(string $newLastname):void{
        $this->lastname = $newLastname;
    }
public function setEmail(string $newEmail):void{
        $this->email = $newEmail;
    }
public function setPdo(PDO $newPdo):void{
        $this->pdo = $newPdo;
    }


function findAll(){
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
}return $userList;
}}
?>
