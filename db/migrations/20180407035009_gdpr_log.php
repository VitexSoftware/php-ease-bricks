<?php

use Phinx\Migration\AbstractMigration;

class UserLog extends AbstractMigration
{
    public $tableName = 'user_log';

    public function up()
    {
        
    }

    /**
     */
    public function change()
    {
        
        $exists = $this->hasTable($this->tableName);
        if ($exists) {
            return;
        }        
        
        $table = $this->table($this->tableName, ['comment' => 'gdpr protocol']);

        $table->addColumn('timestamp', 'datetime',
                ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('customers_id', 'integer',
                ['null' => false, 'comment' => 'affecter customer id'])
            ->addColumn('administrators_id', 'integer',
                ['null' => false, 'default' => 0, 'comment' => 'admin user id'])
            ->addColumn('venue', 'string',
                ['comment' => 'place of occurence. ex: user profile page', 'null' => false])
            ->addColumn('question', 'string',
                ['comment' => 'ex: agree with newsletter sending', 'null' => false])
            ->addColumn('answer', 'string',
                ['comment' => 'ex: yes', 'null' => false])
            ->addColumn('extid', 'string',
                ['comment' => 'ex: mysql://localhost/table/column#line', 'null' => false])
            ->addColumn('predecessor', 'string',
                ['comment' => 'checksum of previous record - blockchain glue', 'null' => true])
            ->create();


        $columnsUsed       = $table->getColumns();
        $columnsToChecksum = [];
        foreach ($columnsUsed as $columnUsed) {
            $columnsToChecksum[] = '`'.$columnUsed->getName().'`';
        }
        $this->query('INSERT INTO user_log VALUES(0,NOW(),0,0,\'dbseed\',\'established\',\'yes\',\'none\',\'NULL\')');

//        $table->insert([
//            'venue' => 'dbseed',
//            'question' => 'established',
//            'answer' => 'yes',
//            'extid' => 'none'
//        ]);


        $this->execute("

DROP FUNCTION IF EXISTS `row_checksum`;
CREATE FUNCTION row_checksum (rowno INTEGER) 
RETURNS VARCHAR(255)
DETERMINISTIC
BEGIN
    DECLARE checksum VARCHAR(255);
    SELECT SHA2( CONCAT( ".implode(',', $columnsToChecksum)." ) , 224) INTO checksum 
        FROM ".$this->tableName." WHERE id = rowno;
    RETURN checksum;
END

");
        $this->execute("
DROP TRIGGER IF EXISTS `save_checksum`;
CREATE TRIGGER `save_checksum` BEFORE INSERT ON `".$this->tableName."` 
FOR EACH ROW
BEGIN
 DECLARE lastrowid int(11);
 SELECT id 
 INTO lastrowid
 FROM ".$this->tableName." ORDER BY id DESC LIMIT 1;
 SET NEW.predecessor = row_checksum(lastrowid);
END;
");
        $this->query('INSERT INTO '.$this->tableName.' VALUES(0,NOW(),0,0,\'checksum check\',\'passed\',\'yes\',\'none\',NULL)');

//        $table->insert([
//            'venue' => 'checksum check',
//            'question' => 'passed',
//            'answer' => 'yes',
//            'extid' => 'none'
//        ]);



        $this->execute("
 CREATE TRIGGER ".$this->tableName."_upd BEFORE UPDATE ON ".$this->tableName." FOR EACH ROW
 SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Forbidden update ".$this->tableName." record';
");

        $this->execute("
 CREATE TRIGGER ".$this->tableName."_del BEFORE DELETE ON ".$this->tableName." FOR EACH ROW
 SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Forbidden delete ".$this->tableName." record';
");
    }

    public function down()
    {
        $this->exec('DROP FUNCTION IF EXISTS `row_checksum`');
    }
}
