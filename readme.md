# Тестовые задания на Junior


## Задание №1

В рамках данного тестового задания необходимо сделать следующее:

1) Установить CMS 1С-Битрикс на локальную машину. 
2) Создать страницу с расположенной на ней формой добавления отзыва о компании. Должны быть следующие поля: Имя, Фамилия, e-mail, телефон, текст сообщения. 
3) Результаты должны быть доступны для редактирования через панель администратора. (Инфоблоки, хайлоад блоки, результаты форм)
4) Для защиты от ботов необходимо использовать Google Recaptcha. (Плюсом будет если будет подключена стороняя библиотека через композер )
5) Под формой должны отображаться добавленные отзывы, но только те что разрешены для отображения в панели администратора. (Т.е. должен быть флаг)
6) Для полей email и телефон должна быть валидация на уровне backend. (для номеров разрешен формат +7 (999) 999-99-99 )


##  Как отдавать результат
Допустимо несколько вариантов:
1) Необходимо предоставить архив файлов которые правились или добавлялись при выполении данной работы, с сохранием структуры относительно корня сайта. 
2) Сделать fork теккущего репозитория, все изменения фиксировать в git (чем подробнее будет история тем легче нам будет понять компетенцию владения систмами контроля версий). Описать каким образом нам разворчивать среду, чтобы мы могли оценить работоспособность результата

## Выполение задания и описание разворачивания среды

### Выполненные пункты обозначаются зачеркнутм текстом
>~~1) Установить CMS 1С-Битрикс на локальную машину.~~  
>~~2) Создать страницу с расположенной на ней формой добавления отзыва о компании. Должны быть следующие поля: Имя, Фамилия, e-mail, телефон, текст сообщения.~~  
>~~3) Результаты должны быть доступны для редактирования через панель администратора. (Инфоблоки, хайлоад блоки, результаты форм)~~  
>~~4) Для защиты от ботов необходимо использовать Google Recaptcha. (Плюсом будет если будет подключена стороняя библиотека через композер )~~  
>5) Под формой должны отображаться добавленные отзывы, но только те что разрешены для отображения в панели администратора. (Т.е. должен быть флаг)  
>~~6) Для полей email и телефон должна быть валидация на уровне backend. (для номеров разрешен формат +7 (999) 999-99-99 )~~  

### Описание разворачивания среды
1. для выполения теста использовалась версия битрикс Стандарт
1. в файле `.top.menu.php` находится пункт меню со сылкой на страницу, где расположена форма
1. сама форма расположена в модуле `Веб-формы` со следующими полями: `Имя, Фамилия, e-mail, телефон, текст сообщения`.
1. при добавлении отзыва форма должна была добавлять с инфоблок (но этого не происходит, описание проблемы ниже) `Отзывы` - экспорт данного инфоблока представлен в `CSV`, данные файлы расположены в папке `reviews`
1. проект находится в ветке `origin/test_task`

### Описание возникшей проблемы
проблема возникла с 5 пунктом. Мне не приходилось сталкиваться с файлами `component.php` и `component_epilog.php`, поэтому у меня возникают трудности с их подключениями. Я размещаю код для добавления данных в инфоблок (при отправке формы), использую экземпляр `CIBlockElement` беру его поля из документации битрикс, но почему-то при отправке формы элемент инфоблока не добавляется.
