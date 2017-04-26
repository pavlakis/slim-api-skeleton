<?php

namespace Test\Functional;


class NotFoundActionTest extends BaseTestCase
{
    /**
     * Test a wrong route returns 404
     */
    public function testGetWrongRoute()
    {
        $response = $this->runApp('GET', '/no-endpoint');

        $this->assertTrue($response->isNotFound());
        $this->assertContains('application/json', $response->getHeaderLine('Content-type'));
    }
}
