
	/* console log */
	function pr(data=false,method=false){
		
		if (!data) return false;
		if (method){
			alert(data);
			return true;
		}
		return console.log(data);
	}

	/* Scroll paging with window size */
	function pagescroll(pid,phpfile,limit,htmltag,debug=false)
	{
		/* parameter : id (startpage dan total), fungsi php, limit, html */
		
		htmlFunction = window[htmltag];
		
		if (debug==true){pr('pid='+pid);pr('function='+phpfile);pr('phase 1 ok');}
		$(window).scroll(function(){
	
			var startPage = parseInt($("#"+pid).attr("startpage"),10)+limit;
			var totalPage = parseInt($("#"+pid).attr("total"));
			
			if (debug==true){pr('startPage='+startPage);pr('totalPage='+totalPage);pr('phase 2 ok');}
			if (startPage < totalPage){	
				//if($('#wrapper').scrollTop() == $(document).height() - $('#wrapper').height()){
				if ($(window).scrollTop() == $(document).height() - $(window).height()){
					//$('div#loadmoreajaxloader').show();
					
					var html = "";
					
					if (debug==true){pr('scroll top ='+$(window).scrollTop());pr('compare='+$(document).height() - $(window).height());pr('phase 3 ok');}
					
					$.post(basedomain+phpfile, {start:startPage,limit:limit}, function(data){
						
						if (debug==true){pr('data='+data);pr('phase 4 ok');}
						
						if (data.status ==true) {
							
							$.each(data.res, function(i,e){
								html += htmlFunction(e);
							})
							
							//$('div#loadmoreajaxloader').hide();
							$("#"+pid).append(html);
							
							$("#"+pid).attr("startpage", startPage);
							
							
						} else {
							$('div#loadmoreajaxloader').html('<center>No more posts to show.</center>');
						
						}
						
					},"JSON")
				}
			}
			
		})
		
	}
	
	function mobileLastEventPaging(data)
	{
		var html = "";
		
		html += "<div class='post'>";
        html += "                <a href='"+basedomain+"articles/detail/"+data.id+"' class='thumbpPost'>";
        html += "                    <img src='"+basedomainpath+"public_assets/event/"+data.img+"' />";
        html += "                </a>";
        html += "                <div class='entry-post'>";
        html += "                    <span class='date'>"+data.changeDate+"</span>";
        html += "                    <p>"+data.title+"</p>";
        html += "                    <a href='"+basedomain+"articles/detail/"+data.id+"' class='more'>more &raquo;</a>";
        html += "                </div>";
        html += "            </div>";
		
		return html;
	}