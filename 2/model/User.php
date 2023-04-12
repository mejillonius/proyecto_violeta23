<?php

echo(LOADDEBUG?"User ":"");

class User {
    static public function userExists($bd,$email){
        $sql = "SELECT email FROM `profesor` WHERE email = :email1 
                UNION SELECT email FROM `centro` WHERE email = :email2 
                UNION SELECT email FROM `alumno` WHERE email = :email3;";
        $query = $bd->prepare($sql);
        $query->bindValue(':email1', $email);
        $query->bindValue(':email2', $email);
        $query->bindValue(':email3', $email);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
        if ($user != false)
        {
            return true;
        } else {
            return false;
        }; 
    }
    static public function getProfesor($bd,$email){
        $sql = "SELECT * FROM `profesor` WHERE email = :email1";
        $query = $bd->prepare($sql);
        $query->bindValue(':email1', $email);  
        $query->execute();
        $profesor = $query->fetch(PDO::FETCH_ASSOC);      
        if ($profesor != false)
        {
            return new Profesor($profesor['email'],$profesor['password'],$profesor['nombre'],$profesor['apellido'],$profesor['recovery_token'],$profesor['id_centro']);
        } else {
            return false;
        };         
    }
}