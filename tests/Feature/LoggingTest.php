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

    public function testContext()
    {
        Log::info("Hello Context", ["user" => "Andrew"]);

        self::assertTrue(true);
        self::assertFalse(false);
    }

    public function testWithContext()
    {
        Log::withContext(["user" => "Terry"]);

        Log::info("Hello Info");
        Log::info("Hello Info");
        Log::info("Hello Info");
        Log::warning("Hello Warning");

        self::assertTrue(true);
        self::assertFalse(false);
    }

    public function testWithChannel()
    {
        $stderrLogger = Log::channel('stderr');

        for ($i = 0; $i < 5; $i++) {
            $stderrLogger->info("Hello " . uniqid(), [
                "user" => "Guest"
            ]); # Only Send to stderr (console) channel
        }

        Log::withContext([
            "user" => "Terry Davis"
        ]);
        for ($i = 0; $i < 5; $i++) {
            Log::info("Hello " . uniqid());
        }

        self::assertTrue(true);
        self::assertFalse(false);
    }
}
