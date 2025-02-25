<?php

namespace AbabilItWorld\FlexColorSchemeByAbabilitworld\Package\ColorScheme\Controller;

use AbabilItWorld\FlexColorSchemeByAbabilitworld\Package\ColorScheme\Service\ColorScheme as ColorSchemeService;
use AbabilItWorld\FlexColorSchemeByAbabilitworld\Package\ColorScheme\Repository\ColorScheme as ColorSchemeRepository;

class ColorScheme
{
    private ColorSchemeService $service;

    public function __construct()
    {
        $repo = new ColorSchemeRepository();
        $this->service = new ColorSchemeService($repo);

        add_action('admin_menu', [$this, 'registerAdminMenu']);
    }

    public function registerAdminMenu()
    {
        add_menu_page('Color Schemes', 'Color Schemes', 'manage_options', 'color-schemes', [$this, 'renderAdminPage']);
    }

    public function renderAdminPage()
    {
        $schemes = $this->service->getAllSchemes();
        include CSM_PLUGIN_DIR . 'templates/settings-page.php';
    }
}
