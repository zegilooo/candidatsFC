<?php

namespace zegilooo\candidatsFCBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TypeFCControllerTest extends WebTestCase
{
    public function testAjouter()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/ajouter_typefc');
        
        $this->assertTrue($crawler->filter('html:contains("ajouter un TypeFC")')->count() > 0);
    }

    public function testModifier()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/modifier_typefc');
    }

    public function testSupprimer()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/supprimer_typefc');
    }

    public function testLister()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/lister_typefc');
    }

}
