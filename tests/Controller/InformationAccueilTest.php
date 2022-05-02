<?php

namespace App\Tests;

use Symfony\Component\BrowserKit\Cookie;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class InformationAccueilTest extends WebTestCase
{
    public function loginSuperadmin($username = 'superadmin', $role = 'ROLE_SUPER_ADMIN')
    {
        $client = static::createClient();
        $session = $client->getContainer()->get('session');

        $firewallName = 'main';
        $firewallContext = 'main';

        $token = new UsernamePasswordToken($username, $firewallName, array($role));
        $session->set('_security_' . $firewallContext, serialize($token));
        $session->save();

        $cookie = new Cookie($session->getName(), $session->getId());
        $client->getCookieJar()->set($cookie);

        return $client;
    }
    
    public function testCrudInfoaccueilIndexRoute(): void
    {
        $client = $this->loginSuperadmin();
        $crawler = $client->request('GET', '/magasin/information_accueil/');
        $this->assertResponseIsSuccessful();

        $this->assertPageTitleContains('LMDS - Gestion Magasin');

        $this->assertSelectorExists('h1:contains("Affichage des informations de la page accueil")');
    }
    public function testCrudInfoaccueilShowRoute(): void
    {
        $client = $this->loginSuperadmin();
        $crawler = $client->request('GET', '/magasin/information_accueil/1');
        $this->assertResponseIsSuccessful();
        $this->assertPageTitleContains('LMDS - Gestion Magasin');

        $this->assertSelectorExists('h1:contains("Information Accueil n°")');
    }

    public function testCrudInfoaccueilEditRoute(): void
    {
        $client = $this->loginSuperadmin();
        $crawler = $client->request('GET', '/magasin/information_accueil/1/edit');
        $this->assertResponseIsSuccessful();
        $this->assertPageTitleContains('LMDS - Gestion Magasin');

        $this->assertSelectorExists('h1:contains("Modifier l")');
        $this->assertCount(3, $crawler->filter('input'));
    }


}
