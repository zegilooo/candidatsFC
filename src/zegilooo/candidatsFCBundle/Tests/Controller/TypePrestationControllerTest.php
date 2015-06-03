<?php

namespace zegilooo\candidatsFCBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TypePrestationControllerTest extends WebTestCase
{
    public function testAjouter()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/ajouter_typepresta');
    }

    public function testModifier()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/modifier_typepresta');
    }

    public function testSupprimer()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/suprimer_typepresta');
    }

    public function testLister()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/lister_typepresta');
    }

}
