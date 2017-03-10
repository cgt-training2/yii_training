<?php

use yii\db\Migration;

/**
 * Handles the creation of table `company`.
 */
class m170221_120526_create_company_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('company', [
            'Company_id' => $this->primaryKey(),
            'Company_name' => $this->string()->notNull(),
            'Company_email' => $this->string()->notNull(),
            'Company_address' => $this->string()->notNull(),
            'Company_profile' => $this->string()->notNull(),
            'Company_created' => $this->datetime()->notNull(),
            'Company_status' => "ENUM('active','inactive')",
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('company');
    }
}
