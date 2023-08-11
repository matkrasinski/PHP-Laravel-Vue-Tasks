<?php

namespace Tasks;

// THIRD TASK
class Player {
    public $name;
    public $score;
    public $gamesPlayed;

    public function __construct($name) {
        $this->name = $name;
        $this->score = 0;
        $this->gamesPlayed = 0;
    }
}