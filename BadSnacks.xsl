<?xml version="1.0" encoding="UTF-8" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

	<xsl:template match="/">
		<h2>Bad Snacks</h2>
		
		<p>You don't want to eat these snacks. These snacks could cause injury or even death if consumed. DON'T EAT!</p>
		
		<table border='1' cellpadding='10'>
		<tr>
		<th>Name</th>
		<th>Description</th>
		</tr>
		<xsl:for-each select="BadSnacks/Snack">
		<tr>
			<td><xsl:value-of select="Name" /></td>
			<td><xsl:value-of select="Description" /></td>
		</tr>
		</xsl:for-each>
		</table>
	</xsl:template>
</xsl:stylesheet>