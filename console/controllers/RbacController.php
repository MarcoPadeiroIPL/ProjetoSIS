<?php

namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();

        $permissions = array(
            'createAdmin',      'readAdmin',        'listAdmin',        'updateAdmin',      'deleteAdmin',
            'createClient',     'readClient',       'listClient',       'updateClient',     'deleteClient',
            'createEmployee',   'readEmployee',     'listEmployee',     'updateEmployee',   'deleteEmployee',
            'createTicket',     'readTicket',       'listTicket',       'updateTicket',     'deleteTicket',
            'createAirport',    'readAirport',      'listAirport',      'updateAirport',    'deleteAirport',
            'createAirplane',   'readAirplane',     'listAirplane',     'updateAirplane',   'deleteAirplane',
            'createFlight',     'readFlight',       'listFlight',       'updateFlight',     'deleteFlight',
            'createTariff',     'readTariff',       'listTariff',       'updateTariff',     'deleteTariff',
            'createBalanceReq', 'readBalanceReq',   'listBalanceReq',   'updateBalanceReq',
            'createConfig',     'readConfig',       'listConfig',       'updateConfig',     'deleteConfig',
        );

        $roles = array('admin', 'supervisor', 'ticket operator', 'luggage operator', 'client');

        $this->createPermissions($auth, $permissions);
        $this->createRoles($auth, $roles);
    }
    public function createPermissions($auth, $permissions = [])
    {
        if (sizeof($permissions) == 0)
            return 0;

        foreach ($permissions as $permission) {
            $temp = $auth->createPermission($permission);
            $auth->add($temp);
        }
    }
    public function createRoles($auth, $roles = [])
    {
        if (sizeof($roles) == 0)
            return 0;

        foreach ($roles as $role) {
            $temp = $auth->createRole($role);
            $auth->add($temp);
        }
    }
}
