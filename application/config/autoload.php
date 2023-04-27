<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();
$autoload['libraries'] = array('template','session','database');
$autoload['drivers'] = array();
$autoload['helper'] = array('html','url','text','aoc','form');
$autoload['config'] = array();
$autoload['language'] = array();
$autoload['model'] = array("M_data","M_proses");