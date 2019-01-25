<?php

namespace app\modules\audit_trail\models\query;

/**
 * This is the ActiveQuery class for [[\app\modules\audit_trail\models\AuditTrail]].
 *
 * @see \app\modules\audit_trail\models\AuditTrail
 */
class AuditTrailQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \app\modules\audit_trail\models\AuditTrail[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\modules\audit_trail\models\AuditTrail|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
