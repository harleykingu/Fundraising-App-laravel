@extends('admin.admin-template')
@section('body')

<div class="row">
  <div class="col s12">
    <div class="card-panel">
      <div class="row">
        <div class="col s12">
          <ul class="tabs">
            <li class="tab col s3"><a href="#test1">Users</a></li>
          </ul>
          <div id="test1" class="col s12">
            <div class="card-panel">
              <div class="row">
                <div class="col s6">
                  <form class="" action="#" method="post" class="">
                    <div class="input-field">
                        <input id="last_name" type="text" class="validate">
                        <label for="last_name"><span class="fa fa-search"></span> Search User</label>
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
              <div class="row">
              <table class="striped">
               <thead>
                 <tr>
                     <th>#</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Address</th>
                     <th>Contact No</th>
                     <th>Actions</th>
                 </tr>
               </thead>

               <tbody>
                 @foreach ($users as $allInfo)
                   <tr>
                     <th>{{ $allInfo-> id }}</th>
                     <td>{{ $allInfo-> name }}</td>
                     <td>{{ $allInfo-> email }}</td>
                     <td>{{ $allInfo-> address }}</td>
                     <td>{{ $allInfo-> contactNo }}</td>
                     <td></td>
                   </tr>
                 @endforeach
               </tbody>
             </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
