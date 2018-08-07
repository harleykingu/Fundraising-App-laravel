@extends('app')
@section('title', '| Edit Campaign')
@section('content')

<div class="container">
<div class="row">
  <br><br>
  <form class="" action="{{ route('campaigns.update', $campaign->id) }}" method="post" enctype="multipart/form-data">
    {{csrf_field()}} {{ method_field('PUT') }}
    <div class="col-md-8">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="title">Title:</label>
              <input type="text" name="title" class="form-control" value="{{$campaign->title}}" autofocus>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="category">Category:</label>
              <select class="form-control" name="category">
                <option value="1"{{ $campaign->category_id == 1 ? "selected" : "" }}>Sports</option>
                <option value="2"{{ $campaign->category_id == 2 ? "selected" : "" }}>Education</option>
                <option value="3"{{ $campaign->category_id == 3 ? "selected" : "" }}>Medical</option>
              </select>
            </div>
          </div>
        </div>
  <!--Image-->
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="img">Upload Image:</label>
              <input type="file" name="campaign_img" class="" accept="image/*">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="goal">Goal:</label>
              <div class="input-group">
                <div class="input-group-addon">&#8369;</div>
                <input type="text" class="form-control" id="goal" placeholder="Amount">
                <div class="input-group-addon">.00</div>
              </div>
            </div>
          </div>
        </div>
  <!--body-->
        <div class="form-group">
          <label for="content">Body:</label>
          <textarea name="content" rows="8" cols="80" class="form-control">{{$campaign->content}}</textarea>
        </div>
      </div>

      <div class="col-md-4">
        <div class="well">
          <dl class="dl-horizontal">
            <dt>Created At:</dt>
            <dd>{{ date('M j, Y h:ia', strtotime($campaign->created_at)) }}</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Last Updated:</dt>
            <dd>{{ date('M j, Y h:ia', strtotime($campaign->updated_at)) }}</dd>
          </dl>
          <hr>
          <div class="row">
            <div class="col-sm-6">
              <a href="{{ route('campaigns.show', $campaign->id) }}" class="btn btn-danger btn-block">Cancel</a>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <button class="btn btn-success btn-block" type="submit">Save Changes</button>
              </div>
            </div>
          </div>
        </div>
      </div>
  </form>
</div>
</div>

@stop
