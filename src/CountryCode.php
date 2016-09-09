<?php namespace Sukohi\CountryCode;

class CountryCode {

    private $country_data = [];

    public function __construct() {

        $csv_path = __DIR__ .'/assets/csv/country_codes.csv';
        $file = new \SplFileObject($csv_path);
        $file->setFlags(\SplFileObject::READ_CSV);
        $array_keys = [];

        foreach ($file as $index => $values) {

            if($index == 0) {

                $array_keys = $values;

            } else {

                foreach ($values as $value_index => $value) {

                    if(empty($value)) {

                        continue;

                    }

                    $country_index = $index - 1;
                    $array_key = $array_keys[$value_index];

                    if(preg_match('|^country-name-(.+)$|', $array_key, $matches)) {

                        $locale = $matches[1];
                        $this->country_data['original'][$country_index]['country_names'][$locale] = $value;

                    } else {

                        $this->country_data['original'][$country_index][$array_key] = $value;

                    }

                }

            }

        }

    }

    public function getArray($mode = 'alpha-2') {

        if(empty($this->country_data[$mode])) {

            foreach ($this->country_data['original'] as $index => $country_values) {

                $key = $country_values[$mode];
                $this->country_data[$mode][$key] = $country_values;

            }

        }

        return $this->country_data[$mode];

    }

    public function countryName($key, $mode = 'alpha-2', $locale = 'en') {

        $country_data = $this->getArray($mode);
        return $country_data[$key]['country_names'][$locale];

    }

}