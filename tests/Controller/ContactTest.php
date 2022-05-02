<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactTest extends WebTestCase
{

    public function testContactRoute(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/contact');
        $this->assertResponseIsSuccessful();

        $this->assertPageTitleContains('La Maison du Smartphone');

        $this->assertSelectorExists('h1:contains("Contact")');

    }
}
