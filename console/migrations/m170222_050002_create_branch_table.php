<?php

use yii\db\Migration;

/**
 * Handles the creation of table `branch`.
 * Has foreign keys to the tables:
 *
 * - `company_fk`
 */
class m170222_050002_create_branch_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('branch', [
            'branch_id' => $this->primaryKey(),
            'company_fk_id' => $this->integer()->notNull(),
            'branch_name' => $this->string()->notNull(),
            'branch_created' => $this->datetime()->notNull(),
            'branch_status' => "ENUM('active','inactive')",
        ]);

        // creates index for column `company_fk_id`
        $this->createIndex(
            'idx-branch-company_fk_id',
            'branch',
            'company_fk_id'
        );

        // add foreign key for table `company`
        $this->addForeignKey(
            'fk-branch-company_fk_id',
            'branch',
            'company_fk_id',
            'company',
            'Company_id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `company_fk`
        $this->dropForeignKey(
            'fk-branch-company_fk_id',
            'branch'
        );

        // drops index for column `company_fk_id`
        $this->dropIndex(
            'idx-branch-company_fk_id',
            'branch'
        );

        $this->dropTable('branch');
    }
}
