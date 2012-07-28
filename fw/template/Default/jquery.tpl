Category: <a href="{root_dir}jquery">Root</a> {parent.string} / <a href="{root_dir}jquery/{category.parentid}/{category.id}">{category.name}</a>

<ol>
<!--BASIC cat-->
<li><a href="{root_dir}jquery{cat.parent}/{cat.id}">{cat.name}</a></li>
<!--BASIC cat-->
</ol>
	
<!--BOX loaddata-->

<div id="xml_content">Loading....</div>
<script>
	$.post('index.xml',{},function(data){
		$('#xml_content').html('');
		$(data).find('subcat[value="{category.name}"]').find('{parent.function_selector}').each(function(){
			var name = $(this).attr('name');
			var params = [];
			$(this).find('params').each(function(){
				var o = $(this).attr('name')+' '+$(this).attr('type');
				o = o.replace('<','&lt;');
				o = o.replace('>','&gt;');
				if($(this).attr('optional') == 'true') o = '['+o+']'
				params.push(o);
			});
			$('#xml_content').append('<p>Function: '+name+'('+params.join(',')+')</p><div>'+$(this).text()+'</div>');
		})
		
		
	},'xml');
</script><!--BOX loaddata-->