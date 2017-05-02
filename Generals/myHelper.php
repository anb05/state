<?php
/**
 * Learn Design Patterns 
 * Файл содержаший набор функций, обеспечивающих функционирование приложения:
 *     автозагрузку;
 *
 * PHP version 7.0.1
 *
 * @category Learn
 *
 * @package State
 *
 * @author Anb05 <alexandr05@list.ru>
 *
 * @license MIT <https://opensource.org/licenses/MIT>
 *
 * @link https://github.com/anb05/state.git
 */

declare(strict_types=1);

/**
 * Автозагрузчик классов
 *
 * @param string $class class namespace
 *
 * @return string path to file class
 */
function autoload($class)
{
    $dirName = explode("\\", $class);
    unset($dirName[0]);

    $path = realpath(
        __DIR__ . "/../" . DIRECTORY_SEPARATOR .
        implode(DIRECTORY_SEPARATOR, $dirName) .
        ".php"
    );

    if (is_file($path)) {
        include_once $path;
    }
    return false;
}

spl_autoload_register('autoload');

