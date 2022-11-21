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
        echo '<div class="container">';
        echo '<div class="row text-white bg-dark shadow-sm rounded-top p-3">';
        foreach ($this->header as $val) {
            echo '<div class="' . $val['class'] . '">' . $val['label'] . '</div>';
        }
        echo '</div>';
    }

    private function generateBody()
    {
        foreach ($this->array as $row) {
            echo '<div class="row rounded shadow-sm mt-2 mb-2 p-3">';
            foreach ($this->header as $key) {
                if (isset($row[$key['attr']]))
                    echo '<div class="' . $key['class'] . '">' . $row[$key['attr']] . '</div>';
                else
                    echo '<div class="' . $key['class'] . '">(Not Set)</div>';
            }
            echo '</div>';
        }
    }

    private function closeTable()
    {
        echo '</div>';
    }
}
