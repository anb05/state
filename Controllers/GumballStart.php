<?php
/**
 * This file contain a class with GumballMachine code
 *
 * PHP version 7.1.2
 *
 * @category Learn
 *
 * @package State
 *
 * @author anb05 <alexandr05@list.ru>
 *
 * @license MIT <https://opensource.org/licenses/MIT>
 *
 * @link https://github.com/anb05/state.git
 */

declare(strict_types=1);

namespace State\Controllers;

use State\Models\GumballMachine;

/**
 * This class start application
 *
 * @category Learn
 *
 * @package State
 *
 * @author anb05 <alexandr05@list.ru>
 *
 * @license MIT <https://opensource.org/licenses/MIT>
 *
 * @link https://github.com/anb05/state.git
 */
class GumballStart
{
    private $gumballMachine;

    private $message;
    /**
     *
     */
    public function __construct()
    {
        $this->gumballMachine = new GumballMachine(50);
    }

    /**
     * This function have a main logic for application
     *
     * @return void
     */
    public function run() : void
    {
        if (!empty($_GET)) {
            $wey = $this->route($_GET);
            $this->$wey();
        }

        $message  = $this->gumballMachine->toString();
        $message .= "\n";
//        $message .= $this->gumballMachine->getState()->toString();
        $message .= $this->message;
        include_once realpath(__DIR__ . "/../public/views/html/index.html");
//        echo "<br> Состояние this::message <br>\n";
//        var_dump($this->message);
//        echo "<br>OBJECT<br>";
//        var_dump(get_class($this->gumballMachine->getState()));
    }

    private function route(array $arr)
    {
        $way = "action";
        $key = key($arr);
        if (isset($key)) {
            $way .= ucfirst((string)trim($key));
        }
//        echo "<br>" . $way . "<br>";
        return $way;
    }

    private function actionSlot()
    {
        $this->message = $this->gumballMachine->insertQuarter();
//        $this->message = "<br> Роутер" . __METHOD__ . "<br>" . $message . "<br>";
    }

    private function actionBuy()
    {
        $this->message = $this->gumballMachine->turnCrank();
//        $this->message = "<br> Роутер" . __METHOD__ . "<br>";
    }

    private function actionReturn()
    {
        $this->message = $this->gumballMachine->ejectQuarter();
//        $this->message = "<br> Роутер" . __METHOD__ . "<br>";
    }

    private function actionRefill()
    {
//        $count = (int)$_GET['refill'];
//        $this->message = "<br> Роутер" . __METHOD__ . "<br> Balls = " . (string)$count . "<br>";
    }

    public function __call($name = '', $arguments = '')
    {
        $this->message = "\n" . $name.  "\n";
    }
}
