<form action="<?= $BASE.'/prod/create' ?>" method="post" class="form-horizontal">
    
  <div class="form-group">
    <label class="control-label col-xs-3 col-sm-2" for="transdate">Date:</label>
    <div class="col-xs-5 col-sm-2">
      <input type="text" class="form-control" id="transdate" name="transdate" placeholder="mm/dd/yyyy">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3 col-sm-2" for="station">Area:</label>
    <div class="col-xs-5 col-sm-3">
        <select id="area" name="area" value="" class="form-control"/>
	    <option>
            <option>Manufacturing
            <option>Assembly
            <option>Test
        </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3 col-sm-2" for="station">Station:</label>
    <div class="col-xs-5 col-sm-3">
        <select id="station" name="station" class="form-control"/>
        </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3 col-sm-2" for="station">Shift:</label>
    <div class="col-xs-5 col-sm-3">
        <select id="shift" name="shift" class="form-control"/>
        </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3 col-sm-2" for="partno">Part No:</label>
    <div class="col-xs-9 col-sm-5">
      <input type="text" class="form-control" id="partno" name="partno" placeholder="Part Number">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3 col-sm-2" for="good">Good:</label>
    <div class="col-xs-9 col-sm-3"> 
      <input type="text" class="form-control" id="good" name="good" placeholder="Good quantity">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3 col-sm-2" for="scrap">Scrap:</label>
    <div class="col-xs-9 col-sm-3"> 
      <input type="text" class="form-control" id="scrap" name="scrap" placeholder="Scrap quantity">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3 col-sm-2" for="rework">Rework:</label>
    <div class="col-xs-9 col-sm-3"> 
      <input type="text" class="form-control" id="rework" name="rework" placeholder="Rework quantity">
    </div>
  </div>
  <input type="hidden" id="timestamp" name="timestamp"/>
  <input type="hidden" name="create" value="create" />
  <div class="form-group"> 
    <div class="col-xs-offset-3 col-xs-10 col-sm-offset-2 col-sm-5">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>

</form>


<script>   
    
    $(document).ready(function(){  
        $("#transdate").val(formatDates());
        $("#timestamp").val(formatNow());
        fillShift();
    });     

</script>


