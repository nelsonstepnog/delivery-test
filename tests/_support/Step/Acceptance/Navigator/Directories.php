<?php

namespace Delivery\AcceptanceTest\Step\Acceptance\Navigator;

use Exception;
use Delivery\AcceptanceTest\AcceptanceTester;
use Delivery\AcceptanceTest\Page\Layouts\MainNavbar;
use Delivery\AcceptanceTest\Page\Layouts\DirectoriesNavbar;

/**
 * Class Directories
 * Класс для перехода по разделам справочника.
 *
 * @package Delivery\AcceptanceTest\Step\Acceptance\Navigator
 */
class Directories extends AcceptanceTester
{
    /**
     * Метод для перехода на справочник топлива.
     *
     * @throws Exception
     */
    public function fuel()
    {
        $this->waitForElementNotVisible(MainNavbar::$loadIcon, $this::$timeOut);
        $this->click(DirectoriesNavbar::$fuel['locator']);
        $this->waitForElement(MainNavbar::$viewNewTableWithData, $this::$timeOut);
        if ($this->seeElement(DirectoriesNavbar::$fuelTitle)) {
            $this->seeElement(MainNavbar::$viewNewTableWithData);
        } else {
            $this->click(DirectoriesNavbar::$fuel['locator']);
        }
        $this->waitForElement(DirectoriesNavbar::$fuelTitle, $this::$timeOut);
        $this->seeElement(DirectoriesNavbar::$fuelTitle);
        $this->waitForElement(MainNavbar::$viewNewTableWithData, $this::$timeOut);
    }

    /**
     * Метод для перехода на справочник типов транспортных средств.
     *
     * @throws Exception
     */
    public function vehicleType()
    {
        $this->waitForElementNotVisible(MainNavbar::$loadIcon, $this::$timeOut);
        $this->click(DirectoriesNavbar::$vehicleType['locator']);
        $this->waitForElement('//a[contains(@class, "ant-btn ant-btn-primary t-t_l")]', $this::$timeOut);
        if ($this->seeElement(DirectoriesNavbar::$vehicleTypeTitle)) {
            $this->seeElement(MainNavbar::$viewNewTableWithData);
        } else {
            $this->click(DirectoriesNavbar::$vehicleType['locator']);
        }
        $this->waitForElement(DirectoriesNavbar::$vehicleTypeTitle, $this::$timeOut);
        $this->seeElement(DirectoriesNavbar::$vehicleTypeTitle);
        $this->waitForElement('//a[contains(@class, "ant-btn ant-btn-primary t-t_l")]', $this::$timeOut);
        // $this->waitForElement(MainNavbar::$viewTableWithData, $this::$timeOut);
    }
}
