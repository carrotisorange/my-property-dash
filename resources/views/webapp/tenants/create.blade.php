@extends('templates.webapp-new.template')

@section('title', $unit->building.' '.$unit->unit_no )

@section('sidebar')
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          {{-- <img src="{{ asset('/argon/assets/img/brand/logo.png') }}" class="navbar-brand-img" alt="...">--}}{{ $property->name }} 
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="/property/{{$property->property_id }}/dashboard">
                <i class="fas fa-tachometer-alt text-orange"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            @if(Auth::user()->user_type === 'admin' || Auth::user()->user_type === 'manager' )
            <li class="nav-item">
              <a class="nav-link active" href="/property/{{$property->property_id }}/home">
                <i class="fas fa-home text-indigo"></i>
                <span class="nav-link-text">Home</span>
              </a>
            </li>
            @endif
            <li class="nav-item">
              <a class="nav-link" href="/property/{{$property->property_id }}/calendar">
                <i class="fas fa-calendar-alt text-red"></i>
                <span class="nav-link-text">Calendar</span>
              </a>
            </li>
            @if(Auth::user()->user_type === 'admin' || Auth::user()->user_type === 'manager' || Auth::user()->user_type === 'billing' || Auth::user()->user_type === 'treasury')
            <li class="nav-item">
              <a class="nav-link" href="/property/{{$property->property_id }}/tenants">
                <i class="fas fa-user text-green"></i>
                <span class="nav-link-text">Tenants</span>
              </a>
            </li>
          
            <li class="nav-item">
              <a class="nav-link" href="/property/{{$property->property_id }}/owners">
                <i class="fas fa-user-tie text-teal"></i>
                <span class="nav-link-text">Owners</span>
              </a>
            </li>
            @endif

            <li class="nav-item">
              <a class="nav-link" href="/property/{{$property->property_id }}/concerns">
                <i class="fas fa-tools text-cyan"></i>
                <span class="nav-link-text">Concerns</span>
              </a>
            </li>
            @if(Auth::user()->user_type === 'admin' || Auth::user()->user_type === 'manager' )
            <li class="nav-item">
              <a class="nav-link" href="/property/{{$property->property_id }}/joborders">
                <i class="fas fa-list text-dark"></i>
                <span class="nav-link-text">Job Orders</span>
              </a>
            </li>
           
            <li class="nav-item">
              <a class="nav-link" href="/property/{{$property->property_id }}/personnels">
                <i class="fas fa-user-secret text-gray"></i>
                <span class="nav-link-text">Personnels</span>
              </a>
            </li>
            @endif

            @if(Auth::user()->user_type === 'billing' || Auth::user()->user_type === 'manager')
            <li class="nav-item">
              <a class="nav-link" href="/property/{{$property->property_id }}/bills">
                <i class="fas fa-file-invoice-dollar text-pink"></i>
                <span class="nav-link-text">Bills</span>
              </a>
            </li>
            @endif
            @if(Auth::user()->user_type === 'treasury' || Auth::user()->user_type === 'manager')
            <li class="nav-item">
              <a class="nav-link" href="/property/{{$property->property_id }}/collections">
                <i class="fas fa-coins text-yellow"></i>
                <span class="nav-link-text">Collections</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/property/{{$property->property_id }}/financials">
                <i class="fas fa-chart-line text-purple"></i>
                <span class="nav-link-text">Financials</span>
              </a>
            </li>
            @endif
            @if(Auth::user()->user_type === 'manager' || Auth::user()->user_type === 'ap' || Auth::user()->user_type === 'admin')
            <li class="nav-item">
              <a class="nav-link" href="/property/{{$property->property_id }}/payables">
                <i class="fas fa-file-export text-indigo"></i>
                <span class="nav-link-text">Payables</span>
              </a>
            </li>
            @endif
            <li class="nav-item">
              <a class="nav-link" href="/property/{{$property->property_id }}/users">
                <i class="fas fa-user-circle text-green"></i>
                <span class="nav-link-text">Users</span>
              </a>
            </li>
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Documentation</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="/property/{{ $property->property_id }}/getting-started" target="_blank">
                <i class="ni ni-spaceship"></i>
                <span class="nav-link-text">Getting started</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/property/{{ $property->property_id }}/system-updates" target="_blank">
                <i class="fas fa-bug text-red"></i>
                <span class="nav-link-text">System Updates</span>
              </a>
            </li>
          <li class="nav-item">
              <a class="nav-link" href="/property/{{ $property->property_id }}/announcements" target="_blank">
                <i class="fas fa-microphone text-purple"></i>
                <span class="nav-link-text">Annoncements</span>
              </a>
            </li>
             {{--  <li class="nav-item">
              <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/plugins/charts.html" target="_blank">
                <i class="ni ni-chart-pie-35"></i>
                <span class="nav-link-text">Plugins</span>
              </a>
            </li> --}}
            
          </ul>
        </div>
      </div>
    </div>
  </nav>
@endsection

