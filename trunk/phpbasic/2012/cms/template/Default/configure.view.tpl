<div class="breadcrumb">{xpath}</div>
<div class="table_list toolbar"><img src="images/new.gif" width="16" height="16" align="absmiddle" /> <a href="?mod=category&amp;p={module}&amp;act=update&amp;parentid={parentid}&amp;type={type}&do=new">New Category</a></div>
<h3>Configure Content </h3>
<table width="100%" border="0" cellspacing="0" cellpadding="2" class="table_list">
  <tr>
    <th width="80%">Type</th>
    <th width="16%">Edit</th>
  </tr>
  <!--BASIC cfg_module-->
  <tr>
    <td> #{cfg_module.typeid}</td>
    <td align="center"><a href="?mod={module}&amp;act=module&amp;module={cfg_module.module}&amp;typeid={cfg_module.typeid}"><img src="images/edit.png" width="16" height="16" border="0" /></a></td>
  </tr>
  <!--BASIC cfg_module-->
</table>
<h3>Configure Gallery </h3>
<table width="100%" border="0" cellspacing="0" cellpadding="2" class="table_list">
  <tr>
    <th width="80%">Page</th>
    <th width="16%">Edit</th>
  </tr>
  <!--BASIC cfg_gallery-->
  <tr>
    <td> {cfg_gallery.page_or_id}</td>
    <td align="center"><a href="?mod={module}&amp;act=module&amp;module={cfg_gallery.module}&amp;page_or_id={cfg_module.page_or_id}"><img src="images/edit.png" width="16" height="16" border="0" /></a></td>
  </tr>
  <!--BASIC cfg_gallery-->
</table>
<h3>Configure HTML </h3>
<table width="100%" border="0" cellspacing="0" cellpadding="2" class="table_list">
  <tr>
    <th width="80%">Page Id </th>
    <th width="16%">Edit</th>
  </tr>
  <!--BASIC cfg_html-->
  <tr>
    <td> #{cfg_html.page_or_id}</td>
    <td align="center"><a href="?mod={module}&amp;act=module&amp;module={cfg_html.module}&amp;page_or_id={cfg_html.page_or_id}"><img src="images/edit.png" width="16" height="16" border="0" /></a></td>
  </tr>
  <!--BASIC cfg_html-->
</table>
