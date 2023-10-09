<?php
// This file is part of the IQA Module Plugin
/**
 * @package     mod_iqa
 * @author      Robert Tyrone Cullen
 * @var stdClass $plugin
 */

defined('MOODLE_INTERNAL') || die();

$plugin->version = 2;
$plugin->requires  = 2020110300;  // Requires this Moodle version.
$plugin->component = 'mod_iqa'; // Full name of the plugin (used for diagnostics).
$plugin->cron      = 0;