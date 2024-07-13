<?php
$menu_array = [
  [
    'id' => 1,
    'nav_name' => 'test/',
    'parent_id' => 0
  ],
  [
    'id' => 2,
    'nav_name' => 'test1/',
    'parent_id' => 0
  ],
  [
    'id' => 3,
    'nav_name' => 'test2/',
    'parent_id' => 2
  ],
  [
    'id' => 4,
    'nav_name' => 'test3/',
    'parent_id' => 2
  ],
  [
    'id' => 5,
    'nav_name' => 'test4/',
    'parent_id' => 4
  ],
];

function buildMenuFromArray($menu_array, $parent_id = 0, $parentClass = "", $subClass = "")
{

  $childItems = array();
  foreach ($menu_array as $key => $item) {

    if ($item['parent_id'] == $parent_id) {
      $childItems[] = $item;
      unset($menu_array[$key]);
    }
  }

  if ($childItems) {
    echo "<ul class='{$parentClass}'>";
    foreach ($childItems as $key => $item) {
      echo '<li>' . $item['nav_name'];
      buildMenuFromArray($menu_array, $item['id'], $subClass, $subClass);
      echo '</li>';
    }
    echo '</ul>';
  } else {
    echo "<ul class='{$subClass}'></ul>";
  }
}

buildMenuFromArray($menu_array, 0, 'nav-table', 'sub');

