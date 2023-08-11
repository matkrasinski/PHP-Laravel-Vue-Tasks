<?php

namespace Tasks;

// SECOND TASK
class NumericInput extends TextInput {
    public function __construct($initialValue = '') {
        $numericInitialValue = preg_replace('/[^0-9]/', '', $initialValue);
        parent::__construct($numericInitialValue);
    }
    public function add($text) {
        $numericText = preg_replace('/[^0-9]/', '', $text);
        parent::add($numericText);
    }
}


