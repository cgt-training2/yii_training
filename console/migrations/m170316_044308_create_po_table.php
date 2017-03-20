<?php

use yii\db\Migration;

/**
 * Handles the creation of table `po`.
 */
class m170316_044308_create_po_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('po', [
            'id' => $this->primaryKey(),
            'po_no' =>$this->string()->notNull(),
            'description' =>$this->string()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('po');
    }
}
