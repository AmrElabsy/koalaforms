<?php
class Helper
{

	public static function getAttributeWithCamelCase( $attribute ) {
		switch ( mb_strtolower($attribute) ) {
			case "cssclass":
				return "cssClass";

			case "acceptcharset":
				return "acceptCharset";

			case "novalidate":
				return "noValidate";

			default:
				return $attribute;
		}
	}

	public static function getHtmlAttributeName( $attribute ) {
		switch ( mb_strtolower($attribute) ) {
			case "cssclass":
				return "class";

			case "acceptcharset":
				return "accept-charset";

			case "novalidate":
				return "novalidate";

			default:
				return $attribute;
		}
	}

	public static function getAttributesNotInHtml() {
		return [ 'inputs', 'inputId' , 'formId', 'label' ];
	}
}
