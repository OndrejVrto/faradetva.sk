<?php

declare(strict_types=1);

namespace App\Services;

use Diglactic\Breadcrumbs\Manager;
use Illuminate\Contracts\View\View;
use Diglactic\Breadcrumbs\Exceptions\ViewNotSetException;

class BreadCrumbManagerService extends Manager {
    /**
     * Render breadcrumbs for a page with the default view.
     *
     * @param string|null $name The name of the current page.
     * @param mixed ...$params The parameters to pass to the closure for the current page.
     * @return \Illuminate\Contracts\View\View The generated view.
     * @throws \Diglactic\Breadcrumbs\Exceptions\InvalidBreadcrumbException if the name is (or any ancestor names are)
     *                                                                      not registered.
     * @throws \Diglactic\Breadcrumbs\Exceptions\UnnamedRouteException if no name is given and the current route doesn't
     *                                                                 have an associated name.
     * @throws \Diglactic\Breadcrumbs\Exceptions\ViewNotSetException if no view has been set.
     */
    public function render(?string $name = null, $frontend = false, ...$params): View {
        $view = $frontend ? config('breadcrumbs.view-frontend') : config('breadcrumbs.view');

        if (!$view) {
            throw new ViewNotSetException('Breadcrumbs view not specified (check config/breadcrumbs.php)');
        }

        return $this->view($view, $name, ...$params);
    }
}
