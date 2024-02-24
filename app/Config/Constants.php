<?php

/*
 | --------------------------------------------------------------------
 | App Namespace
 | --------------------------------------------------------------------
 |
 | This defines the default Namespace that is used throughout
 | CodeIgniter to refer to the Application directory. Change
 | this constant to change the namespace that all application
 | classes should use.
 |
 | NOTE: changing this will require manually modifying the
 | existing namespaces of App\* namespaced-classes.
 */
defined('APP_NAMESPACE') || define('APP_NAMESPACE', 'App');

/*
 | --------------------------------------------------------------------------
 | Composer Path
 | --------------------------------------------------------------------------
 |
 | The path that Composer's autoload file is expected to live. By default,
 | the vendor folder is in the Root directory, but you can customize that here.
 */
defined('COMPOSER_PATH') || define('COMPOSER_PATH', ROOTPATH . 'vendor/autoload.php');

/*
 |--------------------------------------------------------------------------
 | Timing Constants
 |--------------------------------------------------------------------------
 |
 | Provide simple ways to work with the myriad of PHP functions that
 | require information to be in seconds.
 */
defined('SECOND') || define('SECOND', 1);
defined('MINUTE') || define('MINUTE', 60);
defined('HOUR')   || define('HOUR', 3600);
defined('DAY')    || define('DAY', 86400);
defined('WEEK')   || define('WEEK', 604800);
defined('MONTH')  || define('MONTH', 2_592_000);
defined('YEAR')   || define('YEAR', 31_536_000);
defined('DECADE') || define('DECADE', 315_360_000);

/*
 | --------------------------------------------------------------------------
 | Exit Status Codes
 | --------------------------------------------------------------------------
 |
 | Used to indicate the conditions under which the script is exit()ing.
 | While there is no universal standard for error codes, there are some
 | broad conventions.  Three such conventions are mentioned below, for
 | those who wish to make use of them.  The CodeIgniter defaults were
 | chosen for the least overlap with these conventions, while still
 | leaving room for others to be defined in future versions and user
 | applications.
 |
 | The three main conventions used for determining exit status codes
 | are as follows:
 |
 |    Standard C/C++ Library (stdlibc):
 |       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
 |       (This link also contains other GNU-specific conventions)
 |    BSD sysexits.h:
 |       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
 |    Bash scripting:
 |       http://tldp.org/LDP/abs/html/exitcodes.html
 |
 */
defined('EXIT_SUCCESS')        || define('EXIT_SUCCESS', 0);        // no errors
defined('EXIT_ERROR')          || define('EXIT_ERROR', 1);          // generic error
defined('EXIT_CONFIG')         || define('EXIT_CONFIG', 3);         // configuration error
defined('EXIT_UNKNOWN_FILE')   || define('EXIT_UNKNOWN_FILE', 4);   // file not found
defined('EXIT_UNKNOWN_CLASS')  || define('EXIT_UNKNOWN_CLASS', 5);  // unknown class
defined('EXIT_UNKNOWN_METHOD') || define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     || define('EXIT_USER_INPUT', 7);     // invalid user input
defined('EXIT_DATABASE')       || define('EXIT_DATABASE', 8);       // database error
defined('EXIT__AUTO_MIN')      || define('EXIT__AUTO_MIN', 9);      // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      || define('EXIT__AUTO_MAX', 125);    // highest automatically-assigned error code

/**
 * @deprecated Use \CodeIgniter\Events\Events::PRIORITY_LOW instead.
 */
define('EVENT_PRIORITY_LOW', 200);

/**
 * @deprecated Use \CodeIgniter\Events\Events::PRIORITY_NORMAL instead.
 */
define('EVENT_PRIORITY_NORMAL', 100);

/**
 * @deprecated Use \CodeIgniter\Events\Events::PRIORITY_HIGH instead.
 */
define('EVENT_PRIORITY_HIGH', 10);


define('IMAGEN',"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");
