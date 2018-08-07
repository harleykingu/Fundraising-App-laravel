@extends('admin-dashboard')
@section('content')

<nav class="navbar navbar-default visible-xs">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img src="img/logo.png" alt="logo" class="img-responsive center-block"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a data-toggle="pill" href="#menu1">Dashboard</a></li>
        <li><a data-toggle="pill" href="#menu2">Users</a></li>
        <li><a data-toggle="pill" href="#menu3">Orders</a></li>
        <li><a data-toggle="pill" href="#menu4">Bank Information</a></li>
        <li><a data-toggle="pill" href="#menu5">Inventory</a></li>
        <li>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav hidden-xs">
      <img src="img/logo.png" alt="logo" class="img-responsive center-block page-header">
      <ul class="nav nav-stacked">
        <li class="active"><a data-toggle="pill" href="#menu1">Dashboard</a></li>
        <li><a data-toggle="pill" href="#menu2">Users</a></li>
        <li><a data-toggle="pill" href="#menu3">Campaigns</a></li>
        <li><a data-toggle="pill" href="#menu4">Bank Information</a></li>
        <li><a data-toggle="pill" href="#menu5">Donations</a></li>
        <li>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
      </ul>
    </div>
<!-- Home Tab -->
  <div class="tab-content" style="margin-top: 120px;">
    <div id="menu1" class="tab-pane fade in active">
      <div class="col-sm-10">
        <div class="well">
          <h4>Dashboard</h4>
          <p>Welcome admin {{ Auth::user()->name }}</p>
        </div>
        <div class="row">
          <div class="col-sm-3">
            <div class="well">
              <h4>Users</h4>
              <p>5n</p>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="well">
              <h4>Campaigns</h4>
              <p>6</p>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="well">
              <h4>Donation</h4>
              <p>10</p>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="well">
              <h4>Visitors</h4>
              <p>5</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4">
            <div class="well">
              <p>Text</p>
              <p>Text</p>
              <p>Text</p>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="well">
              <p>Text</p>
              <p>Text</p>
              <p>Text</p>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="well">
              <p>Text</p>
              <p>Text</p>
              <p>Text</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-8">
            <div class="well">
              <p>Text</p>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="well">
              <p>Text</p>
            </div>
          </div>
      </div>
    </div>
  </div>

  <!-- Users Tab -->

  <div id="menu2" class="tab-pane fade">
    <div class="col-sm-10">
      <div class="well">
        <h4>Users</h4><hr>
        <table class="table">
          <thead>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th></th>
          </thead>

          <tbody>
            @foreach ($users as $allInfo)
              <tr>
                <th>{{ $allInfo-> id }}</th>
                <td>{{ $allInfo-> name }}</td>
                <td>{{ $allInfo-> email }}</td>
                <td>{{ $allInfo-> password }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!--Campaigns Tab -->

  <div id="menu3" class="tab-pane fade">
    <div class="col-sm-10">
      <div class="well">
        <h2>Campaigns</h2><hr>
        <table class="table">
          <thead>
            <th>#</th>
            <th>Title</th>
            <th>Body</th>
            <th>Goal</th>
            <th>Created At</th>
            <th>Status</th>
            <th></th>
          </thead>

          <tbody>
            @foreach ($campaigns as $allInfo)
              <tr>
                <th>{{ $allInfo-> id }}</th>
                <td>{{ $allInfo-> title }}</td>
                <td>{{ substr($allInfo-> content, 0, 50) }}{{ strlen($allInfo->content) > 50 ? "..." : ""}}</td>
                <td>{{ $allInfo-> goal }}</td>
                <td>{{ date('M j, Y', strtotime($allInfo->created_at)) }} </td>
                <td>{{ $allInfo-> status }}</td>
                <td>
                  <div class="ui buttons">
                    <form class="" action="{{ route('admin.accept', $allInfo->id) }}" method="post">
                      {{csrf_field()}} {{ method_field('PUT') }}
                      <input type="hidden" value="ACCEPTED" name="accept"/>
                      <button type="submit" class="ui green button">ACCEPT</button>
                    </form>
                      <div class="or"></div>
                    <form class="" action=" {{ route('admin.accept', $allInfo->id) }} " method="post">
                      {{csrf_field()}} {{ method_field('PUT') }}
                      <input type="hidden" value="DECLINED" name="deny"/>
                      <button type="submit" class="ui red button">DECLINE</button>
                    </form>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!--Reservations Tab -->

  <div id="menu4" class="tab-pane fade">
    <div class="col-sm-10">
      <div class="well">
        <h4>Bank Information</h4><hr>

        <button type="button" class="btn btn-lg btn-success text-right" data-toggle="modal" data-target="#bankmodal">ADD INFO</button><br><br>
        <!-- Modal content-->
        <div id="bankmodal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">AChild2Fund</h4>
              </div>
              <div class="modal-body text-center">
                <img src="{{ asset('img/logo.png') }}" alt="">
                <form class="" action="{{ route('admin.bankinfo') }}" method="post">
                  {{csrf_field()}}
                  <input class="form-control" type="text" name="acc_num" placeholder="Account Number"><br>
                  <input class="form-control" type="text" name="acc_name" placeholder="Account Name"><br>
                  <input class="form-control" type="text" name="acc_code" placeholder="Code"><br>
                  <input class="form-control" type="text" name="acc_amount" placeholder="Amount"><br>
              </div>
              <div class="modal-footer">
                <button type="submit" name="button" class="btn btn-success">ADD</button>
              </div>
                </form>
            </div>
          </div>
        </div>
        <!-- End of Modal content-->

        <table class="table">
          <thead>
            <th>#</th>
            <th>Account Number</th>
            <th>Account Name</th>
            <th>Code</th>
            <th>Amount</th>
            <th>Actions</th>
          </thead>

          <tbody>
            @foreach ($bankinfos as $allInfo)
              <tr>
                <th>{{ $allInfo-> id }}</th>
                <td>{{ $allInfo-> acc_num }}</td>
                <td>{{ $allInfo-> acc_name }}</td>
                <td>{{ $allInfo-> acc_code }}</td>
                <td>{{ $allInfo-> acc_amount }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>

      </div>
    </div>
  </div>

<!--Inventory-->

  <div id="menu5" class="tab-pane fade">
    <div class="col-sm-10">
      <div class="well">
        <h4>Donations</h4><hr>

        <table class="table">
          <thead>
            <th>#</th>
            <th>Username</th>
            <th>Account Name</th>
            <th>Code</th>
            <th>Campaign id</th>
            <th>Actions</th>
          </thead>

          <tbody>

          </tbody>
        </table>

      </div>
    </div>
  </div>

</div>
</div>
</div>


@endsection
