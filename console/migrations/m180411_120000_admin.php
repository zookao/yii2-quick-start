<?php

use yii\db\Migration;

class m180411_120000_admin extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%admin}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->batchInsert('{{%admin}}', [
                'id',
                'username',
                'auth_key',
                'password_hash',
                'password_reset_token',
                'email',
                'status',
                'created_at',
                'updated_at'
            ], [
                [
                    null,
                    'admin',
                    'BAscckbHf91npOYsxfv6KCxY-nqIM5M3',
                    '$2y$13$Vvz4uhHGXNKyqTdzbBvq/OUkfrw3yLqQ108qemPF5Il2lr.GgEl9K',
                    NULL,
                    'czc@czc.com',
                    10,
                    time(),
                    time()
                ],
            ]);

    }
}
