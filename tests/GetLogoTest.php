<?php

namespace Ruvents\GetLogoTools;

use PHPUnit\Framework\TestCase;

class GetLogoTest extends TestCase
{
    public function testGetUrl()
    {
        $this->assertEquals(
            'http://getlogo.org/img/200/100x100/',
            GetLogo::getUrl('200', 100, 100)
        );
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testException()
    {
        GetLogo::getUrl(100);
    }

    /**
     * @dataProvider getValidGetLogoUrls
     */
    public function testParse($url, $expected)
    {
        $this->assertEquals($expected, GetLogo::parse($url));
    }

    /**
     * @dataProvider getInvalidGetLogoUrls
     *
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid GetLogo url.
     */
    public function testParseException($url)
    {
        GetLogo::parse($url);
    }

    public function getValidGetLogoUrls()
    {
        return [
            ['http://getlogo.org/img/raec/379/200x/', ['id' => '/raec/379', 'width' => 200, 'height' => null]],
            ['http://getlogo.org/img/np-mks/1238/x301/', ['id' => '/np-mks/1238', 'width' => null, 'height' => 301]],
            ['http://getlogo.org/img/np.mks/1238/x301/', ['id' => '/np.mks/1238', 'width' => null, 'height' => 301]],
        ];
    }

    public function getInvalidGetLogoUrls()
    {
        return [
            ['http://getlogo.org/imgraec/379/200x/', ['id' => '/raec/379', 'width' => 200, 'height' => null]],
        ];
    }

    public function testPrivateConstructor()
    {
    }
}
