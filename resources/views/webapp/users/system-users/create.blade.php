@extends('templates.website.arsha-login')

@section('title', 'Add User')


@section('content')

            <form class="user" method="POST" action="/system-user/">
                @csrf
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Add New User Here! </h1>
                  </div>
                
                    <div class="form-group">
                      <input id="name" type="text" value="" class="form-control form-control-user @error('name') is-invalid @enderror" placeholder="Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                  
                   <input type="hidden" name="property_id" value="{{ $property->property_id }}">
                   
                    <div class="form-group">
                        <input id="email" type="text" value="" class="form-control form-control-user @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                              @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                      </div>

                    <div class="form-group">
                      <select name="user_type" id="user_type" class="form-control form-control-user @error('user_type') is-invalid @enderror" required autocomplete="user_type" autofocus>
                     
                        @if (old('user_type'))
                        <option value="{{ old('user_type') }}" selected>{{ old('user_type') }}</option>
                
                        <option value="admin">admin</option>
                        <option value="ap">ap</option>
                        <option value="billing">billing</option>
                    
                        <option value="treasury">treasury</option>
                        @else
                        <option value="">Select type</option>
                        <option value="admin">admin</option>
                        <option value="ap">ap</option>
                        <option value="billing">billing</option>
              
                        <option value="treasury">treasury</option>
                        @endif
                       
                      </select>
                            @error('user_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    
                    <div class="form-group">
                        <input id="password" type="password" value="" class="form-control form-control-user @error('password') is-invalid @enderror" placeholder="Password" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>
                              @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                      </div>

                   <div class="row">
                     <div class="col">
                      <a href="/property/all" class="btn btn-secondary btn-user btn-block" >Back</a>
                     
                     </div>
                     <div class="col">
       
                      <a href="/property/{{ $property->property_id }}/user/all/" class="btn btn-warning btn-user btn-block"> Users </a>
                  
                  </div>
                     <div class="col">
                      <button type="submit" class="btn btn-primary btn-user btn-block" onclick="this.form.submit(); this.disabled = true;">Submit</button>
                     </div>
                   </div>
                  </form>  
            
@endsection

@section('scripts')

@endsection
