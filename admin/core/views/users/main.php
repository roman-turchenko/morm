<div class="page-header">
    <h1>List of users</h1>
</div>

<?
    foreach ($params as $k => $v){
        $data = "<tr>".
            '<td>'.($k+1).'</td>'.
            "<td>".$v["login_user"]."</td>".
            "<td>".$v["email_user"]."</td>".
            '<td><a class="btn btn-success" href="#" role="button">Edit</a><a class="btn btn-danger" href="#" role="button">Delete</a></td>';
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
    <tbody><?=$data?></tbody>
</table>
