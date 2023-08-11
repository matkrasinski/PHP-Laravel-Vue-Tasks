<?php

use Tasks\ThesaurusDictionary;
use PHPUnit\Framework\TestCase;

// FOURTH TASK
class ThesaurusDictionaryTest extends TestCase {

    public function testDictionary1() {
        $thesaurusData = array(
            "market" => array("trade"),
            "small" => array("little", "compact")
        );

        $thesaurus = new ThesaurusDictionary($thesaurusData);

        $expectedJson = '{"word":"small","synonyms":["little","compact"]}';
        $this->assertEquals($expectedJson,  $thesaurus->getSynonyms("small"));
    }

    public function testDictionary2() {
        $thesaurusData = array(
            "market" => array("trade"),
            "small" => array("little", "compact")
        );

        $thesaurus = new ThesaurusDictionary($thesaurusData);

        $expectedJson = '{"word":"least","synonyms":[]}';
        $this->assertEquals($expectedJson, $thesaurus->getSynonyms("least"));
    }

    public function testDictionary3() {
        $thesaurusData = array(
            "market" => array("trade"),
            "small" => array("little", "compact")
        );

        $thesaurus = new ThesaurusDictionary($thesaurusData);

        $expectedJson = '{"word":"least","synonyms":[]}';
        $this->assertNotEquals($expectedJson, $thesaurus->getSynonyms("small"));
    }

}