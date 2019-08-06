<?php
namespace Bitrix\Main\Text;

class XmlConverter
	extends Converter
{
	public function encode($text, $textType = "")
	{
		if (is_object($text))
			return $text;

<<<<<<< HEAD
		return String::htmlEncode($text);
=======
		return TString::htmlEncode($text);
>>>>>>> 4bb3e4deb359749a96a02a5e4d7c22ab1399e137
	}

	public function decode($text, $textType = "")
	{
		if (is_object($text))
			return $text;

<<<<<<< HEAD
		return String::htmlDecode($text);
=======
		return TString::htmlDecode($text);
>>>>>>> 4bb3e4deb359749a96a02a5e4d7c22ab1399e137
	}
}
