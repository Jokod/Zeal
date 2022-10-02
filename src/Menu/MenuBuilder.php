<?php

namespace App\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\Security\Core\Security;

class MenuBuilder
{
    protected $factory;

    protected $security;

    public function __construct(FactoryInterface $factory, Security $security)
    {
        $this->factory  = $factory;
        $this->security = $security;
    }

    public function createMainMenu()
    {
        $menu = $this->factory->createItem('root');

        $menu->addChild('companies', ['route' => 'dashboard', 'label' => 'Entreprises', 'extras' => ['icon' => 'fa-city'], 'displayChildren' => false]);

        return $menu;
    }
}