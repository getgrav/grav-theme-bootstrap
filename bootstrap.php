<?php
namespace Grav\Theme;

use Grav\Common\Theme;

class Bootstrap extends Theme
{
    public static function getSubscribedEvents()
    {
        return [
            'onAssetsInitialized' => ['onAssetsInitialized', 0],
        ];
    }

    public function onAssetsInitialized()
    {
        if ($this->isAdmin()) {
            $this->active = false;
            return;
        }

        $assets = $this->grav['assets'];
        $assets->registerCollection('bootstrap', ['theme://css/bootstrap.min.css', 'theme://js/bootstrap.min.js']);
        $assets->add('bootstrap', 100);
    }
}
