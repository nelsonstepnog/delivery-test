<?php

namespace Delivery\AcceptanceTest\Helper;

use Codeception\Exception\ModuleException;
use Codeception\Module;
use Facebook\WebDriver\Interactions\WebDriverActions;

/**
 * Class Acceptance
 * Класс хэлпера для приемочного тестирования.
 *
 * @package Delivery\AcceptanceTest\Helper
 */
class Acceptance extends Module
{
    /**
     * Метод для получения модуля WebDriver.
     *
     * @return Module|Module\WebDriver
     * @throws ModuleException
     */
    protected function getWebDriverModule()
    {
        return $this->getModule('WebDriver');
    }

    /**
     * Метод для поиска активного попапа с подтверждением.
     *
     * @throws ModuleException
     */
    public function findClickableOk()
    {
        $webDriver = $this->getWebDriverModule();
        $popups    = $webDriver->_findElements('div.ant-popover-inner > div > div');
        foreach ($popups as $popup) {
            $ok = $webDriver->_findClickable($popup, 'OK');
            $ok->click();
        }
    }

    /**
     * Метод для поиска активного попапа с отменой.
     *
     * @throws ModuleException
     */
    public function findClickableCancel()
    {
        $webDriver = $this->getWebDriverModule();
        $popups    = $webDriver->_findElements('div.ant-popover-inner > div > div');
        foreach ($popups as $popup) {
            $ok = $webDriver->_findClickable($popup, 'Отмена');
            $ok->click();
        }
    }
}
