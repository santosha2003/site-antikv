<?php
namespace Bitrix\Main\Web\DOM;

<<<<<<< HEAD
use \Bitrix\Main\Text\String;
=======
use \Bitrix\Main\Text\TString;
>>>>>>> 4bb3e4deb359749a96a02a5e4d7c22ab1399e137
class HtmlParser extends Parser
{
	public $debugTime = 0;

	protected $tagsMustBeClosed = array('SCRIPT', 'STYLE');


	public $storePhpCode = true;

	protected static $objectCounter = 0;
	protected $currentObjectNumber;
	protected $storedPHP = array();

	public function __construct()
	{
		static::$objectCounter++;
		$this->currentObjectNumber = static::$objectCounter;

		$this->setConfig(new HtmlParserConfig);
	}

	/*
	 * @param Node $node
	 * @return string
	 */
	public function getSource(Node $node)
	{
		$source = '';
		switch($node->getNodeType())
		{
			case Node::ELEMENT_NODE:

				/*@var $node Element*/
				$source = $this->getSourceElement($node);
				break;

			case Node::ATTRIBUTE_NODE:

				/*@var $node Attr*/
				$source = $this->getSourceAttr($node);
				break;

			case Node::TEXT_NODE:

				/*@var Text $node*/
				if($node->getParentNode() && in_array($node->getParentNode()->getNodeName(), $this->tagsMustBeClosed))
				{
					$source = $node->getNodeValue();
				}
				else
				{
					$source = String::htmlEncode($node->getNodeValue());
				}

				break;

			case Node::COMMENT_NODE:

				/*@var Comment $node*/
				$source = '<!--' . $node->getNodeValue() . '-->';
				if($this->storePhpCode)
				{
					$source = $this->restorePHP($source);
				}
				break;

			case Node::DOCUMENT_TYPE_NODE:

				/*@var DocumentType $node*/
				$source = $this->getSourceDocType($node);
				break;
		}

		return $source;
	}

	protected function getSourceAttr(Attr $node)
	{
		return $node->getName() . '="' . String::htmlEncode($node->getValue()) . '"';
	}

	protected function getSourceElement(Element $node)
	{
		$nodeName = strtolower($node->getNodeName());
		$source = '<' . $nodeName;
		if($node->hasAttributes())
		{
			$attrList = $node->getAttributesArray();
			foreach($attrList as $attr)
			{
				$source .= ' ' . $this->getSource($attr);
			}
		}

		if($node->hasChildNodes())
		{
			$source .= '>';

			if(Node::$isNodeListAsArray)
			{
				$childNodes = $node->getChildNodesArray();
				foreach ($childNodes as $child)
				{
					$source .= $this->getSource($child);
				}
			}
			else
			{
				for($i = 0; $i < $node->getChildNodes()->getLength(); $i++)
				{
					$source .= $this->getSource($node->getChildNodes()->item($i));
				}
			}


			$source .= '</' . $nodeName . '>';
		}
		else
		{
			$source .= ' />';
		}

		return $source;
	}

	protected function getSourceDocType(DocumentType $node)
	{
		$source = '<!DOCTYPE html>';
		return $source;
	}

	/*
	 * @param string $text
	 * @param Node $node
	 * @return void
	 */
	public function parse($text = "", Node $node)
	{
		if($this->storePhpCode)
		{
			$text = $this->storePHP($text);
		}
		else
		{
			$text = $this->commentPHP($text);
		}

		$isCharOpen = true;
		$isCharClose = false;
		$buffer = '';

		$text = trim($text);
		$char = $charPrev = $charNext = '';

		$textLength = strlen($text);
		for($i = 0; $i < $textLength; $i++)
		{
			$char = substr($text, $i, 1);
			if($char === '<')
			{
				//echo $buffer;
				$node = $this->getNextNode($buffer, $node);

				$buffer = '';
				$buffer .= $char;

				$isCharOpen = true;
				$isCharClose = false;
			}
			elseif($char === '>')
			{
				$buffer .= $char;
				if($isCharOpen)
				{
					//echo $buffer . "\n";
					$node = $this->getNextNode($buffer, $node);
					$buffer = '';
				}

				$isCharClose = true;
				$isCharOpen = false;
			}
			else
			{
				$buffer .= $char;
			}

			if(!$node)
			{
				return null;
			}
		}

		return $node;
	}

