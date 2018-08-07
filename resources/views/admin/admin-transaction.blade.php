@extends('admin.admin-template')
@section('body')
<div class="row">
  <div class="col s12">
    <div class="card-panel">
      <div class="row">
        <div class="col s12">
          <ul class="tabs">
            <li class="tab col s3"><a href="#test1">Transactions</a></li>
          </ul>
          <div id="test1" class="col s12">
            <div class="card-panel">
              <div class="row">
                <div class="col s2 offset-s10">
                  <form class="" action="#" method="post" class="">
                    <div class="input-field">
                    </div>
                  </form>
                </div>
              </div>
              <div class="row">
                <table class="striped">
                 <thead>
                   <tr>
                       <th>#</th>
                       <th>Campaign ID</th>
                       <th>Created At</th>
                       <th>Actions</th>
                   </tr>
                 </thead>

                 @foreach ($trans as $allInfo)
                   <tr>
                     <th>{{ $allInfo-> id }}</th>
                     <td>{{ $allInfo-> camp_id }}</td>
                     <td>{{ $allInfo-> created_at }}</td>
                     <td>
                       <a href="{{ route('admin.transactions.show', $allInfo->id) }}"><button type="button" class="btn blue lighten-1">
                         VIEW
                       </button></a>
                     </td>
                   </tr>
                 @endforeach

               </table>
              </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
