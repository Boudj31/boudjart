<?php

namespace App\Tests;

use App\Entity\Categorie;
use PHPUnit\Framework\TestCase;

class CategorieUnitTest extends TestCase
{
    public function testTrue()
    {
        $categorie = new Categorie();

        $categorie->setNom('test')
                  ->setDescription('blablabla')
                  ->setSlug('slug');


        $this->assertTrue($categorie->getNom() === 'test');
        $this->assertTrue($categorie->getDescription() === 'blablabla');
        $this->assertTrue($categorie->getSlug() === 'slug');
    }


    public function testFalse()
    {
        $categorie = new Categorie();

        $categorie->setNom('test')
                  ->setDescription('blablabla')
                  ->setSlug('slug');


        $this->assertFalse($categorie->getNom() === 'false@test.fr');
        $this->assertFalse($categorie->getDescription() === '12dfe345');
        $this->assertFalse($categorie->getSlug() === 'false');
    }

    public function testEmpty()
    {
        $categorie = new Categorie();

        $this->assertEmpty($categorie->getNom());
        $this->assertEmpty($categorie->getDescription());
        $this->assertEmpty($categorie->getSlug());
    }

}
