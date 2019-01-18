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

// Render 404_error view
require '../views/pages/404_error.php';

// Show footer
require '../template/footer.php';

?>