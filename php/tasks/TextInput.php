<?php

namespace Tasks;

// SECOND TASK
class TextInput {
    private string $text;

    public function __construct($text = '') {
        $this->text = $text;
    }

    public function add($text): void {
        $this->text .= $text;
    }

    public function getValue() {
        return $this->text;
    }

}