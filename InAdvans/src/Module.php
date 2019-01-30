<?php

namespace app\modules\audit_trail;

use app\modules\audit_trail\lib\EventHandler;
use Yii;


/**
 * audit_trail module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\audit_trail\controllers';

    /** @var array */
    public $defaultEvents = [];

    /** @var string */
    public $eventHandlerClass = 'app\modules\audit_trail\lib\EventHandler';

    /** @var EventHandler */
    private $eventHandler;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // Initialisation du raccourci pour les traductions
        $this->registerTranslations();

        // On se met à l'écoute des événements à pister
        $this->eventHandler = Yii::createObject(['class' => $this->eventHandlerClass]);
        $this->eventHandler->attachEvents($this->defaultEvents);
    }

    /**
     *
     */
    public function registerTranslations()
    {
        Yii::$app->i18n->translations['modules/audit_trail/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@app/modules/audit_trail/messages',
            'fileMap' => [
                'modules/audit_trail/labels' => 'labels.php',
                'modules/audit_trail/messages' => 'messages.php',
            ],
        ];
    }

    /**
     * @param string $category
     * @param string $message
     * @param array  $params
     * @param string $language
     * @return mixed
     */
    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('modules/audit_trail/' . $category, $message, $params, $language);
    }

}
