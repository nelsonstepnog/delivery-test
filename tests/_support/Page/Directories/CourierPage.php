<?php

namespace UserstoryDelivery\AcceptanceTest\Page\Directories;

/**
 * Class CourierPage
 * Класс паттерна Pageobject страницы справочника курьеров.
 *
 * @package UserstoryDelivery\AcceptanceTest\Page\Directories
 */
class CourierPage
{
    /**
     * УРЛ страницы справочника курьеров.
     *
     * @var string
     */
    public static $URL = '/directories/courier';

    /**
     * Заголовок страницы справочника курьеров.
     *
     * @var array
     */
    public static $title = [
        'text'    => 'Курьеры',
        'locator' => 'h1[data-test="title"]',
    ];

    /**
     * Первая колонка в таблице курьеров.
     *
     * @var array
     */
    public static $firstTh = [
        'text'    => 'ФИО',
        'locator' => '//div/div[1]/div[1]/span',
    ];

    /**
     * Вторая колонка в таблице курьеров.
     *
     * @var array
     */
    public static $secondTh = [
        'text'    => 'Локация',
        'locator' => '//div/div[1]/div[2]/span',
    ];

    /**
     * Третья колонка в таблице курьеров.
     *
     * @var array
     */
    public static $thirdTh = [
        'text'    => 'Склад',
        'locator' => '//div/div[1]/div[3]/span',
    ];

    /**
     * Четвертая колонка в таблице курьеров.
     *
     * @var array
     */
    public static $fourthTh = [
        'text'    => 'Телефон',
        'locator' => '//div/div[1]/div[4]/span',
    ];

    /**
     * Пятая колонка в таблице курьеров.
     *
     * @var array
     */
    public static $fifthTh = [
        'text'    => 'Транспорт',
        'locator' => '//div/div[1]/div[5]/span',
    ];

    /**
     * Шестая колонка в таблице курьеров.
     *
     * @var array
     */
    public static $sixthTh = [
        'text'    => 'Статус',
        'locator' => '//div/div[1]/div[6]/span',
    ];

    /**
     * Кнопка добавления курьера.
     *
     * @var array
     */
    public static $createCourierButton = [
        'text'    => 'добавить',
        'locator' => 'a[href="/directories/courier/create"]',
    ];

    /**
     * Титул попапа добавления курьера.
     *
     * @var array
     */
    public static $createPopupTitle = [
        'text'    => 'Добавить курьера',
        'locator' => '#rcDialogTitle0',
    ];

    /**
     * Титул попапа редактирования курьера.
     *
     * @var array
     */
    public static $updatePopupTitle = [
        'text'    => 'Редактирование курьера',
        'locator' => '#rcDialogTitle0',
    ];

    /**
     * Лейбл для поля фамилии в попапе добавления курьера.
     *
     * @var array
     */
    public static $labelLastNameInPopup = [
        'text'    => 'Фамилия',
        'locator' => 'label[for="lastName"]',
    ];

    /**
     * Лейбл для поля имени в попапе добавления курьера.
     *
     * @var array
     */
    public static $labelFirstNameInPopup = [
        'text'    => 'Имя',
        'locator' => 'label[for="firstName"]',
    ];

    /**
     * Лейбл для поля отчества в попапе добавления курьера.
     *
     * @var array
     */
    public static $labelPatronymicInPopup = [
        'text'    => 'Отчество',
        'locator' => 'label[for="patronymic"]',
    ];

    /**
     * Лейбл для поля телефона в попапе добавления курьера.
     *
     * @var array
     */
    public static $labelPhoneInPopup = [
        'text'    => 'Телефон',
        'locator' => 'label[for="phone"]',
    ];

    /**
     * Лейбл для поля локации в попапе добавления курьера.
     *
     * @var array
     */
    public static $labelLocationInPopup = [
        'text'    => 'Локация',
        'locator' => 'label[for="locationId"]',
    ];

