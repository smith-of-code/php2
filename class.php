<?php
    class Computer {
        public $brand;
        public $model;
        public $cpu;
        public $ram;
        public $hdd;

        protected $state = false;
        protected $useRam = 0;

        public function __construct($brand, $model, $cpu, $ram, $hdd)
        {
            $this->brand = $brand;
            $this->model = $model;
            $this->cpu = $cpu;
            $this->ram = $ram;
            $this->hdd = $hdd;
        }



//        Включение\выключение питания
        public function power(){
            $this->state = !$this->state;
            $this->load();
        }
        protected function load (){
            if ($this->state){
                $this->useRam = 300;
                echo "<h2>Компьютер включен</h2>";
                echo $this->systemParams();
            }else{
               echo "<h2>Компьютер выключен</h2>";
            }
        }

        protected function systemParams(){
            return "
                <p> $this->brand $this->model </p>
                <p>ЦП: $this->cpu </p>
                <p>ОЗУ: $this->ram</p>
                <p>Хранилище: $this->hdd</p>
                ";
        }


    }


    class Notebook extends Computer {
        public $battary;
        public $keyboard;
        public $monitorSize;

        private $keyIllum = null;
        private $monitorBacklight = null;
        private $battaryLevel = 50;

        public function __construct($brand, $model, $cpu, $ram, $hdd,$battary, $keyboard, $monitorSize)

        {
            $this->battary = $battary;
            $this->keyboard = $keyboard;
            $this->monitorSize = $monitorSize;
            parent::__construct($brand, $model, $cpu, $ram, $hdd);
        }
//        Включение\выключение подсветки клавиатуры
        public function changeIllum () {
            $this->keyIllum = !$this->keyIllum;
    }
        private function energySavingMode(){
                $this->keyIllum = false;
                $this->monitorBacklight = 10;
                echo 'включено энергосбережение';
    }

        protected function load (){
            if ($this->state){
                echo "<h2>Компьютер включен</h2>";
                $this->keyIllum = true;
                $this->monitorBacklight = 30;
                $this->battaryLevel;
                echo $this->systemParams();
            }else{
                echo "<h2>Компьютер выключен</h2>";
            }
        }
        protected function systemParams()
        {
            return parent::systemParams() .
                "
            <p>Емкость батареи: $this->battary</p>
            <p>Тип клавиатуры: $this->keyboard</p>
            <p>Размер экрана: $this->monitorSize</p>
                " . $this->getSettings();

        }
        private  function getIllumMessage(){
          return  $this->keyIllum? 'Включенно' : 'Выключенно';
        }

        protected function getSettings(){
            if ($this->battaryLevel <= 15){
                $this->energySavingMode();
            }
            return "
            <h3>Текущие показатели</h3>
            <p>Заряд батареи: $this->battaryLevel</p>
            <p>Подсветка клавиатуры:". $this->getIllumMessage() . "</p>
            <p>Яркость экрана: $this->monitorBacklight</p>
            ";
        }
    //        Поиграть в игру
        public function playGame($hour){
            if ($this->state){
                $this->battaryLevel -= $hour * 10;
                $this->useRam += 1000;
                echo "
            <h2>Поиграли в игру</h2>
            " . $this->getSettings();
            }else{
                echo 'Включите компьютер';
            }

        }

    }
    class Monoblock extends Computer
    {
        public $powerSupply;
        public $monitorSize;
        public $touchscreen;

        public function __construct($brand, $model, $cpu, $ram, $hdd,$powerSupply, $monitorSize, $touchscreen)
        {

            $this->powerSupply = $powerSupply;
            $this->monitorSize = $monitorSize;
            $this->touchscreen = $touchscreen;
            parent::__construct($brand, $model, $cpu, $ram, $hdd);
        }

        public function calibrateTouchScreen(){
            echo "<h2>Сенсор откалиброванн</h2>";
        }
        public function coding(){
            $this->useRam += 200;
            echo "<h2>Кодим</h2>";
        }
        protected function systemParams()
        {
            return parent::systemParams() ."
            <p>Размер экрана: $this->monitorSize</p> 
            ";

        }
    }


    $lenovo = new Notebook('Lenovo', 'z500', 'i7','8GB','1TB','3000mah','acutype','15,6');
    $lenovo->power();
    $lenovo->playGame(4);

echo "<hr>";

    $asus = new Monoblock('asus', 'ddfe333', 'i3','4GB','10TB','500W','25','емкостный');
    $asus->power();
    $asus->calibrateTouchScreen();



