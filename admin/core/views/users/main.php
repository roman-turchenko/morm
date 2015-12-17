<div class="page-header">
    <h1>List of users <button type="button" data-toggle="modal" data-target=".user-form" data-userid="new" class="btn btn-primary pull-right">+ Add new user</button></h1>
</div>

<?
    foreach ($params as $k => $v){

        $data = '<tr>'.
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
    <tbody><?=$data?></tbody>
</table>

<!-- edit form -->
<div id="form" class="modal fade user-form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Edit</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Login</label>
                        <div class="col-sm-10">
                            <input name="login_user" type="string" class="form-control" id="inputEmail3" placeholder="Type user's login">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">E-mail</label>
                        <div class="col-sm-10">
                            <input name="email_user" type="email" class="form-control" id="inputEmail3" placeholder="Type user's e-mail">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword3" placeholder="New password">
                        </div>
                        <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword3" placeholder="Confirm new password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="hidden" name="id_user" value="" />
                            <button type="submit" class="btn btn-primary">Add new user</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete confirm -->
<div class="modal fade delete-user" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Delete</h4>
            </div>
            <div class="modal-body">
                Are you shure, that you want to delete?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- Add remove and delete -->
<script>

    $('#form').on('show.bs.modal', function(e){

        var userId = e.relatedTarget.dataset.userid,
            that = this;
        // set user id
        $(this).find("input[name='id_user']").val(userId);

        if (userId !== "new"){

            $.post("<?=usersModel::$apiGetUserData?>", {"id_user": userId}, function(r){
                console.log(r);

                if (Object.keys(r.data)){
                    $.each(r.data, function(k,v){
                        console.log(k, v);
                        $(that).find("input[name='"+k+"']").val(v);
                        console.log($(that).find("input[name='"+k+"']"));
                    });
                }
            });
        }


    }).on('hide.bs.modal', function(e){

        // resset all inputs
        $.each($(this).find("input"), function(k,v){
            $(v).val("");
        });

    }).ajaxForm(function() {
        alert("Thank you for your comment!");
    });

</script>


