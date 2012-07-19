<script type="text/javascript" src="../plugins/tinymce/tiny_mce.js"></script>
<script type="text/javascript" src="js/editor.js"></script>
<style type="text/css">
<!--
.style2 {color: #003399}
-->
</style>
    <div>
    	<h2>Khai báo template</h2>
    	
        <p><code><span style="color: #000000">
          <span style="color: #0000BB">&lt;?php<br />
          $tpl&nbsp;</span><span style="color: #007700">=&nbsp;new&nbsp;</span><span style="color: #0000BB">bTemplate</span><span style="color: #007700">(</span><span style="color: #DD0000">'<strong>template_dir</strong>/'</span><span style="color: #007700">);
          <br />
              </span><span style="color: #0000BB">$tpl</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">aLang&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">$aLang</span><span style="color: #007700">;
              <br />
                </span><span style="color: #0000BB">$tpl</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">tag&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #DD0000">'src|href|background|value|url'</span><span style="color: #007700">;
                  
                <br />
                  </span><span style="color: #0000BB">$tpl</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">folder&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #DD0000">'format|media|css|images|flash|js'</span><span style="color: #007700">;
                  <br />
                    </span><span style="color: #0000BB">?&gt;</span>
          </span>
        </code></p>
        <p>Trong đó: <br />
          - $aLang là 1 mảng có dạng:<br /> 
          <code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br />$aLang&nbsp;</span><span style="color: #007700">=&nbsp;array();
<br /></span><span style="color: #0000BB">$aLang</span><span style="color: #007700">[</span><span style="color: #DD0000">'home'</span><span style="color: #007700">]&nbsp;=&nbsp;</span><span style="color: #DD0000">'Trang chủ'</span><span style="color: #007700">;
<br /></span><span style="color: #0000BB">$aLang</span><span style="color: #007700">[</span><span style="color: #DD0000">'contact'</span><span style="color: #007700">]&nbsp;=&nbsp;</span><span style="color: #DD0000">'Liên hệ'</span><span style="color: #007700">;

<br /></span><span style="color: #FF8000">//.............
<br /></span><span style="color: #0000BB">?&gt;</span>
</span></code>
          <br />
        Chú ý khi template thực thi nó sẽ thay thế tất cả các đường dẫn dạng:<br />
                src = &quot;images/....  thành src = &quot;<strong>template_dir</strong>/images/....<br />
        href = &quot;css/....   thành href = &quot;<strong>template_dir</strong>/css/.... <br />
        url = &quot;flash/....   thành url = &quot;<strong>template_dir</strong>/flash/....<br />
        ......<br />
                Tổng quát: $this-&gt;tag=&quot;$this-&gt;folder/..&quot; thành $this-&gt;tag= &quot;<strong>template_dir</strong>/$this-&gt;folder/.... và điều này sẽ giúp bạn có thể xem đựơc css, image cho dù bạn đặt thu mực template ở đâu.
                
                <form>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td>Intro</td>
                      <td><textarea name="textarea2" id="textarea2" class="abc" cols="100" rows="5"></textarea></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>Content</td>
                      <td><textarea name="textarea" id="textarea" class="abc tinymce" cols="100" rows="20"></textarea></td>
                    </tr>
                  </table>
      </form></p>
</div>
      
      
      <div>
      <h2>Các chức năng cơ bản:</h2>
      	<div>
       	  <h4>1. Load template</h4>
            1.1 Load master template: Template chứa các thành phần cố định của 1 trang web ( banner, nav menu, bottom,....)<br />
            <code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br />$tpl</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">setfile</span><span style="color: #007700">(</span><span style="color: #DD0000">'master.tpl'</span><span style="color: #007700">);
<br /></span><span style="color: #0000BB">?&gt;</span>
</span>
</code><br />
			1.2 Load template cho 1 vùng trên master template:<br />
<code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br />$tpl</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">setfile</span><span style="color: #007700">(array(
<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'body'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">'body.tpl'</span><span style="color: #007700">,
<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'left'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">'left.tpl'
<br /></span><span style="color: #007700">));
<br /></span><span style="color: #0000BB">?&gt;</span>
</span>

