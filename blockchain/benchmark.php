<?php
require_once 'Blockchain.php';

function runBenchmark($numTransactions, $algo = 'sha256') {
    $start = microtime(true);

    $blockchain = new Blockchain();

    for ($i = 0; $i < $numTransactions; $i++) {
        $data = [
            "type" => "donate",
            "from" => "user_" . rand(1, 1000),
            "to" => "charity_" . rand(1, 100),
            "amount" => rand(10000, 1000000),
            "time" => date("H:i:s d-m-Y")
        ];

        $blockchain->addBlock($data);
    }

    $end = microtime(true);

    return $end - $start;
}

// Các mức test
$levels = [1, 10, 100, 200, 500, 1000];
$results = [];

foreach ($levels as $level) {
    $time = runBenchmark($level);
    $results[] = [
        "transactions" => $level,
        "time" => $time
    ];
}

// Xuất JSON cho Python vẽ
file_put_contents("benchmark_result.json", json_encode($results, JSON_PRETTY_PRINT));

echo "Benchmark hoàn tất! Xem file benchmark_result.json";