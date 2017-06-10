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
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="walkFar" id="farWalk" value="yes" checked>
              Yes
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
            <input type="radio" class="form-check-input" name="walkFar" id="shortWalk" value="no">
            No
            </label>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </body>
</html>