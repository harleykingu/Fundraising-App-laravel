@extends('admin.admin-template')
@section('body')
<div class="row">
  <div class="col s12">
    <div class="card-panel green lighten-1">
      <div class="row">
        <div class="col s12">
          <ul class="tabs">
            <li class="tab col s3"><a href="#test1">Donations</a></li>
            <li class="tab col s3"><a href="#test2">New Donation</a></li>
          </ul>
          <div id="test1">
            <div class="card-panel">
              <div class="row" style="margin-bottom:0;">
                <div class="col s6">
                  <form class="" action="#" method="post" class="">
                    <div class="input-field">
                        <input id="last_name" type="text" class="validate">
                        <label for="last_name"><span class="fa fa-search"></span> Search By User</label>
                    </div>
                  </form>
                </div>
                <div class="col s2 offset-s4">
                  <form class="" action="#" method="post" class="">
                    <div class="input-field">
                      <select>
                       <option value="" disabled selected>Sort By:</option>
                       <option value="1">Sports</option>
                       <option value="2">Education</option>
                       <option value="3">Medical</option>
                      </select>
                    </div>
                  </form>
                </div>
              </div>
              <div class="divider"></div>
              <div class="row">
              <table class="striped">
               <thead>
                 <tr>
                     <th>#</th>
                     <th>User</th>
                     <th>Email</th>
                     <th>Contact No</th>
                     <th>Campaign Title</th>
                     <th>Amount</th>
                     <th>Date</th>
                 </tr>
               </thead>

               @foreach ($donations as $allInfo)
                 <tr>
                   <th>{{ $allInfo-> id }}</th>
                   <td>{{ $allInfo-> user -> name }}</td>
                   <td>{{ $allInfo-> user -> email }}</td>
                   <td>{{ $allInfo-> user -> contactNo }}</td>
                   <td>{{ $allInfo-> campaign-> title }}</td>
                   <td>{{ $allInfo-> amount}}</td>
                   <td>{{ $allInfo-> created_at}}</td>
                 </tr>
               @endforeach

             </table>
             <div class="row right-align" style="margin-top:50px;">
               {{ $donations->links() }}

             </div>
            </div>
          </div>

        </div>
        <div id="test2">
          <div class="card-panel">
          <form class="" action="{{ route('admin.donations.store') }}" method="post">
            {{csrf_field()}}
              <div class="input-field col s12">
               <input  pattern= "[0-9]" title="Integer Only: [0-9]" required id="amount" type="number" min="50" class="validate" name="amount" placeholder="Minimum of &#8369; 50">
               <label class="blue-text text-lighten-1" for="amount">Amount:</label>
             </div>
             <div class="input-field col s12">
               <select name="title">
                 <option value="" disabled selected>Campaign title:</option>
                 @foreach ($campaigns as $allCamp)
                <option value="{{ $allCamp-> id }}">{{ $allCamp-> title}}</option>
                @endforeach
               </select>
             </div>
              <input type="submit" name="" value="SUBMIT" class="btn ">
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
