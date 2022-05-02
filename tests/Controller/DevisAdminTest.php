<?php

namespace App\Tests;

use Symfony\Component\BrowserKit\Cookie;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class DevisAdminTest extends WebTestCase
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
    
    public function testCrudDevisIndexRoute(): void
    {
        $client = $this->loginSuperadmin();
        $crawler = $client->request('GET', '/magasin/devis/');
        $this->assertResponseIsSuccessful();

        $this->assertPageTitleContains('LMDS - Gestion Magasin');

        $this->assertSelectorExists('h1:contains("Affichage des devis")');
    }
    public function testCrudDevisShowRoute(): void
    {
        $client = $this->loginSuperadmin();
        $crawler = $client->request('GET', '/magasin/devis/1');
        $this->assertResponseIsSuccessful();
        $this->assertPageTitleContains('LMDS - Gestion Magasin');

        $this->assertSelectorExists('h1:contains("Devis n°")');
    }

    public function testCrudDevisSendRoute(): void
    {
        $client = $this->loginSuperadmin();
        $crawler = $client->request('GET', '/magasin/devis/1/repondre-devis');
        $this->assertResponseIsSuccessful();
        $this->assertPageTitleContains('LMDS - Gestion Magasin');

        $this->assertSelectorExists('h1:contains("Répondre au devis :")');
        $this->assertCount(7, $crawler->filter('input'));
    }

}
