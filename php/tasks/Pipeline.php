<?php

namespace Tasks;

// FIRST TASK
class Pipeline {
    public static function make(...$functions): \Closure {
        return function($arg) use ($functions) {
            $result = $arg;

            foreach ($functions as $func) {
                $result = $func($result);
            }

            return $result;
        };
    }
}
