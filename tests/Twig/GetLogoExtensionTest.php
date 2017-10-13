<?php

use Ruvents\GetLogoTools\Twig\GetLogoExtension;

class GetLogoExtensionTest extends Twig_Test_IntegrationTestCase
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