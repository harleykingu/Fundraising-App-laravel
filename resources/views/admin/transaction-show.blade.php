<!DOCTYPE html>
<html lang="en">
  <head>
    @include('partials._head')
    @yield('stylesheets')
    <script>
      function printContent(el){
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML= printcontent;
        window.print();
        document.body.innerHTML = restorepage;
      }
    </script>
  </head>

  <body>
    <div class="container">
      <button type="button" onclick="printContent('print')" class="btn green">PRINT</button>

    <div id="print">

    <div class="row">
      <div class="col s6">
        <img src="{{ asset('img/logo.png') }}" alt="" width="200" height="200">
      </div>
      <div class="col s6 right-align">
        <h6 class="font1">Bidlisiw Foundation Inc. -General Fund</h6>
        <h6 class="font1">AS fortuna, Mandaue City</h6>
        <h6 class="font1">39300-03567</h6>
      </div>
    </div>
    <div class="row">
      <div class="col s6">
        <h5 class="font1">Transaction # {{ $trans-> id }}</h6>
      </div>
      <div class="col s3 right-align">
        <h6 class="left-align">Campaign # <span class="font1">{{ $camp-> id }}</span></h6>
        <h6 class="left-align">Created By: <span class="font1">{{ $camp-> user -> name }}</span></h6>
        <h6 class="left-align">Title: <span class="font1">{{ $camp-> title}}</span></h6>
      </div>
      <div class="col s3">
        <h6 class="left-align">Released Date: <span class="font1">{{ date('F d, Y', strtotime($trans->created_at)) }}</span></h6>
      </div>
    </div>
    <div class="card">
    <table class="striped bordered">
     <thead>
       <tr>
           <th>Donation #</th>
           <th>User</th>
           <th>Amount</th>
       </tr>
     </thead>

     @foreach ($dons as $allInfo)
       <tr>
         <th>{{ $allInfo-> id }}</th>
         <td>{{ $allInfo->  user -> name }}</td>
         <td>{{ $allInfo-> amount }}</td>
       </tr>
     @endforeach

        <tr>
          <td>Total:</td>
          <td></td>
          <td>&#8369; <?php $example = $camp->total; $subtotal =  number_format($example); echo $subtotal; ?></td>
        </tr>
   </table>
   </div>
    <div class="row" style="margin-top: 40px;">
      <div class="col s6 center-align">
        <h5>______________________</h5>
        <h6>Approved By:</h6>
      </div>
      <div class="col s6 center-align">
        <h5>______________________</h5>
        <h6>Received By:</h6>
      </div>
    </div>
  </div>
    </div>
  </body>
</html>
