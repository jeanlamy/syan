<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class IdeaControllerTest extends WebTestCase
{
    public function testCget()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/api/ideas.json');
        $response = $client->getResponse();

        $this->assertJsonResponse($response, 200);
    }

    /**
     * Test successful get idea
     */
    public function testGet()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/api/ideas/1.json');
        $response = $client->getResponse();
        $this->assertJsonResponse($response, 200);
    }

    /**
     * Test failed get
     */
    public function testFailedGet()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/api/ideas/9999999.json');
        $response = $client->getResponse();
        $this->assertJsonResponse($response, 404);
    }

    /**
     * Test deletion
     *
     */
    public function testDelete()
    {
        $client = static::createClient();

        $crawler = $client->request('DELETE', '/api/ideas/3.json');
        $response = $client->getResponse();
        $this->assertEquals(204, $response->getStatusCode());
    }

    /**
     * Assert response is in JSON format
     * @see http://williamdurand.fr/2012/08/02/rest-apis-with-symfony2-the-right-way/
     * @param $response
     * @param int $statusCode
     */
    protected function assertJsonResponse($response, $statusCode = 200)
    {
        $this->assertEquals(
            $statusCode, $response->getStatusCode(),
            $response->getContent()
        );
        $this->assertTrue(
            $response->headers->contains('Content-Type', 'application/json'),
            $response->headers
        );
    }
}
