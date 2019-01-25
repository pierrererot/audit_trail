<?php

namespace app\modules\audit_trail\lib;

use yii\base\Event;
use yii\helpers\ArrayHelper;


/**
 * Class EventHandler
 * @package app\modules\audit_trail\lib
 *
 * @todo en faire un singleton
 */
class EventHandler
{
    /** @var  string */
    protected $transactionId;

    /**
     * EventHandler constructor.
     */
    public function __construct()
    {
        // On renseigne un identifiant de transaction qui sera utilisé pour toutes les notification de cette requête
        list($usec, $sec) = explode(" ", microtime());
        $this->transactionId = $sec . ($usec * 1000000) . rand();
    }

    /**
     * Abonnement du gestionnaire à une liste d'événements
     *
     * @param array $eventsMap
     */
    public function attachEvents(array $eventsMap)
    {
        foreach ($eventsMap as $config) {
            $eventClassName = $config['class'];
            $eventName = $config['name'];
            $methodName = ArrayHelper::getValue($config, 'method', 'addMonitoring');
            Event::on($eventClassName, $eventName, [$this, $methodName]);
        }
    }
}