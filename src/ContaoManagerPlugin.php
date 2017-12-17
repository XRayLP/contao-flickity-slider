<?php

namespace XRayLP\Bundle\FlickitySliderBundle;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;

class ContaoManagerPlugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(FlickitySliderBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class])
        ];
    }

    
}