$(".modal").each( function(){
	$(this).wrap('<div class="overlay"></div>')
});

$(".open-modal").on('click', function(e){
	e.preventDefault();
	e.stopImmediatePropagation;
	
	var $this = $(this),
			modal = $($this).data("modal");
	
	$(modal).parents(".overlay").addClass("open");
	setTimeout( function(){
		$(modal).addClass("open");
	}, 350);
	
	$(document).on('click', function(e){
		var target = $(e.target);
		
		if ($(target).hasClass("overlay")){
			$(target).find(".modal").each( function(){
				$(this).removeClass("open");
			});
			setTimeout( function(){
				$(target).removeClass("open");
			}, 350);
		}
		
	});
	
});

$(".close-modal").on('click', function(e){
	e.preventDefault();
	e.stopImmediatePropagation;
	
	var $this = $(this),
			modal = $($this).data("modal");
	
	$(modal).removeClass("open");
	setTimeout( function(){	
		$(modal).parents(".overlay").removeClass("open");
	}, 350);
	
});

$(".full-list")
  .slice(0, 2)
  .show();
$(".full-list p:hidden").css("opacity", 0);
$("#viewAll").on("click", function(e) {
  $(".full-list p:hidden")
    .slice(0, 5)
    .slideDown("slow")
    .animate(
      {
        opacity: 1
      },
      {
        queue: false,
        duration: "fast"
      }
    );
  if ($(".full-list p:hidden").length == 0) {
    $("#viewAll").fadeOut("slow");
  }
  e.preventDefault();
});
