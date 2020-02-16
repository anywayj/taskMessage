<?php

use yii\db\Migration;

/**
 * Handles the creation of table `task`.
 */
class m111111_111111_create_task_table extends Migration
{
    const TABLE = 'task';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE, [
            'task_id' => $this->primaryKey(),
            'task_name' => $this->string(255)->notNull(),
            'task_description' => $this->text()->notNull(),
            'task_type' => $this->integer(11)->notNull(),
            'task_start' => $this->datetime()->notNull(),
            'task_end' => $this->datetime()->notNull(),
            'task_status' => $this->smallInteger()->notNull()->defaultValue(1),    
            'task_created_at' => $this->datetime()->notNull(),
            'task_updated_at' => $this->datetime()->notNull(),
        ]);

        $this->createIndex(
            'task_type',
            self::TABLE,
            'task_type'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex(
            'task_type',
            self::TABLE
        );

        $this->dropTable(self::TABLE);
    }
}
