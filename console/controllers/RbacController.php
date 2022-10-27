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

        // CRUD Admin
        $createAdmin = $auth->createPermission('createAdmin');
        $createAdmin->description = 'Create a Admin';
        $auth->add($createAdmin);

        $readAdmin = $auth->createPermission('readAdmin');
        $readAdmin->description = 'Read a Admin';
        $auth->add($readAdmin);

        $updateAdmin = $auth->createPermission('updateAdmin');
        $updateAdmin->description = 'Update a Admin';
        $auth->add($updateAdmin);

        $deleteAdmin = $auth->createPermission('deleteAdmin');
        $deleteAdmin->description = 'Delete a Admin';
        $auth->add($deleteAdmin);

        // CRUD Client
        $createClient = $auth->createPermission('createClient');
        $createClient->description = 'Create a Client';
        $auth->add($createClient);

        $readClient = $auth->createPermission('readClient');
        $readClient->description = 'Read a Client';
        $auth->add($readClient);

        $updateClient = $auth->createPermission('updateClient');
        $updateClient->description = 'Update a Client';
        $auth->add($updateClient);

        $deleteClient = $auth->createPermission('deleteClient');
        $deleteClient->description = 'Delete a Client';
        $auth->add($deleteClient);

        // CRUD Employee
        $createEmployee = $auth->createPermission('createEmployee');
        $createEmployee->description = 'Create a Employee';
        $auth->add($createEmployee);

        $readEmployee = $auth->createPermission('readEmployee');
        $readEmployee->description = 'Read a Employee';
        $auth->add($readEmployee);

        $updateEmployee = $auth->createPermission('updateEmployee');
        $updateEmployee->description = 'Update a Employee';
        $auth->add($updateEmployee);

        $deleteEmployee = $auth->createPermission('deleteEmployee');
        $deleteEmployee->description = 'Delete a Employee';
        $auth->add($deleteEmployee);

        // CRUD Ticket
        $createTicket = $auth->createPermission('createTicket');
        $createTicket->description = 'Create a Ticket';
        $auth->add($createTicket);

        $readTicket = $auth->createPermission('readTicket');
        $readTicket->description = 'Read a Ticket';
        $auth->add($readTicket);

        $updateTicket = $auth->createPermission('updateTicket');
        $updateTicket->description = 'Update a Ticket';
        $auth->add($updateTicket);

        $deleteTicket = $auth->createPermission('deleteTicket');
        $deleteTicket->description = 'Delete a Ticket';
        $auth->add($deleteTicket);

        // CRUD Airport
        $createAirport = $auth->createPermission('createAirport');
        $createAirport->description = 'Create a Airport';
        $auth->add($createAirport);

        $readAirport = $auth->createPermission('readAirport');
        $readAirport->description = 'Read a Airport';
        $auth->add($readAirport);

        $updateAirport = $auth->createPermission('updateAirport');
        $updateAirport->description = 'Update a Airport';
        $auth->add($updateAirport);

        $deleteAirport = $auth->createPermission('deleteAirport');
        $deleteAirport->description = 'Delete a Airport';
        $auth->add($deleteAirport);

        // CRUD Airplane
        $createAirplane = $auth->createPermission('createAirplane');
        $createAirplane->description = 'Create a Airplane';
        $auth->add($createAirplane);

        $readAirplane = $auth->createPermission('readAirplane');
        $readAirplane->description = 'Read a Airplane';
        $auth->add($readAirplane);

        $updateAirplane = $auth->createPermission('updateAirplane');
        $updateAirplane->description = 'Update a Airplane';
        $auth->add($updateAirplane);

        $deleteAirplane = $auth->createPermission('deleteAirplane');
        $deleteAirplane->description = 'Delete a Airplane';
        $auth->add($deleteAirplane);

        // CRUD Flight
        $createFlight = $auth->createPermission('Create a Flight');
        $createFlight ->description = 'Create a Flight';
        $auth->add($createFlight);

        $readFlight = $auth->createPermission('readFlight');
        $readFlight->description = 'Read a Flight';
        $auth->add($readFlight);

        $updateFlight = $auth->createPermission('updateFlight');
        $updateFlight->description = 'Update a Flight';
        $auth->add($updateFlight);

        $deleteFlight = $auth->createPermission('deleteFlight');
        $deleteFlight->description = 'Delete a Flight';
        $auth->add($deleteFlight);
    }
}
