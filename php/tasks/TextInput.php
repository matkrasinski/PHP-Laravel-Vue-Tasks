<?php

namespace Tasks;

// SECOND TASK
class TextInput {
    private $text;

    public function __construct($text = "") {
        $this->text = $text;
    }

    public function add($text) {
        $this->text .= $text;
    }

    public function getValue() {
        return $this->text;
    }

}