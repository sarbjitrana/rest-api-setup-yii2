<?php

use yii\db\Migration;

/**
 * Class m240513_063013_add_authKey_accessToken_to_user_table
 */
class m240513_063013_add_authKey_accessToken_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'authKey', $this->string()->defaultValue(null));
        $this->addColumn('user', 'accessToken', $this->string()->defaultValue(null));
   
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'authKey');
        $this->dropColumn('user', 'accessToken');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240513_063013_add_authKey_accessToken_to_user_table cannot be reverted.\n";

        return false;
    }
    */
}
