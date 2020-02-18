<?php

namespace SamplePrj\Model;

class AdminUser
{
    public function save(): bool
    {
        $stmt = $this->getConnection()->prepare(
            "insert into admin_user (user_id, name, email, password, created_at, modified_at) values (:user_id, :name, :email, :password, now(), now())"
        );

        $res = $stmt->execute([
            ':user_id' => $this->user_id,
            ':name' => $this->name,
            ':email' => $this->email,
            ':password' => password_hash($this->password, PASSWORD_DEFAULT),
        ]);

        return $res;
    }

    public function create(array $arrProperty): self
    {
        $adminUser = new self();

        foreach($arrProperty as $key => $value) {
            $adminUser->$key = $value;
        }

        return $adminUser->save() === true ? $adminUser : false;
    }

    protected function getConnection(): \PDO
    {
        try {
            $pdo = new \PDO(DSN, DB_USER, DB_PASSWORD);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (\PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
}