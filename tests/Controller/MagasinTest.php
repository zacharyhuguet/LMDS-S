<?php

namespace App\Tests;

use Symfony\Component\BrowserKit\Cookie;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class MagasinTest extends WebTestCase
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
    
    public function testAdminRoute(): void
    {
        $client = $this->loginSuperadmin();
        $crawler = $client->request('GET', '/magasin/');
        $this->assertResponseIsSuccessful();
        $client->followRedirect();

        $this->assertPageTitleContains('LMDS - Gestion Magasin');

        $this->assertSelectorExists('h1:contains("Affichage des devis")');
    }
    
  
}
