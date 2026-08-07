<?php

namespace Tests\Feature;

use App\Models\Link;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LinkControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_links_index_page_can_be_rendered(): void
    {
        $response = $this->get('/admin/links');

        $response->assertStatus(200);
        $response->assertViewIs('admin.links.index');
    }

    public function test_admin_links_page_renders_crud_actions(): void
    {
        $link = Link::factory()->create();

        $response = $this->get('/admin/links');

        $response->assertSee(route('admin.links.create'));
        $response->assertSee(route('admin.links.edit', $link));
        $response->assertSee(route('admin.links.destroy', $link));
    }
}
