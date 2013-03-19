<?php
/**
 * Questions on Campus.
 *
 * @category    Website
 * @package     Website_View
 * @subpackage  Website_View_Helper
 * @author      Andrew Sorensen <andrew@localcoast.net>
 *
 * @version     $Id: FormatTime.php 28 2012-09-05 04:18:06Z andrew@localcoast.net $
 */

/**
 * A simple helper to convert date formats into a friendly format.
 * Based on http://stackoverflow.com/a/2690541
 */
class Pimcore_View_Helper_FormatTime extends Zend_View_Helper_Abstract
{
    /**
     * Converts a timestamp to a user friendly format.
     *
     * @param   $ts the timestamp.
     *
     * @return  string
     */
    public function formatTime($ts)
    {
        if (!ctype_digit($ts)) {
            $ts = strtotime($ts);
        }

        $diff = time() - $ts;
        if ($diff == 0) {
            return 'now';
        }
        elseif ($diff > 0) {
            $day_diff = floor($diff / 86400);
            if (0 == $day_diff) {
                if ($diff < 60) {
                    return 'seconds ago';
                }

                if ($diff < 120) {
                    return '1 minute ago';
                }

                if ($diff < 3600) {
                    return floor($diff / 60) . ' minutes ago';
                }

                if ($diff < 7200) {
                    return '1 hour ago';
                }

                if ($diff < 86400) {
                    return floor($diff / 3600) . ' hours ago';
                }
            }

            if (1 == $day_diff) {
                return 'Yesterday';
            }

            if ($day_diff < 7) {
                return $day_diff . ' days ago';
            }

            if ($day_diff < 31) {
                return ceil($day_diff / 7) . ' weeks ago';
            }

            if ($day_diff < 60) {
                return 'last month';
            }

            return date('F Y', $ts);
        }
        else {
            $diff     = abs($diff);
            $day_diff = floor($diff / 86400);

            if (0 == $day_diff) {
                if ($diff < 120) return 'in a minute';
                if ($diff < 3600) return 'in ' . floor($diff / 60) . ' minutes';
                if ($diff < 7200) return 'in an hour';
                if ($diff < 86400) return 'in ' . floor($diff / 3600) . ' hours';
            }

            if (1 == $day_diff) {
                return 'Tomorrow';
            }

            if ($day_diff < 4) {
                return date('l', $ts);
            }

            if ($day_diff < 7 + (7 - date('w'))) {
                return 'next week';
            }

            if (ceil($day_diff / 7) < 4) {
                return 'in ' . ceil($day_diff / 7) . ' weeks';
            }

            if (date('n', $ts) == date('n') + 1) {
                return 'next month';
            }

            return date('F Y', $ts);
        }
    }
}