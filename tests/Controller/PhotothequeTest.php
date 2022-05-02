<?php

namespace App\Tests;

use Symfony\Component\BrowserKit\Cookie;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class PhotothequeTest extends WebTestCase
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
    
    public function testCrudPhotothequeIndexRoute(): void
    {
        $client = $this->loginSuperadmin();
        $crawler = $client->request('GET', '/magasin/phototheque/');
        $this->assertResponseIsSuccessful();

        $this->assertPageTitleContains('LMDS - Gestion Magasin');

        $this->assertSelectorExists('h1:contains("Affichage de la photothèque")');
    } 
    public function testCrudPhotothequeEditRoute(): void
    {
        $client = $this->loginSuperadmin();
        $crawler = $client->request('GET', '/magasin/phototheque/1/edit');
        $this->assertResponseIsSuccessful();
        $this->assertPageTitleContains('LMDS - Gestion Magasin');

        $this->assertSelectorExists('h1:contains("Modifier l")');
        $this->assertCount(2, $crawler->filter('input'));
    }
    public function testCrudPhotothequeNewRoute(): void
    {
        $client = $this->loginSuperadmin();
        $crawler = $client->request('GET', '/magasin/phototheque/new');
        $this->assertResponseIsSuccessful();
        $this->assertPageTitleContains('LMDS - Gestion Magasin');

        $this->assertSelectorExists('h1:contains("Ajouter une image à la photothèque")');
        $this->assertCount(3, $crawler->filter('input'));
    }

}
