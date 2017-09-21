<?php

namespace FaDoe\Symfony\Request;

use Symfony\Component\HttpFoundation\Request;

class ReferrerHelper
{
    /**
     * @param Request $request
     *
     * @return bool
     */
    public static function isInternalReferrer(Request $request)
    {
        return 0 < strpos($request->headers->get('referer'), $request->server->get('HTTP_HOST'));
    }

    /**
     * @param Request $request
     *
     * @return string
     */
    public static function getReferrerPath(Request $request)
    {
        $referrer = $request->headers->get('referer');
        $origin = $request->server->get('HTTP_HOST');
        $baseUrl = $request->getBaseUrl();

        return self::stripBaseUrl($referrer, $origin . $baseUrl);
    }

    /**
     * @param string $redirectUrl
     * @param string $baseUrl
     *
     * @return string
     */
    private static function stripBaseUrl($redirectUrl, $baseUrl)
    {
        return substr($redirectUrl, strpos($redirectUrl, $baseUrl) + strlen($baseUrl));
    }
}
