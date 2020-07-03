<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
      body {
        font: normal 8px Verdana, Arial, sans-serif;
          }
    </style>
    
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <h4 class="text-black-50">Acknowledgment Receipt</h4>
          <br>
          <table class="table table-borderless">
            <tr>
            <td colspan="3" class="text-right"> AR no:</b> {{ $payment_ar }}</td>
          </tr>
          <tr>
            <td colspan="3" class="text-left"> <b>Date:</b> {{ Carbon\Carbon::now()->format('M d Y') }}</td>
          </tr>   
          <tr>
            <td colspan="3" class="text-left"><b>To:</b> {{ $tenant }}</td>
          </tr>
          <tr>
            <td colspan="3" class="text-left"><b>Unit/Room:</b> {{ $unit }} </td>
          </tr>     
            <tr>
              <th colspan="3" class="text-right">{{ Auth::user()->property }}</th>
            </tr>
          </table>
            <table class="table text-right" width="100%" cellspacing="0">
              <tr>
                <th>#</th>
                <th>Description</th>
                <th>Date</th>
                <th>Amount</th>
              </tr>
              <?php $ctr = 1; ?>
              @foreach ($payment_breakdown as $item)
              <tr>
                <th>{{ $ctr++ }}</th>
                <td>{{ $item->payment_note }}</td>
                <td>{{  Carbon\Carbon::parse($item->payment_created)->format('M d Y') }}</td>
                <td >{{ number_format($item->amt_paid,2) }}</td>
              </tr>
              @endforeach
          </table>
          <table class="table" width="100%" cellspacing="0">
            <tr>
             <th>TOTAL</th>
             <th class="text-right">{{ number_format($payment_amt,2) }}</th>
            </tr>
            <tr>
              <th>RUNNING BALANCE</th>
              <th class="text-right">{{ number_format($running_balance,2) }}</th>
             </tr>
          </table>
          <table class="table table-borderless" cellspacing>
            <tr>
             <td>Issued by: {{ Auth::user()->name }}</td>
             <th></th>
            </tr>
             <tr>
              <th>{{ Auth::user()->user_type.' of '. Auth::user()->property }}</th>
              <th></th>
             </tr>
          </table>
        </div>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>