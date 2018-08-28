<?php

use yii\db\Migration;

class m180828_031441_auth_item extends Migration
{
    public function up()
    {
        /* 取消外键约束 */
        $this->execute('SET foreign_key_checks = 0');
        
        /* 创建表 */
        $this->createTable('{{%auth_item}}', [
            'name' => 'varchar(64) NOT NULL',
            'type' => 'smallint(6) NOT NULL',
            'description' => 'text NULL',
            'rule_name' => 'varchar(64) NULL',
            'data' => 'blob NULL',
            'created_at' => 'int(11) NULL',
            'updated_at' => 'int(11) NULL',
            'PRIMARY KEY (`name`)'
        ], "ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");
        
        /* 索引设置 */
        $this->createIndex('rule_name','{{%auth_item}}','rule_name',0);
        $this->createIndex('idx-auth_item-type','{{%auth_item}}','type',0);
        
        /* 外键约束设置 */
        $this->addForeignKey('fk_auth_rule_0374_00','{{%auth_item}}', 'rule_name', '{{%auth_rule}}', 'name', 'CASCADE', 'CASCADE' );
        
        /* 表数据 */
        $this->insert('{{%auth_item}}',['name'=>'/*','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080482','updated_at'=>'1535080482']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/*','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/assignment/*','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/assignment/assign','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/assignment/index','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/assignment/revoke','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/assignment/view','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/default/*','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/default/index','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/menu/*','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/menu/create','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/menu/delete','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/menu/index','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/menu/update','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/menu/view','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/permission/*','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/permission/assign','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/permission/create','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/permission/delete','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/permission/index','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/permission/remove','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/permission/update','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/permission/view','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/role/*','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/role/assign','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/role/create','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/role/delete','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/role/index','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/role/remove','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/role/update','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/role/view','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/route/*','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/route/assign','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/route/create','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/route/index','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/route/refresh','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/route/remove','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/rule/*','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/rule/create','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/rule/delete','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/rule/index','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/rule/update','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/rule/view','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/user/*','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/user/activate','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/user/change-password','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/user/delete','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/user/index','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/user/login','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/user/logout','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/user/request-password-reset','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/user/reset-password','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/user/signup','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/user/view','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/debug/*','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/debug/default/*','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/debug/default/db-explain','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/debug/default/download-mail','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/debug/default/index','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/debug/default/toolbar','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/debug/default/view','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/debug/user/*','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/debug/user/reset-identity','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/debug/user/set-identity','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/gii/*','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080482','updated_at'=>'1535080482']);
        $this->insert('{{%auth_item}}',['name'=>'/gii/default/*','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080482','updated_at'=>'1535080482']);
        $this->insert('{{%auth_item}}',['name'=>'/gii/default/action','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080482','updated_at'=>'1535080482']);
        $this->insert('{{%auth_item}}',['name'=>'/gii/default/diff','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080482','updated_at'=>'1535080482']);
        $this->insert('{{%auth_item}}',['name'=>'/gii/default/index','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080481','updated_at'=>'1535080481']);
        $this->insert('{{%auth_item}}',['name'=>'/gii/default/preview','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080482','updated_at'=>'1535080482']);
        $this->insert('{{%auth_item}}',['name'=>'/gii/default/view','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080482','updated_at'=>'1535080482']);
        $this->insert('{{%auth_item}}',['name'=>'/site/*','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080482','updated_at'=>'1535080482']);
        $this->insert('{{%auth_item}}',['name'=>'/site/error','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080482','updated_at'=>'1535080482']);
        $this->insert('{{%auth_item}}',['name'=>'/site/index','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080482','updated_at'=>'1535080482']);
        $this->insert('{{%auth_item}}',['name'=>'/site/login','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080482','updated_at'=>'1535080482']);
        $this->insert('{{%auth_item}}',['name'=>'/site/logout','type'=>'2','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080482','updated_at'=>'1535080482']);
        $this->insert('{{%auth_item}}',['name'=>'超级管理员','type'=>'1','description'=>NULL,'rule_name'=>NULL,'data'=>NULL,'created_at'=>'1535080894','updated_at'=>'1535080894']);
        
        /* 设置外键约束 */
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        /* 删除表 */
        $this->dropTable('{{%auth_item}}');
        $this->execute('SET foreign_key_checks = 1;');
    }
}

