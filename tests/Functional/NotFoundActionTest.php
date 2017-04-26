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

        static::assertTrue($response->isNotFound());
        static::assertContains('application/json', $response->getHeaderLine('Content-type'));
    }
}
