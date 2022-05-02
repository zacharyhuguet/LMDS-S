<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DevisTest extends WebTestCase
{
    public function testDevisRoute(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/devis');
        $this->assertResponseIsSuccessful();

        $this->assertPageTitleContains('La Maison du Smartphone');

        $this->assertSelectorExists('h1:contains("Demande de devis")');

    }
}
