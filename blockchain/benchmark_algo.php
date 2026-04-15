<?php
require_once 'Blockchain.php';

$algorithms = ['md5', 'sha1', 'sha256'];
$levels = [1, 10, 100, 200, 500, 1000];

$final = [];

foreach ($algorithms as $algo) {
    foreach ($levels as $level) {
        $start = microtime(true);

        $blockchain = new Blockchain($algo);

        for ($i = 0; $i < $level; $i++) {
            $blockchain->addBlock([
                "from" => "A",
                "to" => "B",
                "amount" => rand(1000, 10000),
                "time" => time()
            ]);
        }

        $end = microtime(true);
        $time = $end - $start;

        // Tính TPS và hash speed
        $tps = $level / $time;
        $hash_per_sec = $level / $time;

        $final[] = [
            "algo" => $algo,
            "transactions" => $level,
            "time" => $time,
            "tps" => $tps,
            "hash_speed" => $hash_per_sec
        ];
    }
}

file_put_contents("benchmark_full.json", json_encode($final, JSON_PRETTY_PRINT));

echo "Benchmark nâng cao hoàn tất!";