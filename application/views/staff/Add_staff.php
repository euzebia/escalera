

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url();?>/index.php/Welcome/index">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Staff recruitment</li>
          </ol>

          <!-- Page Content -->
           <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Register new staff</div>
        <div class="card-body">
          <?php echo form_open('Welcome/recordNewStaff');?>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-group">
				    <label>First name</label>
                    <input type="text"  class="form-control" name="fname" placeholder="First name" required="required" autofocus="autofocus">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
				    <label>Last name</label>
                    <input type="text"  class="form-control" name="lname" placeholder="Last name" required="required" autofocus="autofocus">
                  </div>
                </div>
              </div>
			  <!--- new row ---->
			  <div class="form-row">
                <div class="col-md-6">
                  <div class="form-group">
				    <label>Email Address</label>
                    <input type="email"  class="form-control" name="email" placeholder="Email address" required="required" autofocus="autofocus">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
				    <label>Username</label>
                    <input type="text"  class="form-control" name="username" placeholder="Username" required="required" autofocus="autofocus">
                  </div>
                </div>
              </div>
			  <!--- new row ---->
			  <div class="form-row">
                <div class="col-md-6">
                  <div class="form-group">
				    <label>Password</label>
                    <input type="password"  class="form-control" name="password" placeholder="Password" required="required" autofocus="autofocus">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
				    <label>Date of Birth</label>
                    <input type="date"  class="form-control" name="dateOfBirth" placeholder="date of Birth" required="required" autofocus="autofocus">
                  </div>
                </div>
              </div>
			  
            </div>
			
            <input type="submit" class="btn btn-primary btn-block" name="register" value="Add staff">
            </div>
          </form>
        </div>
      </div>
    </div>

</div>
<!-- /.container-fluid -->
       