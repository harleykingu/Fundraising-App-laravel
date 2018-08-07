@extends('admin.admin-template')
@section('body')
<div class="row">
  <div class="col s12">
    <div class="card-panel yellow lighten-1">
      <div class="row">
        <div class="col s12">
          <ul class="tabs">
            <li class="tab col s3"><a href="#test1">Campaigns</a></li>
            <li class="tab col s3"><a class="" href="#test2">New Campaign</a></li>
          </ul>
          <div id="test1" class="col s12">
            <div class="card-panel">
              <div class="row">
                <div class="col s6">
                  <form class="" action="#" method="post" class="">
                    <div class="input-field">
                        <input id="last_name" type="text" class="validate">
                        <label for="last_name"><span class="fa fa-search"></span> Search Campaign</label>
                        <input type="submit" name="" value="SEARCH" class="btn">
                    </div>
                  </form>
                </div>
                <div class="col s6 right-align">
                  Sort By:
                  <a href="campaigns/?category=1">Sports</a>
                  <a href="campaigns/?category=2">Education</a>
                  <a href="campaigns/?category=3">Medical</a>
                </div>
              </div>
              <div class="row">
              <table class="striped">
               <thead>
                 <tr>
                     <th>#</th>
                     <th>Created By</th>
                     <th>Title</th>
                     <th>Description</th>
                     <th>Category</th>
                     <th>Goal</th>
                     <th>Total</th>
                     <th>Deadline</th>
                     <th>Created At</th>
                     <th>Status</th>
                     <th>Actions</th>
                 </tr>
               </thead>

               <tbody>
                 @foreach ($campaigns as $allInfo)
                  @if ($allInfo-> total >= $allInfo-> goal)
                    <tr class="green-text">
                  @else
                   <tr>
                  @endif
                     <th>{{ $allInfo-> id }}</th>
                     <td>{{ $allInfo-> user -> name }}</td>
                     <td>{{ $allInfo-> title }}</td>
                     <td>{{ substr(strip_tags($allInfo-> content), 0, 50) }}{{ strlen(strip_tags($allInfo->content)) > 50 ? "..." : ""}}</td>
                     <td>{{ $allInfo-> category ->cat_name}}</td>
                     <td>{{ $allInfo-> goal }}</td>
                     <td>{{ $allInfo-> total }}</td>
                     <td>{{ $allInfo-> due_date }}</td>
                     <td>{{ $allInfo-> created_at }}</td>
                     <td>{{ $allInfo-> status }}</td>
                  @if ($allInfo->status == "DONE")

                     <td>
                       <div class="fixed-action-btn horizontal" style="position:relative; bottom:0; right:0">
                          <a class="btn-floating blue lighten-1">
                            <i class="large material-icons">more_vert</i>
                          </a>
                          <ul>
                            <form class="" action="{{ route('admin.transactions.store') }}" method="post">
                              {{csrf_field()}}
                              <input type="hidden" name="c_id" value="{{ $allInfo->id }}">
                              <input type="submit" name="" value="GENERATE REPORT" class="btn blue lighten-1">
                            </form>
                          </ul>
                        </div>
                      </td>
                  @else
                     <td>
                       <div class="fixed-action-btn horizontal" style="position:relative; bottom:0; right:0">
                          <a class="btn-floating blue lighten-1">
                            <i class="large material-icons">more_vert</i>
                          </a>
                          <ul>
                            <li><a href="#" class="btn-floating red"><i class="material-icons" title="Delete">remove</i></a></li>
                            <li><a href="{{ route('admin.campaigns.edit', $allInfo-> id) }}" class="btn-floating green"><i class="material-icons" title="Edit">mode_edit</i></a></li>
                          </ul>
                        </div>
                     </td>
                  @endif
                   </tr>
                 @endforeach
               </tbody>
             </table>
            </div>
          </div>
          <div id="test2" class="col s12">Test 2
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
