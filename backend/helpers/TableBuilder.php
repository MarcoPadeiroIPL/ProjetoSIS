<?php

namespace backend\helpers;

use yii\bootstrap5\Html;

class TableBuilder
{
    private $array;
    private $header;
    private $buttons;

    public function __construct($header, $arr, $buttons = [])
    {
        $this->array = $arr;
        $this->header = $header;
        $this->buttons = $buttons;
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
        if (isset($this->buttons)) {
            echo '<td></td>';
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
                if (isset($key['format'])) { // caso se queira uma syntax em especifico
                    echo '<td class="' . $key['class'] . '">';
                    foreach ($key['format'] as $s) {
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
            if (isset($this->buttons)) {
                echo '<td>';
                foreach ($this->buttons as $button) {
                    //echo '<td><a href="' . $button['href'] . '" title="Create"><i class="' . $button['icon'] . '"></i></a></td>';
                    if ($button['href'] == 'delete')
                        echo Html::beginForm(['delete'], 'post') . Html::hiddenInput('user_id', $row[$button['flags']['id']]) . Html::submitButton('Delete') . Html::endForm();
                    else {
                        echo '<a href="' . $button['href'];
                        if (isset($button['flags'])) {
                            $i = 0;
                            echo '?';
                            foreach ($button['flags'] as $flag => $x) {
                                echo ($i > 0 ? '&' : '');
                                echo $flag . '=' . (isset($row[$x]) ? $row[$x] : $x);
                                $i++;
                            }
                        }
                        echo '">' . $button['icon'] . '</a>';
                    }
                }
                echo '</td>';
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
