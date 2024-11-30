<?php

class Reader {
    private static $tok_regex = "/[\s,]*(~@|[\[\]{}()'`~^@]|\"(?:\\\\.|[^\\\\\"])*\"?|;.*|[^\s\[\]{}('\"`,;)]*)/";

    
    private $tokens = array();
    private $pos = 0;

    public function __construct($tokens)
    {
        $this->tokens = $tokens;
        $this->pos = 0;
    }

    public function next() {
        if ($this->pos >= count($this->tokens)) {
            return null;
        } else {
            return $this->tokens[$this->pos++];
        }
    }

    public function peek() {
        if ($this->pos >= count($this->tokens)) {
            return null;
        } else {
            return $this->tokens[$this->pos];
        }
    }

    public static function tokenize($str) {
        preg_match_all(self::$tok_regex, $str, $matches);
        return array_values(array_filter($matches[1], '_real_token'));
    }

    public static function read_from(Reader $reader) {
        $token = $reader->peek();
        switch ($token) {
        case '(':
            return self::
        default:
        }
    }

    private static function read_list($reader) {
        $list = $constr();
    }
}

?>
