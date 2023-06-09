

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>PT LAPOR</title>
      
      @include('layouts.admin.style')
   </head>
  <body class=" ">
    <!-- loader Start -->
    <div id="loading">
          <div id="loading-center">
          </div>
    </div>
    <!-- loader END -->
    
      <div class="wrapper">
      <section class="login-content">
         <div class="container h-100">
            <div class="row align-items-center justify-content-center h-100">
               <div class="col-md-5">
                  <div class="card p-3">
                     <div class="card-body">
                        <div class="auth-logo">
                           <img src="{{asset('admin/assets/images/logo.png')}} " class="img-fluid  rounded-normal  darkmode-logo" alt="logo">
                           <img src="{{asset('admin/assets/images/logo-dark.png')}}" class="img-fluid rounded-normal light-logo" alt="logo">
                        </div>
                        <h3 class="mb-3 font-weight-bold text-center">Sign In</h3>
                        <p class="text-center text-secondary mb-4">Log in to your account to continue</p>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                           <div class="row">
                              <div class="col-lg-12">
                                 <div class="form-group">
                                    <label class="text-secondary">{{ __('Email Address') }}</label>
                                    <input class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" required placeholder="Enter Email">
                                    @error('email')
                                       <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                       </span>
                                    @enderror
                                 </div>
                              </div>
                              <div class="col-lg-12 mt-2">
                                 <div class="form-group">
                                     <div class="d-flex justify-content-between align-items-center">
                                         <label class="text-secondary">Password</label>
                                         <label><a href="auth-recover-pwd.html">Forgot Password?</a></label>
                                         @error('password')
                                             <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" required placeholder="Enter Password">
                                 </div>
                              </div>
                           </div>
                           <button type="submit" class="btn btn-primary btn-block mt-2">Log In</button>
                           <div class="col-lg-12 mt-3">
                                <p class="mb-0 text-center">Don't have an account? <a href="/register">Sign Up</a></p>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      </div>
   @include('layouts.admin.scripts') 
   </body>
</html>