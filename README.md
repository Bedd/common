# README
[![Build Status](https://travis-ci.org/Bedd/common.svg?branch=master)](https://travis-ci.org/Bedd/common) [![Latest Stable Version](https://poser.pugx.org/bedd/common/v/stable)](https://packagist.org/packages/bedd/common) [![Total Downloads](https://poser.pugx.org/bedd/common/downloads)](https://packagist.org/packages/bedd/common) [![Latest Unstable Version](https://poser.pugx.org/bedd/common/v/unstable)](https://packagist.org/packages/bedd/common) [![License](https://poser.pugx.org/bedd/common/license)](https://packagist.org/packages/bedd/common) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Bedd/common/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Bedd/common/?branch=master)

## Installation
The best way to install this library is to use [composer](https://getcomposer.org/).

```json
{
    "require": {
        "bedd/common": "1.*"
    }
}
```

## Utils
### Arrays
- ArrayUtils::hasStringKeys
- ArrayUtils::hasIntegerKeys
- ArrayUtils::findValueByKeys
- ArrayUtils::flatten
- ArrayUtils::renameKey

### Date Times
- DateTimeUtils::SECONDS_PER_MINUTE
- DateTimeUtils::SECONDS_PER_HOUR
- DateTimeUtils::SECONDS_PER_DAY
- DateTimeUtils::SECONDS_PER_WEEK
- DateTimeUtils::SECONDS_PER_MONTH
- DateTimeUtils::SECONDS_PER_YEAR

### Objects
- ObjectUtils::getConstants

### Strings
- StringUtils::splitOnUpperCase
- StringUtils::splitOnLowerCase
- StringUtils::startsWith
- StringUtils::endsWith
- StringUtils::convertToBool

## Traits
- SingletonTrait
- StaticClassTrait

## License
This library is available under the [MIT license](LICENSE).