	protected function parseElement($text)
	{
		$result = array('NAME' => '', 'ATTRIBUTES' => array());

		//TODO: appends tabs and new strings
		$list = explode(' ', $text);

		if($list[0])
		{
			$result['NAME'] = strtoupper($list[0]);
		}

		if($list[1])
		{
			unset($list[0]);
			$textAttr = implode(' ', $list);
			$result['ATTRIBUTES'] = $this->parseAttributes($textAttr);
		}

		return $result;
	}

	protected function parseDocType($text)
	{
		return array();
	}

	protected function parseAttributes($text)
	{
		static $search = array(
			"'&(quot|#34);'i",
			"'&(lt|#60);'i",
			"'&(gt|#62);'i",
			"'&(amp|#38);'i",
		);

		static $replace = array(
			"\"",
			"<",
			">",
			"&",
		);

		$attributes = array();
		if ($text !== "")
		{
			preg_match_all("/(\\S+)\\s*=\\s*[\"](.*?)[\"]/s", $text, $attrTmp);
			if(strpos($text, "&")===false)
			{
				foreach($attrTmp[1] as $i => $attrTmp1)
				{
					$attributes[$attrTmp1] = $attrTmp[2][$i];
				}
			}
			else
			{
				foreach($attrTmp[1] as $i => $attrTmp1)
				{
					$attributes[$attrTmp1] = preg_replace($search, $replace, $attrTmp[2][$i]);
				}
			}
		}

		return $attributes;
	}

	protected function parseAttributesOld($text)
	{
		preg_match_all("/\b([\w_-]+\s*=\s*([\"']*)[^\\2]+?\\2)/", $text, $pairs);
		$pairs = $pairs[0];

		$attributeList = Array();
		foreach($pairs as $pair)
		{
			$attr = array_map(
				function ($data){
					$data = preg_replace("/(^['\"]|['\"]$)/","",$data);
					return $data;
				},
				preg_split("/\s*=\s*/", $pair)
			);
			$name = $attr[0];
			$value = $attr[1];
			$attributeList[$name] = $value;
		}

		return $attributeList;
	}

