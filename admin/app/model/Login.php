<?php
namespace admin\app\model;

use database\Database as Model;
use \PDO;
class Login extends Model 
{
    public function __construct()
    {
        parent:: __construct();
    }
    public function loginUser($username,$password)
    {
        // su dung thu vien PDO php de lay du lieu ra
        $dataUser = [];
        $sql = "SELECT * FROM `users` as `u` WHERE `u`.`username` = :user AND `u`.`password` = :pass AND `u`.`status` = 1 LIMIT 1";
        // :user va :pass = tham so truyen vao cau lenh sql
        //kiem tra chuoi cau lenh sql co dung hay khong?
        $stmt = $this->db->prepare($sql);
        if($stmt){
            // xu ly tiep
            // kiem tra tham so truyen vao chuoi cau lenh sql neu co
            //muc dich tranh loi bao mat: sql injection
            $stmt->bindParam(':user',$username, PDO::PARAM_STR);
            $stmt->bindParam(':pass',$password, PDO::PARAM_STR);
            // thuc thi 
            if($stmt->execute()){
                // thuc thi thanh cong
                // lay du lieu ve - vi cau lenh select luon tra ve data
                if($stmt->rowCount()>0){
                    // co data tra ve
                    $dataUser = $stmt->fetch(PDO::FETCH_ASSOC);
                    // fetch: lay ra single row
                    // fetchAll: lay ra nhieu dong du lieu
                    // PDO::FETCH_ASSOC
                    // tra du lieu ve duoi dang mang
                    // key cua mang la cac cot trong table
                }
                $stmt->closeCursor();
                // thuc thi xong - de neu con lenh sql tiep theo thi lai thuc thi tiep
            }
        }
        return $dataUser;
    }
}