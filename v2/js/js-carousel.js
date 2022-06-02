// setInterval(SetCarousel, 3000);




var preclass = '';
var nextclass = '';
$( document ).ready(function() {
	try{
		preclass = $('.prev-container').attr('class').split(" ")[1];
		setInterval(function(){
			myCarousel();
			clickPortfolio();
		}, 4000)
	}
	catch{
		setInterval(function(){
			clickPortfolio();
		}, 3000)
	}


	$("#subscribe_blog").click(function(){
		var email = $("#email_id_for_blog").val();
		$.ajax({
          url: "/insights/subscribe/blog/email/",
          type: "GET",
          dataType: 'json',
          data: {
            "email": email
          },
       success: function(response){
          // console.log(response);
          if (response.status =="Success"){
             console.log(response)
             $("#mail_id_text").css("display" , "block")
             $("#email_id_for_blog").val("")
          }
          else{
              alert("Oops ! something went wrong")
          }
        }           
    })
	})
	// setInterval(myCarousel, 3000);
	// setInterval(clickPortfolio, 3000);
	
	

	

	// var $content = $('#imagemixt'); // Cache your selectors!
	// // var left_icon = $("#show-left-icon");

	// $(".slide-control.left").hover( function loop() {
	// 	$("#show-left-icon").css({display:"block"})
	// 	console.log("hello")
	//     $content.stop().animate({  marginLeft: '-=1600' }, 5000, 'linear', function(){
	    	
	//         $content.css({ marginLeft : "0px" });
	//         // $left_icon.css({display:'block'})

	//         loop();
	//     });
	// }, function stop() {
	//     $content.stop();
	// });
	// $(".slide-control.right").hover( function loop() {
	// 	$("#show-right-icon").css({display:"block"})
		
	// 	var right_css_value = parseInt($content.css("margin-left").replace('px',''));
	// 	console.log(right_css_value)
	// 	if(right_css_value < 1040){
	// 		console.log($content.css("margin-left"))
	// 		console.log($content.outerWidth())
	// 		$content.stop().animate({  marginLeft: '+=1600' },5000, 'linear', function(){
	// 			$content.css({ marginLeft : -$content.outerWidth() });
	// 			loop();
	// 		})
	// 		// $content.stop().animate({  marginLeft: '1600' }, 5000, 'linear', function(){
	    	
	// 	 //        // $content.css({ marginLeft : -$content.outerWidth() });
	// 	 //        loop();
	// 	 //    });
	// 	}
	    
	// }, function stop() {
	//     $content.stop();
	// });

})
var myCarousel = (function(){
	var nextdisable = $('.next-container').attr('class').split(" ");
	var predisable = $('.prev-container').attr('class').split(" ");
	// var preclass = predisable[]
	// console.log(nextdisable,predisable)
	if (nextclass){
		if (predisable.length > 1){
			preclass =  $('.prev-container').attr('class').split(" ")[1]
			nextclass = ''
		}
		$('.prev-container').trigger('click');
		
	}
	else if(preclass){
		if (nextdisable.length > 1){
			nextclass =  $('.next-container').attr('class').split(" ")[1]
			preclass = ''
		}
		$('.next-container').trigger('click')
	}
})
// var a = [];
// var myPortfolio = (function(){
// 	var port_ul = $('.slick-dots')

// 	$('.slick-dots li').each(function (i) {

//         var index = $(this).index();
//         a.push(index);

        
//     });
//     // $(".slick-dots li").eq().trigger('click')
// })
var portindex;
var lastindex = 1;
var clickPortfolio = (function(){
	lastindex = $('.slick-dots')[0].children.length;
	$('.slick-dots li').each(function (i) {
		// console.log("hi")
        var index = $(this).index();
        
        var cls = $(this).attr('class');
        if (cls == "slick-active"){
        	if(index == 0 && portindex == lastindex-1){
        		// console.log(portindex,cls,index,lastindex)
        		$(".slick-dots li").eq(0).trigger('click')
        		portindex = index + 1
        	}
        	else{
        		$(".slick-dots li").eq(index+1).trigger('click')
        		portindex = index
        		// console.log(portindex,index,lastindex)
        	}
        	
        }
        
    });
})
