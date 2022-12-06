<?php

namespace common\helpers;

class AirplaneBuilder
{
    public static function drawAirplane($airplane)
    {
        echo '<div class="container w-25">';
        for ($i = $airplane->minCol; $i <= $airplane->maxCol; $i++) {
            echo '<div class="row p-2">';
            echo $i . '. ';
            for ($j = $airplane->minLinha; $j <= $airplane->maxLinha; $j++) {
                (new self($airplane))->availableSeat();
            }
            echo '</div>';
        }
        echo '</div>';
    }
    public static function drawFlight($flight)
    {
    }
    private static function defineSeatStatus($col, $linha)
    {
    }
    public function availableSeat()
    {
        echo '<div class="col">';
        echo '<div style="background-color: green; width:15px; height:15px"></div>';
        echo '</div>';
    }
    public function unavailableSeat()
    {
        echo '<div class="col">';
        echo '<div style="background-color: green; width:15px; height:15px"></div>';
        echo '</div>';
    }
}
