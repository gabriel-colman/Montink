<?php

class RedisConnection
{
    private $redis;

    public function __construct()
    {
        $this->redis = new Redis();
        $this->redis->connect('127.0.0.1', 6379);  // Configuração do Redis
    }

    public function save($key, $value)
    {
        $this->redis->set($key, json_encode($value));
    }

    public function get($key)
    {
        $value = $this->redis->get($key);
        return json_decode($value, true);
    }
}
?>
