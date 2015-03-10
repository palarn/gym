$(document).ready(function() {
	var stodvar;
	var count = 0;
	$.getJSON('stodvar.json',function(data){
		stodvar = data;
		for (var i=0; i<data.length; i++)
		{ 
			var el = $('<p>');
			el.append('<a href="#" id=' + i + '><p>'+ data[i].title +'</p></a>');
			el.append('<div><class="checkbox" id='+ data[i].id + i +' name="myCheckbox"/><label><input type="checkbox"></label>Bera saman</div>');
			$('#listi').append(el);
		}


		
		$('#listi p').click(function(event) {
			event.preventDefault();

			if (count==0) {
				$('#upplysingar').empty();
			}
			if (count==0 || count==1) {
				$('#upplysingar2').empty();
			}
			if (count==0 || count==1 || count==2) {
				$('#upplysingar3').empty();
			}


			var itemId = $(event.currentTarget).children('a').attr('id');
			$.getJSON('details/'+ stodvar[itemId].id+'.json',function(detailData){
				var html = '<div class="stodvar">';					  
					html += '<div class="title">'+'<h3>'+detailData['title']+'</h3>'+'</div>';
					html += '<div class="1man">'+'<p>1 mánuður:' + detailData['1man'] +' krónur'+'</p>'+ '</div>';				
					html += '<div class="3man">'+'<p>3 mánuðir:' +  detailData['3man'] +' krónur'+'</p>'+ '</div>';
					html += '<div class="6man">' + '<p>6 mánuðir:'+ detailData['6man'] +' krónur'+ '</p>'+'</div>';
					html += '<div class="arskort">' + '<p>Árskort:'+ detailData['arskort'] +' krónur'+ '</p>'+'</div>';
					html += '<div class="stadsetning">' + '<p>Staðsetning:'+ detailData['stadsetning'] + '</p>'+'</div>';
					html += '<div class="hoptimar">' + '<p>Fjöldi hóptíma:'+ detailData['hoptimar'] + '</p>'+'</div>';
					html += '<div class="staerd">' + '<p>Stærð í fermetrum:'+ detailData['staerd'] + '</p>'+'</div>';

			var mismunur = $(event.currentTarget).children('a').attr('id');
			$.getJSON('details/'+ stodvar[mismunur].id+'.json',function(detailData){
				var gogn = '<div class="stodvar">';
					gogn += '<h3>Mismunur</h3>';
					gogn += '<div class="1man" id="upplysingar">'+'<p>1 mánuður:' + (detailData['1man']-detailData['1man']) +' krónur'+ '</p>'+'</div>';

			if (count==0) {
				$('#upplysingar').append(html);			
				}
			if (count==1) {
				$('#upplysingar2').append(html);				
				}
			if (count==1) {
				$('#upplysingar3').append(gogn);				
				}

			if (count<1) {
				count++;
				}
			else count = 0;
			});
		});	
		return false;
	});
  });
});

