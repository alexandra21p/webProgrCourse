<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:template match="/">
        <html>
            <head>
                <link rel="stylesheet" type="text/css" href="lab5style.css"/>
            </head>
            <body>
                <h1>Bibliography</h1>

                    <xsl:for-each select="bibliography/entry">
                        <xsl:sort select="publishing_year"/>
                        <div class="separated">  <div class="title">
                                <xsl:value-of select="title"/> </div>
                            </div>

                            <xsl:choose>
                                <xsl:when test="publishing_year &gt; 2009 and publishing_year &lt; 2013">
                                    <div class="selected" style=" border-bottom: 25px solid #EEEEEE">
                                        <!--<xsl:value-of select="/bibliography/entry/@category"/></td>-->
                                        <div class="category"> category: <xsl:value-of select="@category"/> </div>
                                        <div class="author"> author: <xsl:value-of select="author"/> </div>
                                        <div class="publishing_year" style="color:#EEEEEE; margin-top:-40px;"> publishing year: <xsl:value-of select="publishing_year"/> </div>
                                    </div>
                                </xsl:when>
                                <xsl:otherwise>
                                    <div class="category"> category: <xsl:value-of select="@category"/> </div>
                                    <div class="publishing_year"> publishing year: <xsl:value-of select="publishing_year"/> </div>
                                </xsl:otherwise>
                            </xsl:choose>


                    </xsl:for-each>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>