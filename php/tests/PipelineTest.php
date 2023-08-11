<?php

use Tasks\Pipeline;

// FIRST TASK
class PipelineTest extends \PHPUnit\Framework\TestCase {
    public function testMake1() {
        
        $finalFunction = Pipeline::make(
            function($var) { return $var * 3; },
            function($var) { return $var + 1; },
            function($var) { return $var / 2; }
        );

        $result = $finalFunction(3);
        $this->assertEquals(5, $result);
    }

    public function testMake2() {
        
        $finalFunction = Pipeline::make(
            function($var) { return $var * 3; },
            function($var) { return $var / 2; },
            function($var) { return $var + 1; }
        );

        $result = $finalFunction(3);
        $this->assertEquals(5.5, $result);
    }

    public function testMake3() {
        
        $finalFunction = Pipeline::make(
            function($var) { return $var + 1; },
            function($var) { return $var * 3; },
            function($var) { return $var / 2; }
        );

        $result = $finalFunction(3);
        $this->assertEquals(6, $result);
    }
}
?>