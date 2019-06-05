<?php
/**
 * EasePHPbricks - GDPR Logger
 *
 * Please apply db/migrations/20180407035009_user_log.php phinx migration to use
 * 
 * @author     Vítězslav Dvořák <vitex@arachne.cz>
 * @copyright  2016-2017 Vitex Software
 */

namespace Ease;

/**
 * Description of CustomerLog
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class GdprLog extends \Ease\Brick
{
    /**
     * Administrator invoked
     * @var int 
     */
    public $administrators_id = null;

    /**
     * Current Customer
     * @var int 
     */
    public $customers_id = null;

    /**
     * Default venue
     * @var string 
     */
    public $venue = null;

    /**
     * Log Customer events
     * 
     * @param string $venue       current url is used as default  
     * @param int    $customers_id current logged user id is used as default
     * @param int    $administrators_id
     */
    public function __construct($venue = null, $customers_id = null,
                                $administrators_id = null)
    {
        parent::__construct();
        $this->setVenue($venue);
        $this->setCustomerID($customers_id);
        $this->setAdministratorID(empty($administrators_id) ? 0 : $administrators_id );
        $this->takemyTable('user_log');
    }

    /**
     * Log An event
     * 
     * @param string $question          What is Subject of change
     * @param string $answer            Which change
     * @param string $venue             Location of change name
     * @param string $extId             Url of change
     * @param int    $customers_id      Affected Customer
     * @param int    $administrators_id Acting administrator
     * 
     * @return boolean success
     */
    public function logEvent($question, $answer, $venue = null, $extId = 'none',
                             $customers_id = null, $administrators_id = null)
    {
        return $this->insertToSQL([
                'customers_id' => empty($customers_id) ? $this->customers_id : $customers_id,
                'customers_id' => empty($customers_id) ? $this->customers_id : $customers_id,
                'administrators_id' => empty($administrators_id) ? $this->administrators_id
                    : $administrators_id,
                'venue' => empty($venue) ? $this->venue : $venue,
                'question' => $question,
                'answer' => $answer,
                'extid' => $extId
            ]) == 1;
    }

    /**
     * 
     * @param int $administrators_id
     */
    public function setAdministratorID($administrators_id)
    {
        $this->administrators_id = $administrators_id;
    }

    /**
     * 
     * @param string $venue
     */
    public function setVenue($venue)
    {
        if (empty($venue)) {
            $venue = \Ease\WebPage::phpSelf();
        }
        $this->venue = $venue;
    }

    /**
     * 
     * @param int $customers_id
     */
    public function setCustomerID($customers_id)
    {
        if (empty($customers_id) && isset($_SESSION['customers_id'])) {
            $customers_id = $_SESSION['customers_id'];
        }
        $this->customers_id = $customers_id;
    }

    /**
     * Log event in MySQL database
     * 
     * @param string $tableName   affected table name
     * @param string $columnName
     * @param int    $recordID
     * @param string $columnValue
     * 
     * @return boolean success
     */
    public function logMySQLEvent($tableName, $columnName, $recordID,
                                  $columnValue)
    {
        return $this->logEvent($columnName, $columnValue, null,
                self::sqlUri($tableName, $recordID, $columnName));
    }

    /**
     * Log MySQL change
     *  
     * @param array  $originalData
     * @param array  $newData
     * @param string $tableName
     * @param int    $recordID
     * @param array  $columns
     */
    public function logMySQLChange($originalData, $newData, $tableName,
                                   $recordID, $columns)
    {
        foreach ($columns as $columnName) {
            if ($originalData[$columnName] != $newData[$columnName]) {
                $this->logEvent(
                    $columnName,
                    self::recognizeOperation($columnName, $originalData,
                        $newData), null,
                    self::sqlUri($tableName, current($originalData), $columnName)
                );
            }
        }
    }

    /**
     * URI In MySQL
     * 
     * @param string $tableName
     * @param int    $recordID
     * @param string $columnName
     * 
     * @return string
     */
    static public function sqlUri($tableName, $recordID, $columnName)
    {
        return 'mysql://'.constant('DB_HOST').'/'.constant('DB_DATABASE').'/'.$tableName.'/'.$recordID.'#'.$columnName;
    }

    /**
     * Compare Old and New data to recoginze Operation type
     * 
     * @param string $columnName
     * @param array $originalData
     * @param array $newData
     * 
     * @return string update|insert|delete
     */
    static public function recognizeOperation($columnName, array $originalData,
                                              array $newData)
    {
        if (array_key_exists($columnName, $newData) && array_key_exists($columnName,
                $originalData)) {
            $operation = 'update '.$newData[$columnName];
        }
        if (array_key_exists($columnName, $newData) && !array_key_exists($columnName,
                $originalData)) {
            $operation = 'insert '.$newData[$columnName];
        }
        if (!array_key_exists($columnName, $newData) && array_key_exists($columnName,
                $originalData)) {
            $operation = 'delete';
        }
        return $operation;
    }
}
