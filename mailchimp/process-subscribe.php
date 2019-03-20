<?php

if (isset($_POST['mc_add'])) { // Checking for submit action
    require_once 'MCAPI.class.php';
    require_once 'config.inc.php'; // Write your apikey in this file

    $email = trim(strip_tags(addslashes($_POST['mc_email'])));
    $api = new MCAPI($apikey);
    $merge_vars = array(); // write the merge variables here!
// By default this sends a confirmation email - you will not see new members
// until the link contained in it is clicked!
    $retval = $api->listSubscribe($listId, $email, $merge_vars);
    if ($api->errorCode) {
        echo '<div class="alert alert-warning">Please enter a valid email address!</div>'; // an error message
    } else {
        echo '<div class="alert alert-success">Thank you, Please check email to confirm!</div>'; // an success message
    }
} else { // Submit action false
    echo '<div class="alert alert-warning">sPlease enter a valid email address!</div>'; // an error message
}
?>