<div class="page-header">
    <h1>List of users <button type="button" data-toggle="modal" data-target=".user-form" data-userid="new" class="btn btn-primary pull-right">+ Add new user</button></h1>
</div>

<!-- List of users -->
<div id="usersList"></div>

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
                        <label for="inputLogin" class="col-sm-2 control-label">Login</label>
                        <div class="col-sm-10">
                            <input name="login_user" type="string" class="form-control" id="inputLogin" placeholder="Type user's login">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">E-mail</label>
                        <div class="col-sm-10">
                            <input name="email_user" type="email" class="form-control" id="inputEmail" placeholder="Type user's e-mail">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input name="password" type="password" class="form-control" id="inputPassword" placeholder="New password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input name="confirmPassword" type="password" class="form-control" placeholder="Confirm new password">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="hidden" name="id_user" value="" />
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <!-- Errors -->
                            <div class="alert alert-danger"></div>
                            <!-- All good-->
                            <div class="alert alert-success"></div>
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

    var alertDanger  = $(".alert-danger"),
        alertSuccess = $(".alert-success"),
        usersList = $("#usersList");

    // getting users list

    function clearForm(){
        // clear form
        $("#form").clearForm();
        // hide messages
        alertDanger.hide();
        alertSuccess.hide();

        alertDanger.html("");
        alertSuccess.html("");
    }

    $('#form').on('show.bs.modal', function(e){

        var userId = e.relatedTarget.dataset.userid,
            that = this,
            header = $(e.target).find("h4");

        clearForm();

        // set user id
        $(this).find("input[name='id_user']").val(userId);

        if (userId !== "new"){

            $.post("<?=usersModel::$apiGetUserData?>", {"id_user": userId}, function(r){
                // set header
                header.html("Edit user "+ r.data.login_user);
                // write data to inputs
                if (Object.keys(r.data)){
                    $.each(r.data, function(k,v){
                        console.log(k, v);
                        $(that).find("input[name='"+k+"']").val(v);
                        console.log($(that).find("input[name='"+k+"']"));
                    });
                }
            });

        }else{
            header.html("Add new user");
        }


    }).on('hide.bs.modal', function(e){

        clearForm();

    }).ajaxForm({
        url: "<?=usersModel::$urlPerformForm?>",
        dataType: "json",
        type: "POST",
        beforeSubmit: function(){
            alertDanger.hide();
            alertSuccess.hide();

            alertDanger.html("");
            alertSuccess.html("");
        },
        complete: function(xhr, status){
           console.log("complete", xhr, status);
            if (status == "success"){

                var data = xhr.responseJSON;

                console.log(data);

                if (typeof data.errors == "object"){
                    $.each(data.errors, function(k,v){
                        alertDanger.append("<p>"+v+"</p>");
                    });

                    alertDanger.fadeIn();
                }

            }else{
                alertDanger.append("<p>Submitting error</p>");
            }
        }
    });

</script>


