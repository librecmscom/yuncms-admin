# Administrator Extension for Yii 2


[![Latest Stable Version](https://poser.pugx.org/yuncms/yuncms-admin/v/stable.png)](https://packagist.org/packages/yuncms/yuncms-admin)
[![Total Downloads](https://poser.pugx.org/yuncms/yuncms-admin/downloads.png)](https://packagist.org/packages/yuncms/yuncms-admin)
[![Build Status](https://img.shields.io/travis/yuncms/yuncms-admin.svg)](http://travis-ci.org/yuncms/yuncms-admin)
[![Dependency Status](https://www.versioneye.com/php/yuncms:yuncms-admin/dev-master/badge.png)](https://www.versioneye.com/php/yuncms:yuncms-admin/dev-master)
[![License](https://poser.pugx.org/yuncms/yuncms-admin/license.svg)](https://packagist.org/packages/yuncms/yuncms-admin)

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require --prefer-dist yuncms/yuncms-admin
```

or add
```json
"yuncms/yuncms-admin": "~2.0.0"
```

to the `require` section of your composer.json.

## Configuring your application

Add following lines to your main configuration file:

```php
'bootstrap' => [
    'yuncms\admin\Bootstrap',
],
'modules' => [
    'admin' => [
        'class' => 'yuncms\admin\Module'   
    ],
],
```

## Updating database schema

After you downloaded and configured Yii2-admin, the last thing you need to do is updating your database schema by applying the migrations:

```bash
$ php yii migrate/up 
```

## License

This is released under the MIT License. See the bundled [LICENSE.md](LICENSE.md)
for details.