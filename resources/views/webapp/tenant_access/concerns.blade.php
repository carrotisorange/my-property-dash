@extends('webapp.tenant_access.template')

@section('title', 'Concerns')


@section('sidebar')

<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
  <div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header  align-items-center">
      <a class="navbar-brand" href="javascript:void(0)">
        Tenant Portal
      </a>
    </div>
    <div class="navbar-inner">
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Nav items -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link " href="/user/{{ Auth::user()->id }}/tenant/{{ $tenant->tenant_id }}/dashboard">
              <i class="fas fa-tachometer-alt text-orange"></i>
              <span class="nav-link-text">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/user/{{ Auth::user()->id }}/tenant/{{ $tenant->tenant_id }}/rooms">
              <i class="fas fa-home text-indigo"></i>
              <span class="nav-link-text">Rooms</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/user/{{ Auth::user()->id }}/tenant/{{ $tenant->tenant_id }}/bills">
              <i class="fas fa-file-invoice-dollar text-pink"></i>
              <span class="nav-link-text">Bills</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/user/{{ Auth::user()->id }}/tenant/{{ $tenant->tenant_id }}/payments">
              <i class="fas fa-coins text-yellow"></i>
              <span class="nav-link-text">Payments</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/user/{{ Auth::user()->id }}/tenant/{{ $tenant->tenant_id }}/concerns">
              <i class="fas fa-tools text-cyan"></i>
              <span class="nav-link-text">Concerns</span>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" href="examples/login.html">
              <i class="ni ni-key-25 text-info"></i>
              <span class="nav-link-text">Login</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="examples/register.html">
              <i class="ni ni-circle-08 text-pink"></i>
              <span class="nav-link-text">Register</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="examples/upgrade.html">
              <i class="ni ni-send text-dark"></i>
              <span class="nav-link-text">Upgrade</span>
            </a>
          </li> --}}
        </ul>
        <!-- Divider -->
        {{-- <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading p-0 text-muted">
          <span class="docs-normal">Documentation</span>
        </h6>
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html" target="_blank">
              <i class="ni ni-spaceship"></i>
              <span class="nav-link-text">Getting started</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html" target="_blank">
              <i class="ni ni-palette"></i>
              <span class="nav-link-text">Foundation</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html" target="_blank">
              <i class="ni ni-ui-04"></i>
              <span class="nav-link-text">Components</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/plugins/charts.html" target="_blank">
              <i class="ni ni-chart-pie-35"></i>
              <span class="nav-link-text">Plugins</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active active-pro" href="examples/upgrade.html">
              <i class="ni ni-send text-dark"></i>
              <span class="nav-link-text">Upgrade to PRO</span>
            </a>
          </li> --}}
        </ul>
      </div>
    </div>
  </div>
</nav>
@endsection

@section('upper-content')
<div class="col-lg-6 col-7">
    <h6 class="h2 text-dark d-inline-block mb-0">Concerns</h6>
    
  </div>
@endsection

@section('main-content')

