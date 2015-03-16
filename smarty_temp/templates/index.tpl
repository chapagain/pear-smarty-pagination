<html>

<head>
<title> Homepage : Pagination</title>
</head>

<body>

<table>
	<tr style="background-color:#336699;color:#eeeeee">
	<td>Country ID</td><td width="65%">Country Name</td>
		
	{foreach from=$country item=view}
		<tr bgcolor="{cycle values="#ffffff,#eeeeee"}">
		<td align="center">{$view.country_id}</td>
		<td>{$view.country_name}</td>	
		</tr>
	{/foreach}

	<tr><td colspan="5" align="center">{$pager}</td></tr>
</table>

</body>

</html>