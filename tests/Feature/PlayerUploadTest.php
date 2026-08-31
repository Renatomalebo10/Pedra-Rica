<?php

namespace Tests\Feature;

use App\Models\Player;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PlayerUploadTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_creates_player_with_photo(): void
    {
        Storage::fake('public');

        $response = $this->actingAs(User::factory()->create())
            ->post(route('admin.players.store'), [
                'name' => 'Jogador Teste',
                'number' => 7,
                'position' => 'Ala',
                'is_active' => '1',
                'photo' => UploadedFile::fake()->createWithContent('foto.png', file_get_contents('/tmp/real.png')),
            ]);

        $response->assertRedirect(route('admin.players.index'));

        $player = Player::where('name', 'Jogador Teste')->first();
        $this->assertNotNull($player);
        $this->assertNotNull($player->getRawOriginal('photo'));

        Storage::disk('public')->assertExists('players/'.$player->getRawOriginal('photo'));
    }

    public function test_update_replaces_photo(): void
    {
        Storage::fake('public');

        $player = Player::create([
            'name' => 'Jogador Original',
            'photo' => 'antiga.jpg',
            'is_active' => true,
        ]);
        $oldPhoto = $player->getRawOriginal('photo');

        $response = $this->actingAs(User::factory()->create())
            ->put(route('admin.players.update', $player), [
                'name' => $player->name,
                'number' => 9,
                'is_active' => '1',
                'photo' => UploadedFile::fake()->createWithContent('nova.png', file_get_contents('/tmp/real.png')),
            ]);

        $response->assertRedirect(route('admin.players.index'));

        $player->refresh();
        $newPhoto = $player->getRawOriginal('photo');

        $this->assertNotEquals($oldPhoto, $newPhoto);
        Storage::disk('public')->assertExists('players/'.$newPhoto);
    }
}
