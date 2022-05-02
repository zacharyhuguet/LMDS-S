<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeTest extends WebTestCase
{
    public function testHomeRoute(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $this->assertResponseIsSuccessful();

        $this->assertPageTitleContains('La Maison du Smartphone');

        $this->assertSelectorExists('h1:contains("Réparations téléphones, tablettes")');

    }
}
