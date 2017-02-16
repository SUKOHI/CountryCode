# CountryCode
Country codes based on iso 3166-1 like country name, alpha-2 code, alpha-3 code or numeric code for PHP

[Demo](http://demo-laravel52.capilano-fw.com/country_code)

# Installation

Execute composer command.

    composer require sukohi/country-code:1.*

# Usage

```php
$country_code = new \Sukohi\CountryCode\CountryCode();
$mode = 'alpha-2';  // or alpha-3, numeric (skippable)

// Array
$country_data = $country_code->getArray($mode);
print_r($country_data);

// Country Name
$key = 'US';
$mode = 'alpha-2';  // or alpha-3, numeric (skippable)
$locale = 'en';     // (skippable)
echo $country_code->countryName($key, $mode, $locale);  // United States
 ```
# Contribution

If you can translate country names to your mother language, please add the names in `assets/csv/country_codes.csv`.  
And I'm glad if you would create a pull request.  
Thank you!

# License

This package is licensed under the MIT License.  
Copyright 2016 Sukohi Kuhoh
