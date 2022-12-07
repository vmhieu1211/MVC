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
            $sql = "SELECT `id`, `name` FROM `roles` AS `r` WHERE `r`.`name` = :nameRole WHERE `r`.`id` != :id LIMIT 1";
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
}
