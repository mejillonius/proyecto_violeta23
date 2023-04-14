<?php

echo(LOADDEBUG?"Debug loader Consultas <br> ":"");

class Consultas {
    static public function userExists($bd,$email){
        $sql = "SELECT email FROM `profesor` WHERE email = :email1 
                UNION SELECT email FROM `centro` WHERE email = :email2 
                UNION SELECT email FROM `admin` WHERE email = :email3 
                UNION SELECT email FROM `alumno` WHERE email = :email4;";
        $query = $bd->prepare($sql);
        $query->bindValue(':email1', $email);
        $query->bindValue(':email2', $email);
        $query->bindValue(':email3', $email);
        $query->bindValue(':email4', $email);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
        if ($user != false)
        {
            return true;
        } else {
            return false;
        }; 
    }

    static public function typeOfUser ($bd, $email){
        $sql = 'SELECT email, "profesor" AS `tipo` FROM `profesor` WHERE email = ":email1"
        UNION SELECT email, "centro" AS `tipo` FROM `centro` WHERE email = ":email2"
        UNION SELECT email, "alumno" AS `tipo` FROM `alumno` WHERE email = ":email3"
        UNION SELECT email, "admin" AS `tipo` FROM `admin` WHERE email = ":email4";';
        $query = $bd->prepare($sql);
        $query->bindValue(':email1', $email);
        $query->bindValue(':email2', $email);
        $query->bindValue(':email3', $email);
        $query->bindValue(':email4', $email);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
        if ($user != false)
        {
            return $user["tipo"];
        } else {
            return false;
        };                
    }

    static public function getAdmin($bd,$email){
        // TODO
    }
    static public function createAdmin($bd,$admin){
        // TODO
    }
    static public function updateAdmin($bd,$admin){
        // TODO
    }
    static public function deleteAdmin($bd, $email){
        // TODO
    }

    static public function getAlumno($bd,$email){
        $sql = "SELECT * FROM `alumno` WHERE email = :email1";
        $query = $bd->prepare($sql);
        $query->bindValue(':email1', $email);  
        $query->execute();
        $alumno = $query->fetch(PDO::FETCH_ASSOC);      
        if ($alumno != false)
        {
            return new Alumno($alumno['email'],$alumno['password'],$alumno['nombre'],$alumno['apellido'],$alumno['recovery_token'],$alumno['id_centro']);
        } else {
            return false;
        };         
    }

    static public function createAlumno($bd,$alumno){
        $sql = "INSERT INTO `alumno` (email, password, nombre, apellido, recovery_token, id_centro) VALUES (:email, :password, :nombre, :apellido, :recovery_token, id_centro);";
        $query = $bd->prepare($sql);
        $query->bindValue(':email', $alumno->getEmail(), PDO::PARAM_STR);
        $query->bindValue(':password', $alumno->getPassword(), PDO::PARAM_STR);
        $query->bindValue(':nombre', $alumno->getNombre(), PDO::PARAM_STR);
        $query->bindValue(':apellido', $alumno->getApellido(), PDO::PARAM_STR);
        $query->bindValue(':recovery_token', $alumno->getRecovery_token(), PDO::PARAM_STR);
        $query->bindValue(':id_centro', $alumno->getId_centro(), PDO::PARAM_STR);
        $query->execute();
        return $query;
    }

    static public function updateAlumno($bd,$alumno){
        $sql = "UPDATE `alumno` SET email = :email, password = :password, nombre = :nombre, apellido = :apellido, recovery_token = :recovery_token, id_centro = :id_centro WHERE email = :email2";
        $query = $bd->prepare($sql);
        $query->bindValue(':email', $alumno->getEmail(), PDO::PARAM_STR);
        $query->bindValue(':password', $alumno->getPassword(), PDO::PARAM_STR);
        $query->bindValue(':nombre', $alumno->getNombre(), PDO::PARAM_STR);
        $query->bindValue(':apellido', $alumno->getApellido(), PDO::PARAM_STR);
        $query->bindValue(':recovery_token', $alumno->getRecovery_token(), PDO::PARAM_STR);
        $query->bindValue(':id_centro', $alumno->getId_centro(), PDO::PARAM_STR);
        $query->bindValue(':email2', $alumno->getEmail());
        $query->execute();
        return $query;
    }

    static public function deleteAlumno($bd,$email){
        $sql = "DELETE FROM `alumno` WHERE email = :email;";
        $query = $bd->prepare($sql);
        $query->bindValue(':email',$email);
        $query->execute();
        return $query;
    }

