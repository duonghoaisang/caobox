{% include 'header.tpl' %}
{% include 'header22.tpl' %}
<br />
hello {{ var }} ee

<br />

{% block javascript %}javascript 1{% endblock %}
php:{php $var = 'haha'; ?}<br />   dd
dadf
Chao \\{{ var }}
{% if(count($loop)) %}
{% foreach($loop as $rs) %}
<p>

---------<br />
Div: {{ $var / 5 }}
Multi: {{ (var + 1) * var * 5  - var5/10 + 1}}<br />

Title: {{ rs.name }}<br />
	{% for($i = 0; $i < 5; $i++) %}
		{{ i }}
	{% endfor %}
	888uu
	{{ iiooiooi }}
</p>
{% endfor %}
{% else %}
<br />Lalalla
{% endif %}


