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
              <a class="nav-link" href="/property/{{$property->property_id }}/home">
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
              <a class="nav-link active" href="/property/{{$property->property_id }}/bills">
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
    <h6 class="h2 text-dark d-inline-block mb-0">Rent Bills</h6>
    
  </div>
  <div class="col-lg-6 col-5 text-right">
  <form id="periodCoveredForm" action="/property/{{ $property->property_id }}/bills/rent/{{ $updated_billing_start? Carbon\Carbon::parse($updated_billing_start)->format('Y-m-d'): null }}-{{ Carbon\Carbon::parse($updated_billing_end)->format('Y-m-d') }}/" method="POST">
    @csrf
    Period Covered 
    <input form="periodCoveredForm" type="date" name="billing_start" value="{{ Carbon\Carbon::parse($updated_billing_start)->startOfMonth()->format('Y-m-d') }}" required>
    <input form="periodCoveredForm" type="date" name="billing_end" value="{{ Carbon\Carbon::parse($updated_billing_end)->endOfMonth()->format('Y-m-d') }}" required>

    <button form="periodCoveredForm" type="submit" id="addBillsButton" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" ><i class="fas fa-check"></i> Save Changes</button>
  </form>
  </div>
</div>

<div class="table-responsive text-nowrap">

  <form id="add_billings" action="/billings" method="POST">
      @csrf
  </form>
    
    <table class="table table-striped table-bordered">
    <tr>
        <th>#</th>
        <th colspan="2">Period Covered</th>     
        <th>Tenant</th>
        <th>Room</th>   
        <th>Description</th>
      
        <th>Amount</th>
        <th></th>
   
    </tr>
   <?php
     $ctr = 1;
     $desc_ctr = 1;
     $amt_ctr = 1;
     $id_ctr = 1;
     $billing_start = 1;
     $billing_end = 1;
   ?>   
   @foreach($active_tenants as $item)
  
   {{-- <input type="hidden" form="add_billings" name="ctr" value="{{ $ctr++ }}" required>      --}}
  
    <input type="hidden" form="add_billings" name="billing_tenant_id{{ $id_ctr++ }}" value="{{ $item->tenant_id }}" required>
  
    <input type="hidden" form="add_billings" name="billing_date" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required>

    <input type="hidden" form="add_billings" name="property_id" value="{{ $property->property_id }}" required>
  
    <tr>
      <td>
        {{ $ctr++ }}
      </td>
      <td colspan="2">
        @if($item->tenants_note === 'new' )
        <input form="add_billings" type="date" name="billing_start{{ $billing_start++  }}" value="{{ Carbon\Carbon::parse($item->movein_date)->format('Y-m-d') }}" required>
        <input form="add_billings" type="date" name="billing_end{{ $billing_end++  }}" value="{{ Carbon\Carbon::now()->endOfMonth()->format('Y-m-d') }}" required>
        @else
        <input form="add_billings" type="date" name="billing_start{{ $billing_start++  }}" value="{{ Carbon\Carbon::parse($updated_billing_start)->startOfMonth()->format('Y-m-d') }}" required>
        <input form="add_billings" type="date" name="billing_end{{ $billing_end++  }}" value="{{ Carbon\Carbon::parse($updated_billing_end)->endOfMonth()->format('Y-m-d') }}" required>
        @endif
    </td>
      <td>
        <a href="/units/{{ $item->unit_id }}/tenants/{{ $item->tenant_id }}/billings">{{ $item->first_name.' '.$item->last_name }}</a> 
          @if($item->tenants_note === 'new' )
          <span class="badge badge-success">{{ $item->tenants_note }}</span>
          @endif
      </td>
      <td>
          {{ $item->building.' '.$item->unit_no }}
      </td>
      <td>
          <input class="" type="text" form="add_billings" name="billing_desc{{ $desc_ctr++ }}" value="Rent" required readonly>
      </td>
        {{-- <td>
          @if($item->tenants_note === 'new' )
            <input form="add_billings" type="text" name="details{{ $details_ctr++  }}" value="{{ Carbon\Carbon::parse($item->movein_date)->startOfMonth()->format('M d') }}-{{ Carbon\Carbon::now()->endOfMonth()->format('d Y') }} " >
          @else
            <input form="add_billings" type="text"  name="details{{ $details_ctr++  }}" value="{{ Carbon\Carbon::now()->startOfMonth()->format('M d') }}-{{ Carbon\Carbon::now()->endOfMonth()->format('d Y') }}" >
          @endif
        </td> --}}
   
      <td>
        <?php 
              $prorated_rent =  Carbon\Carbon::parse($item->movein_date)->DiffInDays(Carbon\Carbon::now()->endOfMonth());
              $prorated_monthly_rent =  ($item->monthly_rent/30) * $prorated_rent;
        ?>
          @if($item->tenants_note === 'new' )
            <input form="add_billings" type="number" name="billing_amt{{ $amt_ctr++ }}" step="0.01"  value="{{ $prorated_monthly_rent }}" oninput="this.value = Math.abs(this.value)" required>
          @else
            <input form="add_billings" type="number" name="billing_amt{{ $amt_ctr++ }}" step="0.01"  value="{{ $item->tenant_monthly_rent }}" oninput="this.value = Math.abs(this.value)" required>
          @endif
      </td>
      <td>
        @if($item->tenants_note === 'new' )
          <span class="badge badge-primary">prorated</span>
        @endif
      </td>
   </tr>
   @endforeach
  </table>
  
  </div>
  <br>
  <p class="text-right">
  <a href="/property/{{ $property->property_id }}/bills" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i class="fas fa-times fa-sm text-white-50"></i> Cancel</a>
  <button type="submit" form="add_billings" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  onclick="return confirm('Are you sure you want perform this action?'); this.disabled = true;"><i class="fas fa-check fa-sm text-white-50"></i> Submit</button>
  </p>

@endsection

@section('main-content')

@endsection

@section('scripts')
  
@endsection