</code><br />
Câu lệnh này sẽ thay tất điểm <a href="#include">{include:tpl=<strong>left</strong>}</a> và <a href="#include">{include:tpl=<strong>body</strong>}</a> thành nội dung của file left.tpl và body.tpl.<br />
      	*Chú ý: nếu template master không đựơc load thì file template đầu tiên sẽ được xem là template master, như vậy chúng ta có thể đơn giản việc load template của 1.1 &amp; 1.2 lại thành:<br />
      	<code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br />$tpl</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">setfile</span><span style="color: #007700">(array(
<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'master'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">'master.tpl'</span><span style="color: #007700">,
<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'body'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">'body.tpl'</span><span style="color: #007700">,
<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'left'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">'left.tpl'

<br /></span><span style="color: #007700">));
<br /></span><span style="color: #0000BB">?&gt;</span>
</span>
</code><br />
      	</div>
        <div>
        <h4>2. Thay thế biến:</h4>
        2.1 Biến bình thường:
		<br />
        Giả sử template master có nội dung: 
        <br />
        <span class="style2">Welcome \{username\}\{login_text\}</span><br />
        -&gt; để thay \{username\} và \{login_text\} thành <strong>Nguyen Van A</strong> và <strong>Logout</strong> ta thực hiện như sau: <br />
<code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br />$tpl</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">assign</span><span style="color: #007700">(array(
<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'username'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">'Nguyen&nbsp;Van&nbsp;A'</span><span style="color: #007700">,
<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'login_text'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">'Logout'
<br /></span><span style="color: #007700">));
<br /></span><span style="color: #0000BB">?&gt;</span>

</span></code> <br />
        Chú ý: <br />
        - 
        nếu trong template có 1 đánh dấu \{some_name\} mà chúng ta không assign như ở trên thì nó sẽ bị thay thế thành giá trị NULL khi template thực thi. <br />
		- Vì \{ và \} dùng để đánh dấu, nên nếu muốn viết 1 điểm \{some_name\} hiển thị khi template thực thi thì bạn phải viết:
		\\{some_name\\}<br />
 2.2 Biến ngôn ngữ:<br />
Là những điểm được đánh dấu dạng {<strong>lang</strong>.some_name} và biến này tự động được thay thế với giá trị là <strong>$aLang['some_name']</strong></div>
      </div>
    <div>
		<h4>3. Vòng lặp</h4>
        <p>3.1 Vòng lặp đơn giản:<br />
        <br />
          Ví dụ: vi dụ file template</p>
        <p>Danh sách sản phẩm:<br />
          &lt;!--BASIC product--&gt;<br />
          Tên sản phẩm: {product.name}<br />
          Giá cho sản phẩm: {product.price}<br />
          &lt;!--BASIC product--&gt;<br />
          <br />
        </p>
        <p>Lặp trong php<br />
          <code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br /></span><span style="color: #007700">for(</span><span style="color: #0000BB">$i</span><span style="color: #007700">=</span><span style="color: #0000BB">0</span><span style="color: #007700">;</span><span style="color: #0000BB">$i</span><span style="color: #007700">&lt;</span><span style="color: #0000BB">3</span><span style="color: #007700">;</span><span style="color: #0000BB">$i</span><span style="color: #007700">++)
<br /></span><span style="color: #0000BB">$tpl</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">asign</span><span style="color: #007700">(array(
<br /></span><span style="color: #DD0000">'name'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">'Tên'</span><span style="color: #007700">.</span><span style="color: #0000BB">$i</span><span style="color: #007700">,

