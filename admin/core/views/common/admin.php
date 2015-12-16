<?php
/**
 * Created by PhpStorm.
 * User: roman.turchenko
 * Date: 15.12.2015
 * Time: 18:37
 */
?>
<!-- Top bar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?=APP_ROOT_URL;?>">Project name</a>
        </div>
        <div class="navbar-collapse collapse in" style="height: auto;">
            <?=classModel::$adminTopMenu?>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?=authModel::$logoutLink?>">Logout</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>

<div class="container"><?=$params['content']?></div>

<!-- Footer -->
<div id="footer">
    <div class="container">
        <p class="text-muted">Place sticky footer content here.</p>
    </div>
</div>