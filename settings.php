<?php

/**
 * This file is part of the Dataform module for Moodle - http://moodle.org/.
 *
 * @package mod-dataform
 * @copyright 2011 Itamar Tzadok
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 *
 * The Dataform has been developed as an enhanced counterpart
 * of Moodle's Database activity module (1.9.11+ (20110323)).
 * To the extent that Dataform code corresponds to Database code,
 * certain copyrights on the Database module may obtain.
 *
 * Moodle is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Moodle is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Moodle. If not, see <http://www.gnu.org/licenses/>.
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
    // enable rss feeds
    if (empty($CFG->enablerssfeeds)) {
        $options = array(0 => get_string('rssglobaldisabled', 'admin'));
        $str = get_string('configenablerssfeeds', 'dataform').'<br />'.get_string('configenablerssfeedsdisabled2', 'admin');

    } else {
        $options = array(0=>get_string('no'), 1=>get_string('yes'));
        $str = get_string('configenablerssfeeds', 'dataform');
    }
    $settings->add(new admin_setting_configselect('dataform_enablerssfeeds', get_string('enablerssfeeds', 'admin'),
                       $str, 0, $options));

    $unlimited = get_string('unlimited');
    $keys = range(0,500);
    $values = range(1,500);
    array_unshift($values, $unlimited);

    // max fields
    $options = array_combine($keys, $values);
    $settings->add(new admin_setting_configselect('dataform_maxfields', get_string('fieldsmax', 'dataform'),
                       get_string('configmaxfields', 'dataform'), 0, $options));

    // max views
    $options = array_combine($keys, $values);
    $settings->add(new admin_setting_configselect('dataform_maxviews', get_string('viewsmax', 'dataform'),
                       get_string('configmaxviews', 'dataform'), 0, $options));

    // max filters
    $options = array_combine($keys, $values);
    $settings->add(new admin_setting_configselect('dataform_maxfilters', get_string('filtersmax', 'dataform'),
                       get_string('configmaxfilters', 'dataform'), 0, $options));

    // max entries
    $keys = range(-1,500);
    $values = range(0,500);
    array_unshift($values, $unlimited);

    $options = array_combine($keys, $values);
    $settings->add(new admin_setting_configselect('dataform_maxentries', get_string('entriesmax', 'dataform'),
                       get_string('configmaxentries', 'dataform'), -1, $options));
}
