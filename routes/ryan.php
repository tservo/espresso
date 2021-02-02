<?php



    /*
        Im just grabbing some input!
    */
    $stringArgs = explode(',',$argv[1]);
    $args = [];
    for ($i=0; $i < count($stringArgs); $i = $i+2) {
        $args[$stringArgs[$i]] = $stringArgs[$i+1];
    }
    print_r($args);
    print_r('------------------------------------------------------------' . PHP_EOL);
    /*
        You should start your code below here!
    */

    class Fruit {
        private $cost;
        private $product_code;
        private $product_type;
       
        function __construct($cost, $product_code, $product_type){
            $this->cost = $cost;
            $this->product_code = $product_code;
            $this->product_type = $product_type;
        }
        
        public function getCost() {
            return $this->cost;
        }
        
        public function setCost($cost) {
            $this->cost = $cost;
        }
        
        public function getProductCode() {
            return $this->product_code;
        }
        
        public function setProductCode($productCode) {
            $this->product_code = $productCode;
        }
        
        public function getProductType() {
            return $this->product_type;
        }
        
        public function setProductType($productType) {
            $this->product_type = $productType;
        }
       
    }
   
   class Apple extends Fruit {
       function __construct($cost, $product_code) {
           parent::__construct($cost, $product_code, 'Apple');
       }
    }
    
    class Banana extends Fruit {
        function __construct($cost, $product_code) {
            parent::__construct($cost, $product_code, 'Banana');
        }
        
        public function getCost() {
            return (parent::getCost() / 2);
        }
    }
    
    // $fruit = Fruit();
    if ($args['product_type'] == 'Apple') {
        $fruit = new Apple($args['cost'],$args['product_code']);
    } else {
        $fruit = new Banana($args['cost'], $args['product_code']);
    }
   
    print_r(sprintf('Cost: %s Product Code: %s Product Type: %s',
                    $fruit->getCost(),$fruit->getProductCode(),$fruit->getProductType()));


?>