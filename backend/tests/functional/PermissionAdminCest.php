<?php


namespace backend\tests\Functional;

use backend\tests\FunctionalTester;

class PermissionAdminCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amLoggedInAs(24);
        $I->amOnRoute('/site/index');
    }

    // tests
    public function AirplaneIndex(FunctionalTester $I)
    {
        $I->click('Airplanes');
        $I->dontSee('Access denied');
        $I->dontSee('Forbidden');
    }

    public function AirplaneCreate(FunctionalTester $I)
    {
        $I->amOnRoute('/airplane/create');
        $I->dontSee('Access denied');
        $I->dontSee('Forbidden');
    }

    public function AirplaneUpdate(FunctionalTester $I)
    {
        $I->amOnRoute('/airplane/update?id=3');
        $I->dontSee('Access denied');
        $I->dontSee('Forbidden');
    }

    public function AirplaneView(FunctionalTester $I)
    {
        $I->amOnRoute('/airplane/view?id=3');
        $I->dontSee('Access denied');
        $I->dontSee('Forbidden');
    }

    public function AirplaneDelete(FunctionalTester $I)
    {
        $I->amOnRoute('/airplane/delete?id=3');
        $I->dontSee('Access denied');
        $I->dontSee('Forbidden');
    }

    // tests
    public function AirportIndex(FunctionalTester $I)
    {
        $I->click('Airports');
        $I->dontSee('Access denied');
        $I->dontSee('Forbidden');
    }

    public function AirportCreate(FunctionalTester $I)
    {
        $I->amOnRoute('/airport/create');
        $I->dontSee('Access denied');
        $I->dontSee('Forbidden');
    }

    public function AirportUpdate(FunctionalTester $I)
    {
        $I->amOnRoute('/airport/update?id=5');
        $I->dontSee('Access denied');
        $I->dontSee('Forbidden');
    }

    public function AirportView(FunctionalTester $I)
    {
        $I->amOnRoute('/airport/view?id=5');
        $I->dontSee('Access denied');
        $I->dontSee('Forbidden');
    }

    public function AirportDelete(FunctionalTester $I)
    {
        $I->amOnRoute('/airport/delete?id=5');
        $I->dontSee('Access denied');
        $I->dontSee('Forbidden');
    }

    // tests
    public function BalanceReqIndex(FunctionalTester $I)
    {
        $I->click('Balance Requests');
        $I->dontSee('Access denied');
        $I->dontSee('Forbidden');
    }

    public function BalanceReqCreate(FunctionalTester $I)
    {
        $I->amOnRoute('/balance-req/accept');
        $I->dontSee('Access denied');
        $I->dontSee('Forbidden');
    }

    public function BalanceReqUpdate(FunctionalTester $I)
    {
        $I->amOnRoute('/balance-req/decline');
        $I->dontSee('Access denied');
        $I->dontSee('Forbidden');
    }

    public function BalanceReqView(FunctionalTester $I)
    {
        $I->amOnRoute('/balance-req/view');
        $I->dontSee('Access denied');
        $I->dontSee('Forbidden');
    }

    public function BalanceReqHistory(FunctionalTester $I)
    {
        $I->amOnRoute('/balance-req/history');
        $I->dontSee('Access denied');
        $I->dontSee('Forbidden');
    }
}
