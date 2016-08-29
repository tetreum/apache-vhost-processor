<?php

namespace Apache\Config;

class Directory
{
	private $path;
	private $directives = [];
	
	public function __construct ($path) {
		$this->path = $path;
	}
	
	public function addDirective (Directive $directive) {
		$this->directives[] = $directive;
	}
	
	public function toString ()
	{
		$content = Directive::INDENTATION_SPACES . "<Directory {$this->path}>" . PHP_EOL;
		
		foreach ($this->directives as $directive) {
			$content .= Directive::INDENTATION_SPACES . $directive->toString() . PHP_EOL;
		}
		
		$content .= Directive::INDENTATION_SPACES . "</Directory>";
		
		return $content;
	}
}