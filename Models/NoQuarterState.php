<?php
/**
 * This file contain a class with NoQuarterStat code
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
 * Class NoQuarterStat
 * This class encapsulate the code with No Quarter Stat
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
class NoQuarterState implements State
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
        $this->gumballMachine->setState($this->gumballMachine->getHasQuarterState());

        return "You inserted a quarter\n";
    }

    /**
     * This function change state to "NoQuarterState"
     *
     * @return string
     */
    public function ejectQuarter(): string
    {
        return "You haven't inserted a quarter\n";
    }

    /**
     * This function change state to "SoldState"
     *
     * @return string
     */
    public function turnCrank(): string
    {
        return "Your turned, but there's no quarter\n";
    }

    /**
     * This function change state to "SoldState" or "SoldOutState
     *
     * @return string
     */
    public function dispense(): string
    {
        return "You need to pay first\n";
    }

    public function toString() : string
    {
        return "waiting for quarter\n";
    }
}