    /**
     * Лейбл для поля склада в попапе добавления курьера.
     *
     * @var array
     */
    public static $labelWarehouseInPopup = [
        'text'    => 'Склад',
        'locator' => 'label[for="defaultWarehouseId"]',
    ];

    /**
     * Лейбл для поля транспорта в попапе добавления курьера.
     *
     * @var array
     */
    public static $labelVehicleInPopup = [
        'text'    => 'Транспортное средство',
        'locator' => 'label[for="vehicleId"]',
    ];

    /**
     * Лейбл чекбокса статуса в попапе добавления курьера.
     *
     * @var array
     */
    public static $labelStatusInPopup = [
        'text'    => 'Статус курьера',
        'locator' => 'label[for="isNotWork"]',
    ];

    /**
     * Лейбл для поля токена в попапе курьера.
     *
     * @var array
     */
    public static $labelTokenInPopup = [
        'text'    => 'Token of courier',
        'locator' => 'label[for="token"]',
    ];

    /**
     * Поле фамилии в попапе добавления курьера.
     *
     * @var array
     */
    public static $lastNameFieldInAddPopup = [
        'text'    => null,
        'locator' => '#lastName',
    ];

    /**
     * Поле имени в попапе добавления курьера.
     *
     * @var array
     */
    public static $firstNameFieldInAddPopup = [
        'text'    => null,
        'locator' => '#firstName',
    ];

    /**
     * Поле отчества в попапе добавления курьера.
     *
     * @var array
     */
    public static $patronymicFieldInAddPopup = [
        'text'    => null,
        'locator' => '#patronymic',
    ];

    /**
     * Поле телефона в попапе добавления курьера.
     *
     * @var array
     */
    public static $phoneFieldInAddPopup = [
        'text'    => null,
        'locator' => '#phone',
    ];

    /**
     * Поле селекта локации в попапе добавления курьера.
     *
     * @var array
     */
    public static $locationFieldInAddPopup = [
        'text'    => null,
        'locator' => 'div[data-test="location-selector"]',
    ];

    /**
     * Поле селекта склада в попапе добавления курьера.
     *
     * @var array
     */
    public static $warehouseFieldInAddPopup = [
        'text'    => null,
        'locator' => 'div[data-test="warehouse-selector"]',
    ];

    /**
     * Поле селекта транспортного средства в попапе добавления курьера.
     *
     * @var array
     */
    public static $vehicleFieldInAddPopup = [
        'text'    => null,
        'locator' => 'div[data-test="vehicle-selector"]',
    ];

    /**
     * Поле токена в попапе редактирования курьера.
     *
     * @var array
     */
    public static $tokenFieldInPopup = [
        'text'    => null,
        'locator' => '#token',
    ];

    /**
     * Иконка удаления выбранного транспорта в селекте транспортного средства в попапе добавления курьера.
     *
     * @var array
     */
    public static $iconDelVehicleInField = [
        'text'    => null,
        'locator' => '//*[@id="vehicleId"]/div/span[1]',
    ];

    /**
     * Иконка удаления выбранного склада в селекте склада в попапе добавления курьера.
     *
     * @var array
     */
    public static $iconDelWarehouseInField = [
        'text'    => null,
        'locator' => '//*[@id="defaultWarehouseId"]/div/span[1]',
    ];

    /**
     * Блок-подтверждение действия с вопросом в сообщении о перегенерации токена в попапе добавления курьера.
     *
     * @var array
     */
    public static $messageGenTokenInPopup = [
        'text'    => 'Перегенерировать',
        'locator' => 'div[class="ant-popover-message-title"]',
    ];

    /**
     * Иконка генерации токена в попапе добавления курьера.
     *
     * @var array
     */
    public static $iconGenerateTokenInPopup = [
        'text'    => null,
        'locator' => '//div[2]/div/span/div/span/a[2]/i',
    ];

