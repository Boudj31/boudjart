<?php

namespace App\Tests;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase
{
    public function testTrue()
    {
        $user = new User();

        $user->setEmail('test@test.fr')
              ->setPassword('12345')
              ->setPrenom('rachid')
              ->setNom('boudjenane')
              ->setAPropos('rien a signaler')
              ->setInstagram('vaailant');

        $this->assertTrue($user->getEmail() === 'test@test.fr');
        $this->assertTrue($user->getPassword() === '12345');
        $this->assertTrue($user->getPrenom() === 'rachid');
        $this->assertTrue($user->getNom() === 'boudjenane');
        $this->assertTrue($user->getAPropos() === 'rien a signaler');
        $this->assertTrue($user->getInstagram() === 'vaailant');
    }

    public function testFalse()
    {
        $user = new User();

        $user->setEmail('test@test.fr')
            ->setPassword('12345')
            ->setPrenom('rachid')
            ->setNom('boudjenane')
            ->setAPropos('rien a signaler')
            ->setInstagram('vaailant');

        $this->assertFalse($user->getEmail() === 'false@test.fr');
        $this->assertFalse($user->getPassword() === '12dfe345');
        $this->assertFalse($user->getPrenom() === 'false');
        $this->assertFalse($user->getNom() === 'false');
        $this->assertFalse($user->getAPropos() === 'false');
        $this->assertFalse($user->getInstagram() === 'false');
    }

    public function testEmpty()
    {
        $user = new User();

        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getPassword());
        $this->assertEmpty($user->getPrenom());
        $this->assertEmpty($user->getNom());
        $this->assertEmpty($user->getAPropos());
        $this->assertEmpty($user->getInstagram());
    }

}
