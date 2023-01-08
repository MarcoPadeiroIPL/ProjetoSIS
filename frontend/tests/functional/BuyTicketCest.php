<?php


namespace frontend\tests\Functional;

use frontend\tests\FunctionalTester;

class BuyTicketCest
{
    protected $formId = '';

    public function _before(FunctionalTester $I)
    {
        $I->amLoggedInAs(120);
        $I->amOnRoute('flight/select-flight?airportDeparture_id=5&airportArrival_id=19&departureDate=2023%2F10%2F10');
    }

    // tests
    public function SelectEconomicFlight(FunctionalTester $I)
    {
        $I->click('#economicPrice');
        $I->see('Ticket');
    }

    public function SelectNormalFlight(FunctionalTester $I)
    {
        $I->click('#normalPrice');
        $I->see('Ticket');
    }

    public function SelectLuxuryFlight(FunctionalTester $I)
    {
        $I->click('#luxuryPrice');
        $I->see('Ticket');
    }

    public function DontFillSeats(FunctionalTester $I)
    {
        $this->SelectNormalFlight($I);
        $I->submitForm('#form-buyTicket', [
            'TicketBuilder[fName]' => 'john', 
            'TicketBuilder[surname]' => 'man', 
            'TicketBuilder[age]' => 12, 
            'TicketBuilder[gender]' => 'M', 
        ]);
        $I->dontSee('First Name cannot be blank.');
        $I->dontSee('Surname cannot be blank.');
        $I->dontSee('Age cannot be blank.');
        $I->see('Seat Col cannot be blank.');
        $I->see('Seat Linha cannot be blank.');
    }
    
    public function DontFillUserInfo(FunctionalTester $I)
    {
        $this->SelectNormalFlight($I);
        $I->submitForm('#form-buyTicket', [
            'TicketBuilder[seatCol]' => 4, 
            'TicketBuilder[seatLinha]' => 'A', 
        ]);
        $I->see('First Name cannot be blank.');
        $I->see('Surname cannot be blank.');
        $I->see('Age cannot be blank.');
        $I->dontSee('Seat Col cannot be blank.');
        $I->dontSee('Seat Linha cannot be blank.');
    }

    public function ChooseWrongSeat(FunctionalTester $I)
    {
        $this->SelectNormalFlight($I);
        $I->submitForm('#form-buyTicket', [
            'TicketBuilder[fName]' => 'john', 
            'TicketBuilder[surname]' => 'man', 
            'TicketBuilder[age]' => 12, 
            'TicketBuilder[gender]' => 'M', 
            'TicketBuilder[seatCol]' => 4, 
            'TicketBuilder[seatLinha]' => 'A', 
        ]);
        $I->see('You need to choose a ');
    }

    public function ValidInput(FunctionalTester $I)
    {
        $this->SelectNormalFlight($I);
        $I->submitForm('#form-buyTicket', [
            'TicketBuilder[fName]' => 'john', 
            'TicketBuilder[surname]' => 'man', 
            'TicketBuilder[age]' => 12, 
            'TicketBuilder[gender]' => 'M', 
            'TicketBuilder[seatCol]' => 4, 
            'TicketBuilder[seatLinha]' => 'F', 
            'TicketBuilder[luggage_2]' => 1, 
        ]);
        $I->see('Pay');
    }
}
