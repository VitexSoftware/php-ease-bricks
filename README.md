![EasePHP Framework Logo](project-logo.png?raw=true "Project Logo")

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

---

Bricks Included
===============

OldTerminal

![Old Terminal](oldterminal.png?raw=true)

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

```shell
composer require vitexsoftware/ease-core-bricks
```

Older versions and its requirements https://packagist.org/packages/vitexsoftware/ease-bricks


For Debian, Ubuntu & friends please use repo:

```shell
sudo apt install lsb-release wget apt-transport-https bzip2


wget -qO- https://repo.vitexsoftware.com/keyring.gpg | sudo tee /etc/apt/trusted.gpg.d/vitexsoftware.gpg
echo "deb [signed-by=/etc/apt/trusted.gpg.d/vitexsoftware.gpg]  https://repo.vitexsoftware.com  $(lsb_release -sc) main" | sudo tee /etc/apt/sources.list.d/vitexsoftware.list
sudo apt update
sudo apt install php-vitexsoftware-ease-bricks
```

In this case please add this to your app composer.json:

```json
    "require": {
        "deb/ease-bricks": "*"
    },
    "repositories": [
        {
            "type": "path",
            "url": "/usr/share/php/EaseCore",
            "options": {
                "symlink": true
            }
        }
    ]
```

Note 
----

All classes extendig booststrap classed was moved to separate libraries

* [ease-twbootstrap-widgets](https://github.com/VitexSoftware/php-ease-twbootstrap-widgets)
* [ease-twbootstrap4-widgets](https://github.com/VitexSoftware/php-ease-twbootstrap4-widgets)


