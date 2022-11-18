<?php

namespace backend\helpers;

class TableBuilder
{
    private $array;
    private $header;

    public function __construct($header, $arr)
    {
        $this->array = $arr;
        $this->header = $header;
    }

    public function generate()
    {
        $this->generateHeader();

        $this->generateBody();

        $this->closeTable();
    }

    private function generateHeader()
    {
        echo '<div class="container shadow">';
        echo '<div class="row text-white bg-dark rounded">';
        foreach ($this->header as $val) {
            echo '<div class="col">' . $val . '</div>';
        }
        echo '</div>';
    }

    private function generateBody()
    {
        foreach ($this->array as $row) {
            echo '<div class="row rounded">';
            foreach ($this->header as $key => $x) {
                if (isset($row[$key]))
                    echo '<div class="col">' . $row[$key] . '</div>';
                else
                    echo '<div class="col">(Not Set)</div>';
            }
            echo '</div>';
        }
    }

    private function closeTable()
    {
        echo '</div>';
    }
}
