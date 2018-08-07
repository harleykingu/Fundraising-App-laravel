@extends('app')
@section('title', '| Create New Campaign')
@section('stylesheets')
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
@endsection
@section('content')

<div class="container"><br>
  <div class="row">
    <div class="card-panel z-depth-2">
      <h1 class="blue-text text-lighten-1 font1">Create New Campaign</h1>
      <div class="divider"></div>
      <form class="" action="{{ route('campaigns.store') }}" method="post" enctype="multipart/form-data">
      {{csrf_field()}}
      <ul class="stepper horizontal linear" style="margin-top:0; height:600px; !important">
<!--============Step 1=============-->
         <li class="step active">
            <div class="step-title waves-effect">Add a Title</div>
            <div class="step-content">
               <div class="row" style="margin-top:10%">
                  <div class="input-field col s12 center-align">
<!--Title-->         <input name="title" type="text" class="validate" style="height:100px; font-size:60px; !important" required>
                     <h5 class="font1 grey-text text-darken-1">Give your Campaign a Title</h5>
                  </div>
               </div>
               <div class="step-actions">
                  <button class="waves-effect waves-dark btn next-step blue lighten-1">CONTINUE</button>
               </div>
            </div>
         </li>
<!--============Step 2=============-->
         <li class="step">
            <div class="step-title waves-effect">Add more Information</div>
            <div class="step-content">
              <div class="row">
                <div class="col s6">
                  <h5 class="font1">Your Goal:</h5>
                  <i class="large yellow-text text-darken-1">&#8369;</i>
                  <div class="input-field inline">
<!--Goal-->         <input type="text" name="goal" value="" style="font-size:40px; !important" placeholder="Amount">
                  </div>
                  <i>.00</i>
                </div>
                <div class="col s6">
                  <h5 class="font1">Campaigners Info:</h5>
                  <div class="input-field">
                    <i class="material-icons prefix yellow-text text-darken-1">account_circle</i>
<!--Child Name-->   <input id="icon_child" type="text" class="" name="child">
                    <label for="icon_child">Childs Name</label>
                  </div>
                  <div class="input-field">
                    <i class="material-icons prefix yellow-text text-darken-1">phone</i>
<!--Contact No-->   <input id="icon_telephone" type="tel" class="" name="contactNo">
                    <label for="icon_telephone">Mobile Number</label>
                  </div>
                  <div class="input-field">
                    <i class="material-icons prefix yellow-text text-darken-1">location_on</i>
<!--Address-->      <input id="icon_address" type="text" class="" name="address">
                    <label for="icon_address">Address</label>
                  </div>
                  <div class="input-field">
                    <i class="material-icons prefix yellow-text text-darken-1">date_range</i>
<!--Deadline-->     <input id="icon_deadline" type="date" class="datepicker" name="due_date">
                    <label for="icon_deadline">Deadline</label>
                  </div>
                </div>
              </div>
               <div class="step-actions">
                  <button class="waves-effect waves-dark btn next-step blue lighten-1">CONTINUE</button>
                  <button class="waves-effect waves-dark btn-flat previous-step">BACK</button>
               </div>
            </div>
         </li>
<!--=============Step 3================-->
         <li class="step">
            <div class="step-title waves-effect">Details and Submit</div>
            <div class="step-content">
               <div class="row">
                  <div class="input-field col s6">
                    <div class="file-field input-field">
                     <div class="btn yellow darken-1">
                       <span>File</span>
                       <input type="file" name="campaign_img">
                     </div>
                     <div class="file-path-wrapper">
<!--Image-->           <input class="file-path validate" type="text" placeholder="Upload image">
                     </div>
                   </div>
                  </div>
                  <div class="input-field col s6">
                    <div class="input-field">
<!--Category-->       <select name="category">
                       <option value="" disabled selected>Select a Category:</option>
                       <option value="1">Sports</option>
                       <option value="2">Education</option>
                       <option value="3">Medical</option>
                      </select>
                    </div>
                  </div>
               </div>
               <div class="row">
                 <h5 class="font1 grey-text text-darken-1">Your Story:</h5>
                 <div class="input-field col s12">
<!--Body-->        <textarea name="content" class="materialize-textarea"></textarea>
                 </div>
               </div>
               <div class="step-actions">
                  <button class="waves-effect waves-dark btn blue lighten-1" type="submit">SUBMIT</button>
                  <button class="waves-effect waves-dark btn-flat previous-step">BACK</button>
               </div>
            </div>
         </li>
      </ul>
    </form>
    </div>
  </div>
</div>

@section('scripts')
  <script>
    tinymce.init({
      selector:'textarea',
      plugins:'link code',
      menubar: false,
      branding: false,
      height: 170
    });
  </script>
@endsection

@endsection
