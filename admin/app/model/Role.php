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
            // insert
            $sql = "SELECT `id`, `name` FROM `roles` AS `r` WHERE `r`.`name` = :nameRole LIMIT 1";
        } else {
            // update
            $sql = "SELECT `id`, `name` FROM `roles` AS `r` WHERE `r`.`name` = :nameRole AND `r`.`id` != :id LIMIT 1";
        }

        $stmt = $this->db->prepare($sql);
        if ($stmt) {
            $stmt->bindParam(':nameRole', $name, PDO::PARAM_STR);
            if ($id !== 0) {
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            }
            if ($stmt->execute()) {
                if ($stmt->rowCount() > 0) {
                    $flagCheck = true;
                }
                $stmt->closeCursor();
            }
        }
        return $flagCheck;
    }

    public function insertRole($name, $des)
    {
        $flagCheck = false;
        $status = 1;
        $createdAt = date('Y-m-d H:i:s');
        $updatedAt = null;
        $deletedAt = null;
        $sql = "INSERT INTO `roles`(`name`,`description`,`status`,`created_at`,`updated_at`,`deleted_at`) VALUES(:nameRole, :descriptions, :statusRole, :created_at, :updated_at, :deleted_at)";

        $stmt = $this->db->prepare($sql);
        if ($stmt) {
            $stmt->bindParam(':nameRole', $name, PDO::PARAM_STR);
            $stmt->bindParam(':descriptions', $des, PDO::PARAM_STR);
            $stmt->bindParam(':statusRole', $status, PDO::PARAM_INT);
            $stmt->bindParam(':created_at', $createdAt, PDO::PARAM_STR);
            $stmt->bindParam(':updated_at', $updatedAt, PDO::PARAM_STR);
            $stmt->bindParam(':deleted_at', $deletedAt, PDO::PARAM_STR);
            if ($stmt->execute()) {
                $flagCheck = true;
                $stmt->closeCursor();
            }
        }
        return $flagCheck;
    }
    public function getDataRolePaging()
    {
        $data = [];
        $sql = "SELECT * FROM `roles`";
        $stmt = $this->db->prepare($sql);
        if ($stmt) {
            if ($stmt->execute()) {
                $stmt->rowCount() > 0; {
                    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $stmt->closeCursor();
                }
            }
        }
        return ($data);
    }

    public function getDataRoleById($id)
    {
        $info = [];
        $sql = "SELECT * FROM `roles` WHERE `id` = :id";
        $stmt = $this->db->prepare($sql);
        if ($stmt) {
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            if ($stmt->execute()) {
                $info = $stmt->fetch(PDO::FETCH_DEFAULT);
                $stmt->closeCursor();
            }
        }
        return $info;
    }
}
