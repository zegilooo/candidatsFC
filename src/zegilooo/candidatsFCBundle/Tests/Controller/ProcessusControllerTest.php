<?php

namespace zegilooo\candidatsFCBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProcessusControllerTest extends WebTestCase
{
    public function testAjouter()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/ajouter_processus');
    }

    public function testModifier()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/modifier_processus');
    }

    public function testSupprimer()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'supprimer_processus');
    }

    public function testLister()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'lister_processus');
    }

}
