
 <form action="<?= $BASE.'/users/password' ?>" method="post" class="form-horizontal">
    
  <div class="form-group">
    <label class="control-label col-xs-3 col-sm-2" for="username">Username:</label>
    <div class="col-xs-5 col-sm-3">
        <input readonly type="text" id="username" name="username" value="<?= $POST['username'] ?>" class="form-control"/>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3 col-sm-2" for="bp_id">Old password:</label>
    <div class="col-xs-5 col-sm-3">
        <input type="password" id="pass0" name="pass0" value="" class="form-control"/>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3 col-sm-2" for="pass1">New password:</label>
    <div class="col-xs-5 col-sm-3">
        <input type="password" id="pass1" name="pass1" value="" class="form-control"/>
    </div>
    <div class="col-xs-5 col-sm-3" id="passlen1">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3 col-sm-2" for="pass2">Re-Type:</label>
    <div class="col-xs-5 col-sm-3">
        <input type="password" id="pass2" name="pass2" value="" class="form-control"/>
    </div>
  </div>
  <input type="hidden" name="password" id="password" value="">
  <input type="hidden" name="change" id="change" value="change" />
  <input type="hidden" name="id" id="id" value="<?= $POST['id'] ?>" />
  <div class="form-group"> 
    <div class="col-xs-offset-3 col-xs-10 col-sm-offset-2 col-sm-5">
      <button type="submit" name="mode" id="mode" class="btn btn-primary">Change</button>
    </div>
  </div>

 </form>

<script>
  $(document).ready(function() {

    var myCheck = setInterval(function() { checkPassword() },500);
    var myLen = setInterval(function() { checkLength() },500);

    function checkLength(){
	if ( $("#pass1").text().length <= 12) { $("#passlen1").text("At least 12 characters"); } else { $("#passlen1").text(""); }
    }
    
    function checkPassword() {
      if ($("#pass1").val() != '') {
	if ($("#pass1").val() === $("#pass2").val()) {
	  $("#mode").attr("disabled",false);
	  $("#pass1").attr('style', 'background-color: lightgreen' );
	  $("#pass2").attr('style', 'background-color: lightgreen' );
	} 
	else {
  	  $("#mode").attr("disabled",true);
	  $("#pass1").attr('style', 'background-color: white' );
	  $("#pass2").attr('style', 'background-color: silver' );
	}
      }
    }

  });

</script>
