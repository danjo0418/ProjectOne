<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="acntlogin">
            <div class="modal-content">
            	<button type="button" class="close" data-dismiss="modal" aria-label="close" style="position:absolute; right:10px; top:10px; z-index: 99;"><span aria-hidden="true">&times;</span></button>
                <div class="row mr-0 ml-0">
                    <div class="col-md-4 text-center bgnav br5" style="min-height: 400px; height:auto;">
                        <div class="pmid">
                            <img src="{{ asset('assets/img/icons/logo.png') }}" alt="logo" class="img-fluid text-center m-auto d-block" width="250px"/>
                        </div>
                    </div>
                    <div class="col-md-8 my-5">
                        <div class="signinacct pmid m-auto">
                           <h3 class="text-center mb-3">REGISTER ACCOUNT</h3>
                           <form method="POST" action="{{ URL::to('registerAccount') }}">
                              @csrf
                              <div class="form-group">
                                 <label for="">Firstname <span class="text-danger">*</span></label>
                                 <input type="text" class="form-control" placeholder="Enter Firstname" name="fname" required>
                              </div>
                              <div class="form-group">
                                 <label for="">Lastname <span class="text-danger">*</span></label>
                                 <input type="text" class="form-control" placeholder="Enter Lastname" name="lname" required>
                              </div>
                              <div class="form-group">
                                 <label for="">Email <span class="text-danger">*</span></label>
                                 <input type="email" class="form-control" placeholder="Enter Email" name="email" required>
                              </div>
                              <div class="form-group">
                                 <label for="">Phone Number <span class="text-danger">*</span></label>
                                 <input type="number" class="form-control" placeholder="Enter Phone Number" minlength="11" name="phone" required>
                              </div>
                              <div class="form-group">
                                 <label for="">Facebook URL <span class="text-danger">*</span></label>
                                 <input type="text" class="form-control" placeholder="Enter Facebook URL" name="socialmedia" required>
                              </div>
                              <div class="col-md-12 p-0">
                                 <div class="form-group">
                                    <label for="">New Password <span class="text-danger">*</span></label>
                                    <input type="password" id="mypass" class="form-control" placeholder="Enter New Password" name="password" required>
                                    <div class="showpass">
                                       <a href="javascript:void(0)" onclick="showPassword()">
                                          <i class="fa fa-eye text-dark"></i>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <button class="btn btn-keyland">REGISTER</button>
                           </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
   function showPassword() {
      var x = document.getElementById("mypass");
      if (x.type === "password") {
        x.type = "text";
        $('.fa').removeClass('fa-eye');
        $('.fa').addClass('fa-eye-slash');
      } else {
        x.type = "password";
        $('.fa').removeClass('fa-eye-slash');
        $('.fa').addClass('fa-eye');
      }
   }
</script>

