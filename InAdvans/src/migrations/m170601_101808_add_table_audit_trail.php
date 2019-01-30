<?php

use yii\db\Migration;

/**
 * Class m170601_101808_add_table_audit_trail
 */
class m170601_101808_add_table_audit_trail extends Migration
{
    /**
     *
     */
    public function up()
    {
        $this->createTable('audit_trail', [
                'id' => $this->bigPrimaryKey(),
                'transaction_id' => $this->text()->notNull(),
                'user_id' => $this->integer()->notNull(),
                'user_information' => $this->text(),
                'context' => $this->text(),
                'event' => $this->text(),
                'data' => $this->text(),
                'message' => $this->text(),
                'created_at' => $this->dateTime(),
                'updated_at' => $this->dateTime(),
            ]
        );
    }

    /**
     *
     */
    public function down()
    {
        $this->dropTable('audit_trail');
    }

}
