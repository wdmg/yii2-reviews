<?php

use yii\db\Migration;

/**
 * Class m190324_125044_reviews
 */
class m190324_125044_reviews extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%reviews}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->null(),

            'name' => $this->string(32)->notNull(),
            'email' => $this->string(32)->notNull(),
            'phone' => $this->string(32)->null(),
            'photo' => $this->string(64)->null(),

            'condition' => $this->string(64)->notNull(),
            'review' => $this->text(),
            'rating' => $this->tinyInteger(1)->null()->defaultValue(0),
            'advantages' => $this->string(255)->null()->defaultValue(null),
            'disadvantages' => $this->string(255)->null()->defaultValue(null),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->datetime()->defaultExpression('CURRENT_TIMESTAMP'),
            'session' => $this->string(32)->notNull(),
            'is_published' => $this->boolean(),
        ], $tableOptions);
        
        $this->createIndex('idx_reviews_user','{{%reviews}}', ['user_id'],false);

        $this->createIndex('idx_reviews_name','{{%reviews}}', ['name'],false);
        $this->createIndex('idx_reviews_email','{{%reviews}}', ['email'],false);

        $this->createIndex('idx_reviews_condition','{{%reviews}}', ['condition'],false);
        $this->createIndex('idx_reviews_session','{{%reviews}}', ['session'],false);
        $this->createIndex('idx_reviews_published','{{%reviews}}', ['is_published'],false);

        // If exist module `Users` set foreign key `user_id` to `users.id`
        if(class_exists('\wdmg\users\models\Users') && isset(Yii::$app->modules['users'])) {
            $userTable = \wdmg\users\models\Users::tableName();
            $this->addForeignKey(
                'fk_reviews_to_users',
                '{{%reviews}}',
                'user_id',
                $userTable,
                'id',
                'NO ACTION',
                'CASCADE'
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx_reviews_user', '{{%reviews}}');
        
        $this->dropIndex('idx_reviews_name', '{{%reviews}}');
        $this->dropIndex('idx_reviews_email', '{{%reviews}}');
        
        $this->dropIndex('idx_reviews_condition', '{{%reviews}}');
        $this->dropIndex('idx_reviews_session', '{{%reviews}}');
        $this->dropIndex('idx_reviews_published', '{{%reviews}}');

        if(class_exists('\wdmg\users\models\Users') && isset(Yii::$app->modules['users'])) {
            $userTable = \wdmg\users\models\Users::tableName();
            if (!(Yii::$app->db->getTableSchema($userTable, true) === null)) {
                $this->dropForeignKey(
                    'fk_reviews_to_users',
                    '{{%reviews}}'
                );
            }
        }

        $this->truncateTable('{{%reviews}}');
        $this->dropTable('{{%reviews}}');
    }

}
