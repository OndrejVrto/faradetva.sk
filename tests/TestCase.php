<?php declare(strict_types=1);

namespace Tests;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase {
    use CreatesApplication;
    use RefreshTestDatabase;

    protected function setUpTraits(): array {
        $uses = parent::setUpTraits();

        if (isset($uses[RefreshTestDatabase::class])) {
            $this->refreshTestDatabase();
        }

        return $uses;
    }
}
