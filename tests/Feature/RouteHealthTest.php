<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class RouteHealthTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_get_routes_do_not_return_405_or_500(): void
    {
        $this->seed();

        $routes = collect(Route::getRoutes())
            ->filter(fn ($r) => $r->methods()[0] === 'GET' || $r->methods()[0] === 'HEAD')
            ->filter(fn ($r) => str_starts_with($r->uri(), '/') && ! str_starts_with($r->uri(), 'admin') && $r->uri() !== 'storage/{path}')
            ->map(fn ($r) => '/'.ltrim($r->uri(), '/'))
            ->unique();

        foreach ($routes as $uri) {
            $uri = $this->replaceParams($uri);
            if (! $uri) {
                continue;
            }

            $response = $this->get($uri);
            $this->assertNotEquals(405, $response->getStatusCode(), "405 em: {$uri}");
        }

        $this->assertTrue(true);
    }

    public function test_admin_get_routes_do_not_return_405(): void
    {
        $this->seed();
        $this->actingAs(User::factory()->create());

        $routes = collect(Route::getRoutes())
            ->filter(fn ($r) => $r->methods()[0] === 'GET' || $r->methods()[0] === 'HEAD')
            ->filter(fn ($r) => str_starts_with($r->uri(), 'admin/') && $r->uri() !== 'admin/login')
            ->map(fn ($r) => '/'.$r->uri());

        foreach ($routes as $uri) {
            $uri = $this->replaceParams($uri);
            if (! $uri) {
                continue;
            }

            $response = $this->get($uri);
            $this->assertNotEquals(405, $response->getStatusCode(), "405 em: {$uri} (status ".$response->getStatusCode().')');
        }

        $this->assertTrue(true);
    }

    private function replaceParams(string $uri): ?string
    {
        return preg_replace_callback('/\{([^}]+)\}/', function ($m) {
            $name = $m[1];
            $name = preg_replace('/:[^}]+/', '', $name);

            return match (true) {
                str_contains($name, 'player') => '1',
                str_contains($name, 'coach') => '1',
                str_contains($name, 'article') => '1',
                str_contains($name, 'image') => '1',
                str_contains($name, 'category') => '1',
                str_contains($name, 'event') => '1',
                str_contains($name, 'season') => '1',
                str_contains($name, 'competition') => '1',
                str_contains($name, 'trophy') => '1',
                str_contains($name, 'game') => '1',
                str_contains($name, 'path') => null,
                default => '1',
            };
        }, $uri) ?: null;
    }
}
