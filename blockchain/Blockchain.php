<?php
require_once 'Block.php';

class Blockchain {
    public $chain;
    private $algo;

    public function __construct($algo = 'sha256') {
        $this->algo = $algo;
        $this->chain = [$this->createGenesisBlock()];
    }

    private function createGenesisBlock() {
        return new Block(0, date("Y-m-d H:i:s"), ["msg" => "Genesis"], "0", $this->algo);
    }

    public function getLatestBlock() {
        return end($this->chain);
    }

    public function addBlock($data) {
        $latest = $this->getLatestBlock();

        $newBlock = new Block(
            count($this->chain),
            date("Y-m-d H:i:s"),
            $data,
            $latest->hash,
            $this->algo
        );

        $this->chain[] = $newBlock;
    }

    public function isChainValid() { 
        for ($i = 1; $i < count($this->chain); $i++) {
            $current = $this->chain[$i];
            $previous = $this->chain[$i - 1];

            if ($current->hash !== $current->calculateHash()) {
                return false;
            }

            if ($current->previousHash !== $previous->hash) {
                return false;
            }
        }
        return true;
    }
}
