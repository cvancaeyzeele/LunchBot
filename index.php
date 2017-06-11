<!DOCTYPE html>
<html lang="en">
  <?php include 'header.php' ?>
  <body>
    <div class="container">
      <h1>What's for lunch?</h1>
      <form action="result.php">
        <div class="form-group">
          <legend>Do you want to walk far?</legend>
          <div class="form-check">
            <input type="radio" class="form-check-input" name="walkFar" id="farWalk" value="yes" checked>
            <label class="form-check-label"> Yes</label>
          </div>
          <div class="form-check">
            <input type="radio" class="form-check-input" name="walkFar" id="shortWalk" value="no">
            <label class="form-check-label"> No</label>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit <i class="material-icons">restaurant</i></button>
      </form>
    </div>
  </body>
</html>