<a  href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#addConcern" data-whatever="@mdo"><i class="fas fa-plus fa-sm text-white-50"></i> Add</a>  
<br>
<br>
<div class="table-responsive text-nowrap">
    <table class="table">
      <?php $ctr = 1; ?>
      <thead>
        <tr>
          <th>#</th>
          
            <th>Date Reported</th>
           
            <th>Room</th>
            <th>Type</th>
            <th>Description</th>
            <th>Urgency</th>
            <th>Status</th>
            <th>Assigned to</th>
            <th>Rating</th>
            <th>Feedback</th>
       </tr>
      </thead>
      <tbody>
        @foreach ($concerns as $item)
        <tr>
          <th>{{ $ctr++ }}</th>
       
          <td>{{ Carbon\Carbon::parse($item->date_reported)->format('M d Y') }}</td>
            
            <td>{{ $item->building.' '.$item->unit_no }}</td>
            <td>
              
                {{ $item->concern_type }}
                
            </td>
            <td >{{ $item->concern_item }}</td>
            <td>
                @if($item->concern_urgency === 'urgent')
                <span class="badge badge-danger">{{ $item->concern_urgency }}</span>
                @elseif($item->concern_urgency === 'major')
                <span class="badge badge-warning">{{ $item->concern_urgency }}</span>
                @else
                <span class="badge badge-primary">{{ $item->concern_urgency }}</span>
                @endif
            </td>
            <td>
                @if($item->concern_status === 'pending')
                <span class="badge badge-warning">{{ $item->concern_status }}</span>
                @elseif($item->concern_status === 'active')
                <span class="badge badge-primary">{{ $item->concern_status }}</span>
                @else
                <span class="badge badge-success">{{ $item->concern_status }}</span>
                @endif
            </td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->rating? $item->rating.'/5' : 'NA' }}</td>
            <td>{{ $item->feedback? $item->feedback : 'NULL' }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
   
  </div>
       
                {{-- Modal for renewing tenant --}}
                <div class="modal fade" id="addConcern" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Concern</h5>
                
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form id="concernForm" action="/user/{{ Auth::user()->id }}/tenant/{{ $tenant->tenant_id }}/concerns" method="POST">
                                {{ csrf_field() }}
                            </form>
  
                            <input type="hidden" form="concernForm" id="tenant_id" name="tenant_id" value="{{ $tenant->tenant_id }}"required>
                            <input type="hidden" form="concernForm" id="unit_tenant_id" name="unit_tenant_id" value="{{ $tenant->unit_tenant_id }}"required>
  
                            <div class="row">
                              <div class="col">
                                  <label>Date Reported</label>
                                  <input type="date" form="concernForm" class="form-control" name="date_reported" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required >
                              </div>
                          </div>
                          <br>
                            <div class="row">
                                <div class="col">
                                   <label>Type</label>
                                    <select class="form-control" form="concernForm" name="concern_type" id="" required>
                                      <option value="" selected>Please select one</option>
                                      <option value="billing">billing</option>
                                      <option value="employee">employee</option>
                                      <option value="internet">internet</option>
                                      <option value="neighbour">neighbour</option>
                                      <option value="noise">noise</option>
                                      <option value="odours">odours</option>
                                      <option value="parking">parking</option>
                                      <option value="pets">pets</option>
                                      <option value="repair">repair</option>
                                      <option value="others">others</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="col">
                                 <label>Urgency</label>
                                  <select class="form-control" form="concernForm" name="concern_urgency" id="" required>
                                    <option value="" selected>Please select one</option>
                                    <option value="minor and not urgent">minor and not urgent</option>
                                    <option value="minor but urgent">minor but urgent</option>
                                    <option value="major but not urgent">major but not urgent</option>
                                    <option value="major and urgent">major and urgent</option>
                                  </select>
                              </div>
                          </div>
                          <br>
                         
                        <div class="row">
                          <div class="col">
                              <label>Short Description</label>
                            
                              <input type="text" form="concernForm" class="form-control" name="concern_item" required >
                          </div>
                        </div>  
                        <br>
                        
                         <div class="row">
                              <div class="col">
                                  <label>Details</label>
                                  
                                  <textarea form="concernForm" rows="7" class="form-control" name="concern_desc" required></textarea>
                              </div>
                          </div>
                          <br>
                         {{-- <div class="row">
                            <div class="col">
                                <label for="movein_date">Assign concern to</label>
                                <select class="form-control" form="concernForm" name="concern_user_id" required>
                                  <option value="" selected>Please select one</option>
                                  @foreach($users as $item)
                                  <option value="{{ $item->id }}"> {{ $item->user_type }}</option>
                                  @endforeach
                                 
                                </select>
                            </div>
                        </div> --}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm" data-dismiss="modal"><i class="fas fa-times fa-sm text-white-50"></i> Cancel</button> 
                            <button type="submit" form="concernForm" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" onclick="return confirm('Are you sure you want perform this action?'); this.disabled = true;"><i class="fas fa-check fa-sm text-white-50"></i> Submit</button>
                        </div>
                    </div>
                    </div>
                </div>
     
@endsection

@section('scripts')
  
@endsection



