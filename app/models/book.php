<?php
class Book extends AppModel {

	var $name = 'Book';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Transaction' => array(
			'className' => 'Transaction',
			'foreignKey' => 'book_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
	function getAll(){
		$sql = "SELECT Book.id, Book.name as name, Book.description as description, sum(transactions.amount) as saldo   FROM `books` as Book left join transactions on Book.id = transactions.book_id group by Book.id ";
		return $this->query($sql);
	}

}
?>