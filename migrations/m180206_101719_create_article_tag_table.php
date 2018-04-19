<?php

use yii\db\Migration;

/**
 * Handles the creation of table `article_tag`.
 */
class m180206_101719_create_article_tag_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('article_tag', [
            'id' => $this->primaryKey(),
            'article_id' => $this->integer(),
            'tag_id' => $this->integer(),
        ]);
        
        //create index for column 'user_id'
        
        $this->createIndex(
            'idx-post-user_id',
            'comment',
            'article_id'
        );
        
        // add foregin key for table 'user'
        
        $this->addForeginKey(
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
        
        $this->addForeginKey(
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
        $this->dropTable('article_tag');
    }
}
