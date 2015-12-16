<?php
/**
 * Created by PhpStorm.
 * User: roman.turchenko
 * Date: 16.12.2015
 * Time: 17:15
 */
$menu = "";
foreach ($params as $v){
    $menu .= '<li '.(classModel::$controller == $v['controller'] ? 'class="active"' : '').'><a href="'.$v['href'].'">'.$v['title'].'</a></li>';
}
?>
<ul class="nav navbar-nav"><?=$menu;?></ul>
