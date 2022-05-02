<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityTest extends WebTestCase
{
    public function testLoginRoute(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');
        $this->assertResponseIsSuccessful();

        $this->assertPageTitleContains('LMDS - Magasin Login');

        $this->assertSelectorExists('h1:contains("Connectez-vous !")');
        $this->assertCount(3, $crawler->filter('input'));
    }

    public function testLogoutRoute(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/logout');
        $this->assertResponseRedirects();
        $client->followRedirect();
        $this->assertResponseIsSuccessful();

        $this->assertPageTitleContains('La Maison du Smartphone');

        $this->assertSelectorExists('h1:contains("Réparations téléphones, tablettes")');
    }
}
