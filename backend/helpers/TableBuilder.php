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
        echo '<table class="table">';
        echo '<thead>';
        echo '<tr class="text-white bg-dark p-3">';
        foreach ($this->header as $val) {
            echo '<td class="' . $val['class'] . '">' . $val['label'] . '</td>';
        }
        echo '</tr>';
        echo '</thead>';
    }

    private function generateBody()
    {
        echo '<tbody>';
        foreach ($this->array as $row) {
            echo '<tr class="rounded shadow-sm mt-2 mb-2 p-3">';
            foreach ($this->header as $key) {
                if (isset($key['syntax'])) { // caso se queira uma syntax em especifico
                    echo '<td class="' . $key['class'] . '">';
                    foreach ($key['syntax'] as $s) {
                        if (is_numeric($s)) {
                            if (is_array($key['attr'])) {
                                echo $row[$key['attr'][$s]];
                            } else {
                                echo $row[$key['attr']];
                            }
                        } else {
                            echo $s;
                        }
                    }
                    echo '</td>';
                } else {
                    echo '<td class="' . $key['class'] . '">' . $row[$key['attr']] . '</td>';
                }
            }
            echo '</tr>';
        }
        echo '</tbody>';
    }

    private function closeTable()
    {
        echo '</table>';
    }
}