<br /></span><span style="color: #DD0000">'price'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">'Giá'</span><span style="color: #007700">.</span><span style="color: #0000BB">$i</span><span style="color: #007700">,
<br />),</span><span style="color: #DD0000">'product'</span><span style="color: #007700">);</span><span style="color: #0000BB">?&gt;</span>
</span>
</code><br />
        </p>
        <p>Kết quả cuối cùng của quá trình này là:</p>
        <p>Danh sách sản phẩm:<br />
    
        <!--BASIC list-->
    Tên sản phẩm: Tên{list.stt} <br />
	Giá sản phẩm: Giá{list.stt}<br />
  <!--BASIC list-->
    </p>
	
	3.2 Vòng lặp 2 chiều:<br />
    <p>Tạo file template có dạng:<br />
      Menu<br />
      &lt;!--BASIC level1--&gt;<br />
      + {level1.name}<br />
      &lt;!--BASIC level1.level2--&gt;<br />
      - {level1.level2.name}<br />
      &lt;!--BASIC level1.level2--&gt;<br />
      &lt;!--BASIC level1--&gt;<br />
      Kết thúc menu.</p>
    <p><br />
      <code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br />$level1&nbsp;</span><span style="color: #007700">=&nbsp;array(</span><span style="color: #DD0000">'m1'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">'PHP'</span><span style="color: #007700">,</span><span style="color: #DD0000">'m2'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">'MySQL'</span><span style="color: #007700">);
<br /></span><span style="color: #0000BB">$level2</span><span style="color: #007700">[</span><span style="color: #DD0000">'m1'</span><span style="color: #007700">]&nbsp;=&nbsp;array(</span><span style="color: #DD0000">'PHP&nbsp;co&nbsp;bản'</span><span style="color: #007700">,</span><span style="color: #DD0000">'PHP&nbsp;nâng&nbsp;cao'</span><span style="color: #007700">);

<br /></span><span style="color: #0000BB">$level2</span><span style="color: #007700">[</span><span style="color: #DD0000">'m2'</span><span style="color: #007700">]&nbsp;=&nbsp;array(</span><span style="color: #DD0000">'MySQL&nbsp;co&nbsp;bản'</span><span style="color: #007700">,</span><span style="color: #DD0000">'MySQL&nbsp;nâng&nbsp;cao'</span><span style="color: #007700">);
<br />foreach(</span><span style="color: #0000BB">$level1&nbsp;</span><span style="color: #007700">as&nbsp;</span><span style="color: #0000BB">$k1</span><span style="color: #007700">=&gt;</span><span style="color: #0000BB">$v1</span><span style="color: #007700">){

<br /></span><span style="color: #0000BB">$tpl</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">assign</span><span style="color: #007700">(array(
<br />&nbsp;&nbsp;</span><span style="color: #DD0000">'name'</span><span style="color: #007700">=&gt;</span><span style="color: #0000BB">$v1</span><span style="color: #007700">,
<br />),</span><span style="color: #DD0000">'level1'</span><span style="color: #007700">);
<br />foreach(</span><span style="color: #0000BB">$level2</span><span style="color: #007700">[</span><span style="color: #0000BB">$k1</span><span style="color: #007700">]&nbsp;as&nbsp;</span><span style="color: #0000BB">$k2</span><span style="color: #007700">=&gt;</span><span style="color: #0000BB">$v2</span><span style="color: #007700">){

<br />&nbsp;&nbsp;</span><span style="color: #0000BB">$tpl</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">assign</span><span style="color: #007700">(array(
<br />&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'name'</span><span style="color: #007700">=&gt;</span><span style="color: #0000BB">$v2</span><span style="color: #007700">,
<br />
&nbsp;&nbsp;),</span><span style="color: #DD0000">'level1.level2'</span><span style="color: #007700">);
<br />}
<br />}
<br /></span><span style="color: #0000BB">?&gt;</span>
</span>
</code></p>
    <p>Kết quả cuối cùng của quá trinh này là:<br />
Menu<br />
<!--BASIC level1-->
+ {level1.name}<br />
<!--BASIC level1.level2-->
&nbsp;&nbsp;{level1.level2.name}<br />
<!--BASIC level1.level2-->
<!--BASIC level1-->
Kết thúc menu.
	  </div>
