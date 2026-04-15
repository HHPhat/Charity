<?php

function getBlockchainFile($campaign_id) {
    return __DIR__ . "/data/campaign_" . $campaign_id . ".json";
}

function loadBlockchain($campaign_id) {
    $file = getBlockchainFile($campaign_id);

    if (!file_exists($file)) {
        return null;
    }

    $json = file_get_contents($file);
    return json_decode($json, true);
}

function saveBlockchain($campaign_id, $chain) {
    $file = getBlockchainFile($campaign_id);

    file_put_contents($file, json_encode($chain, JSON_PRETTY_PRINT));
}
