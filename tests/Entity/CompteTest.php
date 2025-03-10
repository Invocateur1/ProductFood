<?php
    namespace App\Tests\Entity;
    use App\Entity\Compte;
    use PHPUnit\Framework\TestCase;
    class CompteTest extends TestCase{
        public function testSalaire(){
            $compte=new Compte('Haithem',310.36);
            $this->assertSame(210.36,$compte->retirer(100));
        }
        public function testMontant(){
            $c=new Compte('Douglas',64);
            $this->expectException('Exception');
            $c->retirer(100);
        }
        public function ComptePourMontant(){
            return [[400.2,200.2],[500.8,300.8],[623.5,423.5],[768.3,568.3]];
        }
        /**
         * @dataProvider ComptePourMontant
        */
        public function testMultiMontant($sal,$mont){
            $c=new Compte("Ragnar",$sal);
            $this->assertSame($mont,$c->retirer(200));
        }
    }