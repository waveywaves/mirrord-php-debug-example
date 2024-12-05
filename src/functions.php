<?php
require_once 'config.php';

function getRedisClient() {
    $redis = new Redis();
    $redis->connect(REDIS_HOST, REDIS_PORT);
    return $redis;
}

function addEntry($name, $message) {
    $redis = getRedisClient();
    $entry = json_encode([
        'name' => $name,
        'message' => $message,
        'timestamp' => time()
    ]);
    $redis->lPush('entries', $entry);
}

function getEntries() {
    $redis = getRedisClient();
    $entries = $redis->lRange('entries', 0, -1);
    return array_map('json_decode', $entries);
}
