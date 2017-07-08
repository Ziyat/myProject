<?php

//error message
define(ERROR_NAME, 'имя не должно быть короче 2-х символов');
define(ERROR_TEXT, 'вы не ввели текст');
define(ERROR_EMAIL, 'некорректный email');
define(ERROR_PASSWORD, 'пароль не должен быть короче 6-ти символов');
define(ERROR_EMAIL_EXISTS, 'такой email уже используется');
define(ERROR_USER_DATA, 'неправильные данные для входа на сайт');
define(ERROR_NOT_AUTH, 'Для того чтоб оставить отзыв Вы должны авторизоваться!');
define(ERROR_REPASSWORD, 'Поле пароль не совпадает с подтверждением.');
// success message
define(REG_SUCCEESS, 'вы успешно создали аккаунт!');
define(EDIT_SUCCEESS, 'вы успешно отредактировали свои данные!');
define(REVIEW_SUCCEESS, 'Спасибо за Ваш отзыв!');
//nav
define(RESTAURANT, 'ресторан');
define(MENU, 'меню');
define(GALLERY, 'галерея');
define(REVIEWS, 'отзывы');
define(CONTACTS, 'контакты');
define(BRAND, 'Поднебесная');

//auth
define(LOGIN, 'вход');
define(LOGOUT, 'выход');
define(ACCOUNT, 'аккаунт');
define(CREATE_ACCOUNT, 'создать аккаунт');
define(EDIT_ACCOUNT, 'редактирование данных');
define(CART, 'корзина');

//form

define(NAME, 'имя');
define(LAST_NAME, 'фамилия');
define(EMAIL, 'эл. почта');
define(PASSWORD, 'пароль');
define(REPASSWORD, 'повторите пароль');
define(SUBMIT, 'отправить');
define(RESET, 'сброс');
define(TITLE_LOGIN, 'вход');
define(TITLE_REVIEW, 'оставьте отзыв');
define(SAVE, 'сохранить');
define(TEXT, 'текст');

//footer
define(ADDRESS_SITE, 'Адрес: г. Ташкент, ул. Мукимий, д.1 | Телефон: +998 (90) 337-0-999 / +998 (95) 143-1-999');

//Menu

define(ADD_TO_CART, 'в карзину');
define(DETAILS, 'подробнее');

//cart
define(PHOTO, 'фото');
define(TITLE, 'название');
define(PRICE, 'стоимость');
define(AMOUNT, 'количество, шт.');
define(TOTAL_COST, 'общая стоимость');
define(EMPTY_BASKET, 'в вашей корзине нет товаров');
define(HI, 'привет');
define(SHOPPING_LIST, 'список покупок');
define(USER_ACCOUNT, 'кабинет пользователя');
define(PHONE, 'телефон');
define(INFO_MAIL, 'info@podnebesnaya.uz');
define(SITE_URL, 'http://podnebesnaya.uz');
define(CURRENCY, 'сум');
define(UNIT_OF_VOLUME, 'мл');
define(UNIT_OF_WEIGHT, 'г');
define(UNIT_OF_LENGTH, 'см');
define(ADMIN, 'администратор');

//nav_admin

