<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comment`.
 */
class m180206_101644_create_comment_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('comment', [
            'id' => $this->primaryKey(),
            'text' => $this->string(),
            'user_id' => $this->integer(),
            'article_id' => $this->integer(),
            'status' => $this->integer(),
            'date' => $this->date(),
        ]);
        
        //create index for column 'user_id'
        
        $this->createIndex(
            'idx-post-user_id',
            'comment',
            'article_id'
        );
        
        // add foregin key for table 'user'
        
        $this->addForeignKey(
            'fk-post-user_id',
            'comment',
            'article_id',
            'article',
            'id',
            'CASCADE'
        );
        
        //create index for table 'article_id'
        
        $this->createIndex(
            'idx-article_id',
            'comment',
            'article_id'
        );
        
        // add foregin key for table 'article'
        
        $this->addForeignKey(
            'fk-article_id',
            'comment',
            'article_id',
            'article',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('comment');
    }
}
