<?php

namespace Tests\Feature;

use App\Models\Player;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PlayerUpdateRealDiskTest extends TestCase
{
    use RefreshDatabase;

    public function test_update_with_real_photo_disk(): void
    {
        $player = Player::create([
            'name' => 'Jogador Original',
            'photo' => 'antiga.jpg',
            'is_active' => true,
            'goals' => 1,
            'assists' => 2,
            'yellow_cards' => 0,
            'red_cards' => 0,
            'matches_played' => 5,
        ]);

        $response = $this->actingAs(User::factory()->create())
            ->put(route('admin.players.update', $player), [
                'name' => 'Novo Nome',
                'number' => '10',
                'position' => 'Pivô',
                'is_active' => '1',
                'goals' => '3',
                'assists' => '4',
            ]);

        $response->assertRedirect(route('admin.players.index'));

        $player->refresh();

        $this->assertSame('Novo Nome', $player->name);
        $this->assertSame(10, $player->number);
        $this->assertSame('Pivô', $player->position);
        $this->assertSame(3, $player->goals);
    }

    public function test_update_handles_empty_numeric_fields_without_null_error(): void
    {
        $player = Player::create([
            'name' => 'Sem Stats',
            'is_active' => true,
        ]);

        $response = $this->actingAs(User::factory()->create())
            ->put(route('admin.players.update', $player), [
                'name' => 'Sem Stats',
                'number' => '',
                'position' => '',
                'is_active' => '1',
                'goals' => '',
                'assists' => '',
                'yellow_cards' => '',
                'red_cards' => '',
                'matches_played' => '',
            ]);

        $response->assertRedirect(route('admin.players.index'));

        $player->refresh();
        $this->assertSame(0, $player->goals);
        $this->assertSame(0, $player->assists);
        $this->assertSame(0, $player->matches_played);
        $this->assertNull($player->number);
    }
}
