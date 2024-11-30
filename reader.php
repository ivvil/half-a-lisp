<?php

class Reader {
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
    
}

?>
