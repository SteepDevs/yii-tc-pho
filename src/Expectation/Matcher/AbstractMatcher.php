<?php

namespace yii_tc_pho\Expectation\Matcher;

abstract class AbstractMatcher
{
    /**
     * Returns a string representation of the given value, used for printing
     * the failure message.
     *
     * @param   mixed  $value The value for which to get a string representation
     * @returns string The string in question
     */
    protected function getStringValue($value)
    {
        if ($value === true) {
            return 'true';
        } elseif ($value === false) {
            return 'false';
        } elseif ($value === null) {
            return 'null';
        } elseif (is_string($value)) {
            return "\"$value\"";
        }

        return rtrim(print_r($value, true));
    }
}
