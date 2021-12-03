<?php
require('../CDWS/Config/Database.php');
if (isset($_POST['submit'])) {
    echo $_POST['search'];
}