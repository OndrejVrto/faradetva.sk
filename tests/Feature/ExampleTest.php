<?php declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase {

    public function test_admin_route_redirect() {
        $response = $this->get('admin');
        $response->assertRedirect();
    }

    public function test_home_page_is_visible() {
        $response = $this->get('/');
        $response->assertOk();
    }


}
