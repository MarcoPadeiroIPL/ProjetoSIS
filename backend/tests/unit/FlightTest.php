<?php


namespace backend\tests\Unit;

use backend\tests\UnitTester;
use common\models\Flight;
use common\models\Airplane;
use common\models\Airport;

class FlightTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {
    }

    // * * *TESTS* * *

    public function testValidation()
    {
        $flight = new Flight();

        // test Flight

            // Departure Date

        $flight->setDepartureDate(null);
        $this->assertFalse($flight->validate(['departureDate']));

        $flight->setDepartureDate('07-01-2022');
        $this->assertFalse($flight->validate(['departureDate']));

        $flight->setDepartureDate('2023-01-06');
        $this->assertFalse($flight->validate(['departureDate']));

        $flight->setDepartureDate('abc');
        $this->assertFalse($flight->validate(['departureDate']));

        $flight->setDepartureDate('2024-01-07');
        $this->assertTrue($flight->validate(['departureDate']));

            // Duration

        $flight->setDuration(null);
        $this->assertFalse($flight->validate(['duration']));

        $flight->setDuration('abc');
        $this->assertFalse($flight->validate(['duration']));

        $flight->setDuration('00:00:00');
        $this->assertFalse($flight->validate(['duration']));

        $flight->setDuration('00:00:01');
        $this->assertTrue($flight->validate(['duration']));

            // Airport Departure
        
        //TODO: VERIFICAR SE OS AIRPORTS NÃO SÃO ESCOLHIDOS EM DUPLICADO

        $flight->setAirportDeparture(null);
        $this->assertFalse($flight->validate(['airportDeparture']));

        $flight->setAirportDeparture('Porto');
        $this->assertTrue($flight->validate(['airportDeparture']));

            // Airport Arrival
        
        $flight->setAirportArrival(null);
        $this->assertFalse($flight->validate(['airportArrival']));

        $flight->setAirportArrival('St.PetersBurg');
        $this->assertTrue($flight->validate(['airportArrival']));
        
            // Airplane
        
        $flight->setAirplane(null);
        $this->assertFalse($flight->validate(['airplane_id']));

        $flight->setAirplane('abc');
        $this->assertFalse($flight->validate(['airplane_id']));

        $flight->setAirplane(3);
        $this->assertTrue($flight->validate(['airplane_id']));
    }
    public function testCRUD()
    {
        //Create airport entries on database

        //Entry 1
        $airport = new Airport();
        $airport->country = 'Portugal';
        $airport->code = 'PT';
        $airport->city = 'Porto';
        $airport->search = 95;
        $airport->status = 'Operational';
        $airport->save();
        //Entry 2    
        $airport = new Airport();
        $airport->country = 'Russia';
        $airport->code = 'RU';
        $airport->city = 'St.PetersBurg';
        $airport->search = 30;
        $airport->status = 'Operational';
        $airport->save();

        //Create airplane entry on database
        $airplane = new Airplane();
        $airplane->luggageCapacity = 20;
        $airplane->minLinha = 1;
        $airplane->minCol = 'A';
        $airplane->maxLinha = 6;
        $airplane->maxCol = 'F';
        $airplane->economicStart = 'A';
        $airplane->economicStop = 'B';
        $airplane->normalStart = 'C';
        $airplane->normalStop = 'D';
        $airplane->luxuryStart = 'E';
        $airplane->luxuryStop = 'F';
        $airplane->status = 'Active';
        $airplane->save();

        //Create flight entry on database
        $flight = new Flight();
        $flight->departureDate = '2024-01-07';
        $flight->duration = '00:00:00';
        $flight->airportDeparture = 'Porto';
        $flight->airportArrival = 'St.PetersBurg';
        $flight->status = 'Available';
        $flight->airplane_id = 1;
        $flight->save();

        // save test
        $flight = new Flight();

        $flight->status = 'Available';
        $flight->save();
        $this->tester->seeRecord('common\models\Flight', ['id' => $flight->id]);

        // update test
        $flight = $this->tester->grabRecord('common\models\Flight', ['status' => $flight->status]);

        $flight->setAttribute('status', 'Complete');
        $flight->save();

        $this->tester->dontseeRecord('common\models\Flight', ['status' => 'Available']);
        $this->tester->seeRecord('common\models\Flight', ['status' => 'Complete']);

        // delete test
        $flight->delete();
        $this->tester->dontseeRecord('common\models\Flight', ['status' => 'Complete']);

    }
}
