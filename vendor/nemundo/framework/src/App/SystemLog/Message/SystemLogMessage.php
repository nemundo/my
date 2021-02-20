<?php

namespace Nemundo\App\SystemLog\Message;


use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\SystemLog\Data\Log\Log;
use Nemundo\App\SystemLog\Type\AbstractLogType;
use Nemundo\App\SystemLog\Type\ErrorLogType;
use Nemundo\App\SystemLog\Type\InformationLogType;
use Nemundo\App\SystemLog\Type\WarningLogType;
use Nemundo\Core\Base\AbstractBaseClass;

// LogMessage
class SystemLogMessage extends AbstractBaseClass
{

    /**
     * @var AbstractApplication
     */
    public $application;


    public function __construct(AbstractApplication $application = null)
    {
        $this->application = $application;
    }


    public function logInformation($message)
    {
        $this->logMessage(new InformationLogType(), $message);
    }


    public function logWarning($message)
    {
        $this->logMessage(new WarningLogType(), $message);
    }


    public function logError($message)
    {
        $this->logMessage(new ErrorLogType(), $message);
    }


    private function logMessage(AbstractLogType $logType, $message)
    {

        $data = new Log();

        if ($this->application !== null) {
            $data->applicationId = $this->application->applicationId;
        }
        $data->logTypeId = $logType->id;
        $data->message = $message;
        $data->save();

    }

}