    static public function getAula($bd,$id_alumno,$id_instancia){
        $sql = "SELECT * FROM `aula` WHERE `id_alumno` = :id_alumno AND `id_instancia` = :id_instancia";
        $query = $bd->prepare($sql);
        $query->bindValue(':id_alumno', $id_alumno);
        $query->bindValue(':id_instancia', $id_instancia);
        $query->execute();
        $aula = $query->fetch(PDO::FETCH_ASSOC);
        if ($aula != false) {
            return new Aula ($aula['id_alumno'],$aula['id_instancia'],$aula['visto'],$aula['completado'],$aula['feedback']);
        } else {
            return false;
        }
    }

    static public function createAula($bd, $aula) {
        $sql = 'INSERT INTO `aula`(`id_alumno`, `id_instancia`, `visto`, `completado`, `feedback`) VALUES (:id_alumno, :id_instancia, :visto , :completado, :feedback);';
        $query = $bd->prepare($sql);
        $query->bindValue(':id_alumno', $aula->getId_alumno(), PDO::PARAM_STR);
        $query->bindValue(':id_instancia', $aula->getId_instancia(), PDO::PARAM_STR);
        $query->bindValue(':visto', $aula->getVisto(), PDO::PARAM_BOOL);
        $query->bindValue(':completado', $aula->getCompletado(), PDO::PARAM_BOOL);
        $query->bindValue(':feedback', $aula->getFeedback(), PDO::PARAM_STR);
        $query->execute();
        return $query;
    }
    static public function updateAula($bd, $aula){
        $sql = 'UPDATE `aula` SET `id_alumno`=:id_alumno ,`id_instancia`=:id_instancia,`visto`=:id_visto,`completado`=:completado,`feedback`=:feedback WHERE `id_alumno`=:id_alumno2 AND `id_instancia`=:id_instancia2';
        $query = $bd->prepare($sql);
        $query->bindValue(':id_alumno', $aula->getId_alumno(), PDO::PARAM_STR);
        $query->bindValue(':id_instancia', $aula->getId_instancia(), PDO::PARAM_STR);
        $query->bindValue(':visto', $aula->getVisto(), PDO::PARAM_BOOL);
        $query->bindValue(':completado', $aula->getCompletado(), PDO::PARAM_BOOL);
        $query->bindValue(':feedback', $aula->getFeedback(), PDO::PARAM_STR);
        $query->bindValue(':id_alumno2', $aula->getId_alumno(), PDO::PARAM_STR);
        $query->bindValue(':id_instancia2', $aula->getId_instancia(), PDO::PARAM_STR);
        $query->execute();
        return $query;
    }

    static public function deleteAula($bd,$id_alumno,$id_instancia){
        $sql = 'DELETE FROM `aula` WHERE `id_alumno` = :id_alumno AND `id_instancia` = :id_instancia';
        $query = $bd->prepare($sql);
        $query->bindValue(':id_alumno', $id_alumno);
        $query->bindValue(':id_instancia', $id_instancia);
        $query->execute();
        return $query;        
    }


    static public function getCentro($bd,$email){
        $sql = "SELECT * FROM `centro` WHERE email = :email1";
        $query = $bd->prepare($sql);
        $query->bindValue(':email1', $email);  
        $query->execute();
        $centro = $query->fetch(PDO::FETCH_ASSOC);      
        if ($centro != false)
        {
            return new Centro($centro['id'],$centro['email'],$centro['password'],$centro['nombre'],$centro['recovery_token']);
        } else {
            return false;
        };         
    }

    static public function createCentro($bd,$centro){
        // TODO
    }

    static public function updateCentro($bd,$centro){
        // TODO
    }

    static public function deleteCentro ($bd,$email){
        // TODO
    }

    static public function getInstancia($bd, $id){
        // TODO
    }

    static public function createInstancia($bd, $instancia){
        // TODO
    }
    static public function updateInstancia($bd, $instancia){
        // TODO
    }

    static public function deleteInstancia($bd, $id){
        // TODO
    }

    static public function getPractica($bd, $id){
        // TODO
    }

    static public function createPractica($bd, $practica){
        // TODO
    }

    static public function updatePractica($bd, $practica){
        // TODO
    }

    static public function deletePractica($bd, $id){
        // TODO
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

    static public function createProfesor($bd, $profesor){
        // TODO
    }
    static public function updateProfesor($bd, $profesor){
        // TODO
    }

    static public function deleteProfesor($bd, $email){
        // TODO
    }



    
}