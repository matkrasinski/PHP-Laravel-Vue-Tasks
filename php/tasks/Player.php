<?php

namespace Tasks;

// THIRD TASK
class Player {
    public string $name;
    public int $score;
    public int $gamesPlayed;

    public function __construct($name) {
        $this->name = $name;
        $this->score = 0;
        $this->gamesPlayed = 0;
    }
}