<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProduitsTest extends WebTestCase
{
    public function testProduitsRoute(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/produits/');
        $this->assertResponseIsSuccessful();

        $this->assertPageTitleContains('La Maison du Smartphone');

        $this->assertSelectorExists('h1:contains("Nos téléphones")');

    }
}
