<?php
$arUrlRewrite=array (
  0 => 
  array (
    'CONDITION' => '#^/bitrix/services/ymarket/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/bitrix/services/ymarket/index.php',
    'SORT' => 100,
  ),
  1 => 
  array (
    'CONDITION' => '#^([^/]+?)\\??(.*)#',
    'RULE' => 'SECTION_CODE=$1&$2',
    'ID' => 'bitrix:catalog.section',
    'PATH' => '/i1.php',
    'SORT' => 100,
  ),
  2 => 
  array (
    'CONDITION' => '#^([^/]+?)\\??(.*)#',
    'RULE' => 'SECTION_CODE=$1&$2',
    'ID' => 'bitrix:catalog.section',
    'PATH' => '/index.php',
    'SORT' => 100,
  ),
  3 => 
  array (
    'CONDITION' => '#^/awards_rus/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/awards_rus/index.php',
    'SORT' => 100,
  ),
  4 => 
  array (
    'CONDITION' => '#^/awards_rus#',
    'RULE' => '',
    'ID' => 'bitrix:bizproc.wizards',
    'PATH' => '/awards_rus/ploskiy-rele.php',
    'SORT' => 100,
  ),
  10 => 
  array (
    'CONDITION' => '#^/catalog/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog',
    'PATH' => '/catalog/index.php',
    'SORT' => 100,
  ),
  6 => 
  array (
    'CONDITION' => '#^/advice/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/advice/index.php',
    'SORT' => 100,
  ),
  7 => 
  array (
    'CONDITION' => '#^/museum/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog',
    'PATH' => '/museum/index.php',
    'SORT' => 100,
  ),
  8 => 
  array (
    'CONDITION' => '#^/forum/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => 'https://rusantikvar.ru/forum/index.php',
    'SORT' => 100,
  ),
  9 => 
  array (
    'CONDITION' => '#^/news/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/news/index.php',
    'SORT' => 100,
  ),
);
