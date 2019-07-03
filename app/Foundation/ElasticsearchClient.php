<?php

namespace App\Foundation;

use Elasticsearch\ClientBuilder;

class ElasticsearchClient
{
    protected $hosts = [];

    public function __construct(array $hosts)
    {
        $this->hosts = $hosts;
    }

    public function client()
    {
        return ClientBuilder::create()->setHosts($this->hosts)->build();
    }
}
