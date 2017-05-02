<?php
/**
 * Learn Design Patterns
 *
 * This file contain a interface for pattern "State"
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

namespace State\Contracts;

/**
 * Interface State
 *
 * @category Learn
 *
 * @package State\Contracts
 *
 * @author anb05 <alexandr05@list.ru>
 *
 * @license MIT <https://opensource.org/licenses/MIT>
 *
 * @link https://github.com/anb05/state.git
 */
interface State
{
    /**
     * This function change state to "HasQuarterState"
     *
     * @return string
     */
    public function insertQuarter() : string ;

    /**
     * This function change state to "NoQuarterState"
     *
     * @return string
     */
    public function ejectQuarter() : string ;

    /**
     * This function change state to "SoldState"
     *
     * @return string
     */
    public  function turnCrank() : string ;

    /**
     * This function change state to "SoldState" or "SoldOutState
     *
     * @return string
     */
    public  function dispense() : string ;
}
