<?php

namespace Ruvents\GetLogoTools\Twig;

use Ruvents\GetLogoTools\GetLogo;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class GetLogoExtension extends AbstractExtension
{
    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('get_logo', [GetLogo::class, 'getUrl']),
        ];
    }
}
