<?php

namespace mmskazak\AsyncTaskRunner;

use Spatie\Async\Pool;

class AsyncTaskRunner
{
    public static function concurrently(array $tasks)
    {
        $pool = Pool::create();
        $results = [];

        foreach ($tasks as $key => $task) {
            $pool->add(function () use ($task) {
                return $task();
            })->then(function ($result) use (&$results, $key) {
                $results[$key] = $result;
            });
        }

        $pool->wait();
        ksort($results);

        return $results;
    }
}
