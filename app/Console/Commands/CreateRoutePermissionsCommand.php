<?php declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

class CreateRoutePermissionsCommand extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permission:create-permission-routes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a permission routes.';

    /**
     * Execute the console command.
     */
    public function handle(): void {
        $routes = Route::getRoutes()->getRoutes();

        foreach ($routes as $route) {
            $routeName = $route->getName();
            if ($routeName != '' && !is_null($routeName)) {
                foreach ($route->getAction()['middleware'] as $midleware) {
                    if ($midleware == 'permission') {
                        Permission::findOrCreate($routeName);
                        $this->line('Update or create permissions: '.$routeName);
                    }
                }
            }
        }

        $this->newLine();
        $this->info('Permission routes added successfully.');
    }
}
