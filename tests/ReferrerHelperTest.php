<?php

namespace FaDoe\Symfony\Request;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;

class ReferrerHelperTest extends TestCase
{
    /**
     * @var Request
     */
    private $request;

    protected function setUp()
    {
        $this->request = Request::createFromGlobals();
        $this->request->server->set('HTTP_HOST', 'localhost');
    }

    public function testReferrerIsNotSet()
    {
        $this->assertFalse(ReferrerHelper::isInternalReferrer($this->request));
    }

    public function testRequestIsInternalReferrer()
    {
        $this->request->headers->set('referer', 'http://localhost/dresden');

        $this->assertTrue(ReferrerHelper::isInternalReferrer($this->request));
    }

    public function testRequestIsExternalReferrer()
    {
        $this->request->headers->set('referer', 'http://example.com/external-resource');

        $this->assertFalse(ReferrerHelper::isInternalReferrer($this->request));
    }

    public function testGetPathFromReferrer()
    {
        $this->request->headers->set('referer', 'http://localhost/dresden');

        $this->assertEquals('/dresden', ReferrerHelper::getReferrerPath($this->request));
    }
}
