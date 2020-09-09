<!-- Sign Up Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="signupModaltitle">Sign Up To iDiscuss</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/phpt/PHP_Projects/Forum_Web/partials/_handleSignup.php" method="post">
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control" id="signupemail"  name="signupemail" placeholder="name@example.com" Required>
            </div>
            <div class="form-group">
              <label for="password1">Choose a Password</label>
              <input type="password" class="form-control" id="signupPassword" name="signupPassword" placeholder="Choose Your Password" Required>
            </div>
            <div class="form-group">
              <label for="password2">Re-Enter Password</label>
              <input type="password" class="form-control" id="signupcPassword" name="signupcPassword" placeholder=" Your Password" Required>
            </div>
          <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>