![EasePHP Framework Logo](https://raw.githubusercontent.com/VitexSoftware/Ease-PHP-Bricks/master/project-logo.png "Project Logo")

EasePHP Bricks
=================

Object oriented PHP Framework for easy&fast writing small/middle sized apps.

[![Latest Version](https://img.shields.io/github/release/VitexSoftware/Ease-PHP-Bricks.svg?style=flat-square)](https://github.com/VitexSoftware/Ease-PHP-Bricks/releases)
[![Software License](https://img.shields.io/badge/license-GPL-brightgreen.svg?style=flat-square)](https://github.com/VitexSoftware/Ease-PHP-Bricks/blob/master/LICENSE)
[![Build Status](https://img.shields.io/travis/VitexSoftware/Ease-PHP-Bricks/master.svg?style=flat-square)](https://travis-ci.org/VitexSoftware/Ease-PHP-Bricks)
[![Total Downloads](https://img.shields.io/packagist/dt/vitexsoftware/ease-bricks.svg?style=flat-square)](https://packagist.org/packages/vitexsoftware/ease-php-bricks)
[![Docker pulls](https://img.shields.io/docker/pulls/vitexsoftware/ease-bricks.svg)](https://hub.docker.com/r/vitexsoftware/ease-php-bricks/)
[![Downloads](https://img.shields.io/packagist/dt/vitexsoftware/ease-bricks.svg?style=flat-square)](https://packagist.org/packages/vitexsoftware/ease-php-bricks)
[![Latest stable](https://img.shields.io/packagist/v/vitexsoftware/ease-bricks.svg?style=flat-square)](https://packagist.org/packages/vitexsoftware/ease-php-bricks)

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/4900ce8c-8619-4007-b2d6-0ac830064963/big.png)](https://insight.sensiolabs.com/projects/4900ce8c-8619-4007-b2d6-0ac830064963)


---

Bricks Included
===============

GDPR Logger
-----------

Log all GDPR related information into SQL table

MainPageMenu
------------

Well framed large icons

![MainPageMenu](https://raw.githubusercontent.com/VitexSoftware/Ease-PHP-Bricks/master/MainPageMenu.png "Main Page Menu screenshot")

```php
$mpmenu = new \Ease\ui\MainPageMenu();
$mpmenu->addMenuItem('logo.png', 'Caption', 'https://url/');
```

TwitterBootstrap Switch
-----------------------

Ease support for http://bootstrapswitch.com/ 

![TWBSwitch](https://raw.githubusercontent.com/VitexSoftware/Ease-PHP-Bricks/master/TWBSwitch.png "Main Page Menu screenshot")

```php
new Ease\ui\TWBSwitch('swname', true, 1,['onText' => 'YES', 'offText' => 'NO']);
```

The **libjs-bootstrap-switch** package with requied js/css assets is already present in our repository https://www.vitexsoftware.cz/repo.php

Boolean LED
-----------

Show light or dark circle in given color.

![Boolean LED](https://raw.githubusercontent.com/VitexSoftware/Ease-PHP-Bricks/master/BooleanLED.png "Widget in green and red")

```php
new \Ease\ui\BooleanLED(false, 'green');
```

Tree View
---------

Ease Support for http://jonmiles.github.io/bootstrap-treeview/ A simple and elegant solution to displaying hierarchical tree structures (i.e. a Tree View) 

![TreeView](https://raw.githubusercontent.com/VitexSoftware/Ease-PHP-Bricks/master/TreeView.png "TreeView Widget")

```php
new \Ease\ui\TBWTreeView('tree', 'data: getTree()');
```

Locale Select
-------------

Simple chooser of availble locales

```php
new \Ease\ui\LangSelect()
```

![LocaleSelect](https://raw.githubusercontent.com/VitexSoftware/Ease-PHP-Bricks/master/LocaleSelect.png "Locale select Widget")

Live Age
--------

Show live age based on unix timestamp

```php
new \Ease\ui\LiveAge(1530280004);    
```


![LiveAge](https://raw.githubusercontent.com/VitexSoftware/Ease-PHP-Bricks/master/LiveAge.png "Live Age Widget")

Sign In form
------------

Classic form with username input password input and submit button

```php
new \Ease\ui\SignInForm();
```

![Sign In](https://raw.githubusercontent.com/VitexSoftware/Ease-PHP-Bricks/master/SignIn.png "Sign In form")


Password Input
--------------

With eye icon to show plaintext

```php
new PasswordInput($this->passwordField);
```
![Password Input](https://raw.githubusercontent.com/VitexSoftware/Ease-PHP-Bricks/master/PasswordInput.png "Password input")

Browsing History
----------------

```
new BrowsingHistory();
``` 
![Browsing History](https://raw.githubusercontent.com/VitexSoftware/Ease-PHP-Bricks/master/BrowsingHistory.png "Browsing History")


Sticky note
----------------

```
new StickyNote();
``` 
![Sticky Note](https://raw.githubusercontent.com/VitexSoftware/Ease-PHP-Bricks/master/StickyNote.png "Sticky Note")

Selectizer trait
----------------

Apply Selectize.js to InputBox or Select

```php
class Selector extends \Ease\Html\SelectTag
{
    use \Ease\ui\Selectizer;
}

$properties = [
    'valueField' => 'value',
    'labelField' => 'key',
    'searchField' => ['key', 'value']
];

$options = [
    ['key' => 'red', 'value' => 'Red'],
    ['key' => 'blue', 'value' => 'Blue'],
    ['key' => 'green', 'value' => 'Green'],
    ['key' => 'yellow', 'value' => 'Yellow'],
];

$s = new Selector('selector');
$s->selectize($properties, $options);
``` 
![Selectizer](https://raw.githubusercontent.com/VitexSoftware/Ease-PHP-Bricks/master/Selectizer.png "Selectizer")



Installation
------------


Composer:
---------

    composer require vitexsoftware/ease-bricks


Older versions and its requirements https://packagist.org/packages/vitexsoftware/ease-bricks


To get Docker image:

    docker pull vitexsoftware/ease-bricks

For Debian, Ubuntu & friends please use repo:

    wget -O - http://v.s.cz/info@vitexsoftware.cz.gpg.key|sudo apt-key add -
    echo deb http://v.s.cz/ stable main > /etc/apt/sources.list.d/ease.list
    aptitude update
    aptitude install ease-bricks

In this case please add this to your app composer.json:

    "require": {
        "ease-bricks": "*"
    },
    "repositories": [
        {
            "type": "path",
            "url": "/usr/share/php/Ease",
            "options": {
                "symlink": true
            }
        }
    ]

Links
=====

Homepage: https://www.vitexsoftware.cz/ease.php

GitHub: https://github.com/VitexSoftware/Ease-PHP-Bricks

Apigen Docs: https://www.vitexsoftware.cz/ease-php-bricks/
