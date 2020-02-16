<?php

use yii\db\Migration;

/**
 * Handles the creation of table `task_type`.
 */
class m444444_444444_create_task_type_table extends Migration
{
    const TABLE = 'task_type';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE, [
            'id' => $this->primaryKey(),
            'type' => $this->string(255)->notNull(),
        ]);

        /*$this->insert(self::TABLE, [
            'type' => 'Важная',
        ]);*/

        $this->batchInsert(self::TABLE, ['type'], [
          ['Важная'],
          ['Менее важная'],
          ['Не важная'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       // $this->delete(self::TABLE, ['id' => 1]);
        $this->delete(self::TABLE, ['in', 'type', [
           'Важная',
           'Менее важная',
           'Не важная',
        ]]);
        $this->dropTable(self::TABLE);
    }
}
