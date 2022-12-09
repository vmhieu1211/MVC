<?php

namespace admin\app\model;

use database\Database as Model;
use \PDO;

class Role extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function checkExistNameRole($name, $id = 0)
    {
        $flagCheck = false;
        if ($id === 0) {
            //insert
            $sql = "SELECT `id`, `name` FROM `roles` AS `r` WHERE `r`.`name` = :nameRole  LIMIT 1";
        } else {
            //update
            $sql = "SELECT `id`, `name` FROM `roles` AS `r` WHERE `r`.`name` = :nameRole AND `r`.`id` != :id LIMIT 1";
        }
        $stmt = $this->db->prepare($sql);
        if ($stmt) {
            $stmt->bindParam(':nameRole', $name, PDO::PARAM_STR);
            if ($id !== 0) {
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            }
            if ($stmt->execute()) {
                if ($stmt->rowCount > 0) {
                    $flagCheck = true;
                }
                $stmt->closeCursor();
            }
        }
        return $flagCheck;
    }
    
    public function insertRole()
    {
        $flagCheck = false;
        $status = 1;
        $created_at = date('Y-m-d H:i:s');
        $updated_at = null;
        $deleted_at = null;
        $sql = "INSERT INTO `roles` (`name`,`description`, `status`,`created_at`, `updated_at`, `deleted_at`) VALUE (:nameRole, :descriptions, :statusRole, :created_at, :updated_at, :deleted_at) ";

        $stmt = $this->db->prepare($sql);
        if($stmt){
            $stmt->bindParam(':name', $name,PDO::PARAM_STR);
            $stmt->bindParam(':descriptions', $des,PDO::PARAM_STR);
            $stmt->bindParam(':statusRole', $status,PDO::PARAM_STR);
            $stmt->bindParam(':created_at', $created_at,PDO::PARAM_STR);
            $stmt->bindParam(':updated_at', $updated_at,PDO::PARAM_STR);
            $stmt->bindParam(':deleted_at', $deleted_at,PDO::PARAM_STR);
            if($stmt->execute()){
                $flagCheck = true;
                $stmt->closeCursor();
            }
        }
        return $flagCheck;
    }
}
