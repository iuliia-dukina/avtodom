<?php 
$I = new AcceptanceTester($scenario);
$I->amOnUrl('https://www.avtodom.ru');
$I->wantTo('Проверить, что при неправильном вводе email всплывает ошибка');
$I->click('a[href="#popup-personal"]'); // нажимаем на кнопку "Личный кабинет", которая на самом деле является ссылкой с якорем "popup-personal"
$I->waitForElement(['name' => 'USER_LOGIN'], 10); // ждем максимум 10 секунд когда появится форма(поле для ввода логина)
$I->fillField('[name="USER_LOGIN"]', 'test@test.ru'); // вводим логин
$I->fillField('[name="USER_PASSWORD"]', 'testtest'); // вводим пароль
$I->click('form[name="AUTH"] button[type="submit"]'); // нажимаем на кнопку отправки
$I->waitForText('Неверный логин или пароль.', 15); // ждем не более 15 секунд до текста "Неверный логин или пароль."
$I->fillField('[name="USER_PASSWORD"]', 'test'); // вводим пароль
$I->click('form[name="AUTH"] button[type="submit"]'); // нажимаем на кнопку отправки
$I->waitForText('Поле должно содержать не менее 8 символов', 15); // ждем не более 15 секунд до текста "Поле должно содержать не менее 8 символов"