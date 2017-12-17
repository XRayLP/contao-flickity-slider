<?php

use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use XRayLP\Bundle\FlickitySliderBundle\FlickitySliderBundle;

class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(FlickitySliderBundle::class)
                ->setLoadAfter(
                    [
                        'Symfony\Bundle\TwigBundle\TwigBundle',
                        'Contao\CoreBundle\ContaoCoreBundle',
                        'Contao\ManagerBundle\ContaoManagerBundle',
                    ]
                    
                ),
        ];
    }

    
}