<?php
if (!isset($lang))$lang = array();

function lang_init_ru_ru($current_lang, $lang)
{
switch ($current_lang)
 {
case 'ru-ru':
//Localization for Russian language
$lang['ru-ru']['language'] = 'Русский';

$lang['ru-ru']['Projects'] = 'Проекты';
$lang['ru-ru']['Create new project'] = 'Создать новый проект';
$lang['ru-ru']['Delete project'] = 'Удалить';

$lang['ru-ru']['new project']['New project'] = 'Новый проект';
$lang['ru-ru']['new project']['Create'] = 'Создать';
$lang['ru-ru']['new project']['Close'] = 'Закрыть';

$lang['ru-ru']['menu']['Slider'] = 'Слайдер';
$lang['ru-ru']['menu']['Slides'] = 'Слайды';
$lang['ru-ru']['menu']['Background Images'] = 'Фоновые изображения';
$lang['ru-ru']['menu']['Elements'] = 'Элементы';
$lang['ru-ru']['menu']['Settings'] = 'Настройки';
$lang['ru-ru']['menu']['Paste Code'] = 'Вставить код';

$lang['ru-ru']['Main Info']['Language'] = 'Язык';

$lang['ru-ru']['Main Info']['Main Info'] = 'Основная Информация';
$lang['ru-ru']['Main Info']['Background Images'] = 'Фоновые изображения';
$lang['ru-ru']['Main Info']['Upload'] = 'Загрузить';
$lang['ru-ru']['Main Info']['Name'] = 'Имя';
$lang['ru-ru']['Main Info']['Width'] = 'Ширина';
$lang['ru-ru']['Main Info']['Height'] = 'Высота';
$lang['ru-ru']['Main Info']['Duration'] = 'Длительность';
$lang['ru-ru']['Main Info']['Effect Duration'] = 'Длительность эффекта';
$lang['ru-ru']['Main Info']['Elements Effect Duration'] = 'Длительность эффекта<br> элемента';
$lang['ru-ru']['Main Info']['Effect Direction'] = 'Направление эффекта';
$lang['ru-ru']['Main Info']['Effect'] = 'Эффект';
$lang['ru-ru']['Main Info']['apply effect'] = 'применить эффект';
$lang['ru-ru']['Main Info']['Default'] = 'По умолчанию';
$lang['ru-ru']['Main Info']['Full Screen'] = 'Полноэкранный';
$lang['ru-ru']['Main Info']['Full Width'] = 'В ширину родителя';
$lang['ru-ru']['Main Info']['Mask'] = 'Маска';
$lang['ru-ru']['Main Info']['Apply CSS'] = 'Применить CSS';
$lang['ru-ru']['Main Info']['Autoplay'] = 'Авто смена слайдов';
$lang['ru-ru']['Main Info']['Save main info'] = ' Сохранить основные настройки ';

$lang['ru-ru']['Slides']['Slides'] = 'Слайды';
$lang['ru-ru']['Slides']['All Slides'] = 'Все слайды';
$lang['ru-ru']['Slides']['Select All'] = 'Выбрать все';
$lang['ru-ru']['Slides']['Select None'] = 'Не выбрать ни одного';
$lang['ru-ru']['Slides']['Slide'] = 'Слайд';
$lang['ru-ru']['Slides']['Name'] = 'Имя';
$lang['ru-ru']['Slides']['Actions'] = 'Действие';
$lang['ru-ru']['Slides'][' Save Slide '] = ' Сохранить Слайд ';
$lang['ru-ru']['Slides'][' Delete Slide '] = ' Удалить Слайд ';
$lang['ru-ru']['Slides']['None'] = 'Не выбран';
$lang['ru-ru']['Slides']['Delete'] = 'Удалить';
$lang['ru-ru']['Slides']['Execute'] = 'Выполнить';
$lang['ru-ru']['Slides']['Show All'] = 'Показать все';
$lang['ru-ru']['Slides']['First'] = 'Первая';
$lang['ru-ru']['Slides']['Last'] = 'Последняя';
$lang['ru-ru']['Slides']['Prev'] = 'Предыдущая';
$lang['ru-ru']['Slides']['Next'] = 'Следующая';
$lang['ru-ru']['Slides'][' Save All Slides '] = ' Сохранить все Слайды ';

$lang['ru-ru']['Background Images']['Background Images'] = 'Фоновые изображения';
$lang['ru-ru']['Background Images']['Background Images Alt Notice'] = 'Имена фоновых изображений будут использованы в качестве alt аттрибутов на фронтальной стороне';
$lang['ru-ru']['Background Images']['Name'] = 'Имя';
$lang['ru-ru']['Background Images']['URL'] = 'УРЛ';
$lang['ru-ru']['Background Images']['Image File'] = 'Файл изображения';
$lang['ru-ru']['Background Images']['Actions'] = 'Действие';
$lang['ru-ru']['Background Images'][' Save Image '] = ' Сохранить Изображение ';
$lang['ru-ru']['Background Images'][' Delete Image '] = ' Удалить изображение ';
$lang['ru-ru']['Background Images']['Image'] = 'Изображение';
$lang['ru-ru']['Background Images'][' Save All BG Images '] = ' Сохранить Все Фоновые Изображения ';
$lang['ru-ru']['Background Images']['BG Image for'] = 'Фоновая картинка для';
$lang['ru-ru']['Background Images']['for'] = 'для';

$lang['ru-ru']['Elements']['Elements'] = 'Элементы';
$lang['ru-ru']['Elements']['Create New Element'] = 'Создать Новый Элемент';
$lang['ru-ru']['Elements']['Images Alt Notice'] = 'Текст изображений будет выведен в alt аттрибутах на фронтальной стороне';

$lang['ru-ru']['Elements']['Bulk Apply To Elements'] = 'Пакетное Применение к Элементам';
$lang['ru-ru']['Elements']['Bulk Name'] = 'Имя';
$lang['ru-ru']['Elements']['Bulk URL'] = 'УРЛ';
$lang['ru-ru']['Elements']['Bulk Text'] = 'Текст';
$lang['ru-ru']['Elements']['Bulk Type'] = 'Тип';

$lang['ru-ru']['Elements']['Text Element'] = 'Текстовый Элемент';
$lang['ru-ru']['Elements']['Image Element'] = 'Изображения Элемент';
$lang['ru-ru']['Elements']['Template Element'] = 'Шаблонный Элемент';

$lang['ru-ru']['Elements']['Bulk Image'] = 'Изображение';
$lang['ru-ru']['Elements']['Bulk Template'] = 'HTML шаблон';
$lang['ru-ru']['Elements']['Bulk Width'] = 'Ширина';
$lang['ru-ru']['Elements']['Bulk Height'] = 'Высота';
$lang['ru-ru']['Elements']['Bulk Classes'] = 'Классы';
$lang['ru-ru']['Elements']['Bulk Offset Left'] = 'Смещение<br> Слева';
$lang['ru-ru']['Elements']['Bulk Offset Top'] = 'Смещение<br> Сверху';
$lang['ru-ru']['Elements']['Bulk Color'] = 'Цвет';
$lang['ru-ru']['Elements']['Bulk Background Color'] = 'Цвет Фона';
$lang['ru-ru']['Elements']['Bulk Style'] = 'Стили';
$lang['ru-ru']['Elements']['Bulk Size'] = 'Размер шрифта';
$lang['ru-ru']['Elements']['Bulk Actions'] = 'Действие';
$lang['ru-ru']['Elements']['Bulk Apply For ALL Elements '] = ' Применить ко Всем Элементам ';
$lang['ru-ru']['Elements']['Bulk Apply For Checked Elements '] = ' Применить к выбранным Элементам ';
$lang['ru-ru']['Elements']['Bulk Close'] = 'Закрыть';
$lang['ru-ru']['Elements']['Bulk left old value'] = '* - оставить старое значение (без замены)';

$lang['ru-ru']['Elements']['Element'] = 'Элемент';
$lang['ru-ru']['Elements']['Name'] = 'Имя';
$lang['ru-ru']['Elements']['URL'] = 'УРЛ';
$lang['ru-ru']['Elements']['Text'] = 'Текст';
$lang['ru-ru']['Elements']['Type'] = 'Тип';
$lang['ru-ru']['Elements']['Image'] = 'Изображение';
$lang['ru-ru']['Elements']['Add Image'] = 'Добавить Изображение';
$lang['ru-ru']['Elements']['Template'] = 'HTML шаблон';
$lang['ru-ru']['Elements']['Width'] = 'Ширина';
$lang['ru-ru']['Elements']['Height'] = 'Высота';
$lang['ru-ru']['Elements']['Classes'] = 'Классы';
$lang['ru-ru']['Elements']['Offset Left'] = 'Смещение Слева';
$lang['ru-ru']['Elements']['Offset Top'] = 'Смещение Сверху';
$lang['ru-ru']['Elements']['Color'] = 'Цвет шрифта';
$lang['ru-ru']['Elements']['Background Color'] = 'Цвет Фона';
$lang['ru-ru']['Elements']['Style'] = 'Стили';
$lang['ru-ru']['Elements']['Size'] = 'Размер';
$lang['ru-ru']['Elements']['Slide'] = 'Слайд';
$lang['ru-ru']['Elements']['Actions'] = 'Действие';
$lang['ru-ru']['Elements'][' Save Element '] = ' Сохранить Элемент ';
$lang['ru-ru']['Elements'][' Delete Element '] = ' Удалить Элемент ';

$lang['ru-ru']['Elements'][' Save All Elements '] = ' Сохранить Все Элементы ';
$lang['ru-ru']['Elements']['None'] = 'Не выбран';
$lang['ru-ru']['Elements']['Delete'] = 'Удалить';
$lang['ru-ru']['Elements']['Execute'] = 'Выполнить';

$lang['ru-ru']['Elements']['new element']['Create new element'] = 'Создать Новый Элемент';
$lang['ru-ru']['Elements']['new element']['Text'] = 'Текст';
$lang['ru-ru']['Elements']['new element']['Slide'] = 'Слайд';
$lang['ru-ru']['Elements']['new element']['Create'] = 'Создать';
$lang['ru-ru']['Elements']['new element']['Close'] = 'Закрыть';

$lang['ru-ru']['Settings']['Slider Settings'] = 'Настройки Слайдера';
$lang['ru-ru']['Settings']['Buttons'] = 'Кнопки';
$lang['ru-ru']['Settings']['Don\'t show buttons'] = 'Не показывать кнопки';
$lang['ru-ru']['Settings']['Buttons Offset Top'] = 'Смещение кнопки сверху';
$lang['ru-ru']['Settings']['Offset'] = 'Смещение';
$lang['ru-ru']['Settings']['If 0 - "Default top offset"'] = 'Если 0 - "Смещение сверху по умолчанию"';
$lang['ru-ru']['Settings']['Buttons Transparency'] = 'Прозрачность кнопок';
$lang['ru-ru']['Settings']['Transparency'] = 'Прозрачность';
$lang['ru-ru']['Settings']['Buttons Width'] = 'Ширина Копок';
$lang['ru-ru']['Settings']['Width (buttons width = container width * this parameter / 1600)'] = 'Ширина (ширина кнопки = ширина контейнера * этот параметр / 1600)';
$lang['ru-ru']['Settings']['Save'] = 'Сохранить';
$lang['ru-ru']['Settings']['Slide Bullets'] = 'Индикаторы слайдов';
$lang['ru-ru']['Settings']['Bullets'] = 'Индикаторы';
$lang['ru-ru']['Settings']['Don\'t show bullets'] = 'Не показывать индикаторы';
$lang['ru-ru']['Settings']['Bullets parameters'] = 'Параметры индикаторов';
$lang['ru-ru']['Settings']['Top Offset'] = 'Смещение Сверху';
$lang['ru-ru']['Settings']['If 0 - "Default bullets top offset"'] = 'Если 0 - "Смещение сверху по умолчанию"';
$lang['ru-ru']['Settings']['Width'] = 'Ширина';
$lang['ru-ru']['Settings']['If 0 - "Default width"'] = 'Если 0 - "Ширина по умолчанию"';
$lang['ru-ru']['Settings']['Front number of bullets by one side'] = 'Количество индикаторов с одной стороны (всего 2стороны)';

$lang['ru-ru']['Paste Code']['Paste Code'] = 'Вставить Код';
$lang['ru-ru']['Paste Code']['Paste into post, page ...'] = 'Вставить в запись, страницу ...';
$lang['ru-ru']['Paste Code']['Paste into template'] = 'Вставить в Шаблон';

$lang['ru-ru']['alert message']['wrong project name'] = 'Необходимо имя проекта!';
$lang['ru-ru']['alert message']['save width and height'] = 'Сохранить "Основную Информацию" чтобы применить ширину и высоту';
$lang['ru-ru']['alert message']['updated successfully'] = 'Успешно Обновлено';
$lang['ru-ru']['alert message']['wrong item text'] = 'Ошибочный текст элемента';

break;
default : 
  $lang['ru-ru']['language'] = 'Русский';
break;
 }
 return $lang;
}

?>