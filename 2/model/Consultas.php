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
        printvar($user);
        if ($user)
        {
            return true;
        } else {
            return false;
        }; 
    }
    static public function typeOfUser ($bd, $email){
        $sql = 'SELECT email, "profesor" AS `tipo` FROM `profesor` WHERE email = :email1
        UNION SELECT email, "centro" AS `tipo` FROM `centro` WHERE email = :email2
        UNION SELECT email, "alumno" AS `tipo` FROM `alumno` WHERE email = :email3
        UNION SELECT email, "admin" AS `tipo` FROM `admin` WHERE email = :email4;';
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
        $sql = "SELECT * FROM `admin` WHERE email = :email1";
        $query = $bd->prepare($sql);
        $query->bindValue(':email1', $email);  
        $query->execute();
        $admin = $query->fetch(PDO::FETCH_ASSOC);      
        if ($admin != false)
        {
            return new Admin($admin['id'],
                             $admin['email'],
                             $admin['password'],
                             $admin['nombre'],
                             $admin['recovery_token']);
        } else {
            return false;
        };  
    }
    static public function createAdmin($bd,$admin){
        $sql = "INSERT INTO `admin`(`id`, `email`, `password`, `nombre`, `recovery_token`) VALUES (:id,:email,:password,:nombre,:recovery_token)";
        $query = $bd->prepare($sql);
        $query->bindValue(':id', $admin->getId(), PDO::PARAM_STR);
        $query->bindValue(':email', $admin->getEmail(), PDO::PARAM_STR);
        $query->bindValue(':password', $admin->getpassword(), PDO::PARAM_STR);
        $query->bindValue(':nombre', $admin->getNombre(), PDO::PARAM_STR);
        $query->bindValue(':recovery_token', $admin->getrecovery_token(), PDO::PARAM_STR);

        return $query->execute();
    }
    static public function updateAdmin($bd,$admin){
        $sql = "UPDATE `admin` SET id = :id, email = :email, password = :password, nombre = :nombre, recovery_token = :recovery_token WHERE email = :email2";
        $query = $bd->prepare($sql);
        $query->bindValue(':id', $admin->getId(), PDO::PARAM_STR);
        $query->bindValue(':email', $admin->getEmail(), PDO::PARAM_STR);
        $query->bindValue(':password', $admin->getPassword(), PDO::PARAM_STR);
        $query->bindValue(':nombre', $admin->getNombre(), PDO::PARAM_STR);
        $query->bindValue(':recovery_token', $admin->getRecovery_token(), PDO::PARAM_STR);
        $query->bindValue(':email2', $admin->getEmail());
        return $query->execute();
    }
    static public function deleteAdmin($bd, $email){
        $sql = "DELETE FROM `admin` WHERE email = :email;";
        $query = $bd->prepare($sql);
        $query->bindValue(':email',$email);
        return $query->execute();
    }
    static public function getAlumno($bd,$email){
        $sql = "SELECT * FROM `alumno` WHERE email = :email1";
        $query = $bd->prepare($sql);
        $query->bindValue(':email1', $email);  
        $query->execute();
        $alumno = $query->fetch(PDO::FETCH_ASSOC);      
        if ($alumno != false)
        {
            return new Alumno($alumno['email'],
                              $alumno['password'],
                              $alumno['nombre'],
                              $alumno['apellido'],
                              $alumno['id_centro'],
                              $alumno['recovery_token']);
        } else {
            return false;
        };         
    }
    static public function createAlumno($bd,$alumno){
        $sql = "INSERT INTO `alumno`(`email`, `password`, `nombre`, `apellido`, `recovery_token`, `id_centro`) VALUES (:email,:password,:nombre,:apellido,:recovery_token,:id_centro)";
        $query = $bd->prepare($sql);
        $query->bindValue(':email', $alumno->getEmail(), PDO::PARAM_STR);
        $query->bindValue(':password', $alumno->getPassword(), PDO::PARAM_STR);
        $query->bindValue(':nombre', $alumno->getNombre(), PDO::PARAM_STR);
        $query->bindValue(':apellido', $alumno->getApellido(), PDO::PARAM_STR);
        $query->bindValue(':recovery_token', $alumno->getRecovery_token(), PDO::PARAM_STR);
        $query->bindValue(':id_centro', $alumno->getId_centro(), PDO::PARAM_STR);
        return $query->execute();
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
        return $query->execute();
    }
    static public function deleteAlumno($bd,$email){
        $sql = "DELETE FROM `alumno` WHERE email = :email;";
        $query = $bd->prepare($sql);
        $query->bindValue(':email',$email);
        return $query->execute();
    }
    static public function getAula($bd,$id_alumno,$id_instancia){
        $sql = "SELECT * FROM `aula` WHERE `id_alumno` = :id_alumno AND `id_instancia` = :id_instancia";
        $query = $bd->prepare($sql);
        $query->bindValue(':id_alumno', $id_alumno);
        $query->bindValue(':id_instancia', $id_instancia);
        $query->execute();
        $aula = $query->fetch(PDO::FETCH_ASSOC);
        if ($aula != false) {
            return new Aula ($aula['id_alumno'],
                             $aula['id_instancia'],
                             $aula['visto'],
                             $aula['completado'],
                             $aula['feedback']);
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
        return $query->execute();

    }
    static public function updateAula($bd, $aula){
        $sql = "UPDATE `aula` SET id_alumno = :id_alumno,id_instancia = :id_instancia, visto = :visto , completado = :completado ,feedback = :feedback WHERE id_alumno = :id_alumno2 AND id_instancia = :id_instancia2";
        $query = $bd->prepare($sql);
        $query->bindValue(':id_alumno', $aula->getId_alumno());
        $query->bindValue(':id_instancia', $aula->getId_instancia());
        $query->bindValue(':visto', $aula->getVisto());
        $query->bindValue(':completado', $aula->getCompletado());
        $query->bindValue(':feedback', $aula->getFeedback());
        $query->bindValue(':id_alumno2', $aula->getId_alumno());
        $query->bindValue(':id_instancia2', $aula->getId_instancia());
        return $query->execute();

    }
    static public function deleteAula($bd,$id_alumno,$id_instancia){
        $sql = 'DELETE FROM `aula` WHERE `id_alumno` = :id_alumno AND `id_instancia` = :id_instancia';
        $query = $bd->prepare($sql);
        $query->bindValue(':id_alumno', $id_alumno);
        $query->bindValue(':id_instancia', $id_instancia);
        return $query->execute();       
    }
    static public function getCentro($bd,$email){
        $sql = "SELECT * FROM `centro` WHERE email = :email1";
        $query = $bd->prepare($sql);
        $query->bindValue(':email1', $email);  
        $query->execute();
        $centro = $query->fetch(PDO::FETCH_ASSOC);      
        if ($centro != false)
        {
            return new Centro($centro['id'],
                              $centro['email'],
                              $centro['password'],
                              $centro['nombre'],
                              $centro['recovery_token']);
        } else {
            return false;
        };         
    }
    static public function createCentro($bd,$centro){
        $sql = "INSERT INTO `centro`(`id`, `email`, `password`, `nombre`, `recovery_token`) VALUES (:id,:email,:password,:nombre,:recovery_token)";
        $query = $bd->prepare($sql);
        $query->bindValue(':id', $centro->getId(), PDO::PARAM_STR);
        $query->bindValue(':email', $centro->getEmail(), PDO::PARAM_STR);
        $query->bindValue(':password', $centro->getpassword(), PDO::PARAM_STR);
        $query->bindValue(':nombre', $centro->getNombre(), PDO::PARAM_STR);
        $query->bindValue(':recovery_token', $centro->getrecovery_token(), PDO::PARAM_STR);

        return $query->execute();
    }
    static public function updateCentro($bd,$centro){
        $sql = "UPDATE `centro` SET id = :id, email = :email, password = :password, nombre = :nombre, recovery_token = :recovery_token WHERE email = :email2";
        $query = $bd->prepare($sql);
        $query->bindValue(':id', $centro->getId(), PDO::PARAM_STR);
        $query->bindValue(':email', $centro->getEmail(), PDO::PARAM_STR);
        $query->bindValue(':password', $centro->getPassword(), PDO::PARAM_STR);
        $query->bindValue(':nombre', $centro->getNombre(), PDO::PARAM_STR);
        $query->bindValue(':recovery_token', $centro->getRecovery_token(), PDO::PARAM_STR);
        $query->bindValue(':email2', $centro->getEmail());
        return $query->execute();
    }
    static public function deleteCentro ($bd,$email){
        $sql = "DELETE FROM `centro` WHERE email = :email;";
        $query = $bd->prepare($sql);
        $query->bindValue(':email',$email);
        return $query->execute();
    }
    static public function getInstancia($bd, $id){
        $sql = "SELECT * FROM `instancia` WHERE id = :id";
        $query = $bd->prepare($sql);
        $query->bindValue(':id', $id);  
        $query->execute();
        $instancia = $query->fetch(PDO::FETCH_ASSOC);      
        if ($instancia != false)
        {
            return new Instancia($instancia['id'],
                                 $instancia['id_profesor'],
                                 $instancia['id_practica'],
                                 $instancia['creacion'],
                                 $instancia['fecha_limite'],
                                 $instancia['estado'],
                                 $instancia['url']);
        } else {
            return false;
        };   
    }
    static public function createInstancia($bd, $instancia){
        $sql = "INSERT INTO `instancia`(`id`, `id_profesor`, `id_practica`, `creacion`, `fecha_limite`, `estado`,`url`) VALUES (:id,:id_profesor,:id_practica,:creacion,:fecha_limite,:estado,:url)";
        $query = $bd->prepare($sql);
        $query->bindValue(':id', $instancia->getId(), PDO::PARAM_STR);
        $query->bindValue(':id_profesor', $instancia->getId_profesor(), PDO::PARAM_STR);
        $query->bindValue(':id_practica', $instancia->getid_practica(), PDO::PARAM_STR);
        $query->bindValue(':creacion', $instancia->getCreacion(), PDO::PARAM_STR);
        $query->bindValue(':fecha_limite', $instancia->getFecha_limite(), PDO::PARAM_STR);
        $query->bindValue(':estado', $instancia->getEstado(), PDO::PARAM_STR);
        $query->bindValue('url', $instancia->getUrl(), PDO::PARAM_STR);
        return $query->execute();
    }
    static public function updateInstancia($bd, $instancia){
        $sql = "UPDATE `instancia` SET id = :id, id_profesor = :id_profesor, id_practica = :id_practica, creacion = :creacion, fecha_limite = :fecha_limite, estado = :estado, url = :url WHERE id = :id2";
        $query = $bd->prepare($sql);
        $query->bindValue(':id', $instancia->getId(), PDO::PARAM_STR);
        $query->bindValue(':id_profesor', $instancia->getId_profesor(), PDO::PARAM_STR);
        $query->bindValue(':id_practica', $instancia->getid_practica(), PDO::PARAM_STR);
        $query->bindValue(':creacion', $instancia->getCreacion(), PDO::PARAM_STR);
        $query->bindValue(':fecha_limite', $instancia->getFecha_limite(), PDO::PARAM_STR);
        $query->bindValue(':estado', $instancia->getEstado(), PDO::PARAM_STR);
        $query->bindValue('url', $instancia->getUrl(), PDO::PARAM_STR);
        $query->bindValue('id2', $instancia->getId(), PDO::PARAM_STR);
        return $query->execute();
    }
    static public function deleteInstancia($bd, $id){
        $sql = "DELETE FROM `instancia` WHERE id = :id;";
        $query = $bd->prepare($sql);
        $query->bindValue(':id',$id);
        return $query->execute();
    }
    static public function getPractica($bd, $id){
        $sql = "SELECT * FROM `practica` WHERE id = :id";
        $query = $bd->prepare($sql);
        $query->bindValue(':id', $id);  
        $query->execute();
        $practica = $query->fetch(PDO::FETCH_ASSOC);      
        if ($practica != false)
        {
            return new Practica($practica['id'],
                                $practica['titulo'],
                                $practica['downloads'],
                                $practica['rating'],
                                $practica['guion'],
                                $practica['autor']);
        } else {
            return false;
        }; 
    }
    static public function createPractica($bd, $practica){
        $sql = "INSERT INTO `practica`(`id`, `titulo`, `downloads`, `rating`, `guion`, `autor`) VALUES ( :id, :titulo, :downloads, :rating, :guion, :autor)";
        $query = $bd->prepare($sql);
        $query->bindValue(':id', $practica->getId(),PDO::PARAM_STR);
        $query->bindValue(':titulo', $practica->getTitulo(),PDO::PARAM_STR);
        $query->bindValue(':downloads', $practica->getDownloads(),PDO::PARAM_INT);
        $query->bindValue(':rating', $practica->getRating(),PDO::PARAM_INT);
        $query->bindValue(':guion', $practica->getGuion(),PDO::PARAM_STR);
        $query->bindValue(':autor', $practica->getAutor(),PDO::PARAM_STR);
        return $query->execute();

    }
    static public function updatePractica($bd, $practica){
        $sql = "UPDATE `practica` SET `id`=:id,`titulo`=:titulo,`downloads`=:downloads,`rating`=:rating,`guion`=:guion,`autor`=:autor WHERE `id` = :id2";
        $query = $bd->prepare($sql);
        $query->bindValue(':id', $practica->getId(),PDO::PARAM_STR);
        $query->bindValue(':titulo', $practica->getTitulo(),PDO::PARAM_STR);
        $query->bindValue(':downloads', $practica->getDownloads(),PDO::PARAM_INT);
        $query->bindValue(':rating', $practica->getRating(),PDO::PARAM_INT);
        $query->bindValue(':guion', $practica->getGuion(),PDO::PARAM_STR);
        $query->bindValue(':autor', $practica->getAutor(),PDO::PARAM_STR);
        $query->bindValue(':id2', $practica->getId(),PDO::PARAM_STR);
        return $query->execute();
    }
    static public function deletePractica($bd, $id){
        $sql = "DELETE FROM `practica` WHERE id = :id;";
        $query = $bd->prepare($sql);
        $query->bindValue(':id',$id);
        return $query->execute();
    }
    static public function getProfesor($bd,$email){
        $sql = "SELECT * FROM `profesor` WHERE email = :email1";
        $query = $bd->prepare($sql);
        $query->bindValue(':email1', $email);  
        $query->execute();
        $profesor = $query->fetch(PDO::FETCH_ASSOC);      
        if ($profesor != false)
        {
            return new Profesor($profesor['email'],
                                $profesor['password'],
                                $profesor['nombre'],
                                $profesor['apellido'],
                                $profesor['recovery_token'],
                                $profesor['id_centro']);
        } else {
            return false;
        };         
    }
    static public function createProfesor($bd, $profesor){
        $sql = "INSERT INTO `profesor`(`email`, `password`, `nombre`, `apellido`, `recovery_token`, `id_centro`) VALUES (:email,:password,:nombre,:apellido,:recovery_token,:id_centro)";
        $query = $bd->prepare($sql);
        $query->bindValue(':email', $profesor->getEmail(), PDO::PARAM_STR);
        $query->bindValue(':password', $profesor->getPassword(), PDO::PARAM_STR);
        $query->bindValue(':nombre', $profesor->getNombre(), PDO::PARAM_STR);
        $query->bindValue(':apellido', $profesor->getApellido(), PDO::PARAM_STR);
        $query->bindValue(':recovery_token', $profesor->getRecovery_token(), PDO::PARAM_STR);
        $query->bindValue(':id_centro', $profesor->getId_centro(), PDO::PARAM_STR);
        return $query->execute();
    }
    static public function updateProfesor($bd, $profesor){
        $sql = "UPDATE `profesor` SET email = :email, password = :password, nombre = :nombre, apellido = :apellido, recovery_token = :recovery_token, id_centro = :id_centro WHERE email = :email2";
        $query = $bd->prepare($sql);
        $query->bindValue(':email', $profesor->getEmail(), PDO::PARAM_STR);
        $query->bindValue(':password', $profesor->getPassword(), PDO::PARAM_STR);
        $query->bindValue(':nombre', $profesor->getNombre(), PDO::PARAM_STR);
        $query->bindValue(':apellido', $profesor->getApellido(), PDO::PARAM_STR);
        $query->bindValue(':recovery_token', $profesor->getRecovery_token(), PDO::PARAM_STR);
        $query->bindValue(':id_centro', $profesor->getId_centro(), PDO::PARAM_STR);
        $query->bindValue(':email2', $profesor->getEmail());
        return $query->execute();
    }
    static public function deleteProfesor($bd, $email){
        $sql = "DELETE FROM `profesor` WHERE email = :email;";
        $query = $bd->prepare($sql);
        $query->bindValue(':email',$email);
        return $query->execute();
    }   
}