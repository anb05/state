<?php
/**
 * This file contain a class with SoldState code
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
 * Class SoldState
 * This class encapsulate the code with Sold State
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
class SoldState implements State
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
        return "Please wait, we're already giving you a gumball";
    }

    /**
     * This function change state to "NoQuarterState"
     *
     * @return string
     */
    public function ejectQuarter(): string
    {
        return "Sorry, you already turned the crank";
    }

    /**
     * This function change state to "SoldState"
     *
     * @return string
     */
    public function turnCrank(): string
    {
        return "Turning twice doesn't get you another gumball!";
    }

    /**
     * This function change state to "SoldState" or "SoldOutState
     *
     * @return string
     */
    public function dispense(): string
    {
        $this->gumballMachine->releaseBall();

        if ($this->gumballMachine->getCount() > 0) {
            $this->gumballMachine->setState($this->gumballMachine->getNoQuarterState());
            return "";
        }
        $this->gumballMachine->setState($this->gumballMachine->getSoldOutState());
        return "Oops, out of gumballs!";
    }

    public function toString() : string
    {
        return "dispensing a gumball";
    }
}