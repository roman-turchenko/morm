<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 22.12.2015
 * Time: 0:03
 */

$html = "";
$usersData = isset($params['usersData']) ? $params['usersData'] : array();
foreach ($usersData as $k => $v){

    $html = '<tr>'.
        '<td>'.($k+1).'</td>'.
        '<td>'.$v["login_user"].'</td>'.
        '<td>'.$v["email_user"].'</td>'.
        '<td>'.
        '<button class="btn btn-success" data-toggle="modal" data-target=".user-form" data-userid="'.$v['id_user'].'">Edit</button>'.
        ($v['id_user'] == authModel::$userData['id_user'] ?
            '<span class="label label-info">current</span>':
            '<button class="btn btn-danger" data-toggle="modal" data-target=".delete-user" >Delete</button>'
        ).
        '</td>'.
        '</tr>';
}
?>
<table class="table table-striped">
    <thead>
    <tr>
        <th class="order">&nbsp;</th>
        <th>Login</th>
        <th>E-mail</th>
        <th class="controls">Actions</th>
    </tr>
    </thead>
    <tbody><?=$html?></tbody>
</table>