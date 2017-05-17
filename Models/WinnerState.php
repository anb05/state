<?php
/**
 * This file contain a class with WinnerState code
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
class WinnerState implements State
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
        return "Please wait, we're already giving you a Gumball\n";
    }

    /**
     * This function change state to "NoQuarterState"
     *
     * @return string
     */
    public function ejectQuarter(): string
    {
        return "Please wait, we're already giving you a Gumball\n";
    }

    /**
     * This function change state to "SoldState"
     *
     * @return string
     */
    public function turnCrank(): string
    {
        return "Turning again doesn't get you another gumball!\n";
    }

    /**
     * This function change state to "SoldState" or "SoldOutState
     *
     * @return string
     */
    public function dispense(): string
    {
        $msg = $this->gumballMachine->releaseBall();

        if ($this->gumballMachine->getCount() == 0) {
            $this->gumballMachine->setState($this->gumballMachine->getSoldOutState());
        } else {
            $msg .= "\n" . $this->gumballMachine->releaseBall();
            if ($this->gumballMachine->getCount() > 0) {
                $this->gumballMachine->setState($this->gumballMachine->getNoQuarterState());
            } else {
                $this->gumballMachine->setState($this->gumballMachine->getHasQuarterState());
                return $msg . "\nOops, out of gumballs!\n";
            }
        }
        return $msg . "\nYOU'RE A WINNER! You get two gumballs for your quarter\n";
    }

    public function toString() : string
    {
        return "dispensing two gumballs for your quarter, because YOU'RE A WINNER!\n";
    }
}