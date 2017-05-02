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

namespace State\Models;

use State\Contracts\State;

/**
 * Class GumballMachine
 * This class is a main for Gumball Machine
 *
 * @category Learn
 *
 * @package State\Models
 *
 * @author anb05 <alexandr05@list.ru>
 *
 * @license MIT <https://opensource.org/licenses/MIT>
 *
 * @link https://github.com/anb05/state.git
 */
class GumballMachine
{
    private $soldOutState;

    private $noQuarterState;

    private $hasQuarterState;

    private $soldState;

    private $state = 0;

    private $count = 0;

    public function __construct(int $numberGumballs)
    {
        $this->soldOutState    = new SoldOutState($this);
        $this->noQuarterState  = new NoQuarterState($this);
        $this->hasQuarterState = new HasQuarterState($this);
        $this->soldState       = new SoldState($this);

        $this->count = $numberGumballs;
        if ($numberGumballs > 0) {
            $this->state = $this->noQuarterState;
        }
    }

    public function insertQuarter() : void
    {
        $this->state->insertQuarter();
    }

    public function ejectQuarter() : void
    {
        $this->state->ejectQuarter();
    }

    public function turnCrank() : void
    {
        $this->state->turnCrank();
        $this->state->dispense();
    }

    public function setState(State $state) : void
    {
        $this->state = $state;
    }

    public function releaseBall() : string
    {
        if ($this->count != 0) {
            $this->count -= 1;
        }

        return "A gumball comes rolling out the slot ...";
    }

    public function getCount() : int
    {
        return $this->count;
    }

    public function refill(int $count) : void
    {
        $this->count = $count;
        $this->state = $this->noQuarterState;
    }

    public function getState() : State
    {
        return $this->state;
    }

    public function getSoldOutState() : State
    {
        return $this->soldOutState;
    }

    public function getNoQuarterState() : State
    {
        return $this->noQuarterState;
    }

    public function getHasQuarterState() : State
    {
        return $this->hasQuarterState;
    }

    public function getSoldState() : State
    {
        return $this->soldState;
    }

    public function toString() : string
    {
        $string = "\nMighty Gumball, Inc.";
        $string .= "\nPHP-enabled Standing Gumball Model #2017";
        $string .= "\nInventory: " . $this->count . " gumball";
        if (1 != $this->count) {
            $string .= "s";
        }
        $string .= "\n";
        $string .= "Machine is " . $this->state . "\n";

        return $string;
    }
}