define(ADMIN_PRODUCTS, 'товары');
define(ADMIN_CATS, 'категорий');
define(ADMIN_ORDERS, 'заказы');
define(ADMIN_REVIEWS, 'отзывы');
define(ADMIN_SIGNOUT, 'выход из системы!');
define(ADMIN_PANEL, 'админпанель');
define(DELIVERY, 'доставка');
define(DELIVERY_PRICE, 'стоимость (доставка)');
define(CATEGORY, 'категория');
define(PRODUCT_NEW, 'новый');
define(PRODUCT_RECOMMENDED, 'рекомендуемые');
define(PRODUCT_EDIT,'редактировать');
define(PRODUCT_DELETE,'удалить');
define(PRODUCT_MESSAGE_DELETE,'вы действительно хотите удалить этот товар?');
define(ADMIN_PRODUCT, 'товар');
define(PRODUCT_ADD, 'добавить');
define(DESC, 'краткое описание');
define(VOLUME, 'объем');
define(WEIGHT, 'вес');
define(LENGTH, 'диаметр');
define(YES, 'да');
define(NO, 'нет');
define(IMAGE, 'изображение');
define(CHECKOUT, 'оформить заказ');
define(ERROR_TITLE, 'заполните поле');
define(SUCCESS, 'успех');
define(DANGER, 'ошибка');
define(WARNING, 'предупреждение');
define(IMAGE_HELP_MESSAGE, 'изображение должно быть размера 750px / 412px');
define(ADMIN_CATES, 'категорию');
define(ADMIN_CUISINE, 'кухня');
define(CATS_MESSAGE_DELETE,'вы действительно хотите удалить эту категорию?');
define(ADMIN_CUISINES, 'кухню');
define(CUISINES_MESSAGE_DELETE,'вы действительно хотите удалить эту кухню?');
define(ADMIN_THE_CUISINES, 'кухни');
define(ORDER_NEW, 'новый заказ');
define(ORDER_TO_PROCESS, 'в обработке');
define(ORDER_EXECUTED, 'выполнен');
define(ORDER_CANCELED, 'отменен');
define(ORDER_DATE, 'дата оформление');
define(ORDER_STATUS, 'статус заказа');
define(ORDER_VIEW, 'посмотреть');
define(ORDER, 'заказ');
define(COMMENT, 'комментарий');
define(ID_USER, 'ID клиента');
define(BACK, 'назад');
define(ORDER_MESSAGE_DELETE,'вы действительно хотите удалить этот заказ?');

define(ADDRESS_STREET, 'улица №');
define(ADDRESS_BUILDING, 'дом №');
define(ADDRESS_APPT, 'квартира №');
define(ADDRESS_ENTRANCE, 'подъезд №');
define(ADDRESS_INTERCOM, 'домофон');
define(ADDRESS_PEOPLE, 'на сколько персон?');
define(ADDRESS_LANDMARK, 'ориентир');
define(USER_ADDRESS, 'адрес');
define(USER_DATA, 'личные данные');
define(REVIEW_TRUE, 'одобрено');
define(REVIEW_FALSE, 'не одобрено');
define(REVIEW, 'отзыв');
define(REVIEW_MESSAGE_DELETE,'вы действительно хотите удалить этот отзыв?');
define(PHOTOS, 'фотографий');
define(GALLERES, 'галерею');
define(GALLERY_EMPTY, 'пуста');
define(GALLERY_MESSAGE_DELETE,'вы действительно хотите удалить эту галерею?');
define(PHOTES, 'фотографию');
define(PHOTO_MESSAGE_DELETE,'вы действительно хотите удалить эту фотографию?');

