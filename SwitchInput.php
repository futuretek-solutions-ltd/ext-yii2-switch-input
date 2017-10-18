<?php

namespace futuretek\switchinput;

use yii\helpers\Html;

/**
 * Class SwitchInput
 *
 * @package futuretek\switchinput
 * @author  Petr Compel <petr.compel@futuretek.cz>
 * @license https://www.apache.org/licenses/LICENSE-2.0.html Apache-2.0
 * @link    http://www.futuretek.cz
 */
class SwitchInput extends \kartik\switchinput\SwitchInput
{
    /**
     * Generates an input
     *
     * @param string $type the input type
     * @param bool $list whether the input is of dropdown list type
     *
     * @return mixed
     */
    protected function getInput($type, $list = false)
    {
        if ($this->hasModel()) {
            $input = 'active' . ucfirst($type);

            return Html::$input($this->model, $this->attribute, $this->options);
        }
        $this->options['value'] = $this->value;

        return Html::hiddenInput($this->name, 0) . Html::$type($this->name, array_key_exists('checked', $this->options) && (bool)$this->options['checked'], $this->options);
    }
}