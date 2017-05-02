<?php
/**
 * This file contain a class with HasQuarterState code
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

namespace State\Models;

use \State\Contracts\State;

/**
 * Class HasQuarterState
 * This class encapsulate the code with Has Quarter State
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
class HasQuarterState implements State
{
    private $gumballMachine;

    public function __construct(GumballMachine $gumballMachine)
    {
        $this->gumballMachine = $gumballMachine;
    }

    /**
     * This function change state to "HasQuarterState"
     *
     * @return string
     */
    public function insertQuarter(): string
    {
        return "You can\'t insert another quarter";
    }

    /**
     * This function change state to "NoQuarterState"
     *
     * @return string
     */
    public function ejectQuarter(): string
    {
        $this->gumballMachine->setState($this->gumballMachine->getNoQuarterState());

        return "Quarter returned";
    }

    /**
     * This function change state to "SoldState"
     *
     * @return string
     */
    public function turnCrank(): string
    {
        $this->gumballMachine->setState($this->gumballMachine->getSoldState());

        return "You turned...";
    }

    /**
     * This function change state to "SoldState" or "SoldOutState
     *
     * @return string
     */
    public function dispense(): string
    {
        return "No Gumball dispensed";
    }

    public function toString() : string
    {
        return "waiting for turn of crank";
    }
}