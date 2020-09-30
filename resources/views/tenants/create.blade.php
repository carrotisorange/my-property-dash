@extends('layouts.app')

@section('title',  session(Auth::user()->id.'building').' '.session(Auth::user()->id.'unit_no'))

@section('sidebar')
      <!-- Nav Item - Dashboard -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/board">
            <div class="sidebar-brand-icon">
               <i class="fab fa-product-hunt"></i>
            </div>
            <div class="sidebar-brand-text mx-3">{{ Auth::user()->property }}<sup></sup></div>
          </a>
      
          <!-- Divider -->
          <hr class="sidebar-divider my-0">
      
           <!-- Heading -->
      
          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
                <a class="nav-link" href="/board">
                  <i class="fas fa-fw fa-tachometer-alt"></i>
                  <span>Dashboard</span></a>
              </li>
      
            <hr class="sidebar-divider">
      
            <div class="sidebar-heading">
              Interface
            </div>  
          @if(Auth::user()->user_type === 'admin' || Auth::user()->user_type === 'manager' )
          <li class="nav-item">
            <a class="nav-link" href="/home">
              <i class="fas fa-home"></i>
              <span>Home</span></a>
          </li>
          @endif
        
          @if(Auth::user()->user_type === 'admin' || Auth::user()->user_type === 'manager' || Auth::user()->user_type === 'billing' || Auth::user()->user_type === 'treasury')
            <li class="nav-item">
              <a class="nav-link" href="/tenants">
                <i class="fas fa-users fa-chart-area"></i>
                <span>Tenants</span></a>
            </li>
            @endif
      
       @if((Auth::user()->user_type === 'admin' && Auth::user()->property_ownership === 'Multiple Owners') || (Auth::user()->user_type === 'manager' && Auth::user()->property_ownership === 'Multiple Owners'))
        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="/owners">
            <i class="fas fa-user-tie"></i>
            <span>Owners</span></a>
        </li>
         @endif
      
         @if(Auth::user()->user_type === 'admin' || Auth::user()->user_type === 'manager' )
            <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="/concerns">
          <i class="far fa-comment-dots"></i>
              <span>Concerns</span></a>
        </li>
        @endif
    
        @if(Auth::user()->user_type === 'admin' || Auth::user()->user_type === 'manager' )
        <li class="nav-item">
            <a class="nav-link" href="/job-orders">
              <i class="fas fa-tools fa-table"></i>
              <span>Job Orders</span></a>
        </li>
        @endif
      
             <!-- Nav Item - Tables -->
        @if(Auth::user()->user_type === 'admin' || Auth::user()->user_type === 'manager' )
          <li class="nav-item">
            <a class="nav-link collapsed" href="/personnels" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
              <i class="fas fa-user-cog"></i>
                <span>Personnels</span>
              </a>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                  <a class="collapse-item" href="/housekeeping">Housekeeping</a>
                  <a class="collapse-item" href="/maintenance">Maintenance</a>
                </div>
              </div>
            </li>
        @endif
      
           @if(Auth::user()->user_type === 'billing' || Auth::user()->user_type === 'manager')
            <!-- Nav Item - Tables -->
            <li class="nav-item">
              <a class="nav-link" href="/bills">
                <i class="fas fa-file-invoice-dollar fa-table"></i>
                <span>Bills</span></a>
            </li>
           @endif
      
           @if(Auth::user()->user_type === 'treasury' || Auth::user()->user_type === 'manager')
              <li class="nav-item">
              <a class="nav-link" href="/collections">
                <i class="fas fa-file-invoice-dollar"></i>
                <span>Collections</span></a>
            </li>
            @endif
      
               @if(Auth::user()->user_type === 'manager' || Auth::user()->user_type === 'ap' || Auth::user()->user_type === 'admin')
            <li class="nav-item">
            <a class="nav-link" href="/account-payables">
            <i class="fas fa-hand-holding-usd"></i>
              <span>Account Payables</span></a>
          </li>
          @endif
      
          @if(Auth::user()->user_type === 'manager')
           <!-- Nav Item - Tables -->
           <li class="nav-item">
            <a class="nav-link" href="/users">
              <i class="fas fa-user-circle"></i>
              <span>Users</span></a>
          </li>
          @endif
          
          <!-- Divider -->
          <hr class="sidebar-divider d-none d-md-block">
      
          <!-- Sidebar Toggler (Sidebar) -->
          <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
          </div>
    
