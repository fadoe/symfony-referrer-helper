# Referrer helper for Symfony request

## Installation

* add this repository to your composer.json
* run composer

```composer.phar require fadoe/symfony-request-helper```

## Methods

* ReferrerHelper::isInternalReferrer checks if a request is from current site
* ReferrerHelper::getReferrerPath strips the path from referrer
