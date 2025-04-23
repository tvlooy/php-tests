<?php

// https://wiki.php.net/rfc/domdocument_html5_parser

namespace Dom {

    abstract class Document extends Dom\Node implements Dom\ParentNode
    {
        /* all properties and methods that are common for both XML and HTML documents  */
    }

    // Wraps the old XML parser routines but fixes bugs to bring it up to XML spec
    final class XMLDocument extends Document
    {
        /* XML specific properties and methods */
    }

    // Idem but implements new HTML5 parser
    final class HTMLDocument extends Document
    {
        /* HTML specific properties and methods */
    }

}

class DOMDocument extends Dom\Document
{
    /* backward compatible, same methods, properties, constructor and bugs */
}

$doc = \Dom\HTMLDocument::createFromString($contents);