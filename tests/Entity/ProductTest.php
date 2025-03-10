<?php
    namespace App\Tests\Entity;
    use App\Entity\Product;
    use PHPUnit\Framework\TestCase;
    class ProductTest extends TestCase{
        public function testDefault(){
            $product=new Product('pomme','food',1);
            $this->assertSame(0.055,$product->computeTVA());
        }
        public function testDefault2(){
            $artifact=new Product('Ivory','Jewelry',100);
            $this->assertSame(19.6,$artifact->computeTVA());
        }
        public function testInvalidPrice(){
            $p=new Product('Pomme de terre','food',-6);
            $this->expectException('Exception');
            $p->computeTVA();
        }
        public function productForFood(){
            return [[0,0.0],[1,0.055],[10,0.55],[20,1.1]];
        }
        /**
         * @dataProvider productForFood 
         */
        public function testMultiFood($prix,$tva){
            $p=new Product("product","food",$prix);
            $this->assertSame($tva,$p->computeTVA());
        }
    }
?>