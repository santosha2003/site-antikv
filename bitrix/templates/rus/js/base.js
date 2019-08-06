	$(document).ready(function(){

    jQuery('#mycarousel').jcarousel({
        vertical: true,
        scroll: 1
    });
	
             
             $(".kabinet").hover(
             function(){
			      $(".authDown").slideDown("fast");},
             function(){
			      $(".authDown").slideUp("fast");

             });        
             
             $("#mycarousel li").click(function(){
                    var src=$(this).attr("rel");
                    $(".bigFOTO img").attr("src", src);
                    $(".bigFOTO a.fancy").attr("href", src);
                  
             		$("#mycarousel li span").removeClass("active");
             		$("#mycarousel li td").removeClass("active");
             		
             		$("td", $(this)).addClass("active");
             		$("span", $(this)).addClass("active");
             });     
             
             
			$("a.fancy").fancybox({
				'titleShow'		: false
			});


             
      });       