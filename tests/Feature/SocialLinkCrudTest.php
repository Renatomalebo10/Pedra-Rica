<?php

namespace Tests\Feature;

use App\Models\Setting;
use App\Models\SocialLink;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SocialLinkCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_social_link_can_be_created_without_explicit_sort_order(): void
    {
        $response = $this->actingAs(User::factory()->create())
            ->post(route('admin.social-links.store'), [
                'platform' => 'Facebook',
                'url' => 'https://facebook.com/pedrarica',
                'is_active' => '1',
            ]);

        $response->assertRedirect(route('admin.social-links.index'));

        $this->assertDatabaseHas('social_links', [
            'platform' => 'Facebook',
            'url' => 'https://facebook.com/pedrarica',
            'sort_order' => 1,
        ]);
    }

    public function test_social_link_edit_form_receives_the_existing_link(): void
    {
        $link = SocialLink::create([
            'platform' => 'Instagram',
            'url' => 'https://instagram.com/pedrarica',
            'sort_order' => 2,
        ]);

        $response = $this->actingAs(User::factory()->create())
            ->get(route('admin.social-links.edit', $link));

        $response->assertOk();
        $response->assertSee($link->url);
        $response->assertSee(route('admin.social-links.update', $link));
    }

    public function test_social_link_can_be_updated(): void
    {
        $link = SocialLink::create([
            'platform' => 'YouTube',
            'url' => 'https://youtube.com/@pedrarica',
            'sort_order' => 3,
        ]);

        $response = $this->actingAs(User::factory()->create())
            ->put(route('admin.social-links.update', $link), [
                'platform' => 'TikTok',
                'url' => 'https://tiktok.com/@pedrarica',
                'is_active' => '1',
            ]);

        $response->assertRedirect(route('admin.social-links.index'));

        $this->assertDatabaseHas('social_links', [
            'id' => $link->id,
            'platform' => 'TikTok',
            'url' => 'https://tiktok.com/@pedrarica',
        ]);
    }

    public function test_settings_update_persists_contact_address(): void
    {
        $response = $this->actingAs(User::factory()->create())
            ->post(route('admin.settings.update'), [
                'contact_address' => 'Bairro São João, Luanda',
                'contact_email' => 'novo@pedrarica.com',
                'mission' => 'Nova missão',
            ]);

        $response->assertRedirect(route('admin.settings'));

        $this->assertSame('Bairro São João, Luanda', Setting::get('contact_address'));
        $this->assertSame('novo@pedrarica.com', Setting::get('contact_email'));
        $this->assertSame('Nova missão', Setting::get('mission'));
    }
}