    /**
     * Иконка копирования токена в попапе добавления курьера.
     *
     * @var array
     */
    public static $iconCopyTokenInPopup = [
        'text'    => null,
        'locator' => '//div[2]/div/span/div/span/a[1]/i',
    ];

    /**
     * Чекбокс "Не работает" в попапе добавления курьера.
     *
     * @var string
     */
    public static $checkBoxINWInPopup = '#isNotWork';

    /**
     * Кнопка отмены формы в попапе добавления курьера.
     *
     * @var array
     */
    public static $cancelButtonInAddPopup = [
        'text'    => 'Отмена',
        'locator' => 'button[data-test="form_courier_cancel"]',
    ];

    /**
     * Кнопка отмены формы в попапе редактирования курьера.
     *
     * @var array
     */
    public static $cancelButtonInUpdatePopup = [
        'text'    => 'Отмена',
        'locator' => 'button[data-test="form_courier_cancel"]',
    ];

    /**
     * Кнопка подтверждения формы в попапе добавления курьера.
     *
     * @var array
     */
    public static $submitButtonInAddPopup = [
        'text'    => 'Добавить',
        'locator' => 'button[data-test="form_courier_submit"]',
    ];

    /**
     * Кнопка подтверждения формы редактирования курьера.
     *
     * @var array
     */
    public static $submitButtonInUpdatePopup = [
        'text'    => 'Сохранить',
        'locator' => 'button[data-test="form_courier_submit"]',
    ];

    /**
     * Иконка фильтра по ФИО у справочника курьеров в списке.
     *
     * @var array
     */
    public static $searchIconName = [
        'text'    => 'Фильтр',
        'locator' => '//div[1]/div[1]/i',
    ];

    /**
     * Поле поиска у фильтра по ФИО у справочника курьеров в списке.
     *
     * @var array
     */
    public static $filterFieldName = [
        'text'    => 'Введите текст',
        'locator' => 'input[class="ant-input"]',
    ];

    /**
     * Иконка фильтра по локации у справочника курьеров в списке.
     *
     * @var array
     */
    public static $searchIconByLocation = [
        'text'    => 'Фильтр',
        'locator' => '//div[1]/div[2]/i',
    ];

    /**
     * Блок поля поиска фильтра по локации курьера в списке.
     *
     * @var array
     */
    public static $filterFieldLocation = [
        'text'    => 'Введите текст',
        'locator' => 'form[class="ant-form ant-form-inline filter"]',
    ];

    /**
     * Поле поиска фильтра по локации курьера в списке.
     *
     * @var array
     */
    public static $secFilterFieldLocation = [
        'text'    => 'Введите текст',
        'locator' => 'input[class="ant-select-search__field"]',
    ];

    /**
     * Иконка фильтра по складу у справочника курьеров в списке.
     *
     * @var array
     */
    public static $searchIconByWarehouse = [
        'text'    => 'Фильтр',
        'locator' => '//div[1]/div[3]/i',
    ];

    /**
     * Блок поля поиска фильтра по складу курьера в списке.
     *
     * @var array
     */
    public static $filterFieldWarehouse = [
        'text'    => 'Введите текст',
        'locator' => 'form[class="ant-form ant-form-inline filter"]',
    ];

    /**
     * Поле поиска фильтра по складу курьера в списке.
     *
     * @var array
     */
    public static $secFilterFieldWarehouse = [
        'text'    => 'Введите текст',
        'locator' => 'input[class="ant-select-search__field"]',
    ];

    /**
     * Сообщение об удалении курьера.
     *
     * @var array
     */
    public static $deleteCourierMessage = [
        'text'    => 'Курьер удалён!',
        'locator' => '.ant-notification',
    ];

    /**
     * Сообщение о создании курьера.
     *
     * @var array
     */
    public static $addCourierMessage = [
        'text'    => 'Успешно создано!',
        'locator' => '.ant-notification',
    ];

