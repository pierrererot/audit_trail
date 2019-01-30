<?php

namespace app\modules\audit_trail\models;

use app\modules\audit_trail\models\query\AuditTrailQuery;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

use app\modules\audit_trail\Module as Module;
use app\modules\ia\Module as IA;

/**
 * This is the model class for table "audit_trail".
 *
 * @property string  $id
 * @property string  $transaction_id
 * @property integer $user_id
 * @property string  $user_information
 * @property string  $event_id
 * @property string  $message
 * @property string  $informations
 * @property string  $created_at
 */
class AuditTrail extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'audit_trail';
    }

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(), [
                [
                    'class' => TimestampBehavior::className(),
                    'value' => function () {
                        return date('Y-m-d H:i:s');
                    },
                ],
            ]
        );
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['transaction_id', 'user_id'], 'required'],
            [['transaction_id', 'user_information', 'event', 'context', 'message', 'data'], 'string'],
            [['user_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Module::t('labels', 'User ID'),
            'transaction_id' => Module::t('labels', 'Transaction ID'),
            'user_information' => Module::t('labels', 'User Information'),
            'event' => Module::t('labels', 'Event Type'),
            'context' => Module::t('labels', 'Context Type'),
            'message' => Module::t('labels', 'Message'),
            'data' => Module::t('labels', 'Data'),
            'created_at' => IA::t('labels', 'Created At'),
            'updated_at' => IA::t('labels', 'Created At'),
        ];
    }

    /**
     * @inheritdoc
     * @return AuditTrailQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AuditTrailQuery(get_called_class());
    }
}
