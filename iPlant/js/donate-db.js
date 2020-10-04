
$("#check .next").on('click', function(){
  $("#check").hide("slide", { easing: "easeInQuart", direction: "left" }, 700, function(){
    $(".processing").fadeIn(1500, function(){
      $(".progress").animate({ width: "14em" }, 3500, "easeInOutCirc", function() {
        $( ".mask" ).hide("slide", { easing: "easeInQuart", direction: "right" }, 400);
      });
    });
  });
  
	setTimeout(function() {
		$('.processing .message, .outer').fadeOut();
  	$("#confirm").addClass('animated fadeInUp');
	}, 6250);
});