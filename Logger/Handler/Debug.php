<?php

namespace Punchout2Go\Xframe\Logger\Handler;

use Magento\Framework\Logger\Handler\Base;
use Monolog\Logger;

class Debug extends Base
{

    public $log_to_punchout = 0;

    /** @var */
    protected static $timezone;

    /** @var string */
    protected $name = 'Punchout2Go_Punchout';

    /**
     * Logging level
     *
     * @var int
     */
    protected $loggerType = Logger::DEBUG;

    /**
     * File name
     *
     * @var string
     */
    protected $fileName = '/var/log/punchout2go_xframe_debug.log';

    protected $punchout_fileName = '/var/log/punchout2go_punchout_debug.log';

    public function simple_log($message, array $context = array())
    {
        //if ($this->log_to_punchout) { // set log file to punchout log file
        //    $this->fileName = $this->punchout_fileName;
        //}

        (new \Monolog\Logger($this->name, [$this]))->addRecord($this->loggerType, (string) $message, $context);
    }
}