	protected function getNextNode($tag, Node $parentNode)
	{
		$node = null;
		$isSingleTag = true;

		$tagsWithoutClose = array('INPUT', 'IMG', 'BR', 'HR', 'META');
		$tagsCantHaveNestedTags = array();

//echo 'taaaag: '.$tag."\n\n";
		$document = $parentNode->getOwnerDocument();

		if($parentNode->getNodeType() === Node::COMMENT_NODE)
		{
			//echo "COMMENT PART: $tag***\n";
			$commentClosePosition = strpos($tag, '-->');
			if($commentClosePosition !== false)
			{
				//echo "COMMENT FIND CLOSE: $tag***\n";
				$clean = substr($tag, 0, $commentClosePosition);
				$parentNode->setNodeValue($parentNode->getNodeValue() . $clean);
				$parentNode->bxNodeFoundCloseTag = true;

				$tag = substr($tag, $commentClosePosition + 3);
				//echo "COMMENT END BUT HAVE CONTENT: ".var_dump($tag)."***\n";
				if(!$tag)
				{
					return $parentNode->getParentNode();
				}
				else
				{
					$parentNode = $parentNode->getParentNode();
				}

				//echo "NOT COMMENT TAG: $tag***\n";
			}
			else
			{
				$parentNode->setNodeValue($parentNode->getNodeValue() . $tag);
				return $parentNode;
			}
		}
		elseif(in_array($parentNode->getNodeName(), $this->tagsMustBeClosed))
		{
			if(strtoupper(substr($tag, -9)) == '</' . $parentNode->getNodeName() . '>')
			{
				$parentNode->bxNodeFoundCloseTag = true;
				$parentNode = $parentNode->getParentNode();
			}
			else
			{
				$firstChild = $parentNode->getFirstChild();
				if(!$firstChild)
				{
					$parentNode->appendChild($document->createTextNode($tag));
				}
				else
				{
					$firstChild->setNodeValue($firstChild->getNodeValue() . $tag);
				}

				$parentNode->bxNodeFoundCloseTag = false;
				return $parentNode;
			}
		}

		if(substr($tag, 0, 2) === '</')
		{
			// closed tag
			//TODO: find closest opened parent with same nodeName and return it
			$cleaned = strtoupper(substr($tag, 2, -strlen('>') ));
			$searchableNode = $parentNode;
			$isSearchableNodeFound = false;

			$unclosedNodes = array();
			do
			{
				if(!$searchableNode->bxNodeFoundCloseTag)
				{
					$unclosedNodes[] = $searchableNode;
				}

				if($searchableNode->getNodeName() === $cleaned)
				{
					$isSearchableNodeFound = true;
					break;
				}
			}while($searchableNode = $searchableNode->getParentNode());

			if($isSearchableNodeFound)
			{
				foreach($unclosedNodes as $unclosedNode)
				{
					/* @var $unclosedNode Node */
					if(in_array($unclosedNode->getNodeName(), $tagsCantHaveNestedTags))
					{
						if($unclosedNode->hasChildNodes())
						{
							foreach ($unclosedNode->getChildNodesArray() as $childNode)
							{
								$unclosedNode->getParentNode()->appendChild($unclosedNode->removeChild($childNode));
							}
						}
					}

					$unclosedNode->bxNodeFoundCloseTag = true;
				}

				return $searchableNode->getParentNode();
			}
			else
			{
				if(false)
				{
					throw new DomException('Parser error. Find close tag, but can not find open tag ' . $cleaned);
				}
				else
				{
					$parentNode->getParentNode()->bxNodeFoundCloseTag = true;
					return $parentNode;
				}
			}
		}
		elseif(substr($tag, 0, 4) === '<!--')
		{
			// Comment
			$cleaned = substr($tag, 4);
			if(substr($tag, -3) == '-->')
			{
				$cleaned = substr($cleaned, 0, -3);
				$parentNode->bxNodeFoundCloseTag = true;
			}
			else
			{
				$isSingleTag = false;
			}


			//$parentNode->bxNodeFoundCloseTag = false;
			$node = $document->createComment($cleaned);
		}
		elseif(substr($tag, 0, 1) === '<')
		{

			// Element
			if(substr($tag, -2) === '/>')
			{
				// empty tag
				$cleaned = substr($tag, 1, -2);
				$bxNodeWithCloseTag = false;
				$isSingleTag = true;
			}
			else
			{
				$cleaned = substr($tag, 1, -1);
				$isSingleTag = false;
				$bxNodeWithCloseTag = true;
			}

			$list = $this->parseElement($cleaned);

			$isDocType = substr($list['NAME'], 0, strlen('!DOCTYPE')) === '!DOCTYPE';

			if(in_array($list['NAME'], $tagsWithoutClose) || $isDocType)
			{
				$bxNodeWithCloseTag = false;
				$isSingleTag = true;
			}

			if($isDocType)
			{
				$list = $this->parseDocType($cleaned);
				//TODO: set doctype fields
			}
			else
			{
				$node = $document->createElement($list['NAME']);
				foreach($list['ATTRIBUTES'] as $attrName => $attrValue)
				{
					$nodeAttr = $document->createAttribute($attrName, $attrValue);
					$node->setAttributeNode($nodeAttr);
				}
				$node->bxNodeWithCloseTag = $bxNodeWithCloseTag;
			}
		}
		else
		{
			// Text
			$cleaned = String::htmlDecode($tag);
			$startTime = getmicrotime();
			$node = $document->createTextNode($cleaned);
			$this->debugTime += getmicrotime() - $startTime;
		}

		if($node && $parentNode)
		{
			$parentNode->appendChild($node);
			if(!$isSingleTag)
			{
				return $node;
			}
		}

		return $parentNode;
	}

	/*
	* @param string $html
	* @return string
	*/
	public function commentPHP($html)
	{
		$html = str_replace(array('<?', '?>'), array('<!--', '-->'),	$html);
		return $html;
	}

	/*
	 * @param string $html
	 * @return string
	*/
	public function storePHP($html)
	{
		if(preg_match_all('/(<\?[\W\w\n]*?\?>)/i', $html, $matches, PREG_SET_ORDER) && is_array($matches))
		{
			$prefix = 'BX_DOM_DOCUMENT_PHP_SLICE_PLACEHOLDER_' . $this->currentObjectNumber . '_';
			foreach($matches as $key => $value)
			{
				$this->storedPHP['<!--' . $prefix . (string) $key . '-->'] = $value[0];
			}

			$replaceFrom = array_values($this->storedPHP);
			$replaceTo = array_keys($this->storedPHP);

			$html = str_replace($replaceFrom, $replaceTo,	$html);
		}

		return $html;
	}

	/*
	 * @param string $html
	 * @return string
	*/
	public function restorePHP($html)
	{
		$html = str_replace(
			array_keys($this->storedPHP),
			array_values($this->storedPHP),
			$html
		);

		return $html;
	}
}