@endsection

@section('content')
     
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="/units/{{ session(Auth::user()->id.'unit_id') }}">{{ session(Auth::user()->id.'building').' '.session(Auth::user()->id.'unit_no') }}</a></li>
  <li class="breadcrumb-item">Tenant</li>
  {{-- <li class="breadcrumb-item">Contract</li>
 <li class="breadcrumb-item">Payment</li>  --}}
 
</ol> 

@foreach (['danger', 'warning', 'success', 'info'] as $key)
@if(Session::has($key))
<p class="alert alert-{{ $key }}"> <i class="fas fa-times-circle"></i> {{ Session::get($key) }}</p>
@endif
@endforeach
<form id="addTenantForm1" action="/tenants" method="POST">
{{ csrf_field() }}
</form>

<input form="addTenantForm1" type="hidden" value="{{ session(Auth::user()->id.'unit_id') }}" name="unit_id"> 
<div class="row">
    <div class="col">
        <small class="">First Name <span class="text-danger">*</span></small>
        <input form="addTenantForm1" type="text" class="form-control" name="first_name" name="first_name" id="first_name" required>
          {{-- @error('first_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror --}}
      </div>
    <div class="col">
        <small class="">Middle Name</small>
        <input form="addTenantForm1" type="text" class="form-control" name="middle_name" id="middle_name" value="">
    </div>
    <div class="col">
        <small class="">Last Name  <span class="text-danger">*</span></small>
        <input form="addTenantForm1" type="text" class="form-control" name="last_name" id="last_name" value="" required>

        {{-- @error('last_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror --}}
    </div>
    </div>
    <br>
<div class="row">
    <div class="col">
        <small class="">Birthdate </small>
        <input form="addTenantForm1" type="date" class="form-control" name="birthdate" id="birthdate" value="{{ session(Auth::user()->id.'birthdate') }}" >

        {{-- @error('birthdate')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror --}}
    </div>
    <div class="col">
        <small class="">Gender </small>
        <select form="addTenantForm1"  id="gender" name="gender" class="form-control">        
            <option value="" selected>Please select one</option>
            <option value="male">male</option>
            <option value="female">female</option>
        </select>

        {{-- @error('gender')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror --}}
    </div>
    <div class="col">
        <small class="">Civil Status</small>
        <select form="addTenantForm1"  id="civil_status" name="civil_status" class="form-control">
            <option value="">Please select one</option>
            <option value="single">single</option>
            <option value="married">married</option>
        </select>
    </div>
    <div class="col">
        <small class="">ID/ID Number</small>
        <input form="addTenantForm1" type="text" class="form-control" name="id_number" id="id_number" >
    </div>
</div>
<br>
<div class="row">
    <div class="col">
        <small class="">Mobile <span class="text-danger">*</span></small>
      <input form="addTenantForm1" type="text" class="form-control " name="contact_no" id="contact_no" >

      {{-- @error('contact_no')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
      @enderror --}}
    </div>
    <div class="col">
        <small class="">Email <span class="text-danger">*</span></small>
      <input form="addTenantForm1" type="email" class="form-control" name="email_address" id="email_address" value="">

      {{-- @error('email_address')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
      @enderror --}}
    </div>
</div>
<hr>
<div class="row">
    <div class="col">
      <small>Move-in date <span class="text-danger">*</span></small>
      <input form="addTenantForm1" type="date" class="form-control" name="movein_date" id="movein_date" value="" required>

      {{-- @error('movein_date')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
      @enderror --}}
    </div>
    <div class="col">
      <small>Move-out date <span class="text-danger">*</span></small>
      <input onkeyup="duration()" form="addTenantForm1" type="date" class="form-control" name="moveout_date" value="" id="moveout_date" required>
      
      {{-- @error('moveout_date')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
      @enderror --}}
    </div>
    <div class="col">
        <small>Monthly rent <span class="text-danger">*</span></small>
        <input form="addTenantForm1" type="number" class="form-control" name="tenant_monthly_rent" min="1" id="tenant_monthly_rent" value="{{ session(Auth::user()->id.'tenant_monthly_rent') }}" required>

        {{-- @error('tenant_monthly_rent')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror --}}
    </div>
  </div>
  <hr>
          
  <div class="row">
    <div class="col">
   
      <p class="">
        <span id='delete_row' class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-minus fa-sm text-white-50"></i> Remove Bill</span>
      <span id="add_row" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Bill</span>     
      </p>
        <div class="table-responsive text-nowrap">
        <table class = "table table-bordered" id="tab_logic">
            <tr>
                <th>Bill No</th>
                <th>Description</th>
                <th>Amount</th>
               
            </tr>
                <input form="addTenantForm1" type="hidden" id="no_of_items" name="no_of_items" >
            <tr id='addr1'></tr>
        </table>
      </div>
    </div>
  </div>

{{-- <div class="row">
    <div class="col">
        <small class="">House No/Barangay</small>
        <input form="addTenantForm1" type="text" class="form-control" name="barangay" id="barangay" value="{{ session(Auth::user()->id.'barangay') }}">
    </div>
    <div class="col">
        <small class="">City</small>
        <input form="addTenantForm1" type="text" class="form-control" name="city" id="city" value="{{ session(Auth::user()->id.'city') }}">
    </div>
</div>
<br> --}}
{{-- <div class="row">
    <div class="col">
        <small class="">Province</small>
      <input form="addTenantForm1" type="text" class="form-control" name="province" id="province" value="{{ session(Auth::user()->id.'province') }}">
    </div>
    <div class="col">
        <small class="">Country</small>
        <input form="addTenantForm1" type="text" class="form-control" name="country" id="country" value="{{ session(Auth::user()->id.'country') }}">
    </div>
    <div class="col">
        <small class="">Zip Code</small>
        <input form="addTenantForm1" type="text" class="form-control" name="zip_code" id="zip_code" value="{{ session(Auth::user()->id.'zip_code') }}">
    </div>
</div>
<br> --}}
{{-- <small><b>PERSON TO CONTACT IN CASE OF EMERGENCY</b></small>
<div class="row">   
    <div class="col">
        <small class="">Name</small>
        <input form="addTenantForm1" type="text" class="form-control" name="guardian" id="guardian" value="{{ session(Auth::user()->id.'guardian') }}">
    </div>
    <div class="col">
        <small class="">Relationship to the tenant</small>
        <input form="addTenantForm1" type="text" class="form-control" name="guardian_relationship" id="guardian_relationship" value="{{ session(Auth::user()->id.'guardian_relationship') }}">
    </div>
    <div class="col">
        <small class="">Mobile</small>
        <input form="addTenantForm1" type="text" class="form-control" name="guardian_contact_no" id="guardian_contact_no" value="{{ session(Auth::user()->id.'guardian_contact_no') }}">
    </div>
</div> --}}

<br>
<p class="text-right">   
    <a href="/units/{{ session(Auth::user()->id.'unit_id') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i class="fas fa-times fa-sm text-white-50"></i> Cancel</a>
    <button type="submit" form="addTenantForm1" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" onclick="return confirm('Are you sure you want perform this action?'); this.disabled = true;"><i class="fas fa-arrow-right fa-sm text-white-50" ></i> Submit</button>
</p>


@endsection

@section('scripts')


<script type="text/javascript">

  //adding moveout charges upon moveout
    $(document).ready(function(){
        var i=1;
        var current_bill_no  = {{ $current_bill_no }};
    $("#add_row").click(function(){
        $('#addr'+i).html("<th>"+ (current_bill_no ) +"</th><td><select class='form-control' name='billing_desc"+i+"' form='addTenantForm1' id='billing_desc"+i+"'><option value='Security Deposit (Rent)'>Security Deposit (Rent)</option><option value='Security Deposit (Utilities)'>Security Deposit (Utilities)</option><option value='Advance Rent'>Advance Rent</option><option value='Rent'>Rent</option><option value='Electric'>Electric</option><option value='Water'>Water</option></select> <td><input class='form-control' form='addTenantForm1' name='billing_amt"+i+"' id='billing_amt"+i+"' type='number' min='1' step='0.01' value='{{ session(Auth::user()->id.'tenant_monthly_rent') }}'' required></td>");


     $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
     i++;
     current_bill_no++;
     document.getElementById('no_of_items').value = i;

    });

    $("#delete_row").click(function(){
        if(i>1){
        $("#addr"+(i-1)).html('');
        i--;
        current_bill_no--;
        document.getElementById('no_of_items').value = i;
        }
    });

});
</script>
@endsection





