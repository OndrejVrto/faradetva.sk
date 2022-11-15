<?php declare(strict_types=1);

namespace Tests\Feature\Http\Controllers\Admin;

use Tests\TestCase;
use App\Models\User;
use Tests\RefreshTestDatabase;
use Spatie\Permission\Models\Permission;

class CategoryControllerTest extends TestCase {
    use RefreshTestDatabase;

    //  redirect to login page
    public function test_unauthorized_user_cannot_visit_url(): void {
        $this
            ->get('/admin/categories')
            ->assertStatus(302);

        $this
            ->followingRedirects()
            ->get('/admin/categories')
            ->assertSee('Prihlásiť')
            ->assertStatus(200);
    }

    //  redirect to error page - 403 Forbidden
    public function test_auth_user_cannot_visit_url_before_give_permissions(): void {
        $user = User::factory()->create();

        /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
        $this
            ->actingAs($user)
            ->get('/admin/categories')
            ->assertStatus(403);
    }

    // can visit list of categories and not create or edit or delete categories
    public function test_auth_user_can_visit_url_after_permission__categories_index(): void {
        $user = User::factory()->create();
        $permision = Permission::create([
            'name' => 'categories.index',
            'guard_name' => 'web'
            ]);
        $user->permissions()->syncWithoutDetaching($permision);
        /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
        $this->be($user);

        $this
            ->get('/admin/categories')
            ->assertSeeText('Kategórie článkov')
            ->assertDontSeeText('Pridať novú kategóriu')
            ->assertDontSeeText('Editovať')
            ->assertDontSeeText('Vymazať')
            ->assertStatus(200);
    }

    public function test_auth_user_can_visit_url_after_permission__categories_store(): void {
        $user = User::factory()->create();
        $permision1 = Permission::create([
            'name' => 'categories.index',
            'guard_name' => 'web'
        ]);
        $permision2 = Permission::create([
            'name' => 'categories.create',
            'guard_name' => 'web'
        ]);
        $permision3 = Permission::create([
            'name' => 'categories.store',
            'guard_name' => 'web'
        ]);
        $user->permissions()->syncWithoutDetaching($permision1);
        $user->permissions()->syncWithoutDetaching($permision2);
        $user->permissions()->syncWithoutDetaching($permision3);
        /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
        $this->be($user);

        $this
            ->get('/admin/categories')
            ->assertSeeText('Kategórie článkov')
            ->assertSeeText('Pridať novú kategóriu')
            ->assertDontSeeText('Editovať')
            ->assertDontSeeText('Vymazať')
            ->assertStatus(200);

        $this
            ->get('/admin/categories/create')
            ->assertSeeText('Nová kategória')
            ->assertSeeText('Názov kategórie')
            ->assertSeeText('Uložiť')
            ->assertStatus(200);

        $this->post('/admin/categories', [
            'title' => 'Test',
            'slug' => 'test',
            'description' => 'Test description',
        ]);

        $this->assertDatabaseHas('categories', [
            'description' => 'Test description'
        ]);
    }
}
