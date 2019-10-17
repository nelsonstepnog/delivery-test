<?php

namespace Delivery\AcceptanceTest\Step\Acceptance;

use Delivery\AcceptanceTest\Page\Layouts\MainNavbar;
use Delivery\AcceptanceTest\Step\Acceptance\Navigator\Directories;

/**
 * Class Navigator
 * Класс для навигации по разделам приложения.
 *
 * @package Delivery\AcceptanceTest\Step\Acceptance
 */
class Navigator extends \Delivery\AcceptanceTest\AcceptanceTester
{
    /**
     * Максимальное время ожидания элементов.
     *
     * @var int
     */
    public static $timeOut = 15;

    /**
     * Метод для перехода в раздел справочники.
     *
     * @return Directories
     * @throws \Exception
     */
    public function directories(): Directories
    {
        $this->amOnPage('/arm');
        $this->waitForElementNotVisible(MainNavbar::$loadIcon, $this::$timeOut);
        $this->waitElement(MainNavbar::$directories);
        $this->waitForElement(MainNavbar::$viewTable, $this::$timeOut);
        $this->click(MainNavbar::$directories['locator']);
        $this->waitForElement(MainNavbar::$viewTable, $this::$timeOut);
        return new Directories(self::getScenario());
    }

    /**
     * Метод для перехода в раздел клиенты.
     *
     * @return Clients
     * @throws \Exception
     */
    public function clients(): Clients
    {
        $this->amOnPage('/arm');
        $this->waitForElementNotVisible(MainNavbar::$loadIcon, $this::$timeOut);
        $this->waitElement(MainNavbar::$clients);
        $this->waitForElement(MainNavbar::$viewTable, $this::$timeOut);
        $this->click(MainNavbar::$clients['locator']);
        $this->waitForElement(MainNavbar::$viewTable, $this::$timeOut);
        return new Clients(self::getScenario());
    }

    /**
     * Метод для перехода в раздел определенного клиента с названием "Клиент для редактирования в автотесте" для доступа во вложенные разделы.
     *
     * @return Clients
     * @throws \Exception
     */
    public function goToClientBeforeTest(): Clients
    {
        $this->clients();
        $this->waitForElement(MainNavbar::$viewTable, $this::$timeOut);
        $nameClient = 'Клиент для редактирования в автотесте';
        $this->click('//div[contains(@class, "ReactVirtualized__Table__row cu_p")]/div[contains(text(), "' . $nameClient . '")]');
        $this->waitForFieldFill(ClientPage::$fullNameFieldInUpdPage['locator'], $nameClient);
        $this->seeInField(ClientPage::$fullNameFieldInUpdPage['locator'], $nameClient);
        return new Clients(self::getScenario());
    }

    /**
     * Метод для перехода в раздел локации.
     *
     * @return Locations
     * @throws \Exception
     */
    public function locations(): Locations
    {
        $this->amOnPage('/arm');
        $this->waitForElementNotVisible(MainNavbar::$loadIcon, $this::$timeOut);
        $this->waitElement(MainNavbar::$locations);
        $this->waitForElement(MainNavbar::$viewTable, $this::$timeOut);
        $this->click(MainNavbar::$locations['locator']);
        $this->waitForElement(MainNavbar::$viewTable, $this::$timeOut);
        return new Locations(self::getScenario());
    }

    /**
     * Метод для перехода в раздел определенной локации с названием "Абакан" для доступа во вложенные разделы.
     *
     * @return Locations
     * @throws \Exception
     */
    public function goToLocationBeforeTest(): Locations
    {
        $this->locations();
        $this->reloadPage();
        $nameLocation = 'Абакан';
        $this->waitForText($nameLocation, $this::$timeOut);
        $this->click('//tr[contains(@class, "ant-table-row ant-table-row-level-0")]//td[contains(text(), "' . $nameLocation . '")]');
        $this->waitForText('Управление локацией', 15);
        $this->waitForElement(MainNavbar::$viewTableWithData, $this::$timeOut);
        return new Locations(self::getScenario());
    }
}