define(LOGIN, 'Вход');
define(ALL_FIELDS, 'Все поля должны быть заполнены');
define(REGISTER, 'Регистрация');
define(EMAIL, 'Эл.почта');
define(PASSWORD, 'Пароль');
define(CONFIRMPASSWORD,'Подтвердите пароль');
define(REMEMBERME, 'Запомнить меня');
define(FORGOTYOURPASSWORD, 'Восстановление пароля');
define(NAME, 'Имя');
define(SECONDNAME, 'Фамилия');
define(FATHERNAME, 'Отчество');
define(MOBILEPHONE, 'Мобильный номер телефона');
define(PHONE, 'Домашний номер телефона');
define(YOURSTATEMENTS,'Ваши обращения');
define(PROFILE,'Ваши данные');
define(LOGOUT,'Выход');
define(GUVD,'Главное Управление Внутренних дел города Ташкента');
define(GUVDLOGO,'ГУВД');
define(ONLINERECOURSE, 'ОНЛАЙН ОБРАЩЕНИЕ');
define(OFFICIALSITE, 'Официальный сайт');
define(TEST, 'Сайт находится в тестовом режиме');
define(SITETITLE, 'ГУВД | Официальный сайт');
define(RESETPASSWORD, 'Сброс пароля');
define(TOSENDALETTER, 'Отправить письмо');
define(ATTACHFILE, 'Прикрепить файл...');
define(TEXTOFTHEAPPEAL, 'Текст обращения');
define(INDICATEYOURGENDER, 'Укажите ваш пол');
define(MALE, 'Мужской');
define(FEMALE, 'Женский');
define(SEX, 'Пол');
define(WRITEYOURMESSAGE, 'Напишите своё обращения');
define(FOREXAMPLE, 'Например');
define(BIRTHDATE, 'Дата рождения');
define(ADDRESS, 'Адрес');
define(SELECTAREA, 'Выберите район');
define(AREA, 'Район');
define(TYPEAPPEAL, 'Тип обращения');
define(SPECIFYTYPEAPPEAL, 'Укажите тип обращения');
define(PROPOSAL,'Предложение');
define(APPEAL,'Жалоба');
define(DECLARATION,'Заявление');
define(SPECIFYTHETYPEOFPERSON,'Укажите вид лица');
define(TYPEOFPERSON,'Вид лица');
define(INDIVIDUAL,'Физическое лицо');
define(ENTITY,'Юридическое лицо');
define(APPEAL_NUMBER, 'Номер обращения');
define(APPEAL_SECRET, 'Код проверки состояния');
define(APPEAL_CHECK, 'Проверить');
define(MODERATOR, 'Модератор');
define(REMEMBER,'Запомните');
define(CHOOSE_A_TOPIC,'Выбор темы');
define(OTHER_ISSUES,'другие вопросы');
define(TOPIC_OF_THE_APPEAL,'Тема обращения');
define(GET_AN_ANSWER,'Получить ответ');
define(IN_ELECTRONIC_FORM,'В электронной форме');
define(IN_WRITING,'В письменной форме');
define(CAPTCHA,'введите код с картинки');
define(CHECK_THE_STATUS,'Проверьте статус обращения');
define(QUESTIONS,'Часто задаваемые вопросы');
define(LEADERSHIP,'Руководство');
define(RECEPTION,'Приемные дни');
define(DAY_OF_PREVENTION,'День профилактики');
define(DOCUMENTATION,'Нормативные акты');
define(LANGUAGE,'Языки');
define(NEWS,'Новости');
define(PEOPLE_ARE_WANTED, 'Разыскиваемые лица');
define(MORE, 'Подробнее...');
define(MISSING, 'Без вести пропавшие');
define(ERROR_EMAIL_EXISTS_ANSWER, 'Заявитель не указывал email');
define(ERROR_FILE, 'Формат файла не подходит');
define(ERROR_EMPTY, 'Пожалуйста, заполните поле');
define(SCHEDULE, 'График');
define(SCHEDULE_RECEPTION, 'приёма физических и юридических лиц, а также сотрудников органов внутренних дел руководством ГУВД г.Ташкента.');
define(POSITION, 'Должность');
define(FIO, 'ФИО');
define(PHONE_TABLE, 'Телефон');
define(RECEPTION_DAY, 'Приемные дни');
define(RECEPTION_TIME, 'Приемное время');
define(ADD_COMMENT, 'Оставить комментарий');
define(COMMENT_TEXT, 'Текст комментарий');
define(PRINT_TEXT, 'Виртуальная приёмная начальника Главного Управления Внутренних дел<br>города Ташкента');
define(LINK, 'При любом использовании материалов ссылка на Главного Управления Внутренних дел города Ташкента обязательна.');
define(RESULT_SEARCH, 'Рузультат поиска');
define(TELEGRAM, 'Официальный новостной канал');
define(COMMENTS, 'Комментарий');
define(ERROR_LOGIN, 'Такой логин существует в базе!');
define(PDD, 'Просмотр и оплата штрафов за нарушение ПДД');
define(PASSPORT, 'Проверка состояние биометрического паспорта');