    /**
     * Сообщение о редактировании Курьера.
     *
     * @var array
     */
    public static $updateCourierMessage = [
        'text'    => 'Изменения сохранены!',
        'locator' => '.ant-notification',
    ];

    /**
     * Сообщение о пустом поле фамилии курьера.
     *
     * @var array
     */
    public static $lastNameEmptyMessage = [
        'text'    => 'Пожалуйста, введите фамилию!',
        'locator' => '.ant-form-explain',
    ];

    /**
     * Сообщение о пустом поле имени курьера.
     *
     * @var array
     */
    public static $firstNameEmptyMessage = [
        'text'    => 'Пожалуйста, введите имя!',
        'locator' => '.ant-form-explain',
    ];

    /**
     * Сообщение о пустом поле телефона курьера.
     *
     * @var array
     */
    public static $phoneEmptyMessage = [
        'text'    => 'Пожалуйста, введите номер телефона!',
        'locator' => '.ant-form-explain',
    ];

    /**
     * Сообщение о пустом поле локации курьера.
     *
     * @var array
     */
    public static $locationEmptyMessage = [
        'text'    => 'Пожалуйста, выберите локацию!',
        'locator' => '.ant-form-explain',
    ];

    /**
     * Сообщение о пустом поле склада курьера.
     *
     * @var array
     */
    public static $warehouseEmptyMessage = [
        'text'    => 'Пожалуйста, укажите склад!',
        'locator' => '.ant-form-explain',
    ];

    /**
     * Сообщение о превышении количества символов в поле фамилии курьера.
     *
     * @var array
     */
    public static $lastNameLimitMessage = [
        'text'    => 'Значение «Last Name» должно содержать максимум 255 символов.',
        'locator' => '.ant-form-explain',
    ];

    /**
     * Сообщение о превышении количества символов в поле имени курьера.
     *
     * @var array
     */
    public static $firstNameLimitMessage = [
        'text'    => 'Значение «First Name» должно содержать максимум 255 символов.',
        'locator' => '.ant-form-explain',
    ];

    /**
     * Сообщение о превышении количества символов в поле отчества курьера.
     *
     * @var array
     */
    public static $patronymicLimitMessage = [
        'text'    => 'Значение «Patronymic» должно содержать максимум 255 символов.',
        'locator' => '.ant-form-explain',
    ];

    /**
     * Сообщение о превышении количества символов в поле телефона курьера.
     *
     * @var array
     */
    public static $phoneLimitMessage = [
        'text'    => 'Значение «Phone» должно содержать максимум 20 символов.',
        'locator' => '.ant-form-explain',
    ];

    /**
     * Сообщение о неправильном формате ввода символов в поле телефона курьера.
     *
     * @var array
     */
    public static $phoneWrongMessage = [
        'text'    => 'Значение «Phone» должно быть в формате...',
        'locator' => '.ant-form-explain',
    ];

    /**
     * Иконка очистки данных в поле фильтра с лупой.
     *
     * @var array
     */
    public static $clearFilterMagnifierIcon = [
        'text'    => null,
        'locator' => '//i[contains(@class, "anticon d_i-b m_-xs p_xs text_xxs l-h_0")]',
    ];

    /**
     * Иконка очистки данных в поле фильтра с воронкой.
     *
     * @var array
     */
    public static $clearFilterIcon = [
        'text'    => null,
        'locator' => 'span[class="ant-select-selection__clear"]',
    ];

    /**
     * Метод получения локатора у иконки редактирования курьера по локатору его строки в таблице.
     *
     * @param $rowLocator
     *
     * @return string
     */
    public static function getUpdateRowLocator($rowLocator)
    {
        return $rowLocator . ' div a:nth-child(1)';
    }

    /**
     * Метод получения локатора у иконки удаления курьера по локатору его строки в таблице.
     *
     * @param $rowLocator
     *
     * @return string
     */
    public static function getDeleteRowLocator($rowLocator)
    {
        return $rowLocator . ' div a:nth-child(2)';
    }
}