@section('upper-content')
<div class="row align-items-center py-4">
  <div class="col-lg-3">
    <a class="btn btn-primary" href="/property/{{ $property->property_id }}/home/{{ $unit->unit_id }}"><i class="fas fa-home"></i> Home</a>
    {{-- <h6 class="h2 text-dark d-inline-block mb-0">iBack</h6> --}}
    
  </div>
  <div class="col-lg-3">
    <small class="">Room <span class="text-danger">*</span></small>
    <select class="form-control" form="addTenantForm1" name="unit_id" id="unit_id" required readonly>
      <option value="{{ $unit->unit_id }}" selected>{{ $unit->building.' '.$unit->unit_no }}</option>
      {{-- @foreach ($units as $item)
        <option value="{{ $item->id }}">{{ $item->building.' '.$item->unit_no }}</option>
      @endforeach --}}
     </select>

 
  </div>
  <div class="col-lg-3">
    <small class="">Refferer <span class="text-danger">*</span></small>
    <select class="form-control" form="addTenantForm1" name="referrer_id" id="referrer_id" required>
     <option value="">Please select one</option>
     @foreach ($users as $item)
       <option value="{{ $item->id }}">{{ $item->name }}</option>
     @endforeach
       <option value="36">None</option>
    </select>
 
  
   </div>

   <div class="col-lg-3">
    <small class="">Point of contact <span class="text-danger">*</span></small>
    <select class="form-control" form="addTenantForm1" name="form_of_interaction" id="form_of_interaction" required>
     <option value="">Please select one</option>
       <option value="Facebook">Facebook</option>
       <option value="Flyers">Flyers</option>
       <option value="In house">In house</option>
       <option value="Instagram">Instagram</option>
       <option value="Website">Website</option>
       <option value="Walk in">Walk in</option>
       <option value="Word of mouth">Word of mouth</option>
    </select>
   </div>

  

</div>
<hr>
<form id="addTenantForm1" action="/property/{{ $property->property_id }}/home/{{ $unit->unit_id }}/tenant/" method="POST">
  {{ csrf_field() }}
  </form>
  
  <p>Tenant Information</p>
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
          <input form="addTenantForm1" type="date" class="form-control" name="birthdate" id="birthdate" value="" >
  
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

  <input type="hidden" form="addTenantForm1" value="{{ $property->property_id }}" name="property_id">
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
 
  <p>Contract Details</p>
  <div class="row">
      <div class="col">
        <small>Move-in date <span class="text-danger">*</span></small>
        <input form="addTenantForm1" type="date" class="form-control" name="movein_at" id="movein_date" onchange='autoFill()' value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required>
  
  
      </div>
      <div class="col">
        <small>Move-out date <span class="text-danger">*</span></small>
        <input form="addTenantForm1" type="date" class="form-control" name="moveout_at" id="moveout_date" onchange='autoFill()' required>
        
 
      </div>
    

      <div class="col">
        <small>Length of stay <span class="text-danger">*</span></small>
        <input form="addTenantForm1" type="text" class="form-control" name="number_of_months" id="number_of_months" value="0 month/s" required readonly>
        <small class="text-danger" id="invalid_date"></small>
  </div>
   
    </div>
    <br>
<div class="row">
  <div class="col">
    <small>Term <span class="text-danger">*</span></small>
    <input form="addTenantForm1" type="text" class="form-control" name="term" id="term" value="NA" required readonly>

  </div>
<div class="col">
  <small>Discount <span class="text-danger">*</span></small>
  <input form="addTenantForm1" type="number" class="form-control" name="discount" min="1" id="discount" step="0.001" value="0" required readonly >

 
</div>
  <div class="col">
    <small>Rent (per month) <span class="text-danger">*</span></small>
    <input form="addTenantForm1" type="number" step="0.001" class="form-control" name="rent" id="rent" value="{{ $unit->monthly_rent }}" required readonly>
    <input form="addTenantForm1" type="hidden" class="form-control" name="original" min="1" id="original" value="{{ $unit->monthly_rent }}" required>
 
</div>

</div>
    <hr>
            
    <div class="row">
      <div class="col">
     
        <p>
          Bill Information
          <p class="text-right"><a href="#/" id='delete_row' class="btn btn-danger"><i class="fas fa-minus fa-sm text-white-50"></i> Remove</a>
            <a href="#/" id="add_row" class="btn btn-primary"><i class="fas fa-plus fa-sm text-white-50"></i> Add</a>     </p>
          </p>
          <div class="table-responsive text-nowrap">
          <table class = "table table-bordered" id="tab_logic">
              <tr>
                  <th>#</th>
                  <th>Description</th>
                  <th>Amount</th>
                 
              </tr>
                  <input form="addTenantForm1" type="hidden" id="no_of_items" name="no_of_items" >
              <tr id='addr1'></tr>
          </table>
        </div>
      </div>
    </div>
  
  <br>
  <p class="text-right">   
      <button type="submit" form="addTenantForm1" class="btn btn-success" onclick="return confirm('Are you sure you want perform this action?'); this.disabled = true;"><i class="fas fa-check fa-sm text-white-50" ></i> Submit</button>
  </p>
  

@endsection

@section('main-content')

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

<script>

  function autoFill(){
    var moveout_date = document.getElementById('moveout_date').value;
    var movein_date = document.getElementById('movein_date').value;
    var rent = document.getElementById('rent').value;
    

    date1 = new Date(movein_date);
    date2 = new Date(moveout_date);

    let diff = date2-date1; 

    let months = 1000 * 60 * 60 * 24 * 28;

    let dateInMonths = Math.floor(diff/months);

    document.getElementById('number_of_months').value = dateInMonths +' month/s';

    if(dateInMonths <=0 ){
      document.getElementById('invalid_date').innerText = 'Invalid movein or moveout date!';
    }else{
      document.getElementById('invalid_date').innerText = ' ';
      if(dateInMonths <5 ){
        document.getElementById('term').value = 'Short Term';
        document.getElementById('discount').value = 0;
        document.getElementById('rent').value = document.getElementById('original').value;
      }else{
        document.getElementById('term').value = 'Long Term';
        document.getElementById('discount').value = (document.getElementById('original').value * .1);
        document.getElementById('rent').value = document.getElementById('original').value - (document.getElementById('original').value * .1) ;
      }
     
     
    }
  }
</script>

<script>
 function changeUnit(val){
  alert(val);
 }

</script>
@endsection



