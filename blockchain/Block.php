<?php

class Block {
    public $index;
    public $timestamp;
    public $data;
    public $previousHash;
    public $hash;
    private $algo;

    // public function __construct($index, $timestamp, $data, $previousHash = '') {
    //     $this->index = $index;
    //     $this->timestamp = $timestamp;
    //     $this->data = $data;
    //     $this->previousHash = $previousHash;
    //     $this->hash = $this->calculateHash();
    // }

    public function __construct($index, $timestamp, $data, $previousHash = '', $algo = 'sha256') {
        $this->index = $index;
        $this->timestamp = $timestamp;
        $this->data = $data;
        $this->previousHash = $previousHash;
        $this->algo = $algo;
        $this->hash = $this->calculateHash();
    }

    // public function calculateHash() {
    //     $dataString = json_encode($this->data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    
    //     return hash('sha256',
    //         $this->index .
    //         $this->timestamp .
    //         $dataString .
    //         $this->previousHash
    //     );
    // }
    public function calculateHash() {
        $dataString = json_encode($this->data);

        return hash($this->algo,
            $this->index .
            $this->timestamp .
            $dataString .
            $this->previousHash
        );
    }
}
