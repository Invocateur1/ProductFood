<?php
    namespace App\Tests\Entity;
    use App\Entity\Personne;
    use PHPUnit\Framework\TestCase;
    class PersonneTest extends TestCase{
        public function testAge(){
            $personne=new Personne("Amr","Rami",81);
            $this->assertSame("Majeur",$personne->categorie());
        }
        public function testAge2(){
            $empereur=new Personne("Valerius","Majorianus",5);
            $this->assertSame("Mineur",$empereur->categorie());
        }
        public function testInvalideAge(){
            $p=new Personne("Flavius","Aurelian",-37);
            $this->expectException("Exception");
            $p->categorie();
        }
        public function AgeForPerson(){
            return [[13,"Mineur"],[126,"Majeur"],[8,"Mineur"],[49,"Majeur"]];
        }
        /**
         * @dataProvider AgeForPerson
         */
        public function testMultiAge($age,$categ){
            $per=new Personne("Julius","Anthemius",$age);
            $this->assertSame($categ,$per->categorie());
        }
    }