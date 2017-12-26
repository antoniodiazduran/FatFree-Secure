<form action="<?= $BASE.'/users/create' ?>" method="post" class="form-horizontal">
    
  <div class="form-group">
    <label class="control-label col-xs-3 col-sm-2" for="username">Username:</label>
    <div class="col-xs-5 col-sm-3">
        <input type="text" id="username" name="username" class="form-control"/>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3 col-sm-2" for="password">Password:</label>
    <div class="col-xs-5 col-sm-3">
        <input type="password" id="password" name="password" class="form-control"/>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3 col-sm-2" for="password">Re-Type:</label>
    <div class="col-xs-5 col-sm-3">
        <input type="password" id="retype" name="retype" class="form-control"/>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3 col-sm-2" for="roles">User role:</label>
    <div class="col-xs-5 col-sm-3">
        <select id="roles" name="roles" class="form-control">
		<option>
		<option>User
		<option>Admin
	</select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3 col-sm-2" for="bp_id">Buisness Partner:</label>
    <div class="col-xs-5 col-sm-3">
        <input type="text" id="bp_id" name="bp_id" class="form-control"/>
    </div>
  </div>
  <input type="hidden" name="create" value="create" />
  <div class="form-group"> 
    <div class="col-xs-offset-3 col-xs-10 col-sm-offset-2 col-sm-5">
      <button id="create" type="submit" class="btn btn-primary">Create</button>
    </div>
  </div>

</form>
<script>
 $(document).ready(function(){
	$("#create").attr("disabled",true);
	$("#retype").change(check_submit);
	$("#username").change(check_submit);
	$("#bp_id").change(check_submit);

  function check_submit(){
    	var pass = $("#password").val();
        if (pass === $("#retype").val()) {
        	if( ($("#bp_id").val()!='') && ($("#username").val()!='') ){
		$("#create").removeAttr("disabled");
        	} else {
		$("#create").attr("disabled",true);
		}
	} else {
		$("#create").attr("disabled",true);
        }
  }

 });

</script>
