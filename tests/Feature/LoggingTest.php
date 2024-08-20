<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoggingTest extends TestCase
{
    public function testLog()
    {
        Log::info("Hello Info.");
        Log::warning("Hello Warning.");
        Log::error("Hello Error.");
        Log::critical("Hello Critical");

        self::assertTrue(true);
        self::assertFalse(false);
    }
}
