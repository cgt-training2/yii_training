<?php

use yii\db\Migration;

/**
 * Handles the creation of table `po_item`.
 * Has foreign keys to the tables:
 *
 * - `po`
 */
class m170316_050832_create_po_item_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('po_item', [
            'id' => $this->primaryKey(),
            'po_item_no' => $this->string()->notNull(),
            'quantity' => $this->integer()->notNull(),
            'po_id' =>$this->integer()->notNull(),

        ]);

        // creates index for column `po_id`
        $this->createIndex(
            'idx-po_item-po_id',
            'po_item',
            'po_id'
        );

        // add foreign key for table `po`
        $this->addForeignKey(
            'fk-po_item-po_id',
            'po_item',
            'po_id',
            'po',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `po`
        $this->dropForeignKey(
            'fk-po_item-po_id',
            'po_item'
        );

        // drops index for column `po_id`
        $this->dropIndex(
            'idx-po_item-po_id',
            'po_item'
        );

        $this->dropTable('po_item');
    }
}
