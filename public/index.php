<?php
/**
 * The file is a Front Controller
 *
 * PHP version 7.1
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

session_start();

require_once __DIR__ . "/../Generals/myHelper.php";

if (!empty($_SESSION['remember'])) {
    $loader = unserialize($_SESSION['remember']);
    $loader->run();
} else {
    $loader = new \State\Controllers\GumballStart();
    $loader->run();
}
$_SESSION['remember'] = serialize($loader);

//echo "<p>GET</p>";
//var_dump($_GET);
