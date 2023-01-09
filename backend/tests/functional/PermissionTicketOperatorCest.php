<?php


namespace backend\tests\Functional;

use backend\tests\FunctionalTester;

class PermissionTicketOperatorCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amLoggedInAs(11);
        $I->amOnRoute('/site/index');
    }

    // tests
    public function AirplaneCRUD(FunctionalTester $I)
    {
        // index
        $I->click('/airplane/index');
        $I->dontSee('Access denied');
        $I->dontSee('Forbidden');
        // create
        $I->amOnRoute('/airplane/create');
        $I->See('Access denied');
        $I->See('Forbidden');
        // update
        $I->amOnRoute('/airplane/update');
        $I->See('Access denied');
        $I->See('Forbidden');
        // view
        $I->amOnRoute('/airplane/view');
        $I->dontSee('Access denied');
        $I->dontSee('Forbidden');
        // delete
        $I->amOnRoute('/airplane/delete');
        $I->See('Access denied');
        $I->See('Forbidden');
    }
    public function AirportCRUD(FunctionalTester $I)
    {
        // index
        $I->click('Airports');
        $I->dontSee('Access denied');
        $I->dontSee('Forbidden');
        // create
        $I->amOnRoute('/airport/create');
        $I->See('Access denied');
        $I->See('Forbidden');
        // update
        $I->amOnRoute('/airport/update');
        $I->See('Access denied');
        $I->See('Forbidden');
        // view
        $I->amOnRoute('/airport/view');
        $I->dontSee('Access denied');
        $I->dontSee('Forbidden');
        // delete
        $I->amOnRoute('/airport/delete');
        $I->See('Access denied');
        $I->See('Forbidden');
    }

    public function BalanceReqCRUD(FunctionalTester $I)
    {
        // index
        $I->click('/balance-req/index');
        $I->See('Access denied');
        $I->See('Forbidden');
        // accept
        $I->amOnRoute('/balance-req/accept');
        $I->See('Access denied');
        $I->See('Forbidden');
        // decline
        $I->amOnRoute('/balance-req/decline');
        $I->See('Access denied');
        $I->See('Forbidden');
        // history
        $I->amOnRoute('/balance-req/history');
        $I->See('Access denied');
        $I->See('Forbidden');
    }
    public function ClientCRUD(FunctionalTester $I)
    {
        // index
        $I->click('Clients');
        $I->dontSee('Access denied');
        $I->dontSee('Forbidden');
        // create
        $I->amOnRoute('/client/create');
        $I->See('Access denied');
        $I->See('Forbidden');
        // update
        $I->amOnRoute('/client/update');
        $I->See('Access denied');
        $I->See('Forbidden');
        // view
        $I->amOnRoute('/client/view');
        $I->dontSee('Access denied');
        $I->dontSee('Forbidden');
        // delete
        $I->amOnRoute('/client/delete');
        $I->See('Access denied');
        $I->See('Forbidden');
    }
    public function ConfigCRUD(FunctionalTester $I)
    {
        // index
        $I->click('Luggage');
        $I->dontSee('Access denied');
        $I->dontSee('Forbidden');
        // create
        $I->amOnRoute('/config/create');
        $I->See('Access denied');
        $I->See('Forbidden');
        // update
        $I->amOnRoute('/config/update');
        $I->See('Access denied');
        $I->See('Forbidden');
        // view
        $I->amOnRoute('/config/view');
        $I->dontSee('Access denied');
        $I->dontSee('Forbidden');
        // delete
        $I->amOnRoute('/config/delete');
        $I->See('Access denied');
        $I->See('Forbidden');
    }
    public function EmployeeCRUD(FunctionalTester $I)
    {
        // index
        $I->click('/employee/index');
        $I->See('Access denied');
        $I->See('Forbidden');
        // create
        $I->amOnRoute('/employee/create');
        $I->See('Access denied');
        $I->See('Forbidden');
        // update
        $I->amOnRoute('/employee/update');
        $I->See('Access denied');
        $I->See('Forbidden');
        // view
        $I->amOnRoute('/employee/view');
        $I->dontSee('Access denied');
        $I->dontSee('Forbidden');
        // delete
        $I->amOnRoute('/employee/delete');
        $I->See('Access denied');
        $I->See('Forbidden');
        // activate
        $I->amOnRoute('/employee/activate');
        $I->See('Access denied');
        $I->See('Forbidden');
    }
    public function FlightCRUD(FunctionalTester $I)
    {
        // index
        $I->click('Flights');
        $I->dontSee('Access denied');
        $I->dontSee('Forbidden');
        // create
        $I->amOnRoute('/flight/create');
        $I->See('Access denied');
        $I->See('Forbidden');
        // update
        $I->amOnRoute('/flight/update');
        $I->See('Access denied');
        $I->See('Forbidden');
        // view
        $I->amOnRoute('/flight/view');
        $I->dontSee('Access denied');
        $I->dontSee('Forbidden');
        // delete
        $I->amOnRoute('/flight/delete');
        $I->See('Access denied');
        $I->See('Forbidden');
    }
    public function ReceiptCRUD(FunctionalTester $I)
    {
        // index
        $I->amOnRoute('/receipt/index');
        $I->See('Access denied');
        $I->See('Forbidden');
        // view
        $I->amOnRoute('/receipt/view');
        $I->See('Access denied');
        $I->See('Forbidden');
    }
    public function RefundCRUD(FunctionalTester $I)
    {
        // index
        $I->click('/refunds/index');
        $I->See('Access denied');
        $I->See('Forbidden');
        // view
        $I->amOnRoute('/refund/view');
        $I->See('Access denied');
        $I->See('Forbidden');
        // update
        $I->amOnRoute('/refund/update');
        $I->See('Access denied');
        $I->See('Forbidden');
    }

    public function TicketCRUD(FunctionalTester $I)
    {
        // index
        $I->amOnRoute('/ticket/index');
        $I->dontSee('Access denied');
        $I->dontSee('Forbidden');
        // view
        $I->amOnRoute('/ticket/view');
        $I->dontSee('Access denied');
        $I->dontSee('Forbidden');
    }
}
