<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ericmurphy
 * Date: 5/2/13
 * Time: 3:26 PM
 * To change this template use File | Settings | File Templates.
 */

//include 'application/models/map_model.php';

//header stuff
//$this->load->view('application/views/header.inc.php');

// Show the goods
include 'application/models/map_model.php';
include 'application/views/header.inc.php';
echo $map['html'];


//Footer Stuff
//$this->load->view("application/views/footer.inc.php");
include 'application/views/footer.inc.php';