<?php
/**
 * This file contain a class with SoldOutState code
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
 * Class SoldOutState
 * This class encapsulate the code with Sold Out State
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
class SoldOutState implements State
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
        return "You can\'t insert another quarter, the machine is sold out";
    }

    /**
     * This function change state to "NoQuarterState"
     *
     * @return string
     */
    public function ejectQuarter(): string
    {
        return "You can't eject, you haven't inserted a quarter yet";
    }

    /**
     * This function change state to "SoldState"
     *
     * @return string
     */
    public function turnCrank(): string
    {
        return "You turned, but there are no gumballs";
    }

    /**
     * This function change state to "SoldState" or "SoldOutState
     *
     * @return string
     */
    public function dispense(): string
    {
        return "No gumball dispensed";
    }

    public function toString() : string
    {
        return "sold out";
    }
}