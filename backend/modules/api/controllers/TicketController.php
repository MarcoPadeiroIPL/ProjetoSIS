<?php

namespace backend\modules\api\controllers;

use yii\rest\ActiveController;

class TicketController extends ActiveController
{
    public $modelClass = 'common\models\Ticket';
}
