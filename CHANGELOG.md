# Changelog

All notable changes to this project will be documented in this file.

## [1.3.7] - 2023-01-05

### <!-- 05 -->Documentation

- Update workflow badge url over readme file

### <!-- 07 -->Continuous Integrations

- Setup stale bot to closes abandoned issues
- Bump shivammathur/setup-php from 2.22.0 to 2.23.0
- Bump actions/checkout from 3.2.0 to 3.3.0
- Bump actions/cache from 3.0.11 to 3.2.2
- Add `php` version ^8.1 and ^8.2 to `tests` workflow
- Solve issues regarding composer cache on windows on `tests` workflow

## [1.3.6] - 2022-12-14

### <!-- 07 -->Continuous Integrations

- Bump shivammathur/setup-php from 2.21.0 to 2.21.1
- Bump shivammathur/setup-php from 2.21.1 to 2.21.2
- Bump actions/cache from 3.0.5 to 3.0.7
- Bump actions/checkout from 3.0.2 to 3.2.0
- Bump actions/cache from 3.0.7 to 3.0.11
- Bump shivammathur/setup-php from 2.21.2 to 2.22.0
- Replace deprecated `set-output` command
- Bump codecov/codecov-action from 3.1.0 to 3.1.1

## [1.3.5] - 2022-07-20

### <!-- 07 -->Continuous Integrations

- Bump actions/cache from 3.0.2 to 3.0.3
- Bump shivammathur/setup-php from 2.18.1 to 2.19.0
- Bump shivammathur/setup-php from 2.19.0 to 2.19.1
- Bump actions/cache from 3.0.3 to 3.0.4
- Bump shivammathur/setup-php from 2.19.1 to 2.20.0
- Bump shivammathur/setup-php from 2.20.0 to 2.20.1
- Bump actions/cache from 3.0.4 to 3.0.5
- Bump shivammathur/setup-php from 2.20.1 to 2.21.0

## [1.3.4] - 2022-05-15

### <!-- 07 -->Continuous Integrations

- Bump `actions/cache` from 2.x.x to 3.0.0
- Bump shivammathur/setup-php from 2.17.1 to 2.18.0
- Bump codecov/codecov-action from 2.1.0 to 3.0.0
- Bump shivammathur/setup-php from 2.18.0 to 2.18.1
- Bump actions/cache from 3.0.0 to 3.0.2
- Bump actions/checkout from 3.0.0 to 3.0.1
- Bump actions/checkout from 3.0.1 to 3.0.2
- Bump codecov/codecov-action from 3.0.0 to 3.1.0

### <!-- 08 -->Miscellaneous Tasks

- Update `config.allow-plugins` on the `composer` configs
- Exclude `RequireAbstractOrFinal` rule from rulset

## [1.3.3] - 2022-03-03

### <!-- 05 -->Documentation

- Improve the dependabot configuration file

### <!-- 07 -->Continuous Integrations

- Change workflow actions versions to fixed versions
- Add cache action for caching composer packages
- Update `actions/checkout` from v2.x.x to v3.0.0
- Bump `shivammathur/setup-php` to 2.17.1
- Update `dependabot` prefixes on configuration

### <!-- 08 -->Miscellaneous Tasks

- Bump actions/checkout from 2.3.4 to 2.3.5
- Bump actions/checkout from 2.3.5 to 2.4.0
- Bump shivammathur/setup-php from 2.15.0 to 2.16.0
- Bump actions/cache from 2.1.6 to 2.1.7
- Update github funding configs
- Solve github funding broken link issue
- Bump shivammathur/setup-php from 2.16.0 to 2.17.0

## [1.3.2] - 2021-09-18

### <!-- 03 -->Testing

- Make sure endpoint changes in test mode

### <!-- 04 -->Refactor

- Change request data traversable types

### <!-- 05 -->Documentation

- Update old badges and add new ones

## [1.3.1] - 2021-09-17

### <!-- 04 -->Refactor

- Reduce max line length of codes to 80

### <!-- 08 -->Miscellaneous Tasks

- Add `phpstan/phpstan-beberlei-assert` package ^0.12.6
- Update `nekofar/dev-tools` from ^1.0 to ^1.1

## [1.3.0] - 2021-09-17

### <!-- 02 -->Bug Fixes

- Solve `getCode` returning int instead of string

### <!-- 03 -->Testing

- Specify type hint for items of its traversable
- Replace dynamic calls to static assertions

### <!-- 04 -->Refactor

- Add declaration for strict types
- Reorder methods by their visibility
- Replace ternary operators with conditions
- Replace fully qualified class names by aliases
- Specify type hint for items of its traversable
- Replace docblock return types by typehints
- Replace exception caching with throwable caching
- Replace assignment in if conditions
- Make `getAuthority` on `AbstractRequest` nullable
- Solve incompatibility with coding standard automatically
- Update method returns and params types
- Improve conditional expression
- Solve return type issue of `getAuthority` and `getAmount`
- Update data array traversable type hints

### <!-- 07 -->Continuous Integrations

- Add new workflow for static analysis
- Change code sniffer php to 7.3

### <!-- 08 -->Miscellaneous Tasks

- Update github sopncor confiquration
- Replace old rules by new ruleset
- Add `phpstan/phpstan-strict-rules` package ^0.12.11
- Add `phpstan/phpstan-phpunit` package ^0.12.22
- Add a configuration file for phpstan
- Make throws json error on `sendData`
- 1.3.0

## [1.2.0] - 2021-09-17

### <!-- 02 -->Bug Fixes

- Upgrade dependencies and phpunit
- Remove version from composer config

### <!-- 05 -->Documentation

- Add new dependabot configuration file

### <!-- 07 -->Continuous Integrations

- Change php version to 8.0
- Add new tests workflow
- Remove the travis config file

### <!-- 08 -->Miscellaneous Tasks

- Add support for php eight to the composer
- Upgrade omnipay/tests package to latest version
- Upgrade squizlabs/php_codesniffer package to latest version
- Upgrade php package to latest version
- Solve issues caused by upgrading tests
- Add config file for standard version
- Remove skip tag from standard version config
- 1.1.0
- Add skip tag from standard version config
- 1.1.1
- Change version stability requirements
- Remove composer lock file
- Replace required dev packages by `nekofar/dev-tools`
- Change php version to ^7.3 || ^8.0

## [1.0.4] - 2020-10-16

### <!-- 08 -->Miscellaneous Tasks

- Bump version to v1.0.4

## [1.0.3] - 2020-10-16

### <!-- 08 -->Miscellaneous Tasks

- Update composer lock dependencies
- Normalize composer config

<!-- generated by git-cliff -->
