<?php

use Ruvents\GetLogoTools\Twig\GetLogoExtension;
use Twig\Test\IntegrationTestCase;

class GetLogoExtensionTest extends IntegrationTestCase
{
    public function getExtensions()
    {
        return [
            new GetLogoExtension(),
        ];
    }

    /**
     * @return string
     */
    protected function getFixturesDir()
    {
        return dirname(__FILE__).'/Fixtures/';
    }
}
