<?php 
/**
*@class Category
*@author Vinícius Becker Bernardini
*/

class Category{
	// Creating the atributes
	private $categoryId;
	private $name;

	// Creating the constructor
	public function __construct(){

	}
	// Creating the destructor
	public function __destruct(){

	}
	// Getters and Setters methods
	// Getter of category id
	public function getCategoryid():int{
		return $this->categoryId;
	}
	// Setter of category id
	public function setCategoryid(int $value){
		$this->categoryId = $value;
	}
	// Getter of name
	public function getName():string{
		return $this->name;
	}
	// Setter of name 
	public function setName(string $value){
		$this->name = $value;
	}

	// Category tooString
	public __toString(){
		return nl2br(
		"ID da categoria: ".getCategoryid().
		"Nome da categoria: ".getName());
	}

}