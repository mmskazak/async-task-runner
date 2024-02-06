<?php

use PHPUnit\Framework\TestCase;
use YourVendorName\AsyncTaskRunner\AsyncTaskRunner;

class AsyncTaskRunnerTest extends TestCase
{
    public function testConcurrently()
    {
        // Создаем массив задач для теста
        $tasks = [
            function() { return 'Task 1'; },
            function() { return 'Task 2'; },
            function() { return 'Task 3'; },
        ];

        // Вызываем метод concurrently
        $results = AsyncTaskRunner::concurrently($tasks);

        // Проверяем, что результаты верны
        $expectedResults = [
            'Task 1',
            'Task 2',
            'Task 3',
        ];

        $this->assertEquals($expectedResults, $results);
    }
}
