<?php

use Tasks\NumericInput;
use Tasks\TextInput;
use PHPUnit\Framework\TestCase;

class InputsTest extends TestCase {
    public function testTextInput1() {
        $textInput = new TextInput();
        $this->assertEmpty($textInput->getValue());
    }

    public function testTextInput2() {
        $textInput = new TextInput();
        $textInput->add('Hello ');
        $textInput->add('World!');
        
        $this->assertSame('Hello World!', $textInput->getValue());
    }
    
    public function testTextInput3() {
        $textInput = new TextInput('number: ');
        $textInput->add(23);
        
        $this->assertSame('number: 23', $textInput->getValue());
    }

    public function testNumericInput1() {
        $input = new NumericInput('456abc');
        $input->add('something');

        $this->assertSame('456', $input->getValue());
    }

    public function testNumericInput2() {
        $input = new NumericInput();
        $input->add(23);

        $this->assertSame('23', $input->getValue());
    }

    public function testNumericInput3() {
        $input = new NumericInput(12);
        $input->add(23);

        $this->assertSame('1223', $input->getValue());
    }
}

