<?php
declare (strict_types = 1);

namespace App\Helpers;

use Carbon\Carbon;
use Carbon\CarbonInterface;

class BladeHelper
{
    public static function ip()
    {
        return \Request::getClientIp(true);
    }

    public static function abbr($txt, $upper = true)
    {
        $txt_ = substr((string) $txt, 0, 3);
        return $upper == true ? strtoupper($txt_) : $txt_;
    }

    public static function badgeI($text)
    {
        return '<b class="badge bg-soft-info text-black fw-normal font-size-12" role="button">' . $text . '</b>';
    }
    public static function badgeP($text)
    {
        return '<b class="badge bg-soft-primary text-black fw-normal font-size-12" role="button">' . $text . '</b>';
    }
    public static function badgeSe($text)
    {
        return '<b class="badge bg-soft-secondary text-black fw-normal font-size-12" role="button">' . $text . '</b>';
    }
    public static function badgeS($text)
    {
        return '<b class="badge bg-soft-success text-black fw-normal font-size-12" role="button">' . $text . '</b>';
    }
    public static function badgeW($text)
    {
        return '<b class="badge bg-soft-warning text-black fw-normal font-size-12" role="button">' . $text . '</b>';
    }
    public static function badgeD($text)
    {
        return '<b class="badge bg-soft-danger text-black fw-normal font-size-12" role="button">' . $text . '</b>';
    }

    public static function name($names, $short = false)
    {
        $names = str_replace('_', ' ', $names);
        if ($short == true) {
            $arr = explode(' ', $names);
            return count($arr) > 1 ? strtoupper($arr[0][0] . $arr[1][0]) : strtoupper($arr[0][0]) . 'x';
        }

        return ucwords(strtolower($names), ', (');
    }

    public static function whom($l_name, $f_name, $m_name, $sex)
    {
        $sex = $sex ?: '#';

        if (isset($m_name) && strlen($m_name) > 0) {
            $x = sprintf('%s, %s %s (%s)', $l_name, $f_name, $m_name, $sex[0]);
        } else {
            $x = sprintf('%s %s (%s)', $l_name, $f_name, $sex[0]);
        }
        return self::name($x);
    }

    public static function is_file($file)
    {
        return strlen($file) > 3 && strpos($file, '.') > 0;
    }

    public static function pad_l($n, $size = 3)
    {
        return str_pad((string) $n, $size, '0', STR_PAD_LEFT);
    }

    public static function pad_r($n, $size = 3)
    {
        return str_pad((string) $n, $size, '0', STR_PAD_RIGHT);
    }

    public static function sex($sex = null)
    {
        return $sex ? ucfirst($sex[0]) : 'N/A';
    }

    public static function rate($arr, $n, $dp = 1)
    {
        $en = is_array($arr) ? array_sum($arr) : $arr;
        $rate = ((int) $n * 100) / (int) $en;
        return round($rate, $dp);
    }

    public static function nth($n, $sup = true)
    {
        $last = substr((string) $n, -1);
        if ($n != 11 && $last == 1) {
            $buf = $sup == true ? '<sup>st</sup>' : 'st';
        } else if ($n != 12 && $last == 2) {
            $buf = $sup == true ? '<sup>nd</sup>' : 'nd';
        } else if ($n != 13 && $last == 3) {
            $buf = $sup == true ? '<sup>rd</sup>' : 'rd';
        } else {
            $buf = $sup == true ? '<sup>th</sup>' : 'th';
        }
        return $n . $buf;
    }

    public static function cash($n)
    {
        $nint = (int) $n;
        $nstr = (string) $n;

        if (str_replace(',', '', $nstr) && is_numeric($n) && $n > 999) {
            $n = number_format($nint);
            if (strpos($nstr, '.') != false) {
                $dp = explode('.', $nstr)[1];
                $n .= '.' . $dp;
            }
        }
        return (string) $n;
    }

    public static function cash_($n)
    {
        $nstr = self::cash($n);

        if ((int) $nstr < 1) {
            return '0.00';
        } else {
            return strpos($nstr, '.') != false ? $nstr : $nstr . '.00';
        }
    }

    public static function rand(array $arr = [], int $i = -1)
    {
        $hex = ['danger', 'success', 'primary', 'warning'];
        $arr = count($arr) > 0 ? $arr : $hex;
        $len = count($arr);

        if ($i >= 0) {
            return $i >= $len ? $arr[$i - $len] : $arr[$i];
        } else {
            shuffle($arr);
            return array_shift($arr);
        }
    }

    public static function stat(float $n, string $case = 'color'): object
    {
        if ($n < 50) {
            return (object) [
                'color' => 'danger',
                'arrow' => 'down',
            ];
        } else if ($n > 50) {
            return (object) [
                'color' => 'success',
                'arrow' => 'up',
            ];
        } else {
            return (object) [
                'color' => 'warning',
                'arrow' => 'up',
            ];
        }
    }

    public static function enum($i, $arr)
    {
        return array_key_exists($i, $arr) ? $arr[$i] : 'N/A';
    }

    public static function now()
    {
        return date('Y-m-d H:i:s.u');
    }

