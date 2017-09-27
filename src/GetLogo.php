<?php

namespace Ruvents\GetLogoTools;

final class GetLogo
{
    /**
     * @param string   $id
     * @param int|null $width
     * @param int|null $height
     *
     * @return string
     * @throws \InvalidArgumentException
     */
    public static function getUrl(string $id, int $width = null, int $height = null): string
    {
        if (null === $width && null === $height) {
            throw new \InvalidArgumentException('You must provide either width or height.');
        }

        return 'http://getlogo.org/img'.$id.'/'.$width.'x'.$height.'/';
    }

    /**
     * @param string $url
     *
     * @return array
     * @throws \InvalidArgumentException
     */
    public static function parse(string $url): array
    {
        if (preg_match("~^(?:http://getlogo\.org/img)?(?'id'/[\w-]+/\d+)/(?'width'\d+)?x(?'height'\d+)?/$~", $url, $m)) {
            unset($m[0]);

            return $m;
        }

        throw new \InvalidArgumentException('Invalid GetLogo url.');
    }
}
