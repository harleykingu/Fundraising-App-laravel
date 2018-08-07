<!-- Main Scripts -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/style.js') }}"></script>
<script src="{{ asset('js/materialize.min.js') }}"></script>

<!-- Add-ons -->
<script src="{{ asset('js/materialize-stepper.min.js') }}"></script>
<!-- <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script> -->



<script type="text/javascript">

  $( document ).ready(function(){

    $(".button-collapse").sideNav();
    $(".dropdown-button").dropdown({
      constrainWidth: false
    });
    $('ul.tabs').tabs();


//carousel

    $('.carousel.carousel-slider').carousel({
      fullWidth: true
    });

    setInterval(function(){
      $('.carousel').carousel('next');
    }, 30000);

//modal
   $('.modal').modal();

//scrollTop

    $(window).scroll(function(){
			if ($(this).scrollTop() > 90) {
				$('.scrollToTop').fadeIn();
			} else {
				$('.scrollToTop').fadeOut();
			}
		});

		$('.scrollToTop').click(function(){
			$('html, body').animate({scrollTop : 0},800);
			return false;
		});

     Materialize.updateTextFields();

     $('select').material_select();

//Stepper

      $('.stepper').activateStepper({
        linearStepsNavigation: false,
      });

//Date Picker

      $('.datepicker').pickadate({
      selectMonths: false, // Creates a dropdown to control month
      min: new Date(2017,8,22),
      format: 'yyyy-mm-dd',
      formatSubmit: 'yyyy-mm-dd',
      clear: 'Clear',
      close: 'Ok',
      closeOnSelect: false // Close upon selecting a date,
});

  });

</script>
