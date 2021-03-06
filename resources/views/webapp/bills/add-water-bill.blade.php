@extends('templates.webapp-new.template')

@section('title', 'Bills')

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
              <a class="nav-link" href="/property/{{$property->property_id }}}/personnels">
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
  <div class="col-lg-6 col-7">
    <h6 class="h2 text-dark d-inline-block mb-0">Water Bills</h6>
    
  </div>
  <div class="col-lg-6 col-5 text-right">
    <form id="periodCoveredForm" action="/property/{{ $property->property_id }}/bills/water/{{ Carbon\Carbon::parse($updated_billing_start)->format('Y-m-d') }}-{{ Carbon\Carbon::parse($updated_billing_end)->format('Y-m-d') }}/" method="POST">
      @csrf
      Period Covered 
      <input form="periodCoveredForm" type="date" name="billing_start" value="{{ Carbon\Carbon::parse($updated_billing_start)->startOfMonth()->format('Y-m-d') }}" required>
      <input form="periodCoveredForm" type="date" name="billing_end" value="{{ Carbon\Carbon::parse($updated_billing_end)->endOfMonth()->format('Y-m-d') }}" required>
      Current Water Rate/CUM <input form="periodCoveredForm" type="number" name="water_rate_cum" id="water_rate_cum" step="0.001" value="{{ $water_rate_cum? $water_rate_cum : Auth::user()->water_rate_cum }}" required oninput="autoCompute()">
      <button form="periodCoveredForm" type="submit" id="addBillsButton" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" ><i class="fas fa-check"></i> Save Changes</button>
    </form>
    
  </div>

</div>
<div class="row">
  <div class="table-responsive text-nowrap">
    <form id="add_billings" action="/billings" method="POST">
     @csrf
      </form>
      <table class="table table-striped">
      <tr>
          <th>#</th>
          <th colspan="2">Period Covered</th>
          <th>Tenant</th>
          <th>Room</th>
           <th>Description</th> 
         
          <th>Previous Reading</th>
          <th>Current Reading</th>
          <th>Current Consumption</th>
          <th>Amount</th>
         
          
      </tr>
     <?php
      $ctr = 1;
       $billing_no_ctr = 1;
       $desc_ctr = 1;
       $amt_ctr = 1;
       $id_ctr = 1;
       $details_ctr = 1;
       $billing_start = 1;
       $billing_end = 1;
       $previous_reading = 1;
       $current_reading = 1;
       $consumption = 1;
       $id_previous_reading = 1;
       $id_current_reading = 1;
       $id_consumption = 1;
       $ctr_previous_reading = 1;
       $ctr_current_reading = 1;
       $ctr_consumption = 1;
       $id_amt = 1;
     ?>
     @foreach($active_tenants as $item)
     
        
      <input type="hidden" form="add_billings" name="billing_tenant_id{{ $id_ctr++ }}" value="{{ $item->tenant_id }}">
    
      <input type="hidden" form="add_billings" name="billing_date" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required>

      <input type="hidden" form="add_billings" name="property_id" value="{{ $property->property_id }}" required>
    
      <tr>
        <td>{{ $ctr++ }}</td>
        <td colspan="2">
          <input form="add_billings" type="date" name="billing_start{{ $billing_start++  }}" value="{{ Carbon\Carbon::parse($updated_billing_start)->startOfMonth()->format('Y-m-d') }}" required>
          <input form="add_billings" type="date" name="billing_end{{ $billing_end++  }}" value="{{ Carbon\Carbon::parse($updated_billing_end)->endOfMonth()->format('Y-m-d') }}" required>
      </td>
          <td>
          <a href="/units/{{ $item->unit_id }}/tenants/{{ $item->tenant_id }}/billings">{{ $item->first_name.' '.$item->last_name }}</a> 
            @if($item->tenants_note === 'new' )
            <span class="badge badge-success">{{ $item->tenants_note }}</span>
            @endif
          
          <td>{{ $item->building.' '.$item->unit_no }}</td>
          <td>
            <input class="" type="text" form="add_billings" name="billing_desc{{ $desc_ctr++ }}" value="Water" readonly>
          </td>
         
        <td>
          <input class="" type="number" form="add_billings" step="0.001" name="previous_reading{{ $previous_reading++ }}" id="id_previous_reading{{ $id_previous_reading++ }}" value={{ $item->previous_water_reading }}>
        </td>
        <td>
          <input class="" type="number" form="add_billings"step="0.001"  name="current_reading{{ $current_reading++ }}" id="id_current_reading{{ $id_current_reading++ }}" oninput="autoCompute({{ $ctr_current_reading++ }})" value={{ $item->previous_water_reading }}>
        </td>
        <td>
          <input class="" type="number" form="add_billings" step="0.001" name="consumption{{ $consumption++ }}" id="id_consumption{{ $id_consumption++ }}"  value="0" required readonly>
        </td>
          <td>
              <input form="add_billings" type="number" step="0.001" name="billing_amt{{ $amt_ctr++ }}" id="id_amt{{ $id_amt++ }}" value="0" required readonly>
          </td>
         
     </tr>
     @endforeach
    </table>
    </div>
</div>

<br>
<p class="text-right">
  <a href="/bills" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i class="fas fa-times"></i> Cancel</a>
  <button type="submit" form="add_billings" id="addBillsButton" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  onclick="return confirm('Are you sure you want to perform this action?');"><i class="fas fa-check"></i> Add Bills</button>
</p>


@endsection

@section('main-content')

@endsection

@section('scripts')
<script>
  function autoCompute(val) {
    var previous_reading = 'id_previous_reading'+val;
    var current_reading = 'id_current_reading'+val;
    var consumption = 'id_consumption'+val;
    var amt = 'id_amt'+val;

    var water_rate_cum = parseFloat(document.getElementById('water_rate_cum').value);

    var actual_consumption = document.getElementById(current_reading).value - document.getElementById(previous_reading).value;
    
    document.getElementById(consumption).value = parseFloat(actual_consumption,2);
    document.getElementById(amt).value = parseFloat(actual_consumption) * water_rate_cum;
   
  }
</script>
@endsection



