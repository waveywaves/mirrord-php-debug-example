<?php
require_once 'config.php';

function getRedisConnection() {
    $redis = new Redis();
    $redis->connect(REDIS_HOST, REDIS_PORT);
    return $redis;
}

function addEntry($name, $message) {
    $redis = getRedisConnection();
    $entry = [
        'name' => $name,
        'message' => $message,
        'timestamp' => time()
    ];
    $redis->lPush('guestbook_entries', json_encode($entry));
}

function getEntries() {
    $redis = getRedisConnection();
    $entries = $redis->lRange('guestbook_entries', 0, -1);
    return array_map('json_decode', $entries);
}
