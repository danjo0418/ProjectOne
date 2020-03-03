<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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

                    <div class="col-md-8">
                        <div class="signinacct pmid m-auto">
                           <h3 class="text-center">LOGIN ACCOUNT</h3>
                           <form id="js-login-form">
                              @csrf
                              <div class="form-group">
                                	<label for="InputEmail1" class="text-left">Email address</label>
                                	<input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
                              </div>
                              <div class="form-group">
                                	<label for="InputPassword1">Password</label>
                                	<input type="password" class="form-control" id="InputPassword1" placeholder="Enter Password" name="password" required>
                                 <span class="cstm-mssg" role="alert">
                                     <strong class="js-message"></strong>
                                 </span>
                              </div>
                              <div class="clearfix">
                                 <div class="form-check float-left">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label pl-1" for="Check1"><p>Remember Me</p></label>
                                 </div>
                                 {{-- @if (Route::has('password.request'))
                                    <p class="float-right"><a href="{{ route('password.request') }}">Forgot Password?</a></p>
                                 @endif --}}
                              </div>
                              <span class="form-button text-left">
                                 <button type="submit" class="btn btn-keyland">SIGN IN</button>
                              </span>
                           </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

