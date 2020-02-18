<?php

use Phpmig\Migration\Migration;

class AddAdminUser extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $container = $this->getContainer();
        $container['db']->query(
            "create table if not exists admin_user (
            id int not null primary key auto_increment comment 'ID'
            , created_at datetime not null comment '作成日'
            , modified_at datetime not null comment '更新日'
            , name varchar(64) not null comment '名前'
            , email varchar(128) not null comment 'メールアドレス'
            , user_id varchar(64) not null comment 'ログインID'
            , password varchar(64) not null comment 'パスワード'
            ) comment '管理ユーザー' ;"
        );
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $container = $this->getContainer();
        $container['db']->query('DROP TABLE IF EXISTS admin_user');
    }
}
