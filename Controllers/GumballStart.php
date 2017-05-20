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
use State\Models\HasQuarterState;

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

    private $guide;

    private $message;

    private $tray;
    /**
     *
     */
    public function __construct()
    {
        $this->gumballMachine = new GumballMachine(5);
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

        $this->message  = $this->gumballMachine->toString();
        include_once realpath(__DIR__ . "/../public/views/html/index.html");

        $this->tray    = '';
        $this->message = '';
        $this->guide   = '';
    }

    private function route(array $arr)
    {
        $way = "action";
        $key = key($arr);
        if (isset($key)) {
            $way .= ucfirst((string)trim($key));
        }
        return $way;
    }

    private function actionSlot()
    {
        $this->guide = $this->gumballMachine->insertQuarter();
    }

    private function actionBuy()
    {
        $this->guide = $this->gumballMachine->turnCrank();

        if ($this->gumballMachine->getBallRelease() === true) {
            $this->tray = "ball";
            $this->gumballMachine->resetBallRelease();
        }
    }

    private function actionReturn()
    {
        if ($this->gumballMachine->getState() instanceof HasQuarterState) {
            $this->tray = "quarter";
    }
        $this->guide = $this->gumballMachine->ejectQuarter();
    }

    private function actionRefill()
    {
        if ($this->gumballMachine->getState() === $this->gumballMachine->getSoldOutState()) {
            $count = (int)$_GET['refill'];
            $this->gumballMachine->refill($count);
        }
    }

    public function __call($name = '', $arguments = '')
    {
        $this->message = "\n" . $name.  "\n";
    }
}
