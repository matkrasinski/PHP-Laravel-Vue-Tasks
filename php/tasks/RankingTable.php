<?php

namespace Tasks;


// THIRD TASK
class RankingTable {
    public array $players;

    public function __construct($playerNames) {
        foreach ($playerNames as $name) {
            $this->players[$name] = new Player($name);
        }
    }

    public function recordResult($playerName, $score): void {
        $this->players[$playerName]->score += $score;
        $this->players[$playerName]->gamesPlayed++;
    }

    public function playerRank($rank) {
        usort($this->players, function($a, $b) {
            if ($a->score == $b->score) {
                if ($a->gamesPlayed == $b->gamesPlayed) {
                    return array_search($b->name, $this->players) - array_search($a->name, $this->players);
                }
                return $b->gamesPlayed - $a->gamesPlayed;
            }
            return $b->score - $a->score;
        });

        $rankedPlayers = array_values($this->players);
        return $rankedPlayers[$rank - 1]->name;
    }
}