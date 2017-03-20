<?php

use yii\db\Migration;

/**
 * Handles the creation of table `department`.
 * Has foreign keys to the tables:
 *
 * - `company`
 * - `branch`
 */
class m170222_051055_create_department_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('department', [
            'department_id' => $this->primaryKey(),
            'company_fk_id' => $this->integer()->notNull(),
            'branch_fk_id' => $this->integer()->notNull(),
            'department_name' =>$this->string()->notNull(),
            'department_create' => $this->datetime()->notNull(),
            'department_status' => "ENUM('active', 'inactive')", 
        ]);

        // creates index for column `company_fk_id`
        $this->createIndex(
            'idx-department-company_fk_id',
            'department',
            'company_fk_id'
        );

        // add foreign key for table `company`
        $this->addForeignKey(
            'fk-department-company_fk_id',
            'department',
            'company_fk_id',
            'company',
            'Company_id',
            'CASCADE'
        );

        // creates index for column `branch_fk_id`
        $this->createIndex(
            'idx-department-branch_fk_id',
            'department',
            'branch_fk_id'
        );

        // add foreign key for table `branch`
        $this->addForeignKey(
            'fk-department-branch_fk_id',
            'department',
            'branch_fk_id',
            'branch',
            'branch_id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `company`
        $this->dropForeignKey(
            'fk-department-company_fk_id',
            'department'
        );

        // drops index for column `company_fk_id`
        $this->dropIndex(
            'idx-department-company_fk_id',
            'department'
        );

        // drops foreign key for table `branch`
        $this->dropForeignKey(
            'fk-department-branch_fk_id',
            'department'
        );

        // drops index for column `branch_fk_id`
        $this->dropIndex(
            'idx-department-branch_fk_id',
            'department'
        );

        $this->dropTable('department');
    }
}
