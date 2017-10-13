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

        return 'http://getlogo.org/img/'.ltrim($id, '/').'/'.$width.'x'.$height.'/';
    }

    /**
     * @param string $url
     *
     * @return array
     * @throws \InvalidArgumentException
     */
    public static function parse(string $url): array
    {
        if (preg_match("~^(?:http://getlogo\.org/img)?(/[\w-]+/\d+)/(\d+)?x(\d+)?/$~", $url, $m)) {
            return [
                'id' => $m[1],
                'width' => isset($m[2]) ? (int)$m[2] : null,
                'height' => isset($m[3]) ? (int)$m[3] : null,
            ];
        }

        throw new \InvalidArgumentException('Invalid GetLogo url.');
    }
}
