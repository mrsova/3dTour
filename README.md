ANTI-DRONE
=====================

http://tour

HTML проект


Структура сайта
-------------------

      assets/             исходники
      assets/assets       исходники стилей
      assets/js           исходники скриптов
      css/                скомпилированные стили
      js/                 скомпилированные скрипты
      img/                изображения


Рекомендация
------------

Gulp 4.0

Установка
------------

### Установка GULP


~~~
# Install the latest Gulp CLI tools globally
$ npm install gulpjs/gulp-cli -g

# Install Gulp 4 into your project from 4.0 GitHub branch as dev dependency
$ npm install gulpjs/gulp#4.0 --save-dev
~~~

~~~
# очистить, собрать и запустить локальный сервер
$ gulp
~~~
~~~
# удалить скомпилированные файлы
$ gulp clean
~~~
~~~
# собрать
$ gulp builp
~~~
~~~
# поднять локальный сервер
$ gulp server
~~~
~~~
# отправить по ftp
$ gulp ftp
~~~