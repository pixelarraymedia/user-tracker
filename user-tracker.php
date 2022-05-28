<?php
/**
 *Plugin Name: User tracker
 *Description: This plugin will help us to keep track of who logged in and when
 */

function createTrackerTable()
{
    global $wpdb;

    $sql = "CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."usertracker` (`uid` bigint(20) NOT NULL, `uname` varchar(50) NOT NULL, `logindate` datetime NOT NULL)"
;
    $wpdb->get_results($sql);
}
register_activation_hook(__FILE__, 'createTrackerTable');


function saveTrack($user_login, $user)
{
    $userinfo = $user->data;
    $id = $userinfo->ID;
    $username = $userinfo->user_nicename;

    global $wpdb;

    $sql = "INSERT INTO ".$wpdb->prefix."usertracker (`uid`,`uname`,`logindate`) VALUES (".$id.",'".$username."', now())";
    $wpdb->get_results($sql);
}

add_action('wp_login', 'saveTrack', 10,2); //  this hook will call saveTrack when user is logging in

function removeTrackerTable() // this function will delete usertracker table
{
    global $wpdb;
    $sql = "DROP TABLE ".$wpdb->prefix."usertracker";
    $wpdb->get_results($sql);
}
register_uninstall_hook(__FILE__, 'removeTrackerTable');