@extends('admin.admin-template')
@section('body')
<div class="row">
  <div class="col s12">
    <div class="card-panel">
      <div class="row">
        <div class="col s12">
          <ul class="tabs">
            <li class="tab col s3"><a href="#test1">Campaigns</a></li>
          </ul>
          <!-- Panel 1 -->
          <div id="test1" class="col s12">
            <div class="card-panel">
              <div class="row">
                <div class="col s12">
                  <h2 class="font1 blue-text text-lighten-1">Editing Campaign # {{ $campaign->id }}</h2>
                  <div class="divider"></div>
                </div>
              </div>
              <div class="row">
                <form action="{{ route('admin.campaigns.update', $campaign->id) }}" method="post">
                {{csrf_field()}} {{ method_field('PUT') }}
                <div class="input-field">
                  <input id="edit-goal" type="text" name="edit" value="{{ $campaign->goal }}">
                  <label for="edit-goal"></label>
                </div>
                  <div class="input-field">
                    <select name="status">
                     <option value="" disabled selected>Status:</option>
                     <option value="PENDING">PENDING</option>
                     <option value="ACCEPTED">ACCEPTED</option>
                     <option value="DECLINE">DECLINE</option>
                    </select>
                  </div>
                  <input type="submit" class="btn btn-large blue lighten-1">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