    public static function d_($ts = null, $f = 'Y-m-d')
    {
        $ts = $ts ?: self::now();
        return date($f, strtotime($ts));
    }

    public static function t_($ts = null, $f = 'H:i:s')
    {
        $ts = $ts ?: self::now();
        return date($f, strtotime($ts));
    }

    public static function df($ts = null, $f = 4)
    {
        $ts = $ts ?: self::now();
        $arr = ['YmdHisu', 'D, M j, Y', 'H:i A', 'D, M j, Y \a\t H:i A', 'D, M j, Y <\b\\r> H:i A'];
        if (is_numeric($f) && $f < count($arr)) {
            $f = $arr[$f];
        }
        return date($f, strtotime($ts));
    }

    public static function df_($ts = mull)
    {
        // 2020-04-21T12:47:00Z000000 = 20200421124700000000
        $ts = $ts ?: self::now();
        $delimiter = ['-', '/', ' ', 'T', ':', '.', 'Z'];
        foreach ($delimiter as $d) {
            $ts = str_replace($d, '', $ts);
        }
        return $ts;
    }

    public static function age($ts)
    {
        return Carbon::parse($ts)->age;
    }

    public static function ago($ts, $f = 'D, M j, Y \a\t H:i A')
    {
        $date1 = date_create($ts);
        $date2 = date_create(date('Y-m-d'));
        $diff = date_diff($date1, $date2);

        if (abs($diff->format("%a")) > 1) {
            $ans = date($f, strtotime($ts));
        } else {
            $ans = Carbon::parse($ts)->diffForHumans(Carbon::now(), [
                'syntax' => CarbonInterface::DIFF_RELATIVE_TO_NOW,
                'options' => Carbon::JUST_NOW | Carbon::NO_ZERO_DIFF | Carbon::ONE_DAY_WORDS,
            ]);
        }

        return is_numeric($ans[0]) ? $ans : ucfirst($ans);
    }

    public static function when($ts = null, $n = 365)
    {
        $ts = $ts ?: self::now();
        $arr = array_map(function ($e) {
            return (int) $e;
        }, explode('-', $ts));
        $from = mktime(0, 0, 0, $arr[1], $arr[2], $arr[0]);
        $to = strtotime('+' . $n . ' days', $from);
        return date('Y-m-d', $to);
    }

    public static function when_($ts = null, $n = 1)
    {
        $ts = $ts ?: self::now();
        $arr = array_map(function ($e) {
            return (int) $e;
        }, explode('-', $ts));
        $from = mktime(0, 0, 0, $arr[1], $arr[2], $arr[0]);
        $to = strtotime('-' . $n . ' days', $from);
        return date('Y-m-d', $to);
    }

    public static function dioxide($dt)
    {
        if (substr($dt, 0, 10) == date('Y-m-d')) {
            $f = 'h:i a';
        } else {
            $f = 'M jS';
        }

        return date($f, strtotime($dt));
    }

    public static function carbon($i = null, $ts = null)
    {
        $ts = $ts ?: self::now();

        $arr = [
            'second' => Carbon::parse($ts)->subSecond()->toDateTimeString(),
            'minute' => Carbon::parse($ts)->subMinute()->toDateTimeString(),
            'hour' => Carbon::parse($ts)->subHour()->toDateTimeString(),
            'day' => Carbon::parse($ts)->subDay()->toDateTimeString(),
            'week' => Carbon::parse($ts)->subWeek()->toDateTimeString(),
            'month' => Carbon::parse($ts)->subMonth()->toDateTimeString(),
            'quarter' => Carbon::parse($ts)->subQuarter()->toDateTimeString(),
            'year' => Carbon::parse($ts)->subYear()->toDateTimeString(),
        ];

        return $i ? $arr[$i] : $arr;
    }

    public static function wrap($txt, $len = 160, $end = '...')
    {
        $n = $len - strlen($end);
        return strlen($txt) > $n ? substr($txt, 0, $n) . '...' : $txt;
    }

    public static function crop($txt, $len = 160, $end = '...')
    {
        $n = $len - strlen($end);
        return strlen($txt) > $n ? substr($txt, 0, $n) . '...' : $txt;
    }

    public static function lorem($len = null)
    {
        $txt = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";

        return substr($txt, 0, $len ?: strlen($txt));
    }

    public static function link($txt, $path = null)
    {
        if (strpos($txt, '@') != false && strpos($txt, '.') != false) {
            $txt = strtolower($txt);
            return '<a href="mailto:' . $txt . '" target="_new">' . $txt . '</a>';
        } else if ($txt[0] === '+') {
            $tel = str_replace(' ', '', $txt);
            $tel = str_replace('(', '', $tel);
            $tel = str_replace(')', '', $tel);
            return '<a href="tel:' . $tel . '" target="_new">' . $txt . '</a>';
        } else if (strpos($txt, 'http') !== false) {
            return '<a href="' . $txt . '" target="_new">' . $txt . '</a>';
        } else if (strpos($txt, '.') !== false && $path) {
            $dir = substr($path, -1) == '/' ? $path . $txt : $path . '/' . $txt;
            return '<a href="' . str_replace(' ', '', $dir) . '" target="_new">' . $txt . '</a>';
        } else {
            return $txt;
        }
    }

