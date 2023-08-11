<?php

use Tasks\RankingTable;
use PHPUnit\Framework\TestCase;

// THIRD TASK
class RankingTableTest extends TestCase {

    public function testRankingTable1() {
        $table = new RankingTable(array('Jan', 'Maks', 'Monika'));
        $table->recordResult('Jan', 2);
        $table->recordResult('Maks', 3);
        $table->recordResult('Monika', 5);

        $this->assertEquals('Monika', $table->playerRank(1));
    }

    public function testRankingTable2() {
        $table = new RankingTable(array('Jan', 'Maks', 'Monika'));
        $table->recordResult('Jan', 5);
        $table->recordResult('Maks', 5);
        $table->recordResult('Monika', 5);

        $this->assertEquals('Jan', $table->playerRank(1));
    }

    public function testRankingTable3() {
        $table = new RankingTable(array('Jan', 'Maks', 'Monika'));
        $table->recordResult('Jan', 5);
        $table->recordResult('Maks', 3);
        $table->recordResult('Maks', 2);
        $table->recordResult('Monika', 3);
        $table->recordResult('Monika', 2);

        $this->assertEquals('Maks', $table->playerRank(1));
    }
}