<?php

namespace Tasks;

// FOURTH TASK
class ThesaurusDictionary {

    private array $dictionary;

    public function __construct($dictionary) {
        $this->dictionary = $dictionary;
    }

    public function getSynonyms($word): string {
        if (array_key_exists($word, $this->dictionary)) {
            $synonyms = $this->dictionary[$word];
        } else {
            $synonyms = array();
        }

        $result = array(
            'word' => $word,
            'synonyms' => $synonyms
        );

        return json_encode($result);
    }
}
