<?php

namespace App\Services;

use App\Models\User;
use Elasticsearch\Client;
use App\Interfaces\UserService;
use Illuminate\Database\Eloquent\Collection;

class ElasticsearchUserService implements UserService
{
    private $search;

    public function __construct(Client $client)
    {
        $this->search = $client;
    }

    public function search(string $query = '', bool $status = true): Collection
    {
        $items = $this->searchOnElasticsearch($query, $status);

        return $this->buildCollection($items);
    }

    private function searchOnElasticsearch(string $query, bool $status): array
    {
        $instance = new User;

        $items = $this->search->search([
            'index' => $instance->getSearchIndex(),
            'type' => $instance->getSearchType(),
            'body' => [
                'query' => [
                    'multi_match' => [
                        'fields' => ['email', 'description'],
                        'query' => $query,
                    ],
                    'match' => [
                        'fields' => ['status'],
                        'query' => $status,
                    ],
                ],
            ],
        ]);

        return $items;
    }

    private function buildCollection(array $items): Collection
    {
        return User::hydrate(array_pluck($items['hits']['hits'], '_source') ?: []);
    }
}