    public static function rss()
    {
        // any website, try port 80 or 443
        $connect = @fsockopen('www.fsockopen.com', 80);
        if ($connect) {
            return fclose($connect);
        } else {
            return 0;
        }
    }

    public static function showing($arr)
    {
        $n = is_numeric($arr) ? $arr : count($arr);
        return sprintf('Showing rows 0 - %d (~%d total), query took 0.00%s secs.', $n - 1, $n, date('s'));
    }

    public static function showing_($from, $to, $total)
    {
        return sprintf('Showing rows %d - %d (~%d total), query took 0.00%s secs.', $from, $to, $total, date('s'));
    }

    public static function table($arr = null)
    {
        $style_th = 'style="width:1px; white-space:nowrap;"';
        $style_tr = 'style="vertical-align:top;"';

        $tr = '';
        foreach ($arr as $key => $value) {
            $th = sprintf('<th %s>%s</th>', $style_th, $key);
            if (is_array($value)) {
                $td = sprintf('<td>%s</td>', self::table($value));
            } else {
                $td = sprintf('<td>%s</td>', $value);
            }
            $tr .= sprintf('<tr %s>%s%s</tr>', $style_tr, $th, $td);
        }

        return sprintf('<table border="1">%s</table>', $tr);
    }

    public static function active($url, $class = 'active')
    {
        return \Request::is($url) ? $class : 'No';
    }

    public static function dark($class = 'dark')
    {
        $hr = (int) date('H');
        if ($hr <= 6 || $hr >= 18) {
            return $class;
        }
    }

    public static function selected($name, $value)
    {
        return \Request::input($name) == $value ? 'selected' : '';
    }

    public static function checked($name, $value)
    {
        return \Request::input($name) == $value ? 'checked' : '';
    }

    public static function repl($list, $keys)
    {
        foreach ($keys as $key => $value) {
            foreach ($list as $i => $item) {
                if (strpos($key, '.') !== false) {
                    $nested_key = explode('.', $key);
                    $parent = $nested_key[0];
                    $child = $nested_key[1];
                    if (array_key_exists($child, $item[$parent])) {
                        $list[$i][$value] = $item[$parent][$child];
                    }
                } else {
                    if (array_key_exists($key, $item)) {
                        $list[$i][$value] = $item[$key];
                    }
                }
            }
        }

        return $list;
    }

    public static function rept($list, $with_id = false, $size = 25)
    {
        $arr = [];
        for ($i = 0; $i < $size; $i++) {
            if ($with_id === true) {
                $list['id'] = $i + 1;
            }
            array_push($arr, $list);
        }

        return $arr;
    }

    // model collection to array
    public static function cta($col, $key = null)
    {
        $arr = $col->toArray();
        return is_null($key) ? $arr : $arr[$key];
    }

    // ordered list [] = <ol <li>>
    public static function ol($list, $class = '')
    {
        $li = array_map(function ($e) {
            return '<li>' . $e . '</li>';
        }, $list);
        return '<ol>' . implode('', $li) . '</ol>';
    }

    // unordered list [] = <ul <li>>
    public static function ul($list, $class = '')
    {
        $li = array_map(function ($e) {
            return '<li>' . $e . '</li>';
        }, $list);
        return '<ul>' . implode('', $li) . '</ul>';
    }

    // flat list [[],[]] = [,]
    public static function fl($list)
    {
        $arr = is_object($list) ? (array) $list : $list;
        return array_map(function ($e) {
            return array_pop($e);
        }, $list);
    }

    public static function rmhost($url)
    {
        $url = str_replace(env('APP_URL'), '', $url);
        $url = str_replace(':8000', '', $url);
        $url = str_replace(':3000', '', $url);
        $url = strpos($url, '?') !== false ? explode('?', $url)[0] . '?' : $url;
        return $url;
    }

    // dynamic sidebar
    public static function carte($menu, $ordered)
    {
        $list = [];
        foreach ($routes as $txt => $href) {
            if (array_key_exists($txt, $menu)) {
                $list[$txt] = [
                    'a' => ['href' => $href, 'target' => ''],
                    'b' => [],
                    'i' => 'fas fa-folder-open',
                    'i' => 'fi fi-rs-folder',
                    'dt' => $txt,
                    'dd' => [],
                ];
            } else {
                foreach ($menu as $dt => $dd) {
                    if (count($dd) > 0 && in_array($txt, $dd)) {
                        if (!array_key_exists($dt, $list)) {
                            $list[$dt] = [
                                'a' => [],
                                'b' => [],
                                'i' => 'fas fa-folder-open',
                                'i' => 'fi fi-rs-folder',
                                'dt' => $dt,
                                'dd' => [],
                            ];
                        }

                        $list[$dt]['dd'][] = [
                            'a' => ['href' => $href, 'target' => ''],
                            'b' => [],
                            'i' => 'far fa-file',
                            'i' => 'fi fi-rs-file',
                            'dt' => $txt,
                            'dd' => [],
                        ];
                    }
                }

            }
        }

        return $list;
    }
}
