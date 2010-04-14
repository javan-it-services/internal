<?php

/* SVN FILE: $Id$ */

/**
4
 * Number Helper.
5
 *
6
 * Methods to make numbers more readable.
7
 *
8
 * PHP versions 4 and 5
9
 *
10
 * CakePHP(tm) :  Rapid Development Framework (http://www.cakephp.org)
11
 * Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
12
 *
13
 * Licensed under The MIT License
14
 * Redistributions of files must retain the above copyright notice.
15
 *
16
 * @filesource
17
 * @copyright     Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
18
 * @link          http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
19
 * @package       cake
20
 * @subpackage    cake.cake.libs.view.helpers
21
 * @since         CakePHP(tm) v 0.10.0.1076
22
 * @version       $Revision$
23
 * @modifiedby    $LastChangedBy$
24
 * @lastmodified  $Date$
25
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
26
 */

/**
28
 * Number helper library.
29
 *
30
 * Methods to make numbers more readable.
31
 *
32
 * @package       cake
33
 * @subpackage    cake.cake.libs.view.helpers
34
 */

class NumberHelper extends AppHelper {

/**
37
 * Formats a number with a level of precision.
38
 *
39
 * @param  float    $number    A floating point number.
40
 * @param  integer $precision The precision of the returned number.
41
 * @return float Enter description here...
42
 * @static
43
 */

    function precision($number, $precision = 3) {

        return sprintf("%01.{$precision}f", $number);

    }

/**
48
 * Returns a formatted-for-humans file size.
49
 *
50
 * @param integer $length Size in bytes
51
 * @return string Human readable size
52
 * @static
53
 */

    function toReadableSize($size) {

        switch (true) {

            case $size < 1024:

                return sprintf(__n('%d Byte', '%d Bytes', $size, true), $size);

            case round($size / 1024) < 1024:

                return sprintf(__('%d KB', true), $this->precision($size / 1024, 0));

            case round($size / 1024 / 1024, 2) < 1024:

                return sprintf(__('%.2f MB', true), $this->precision($size / 1024 / 1024, 2));

            case round($size / 1024 / 1024 / 1024, 2) < 1024:

                return sprintf(__('%.2f GB', true), $this->precision($size / 1024 / 1024 / 1024, 2));

            default:

                return sprintf(__('%.2f TB', true), $this->precision($size / 1024 / 1024 / 1024 / 1024, 2));

        }

    }

/**
69
 * Formats a number into a percentage string.
70
 *
71
 * @param float $number A floating point number
72
 * @param integer $precision The precision of the returned number
73
 * @return string Percentage string
74
 * @static
75
 */

    function toPercentage($number, $precision = 2) {

        return $this->precision($number, $precision) . '%';

    }

/**
80
 * Formats a number into a currency format.
81
 *
82
 * @param float $number A floating point number
83
 * @param integer $options if int then places, if string then before, if (,.-) then use it
84
 *   or array with places and before keys
85
 * @return string formatted number
86
 * @static
87
 */

    function format($number, $options = false) {

        $places = 0;

        if (is_int($options)) {

            $places = $options;

        }

        $align_right = array('class' => 'money');

        $separators = array(',', '.', '-', ':');

 

        $before = $after = null;

        if (is_string($options) && !in_array($options, $separators)) {

            $before = $options;

        }

        $thousands = '.';

        if (!is_array($options) && in_array($options, $separators)) {

            $thousands = $options;

        }

        $decimals = '.';

        if (!is_array($options) && in_array($options, $separators)) {

            $decimals = $options;

        }

 

        $escape = true;

        if (is_array($options)) {

            $options = array_merge(array('before'=>'$', 'places' => 2, 'thousands' => ',', 'decimals' => '.'), $options);

            extract($options);

        }

 

        $out = $before . number_format($number, $places, $decimals, $thousands) . $after;

 

        if ($escape) {

            return h($out);

        }

        return $out;

    }

/**
123
 * Formats a number into a currency format.
124
 *
125
 * @param float $number
126
 * @param string $currency Shortcut to default options. Valid values are 'USD', 'EUR', 'GBP', otherwise
127
 *   set at least 'before' and 'after' options.
128
 * @param array $options
129
 * @return string Number formatted as a currency.
130
 */

    function currency($number, $currency = 'Rp', $options = array()) {

        $default = array(

            'before'=>'', 'after' => '', 'zero' => '0', 'places' => 2, 'thousands' => ',',

            'decimals' => '.','negative' => '()', 'escape' => true

        );
        
        $align_right = array('class' => 'money');

        $currencies = array(

            'Rp' => array(

                'before' => ' ', 'after' => 'c', 'zero' => 0, 'places' => 2, 'thousands' => '.',

                'decimals' => '.', 'negative' => '()', 'escape' => true

            ),

            'GBP' => array(

                'before'=>'&#163;', 'after' => 'p', 'zero' => 0, 'places' => 2, 'thousands' => ',',

                'decimals' => '.', 'negative' => '()','escape' => false

            ),

            'EUR' => array(

                'before'=>'&#8364;', 'after' => 'c', 'zero' => 0, 'places' => 2, 'thousands' => '.',

                'decimals' => ',', 'negative' => '()', 'escape' => false

            )

        );

 

        if (isset($currencies[$currency])) {

            $default = $currencies[$currency];

        } elseif (is_string($currency)) {

            $options['before'] = $currency;

        }

 

        $options = array_merge($default, $options);


        $result = null;

 

        if ($number == 0 ) {

            if ($options['zero'] !== 0 ) {

                return $options['zero'];

            }

            $options['after'] = null;

        } elseif ($number < 1 && $number > -1 ) {

            $multiply = intval('1' . str_pad('', $options['places'], '0'));

            $number = $number * $multiply;

            $options['before'] = null;

            $options['places'] = null;

        } elseif (empty($options['before'])) {

            $options['before'] = null;

        } else {

            $options['after'] = null;

        }

 

        $abs = abs($number);

        $result = $this->format($abs, $options);

 

        if ($number < 0 ) {

            if ($options['negative'] == '()') {

                $result = '(' . $result .')';

            } else {

                $result = $options['negative'] . $result;

            }

        }

        return $result;

    }

}

?>