<?php

/**
 * In the controller file, you can handle and process variables,
 * classes and functions; use if-elseif statments; handle your
 * database connection like PDO abstraction layer; and load/require
 * files. The variables can then be used in the view file.
 */

// Show header and menu
require '../template/header.php';
require '../template/menu.php';

// Set variable in controller
$param1 = url_value(1);

// Render welcome view
// Use variable inside view using native PHP templating
require '../views/pages/welcome.php';

// Show footer
require '../template/footer.php';

?>