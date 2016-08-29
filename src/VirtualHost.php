<?php

namespace Apache\Config;

class VirtualHost
{
	private $address;
	private $port;
	private $directives = [];
	private $directories = [];
	
	public function __construct ($address, $port) {
		$this->address = $address;
		$this->port = $port;
	}
	
	public function addDirective (Directive $directive) {
		$this->directives[] = $directive;
	}
	
	public function addDirectory (Directory $directory) {
		$this->directories[] = $directory;
	}
	
	/**
	* Converts vh to plain text
	* 
	* @return
	*/
	public function toString ()
	{
		$content = "<VirtualHost {$this->address}:{$this->port}>" . PHP_EOL;
		
		foreach ($this->directives as $directive) {
			$content .= $directive->toString() . PHP_EOL;
		}
		
		$content .= PHP_EOL;
		
		foreach ($this->directories as $directory) {
			$content .= $directory->toString() . PHP_EOL;
		}
		$content .= PHP_EOL;
		
		$content .= "</VirtualHost>";
		
		return $content;
	}
	
	/**
	* Saves vh in to a file
	* @param string $filePath
	* 
	* @return
	*/
	public function saveToFile ($filePath)
	{
		$content = $this->toString();
		
		file_put_contents($filePath, $content);
	}
}