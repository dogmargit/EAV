<?php

/**
 * Product cart
 */
class Cart extends CComponent
{
	private $session;

	private $data;

	public function init()
	{
		$this->session = Yii::app()->session;
		if(!isset($this->session['cart_data']))
			$this->session['cart_data'] = array();
	}

	public function add($data)
	{
		$itemIndex = $this->getitemIndex($data);
		if(count($this->session['cart_data']))
			$this->data = $this->getItems();

		if(isset($this->data[$itemIndex]))
			$this->data[$itemIndex]['quantity'] += (int) $data['quantity'];
		else
			$this->data[$itemIndex] = $data;

		$this->data[$itemIndex]['index'] = $itemIndex;

		return $this->update();
	}

	public function getItemIndex($data)
	{
		$options = '';
		if(is_array($data['options']))
			foreach($data['options'] as $key=>$value)
				$options .= '-'.$value;
		
		return $data['product_id'].$options;
	}

	public function remove($index)
	{
		$data = $this->getItems();

		if(isset($data[$index]))
		{

			unset($data[$index]);

			$this->data = $data;
			$this->update();
		}
	}

	public function edit($index, $qty)
	{
		if(!$this->getItemsCount())
			return false;

		$this->data = $this->getItems();

		$this->data[$index]['quantity'] = $qty;

		return $this->update();
	}

	public function update()
	{
		if(!isset($this->data)) return false;

		if($this->session['cart_data'] = serialize($this->data))
			return true;
	}

	public function getTotalPrice()
	{
		$data = $this->getItems();

		if(!count($data) or $data == '0')
			return '0';
		foreach($data as $item)
			$price += $item['price'];

		return $price;
	}

	public function getAllTotalPrice()
	{
		$data = $this->getItems();

		if(!count($data) or $data == '0')
			return '0';
		foreach($data as $item)
			$price += $item['price']*$item['quantity'];

		return $price;
	}

	public function getItemsCount()
	{
		$data = $this->getItems();

		if(isset($data) and is_array($data)) 
			return count($data);

		return 0;
	}

	public function getAllItemsCount()
	{
		$quantity = '0';
		$data = $this->getItems();

		foreach($data as $item)
			$quantity += $item['quantity'];

		return $quantity;
	}

	public function getItems()
	{
		if(count($this->session['cart_data']) == 0)
			return array();

		return unserialize(Yii::app()->session['cart_data']);
	}

	public function clear()
	{
		$this->session['cart_data'] = NULL;
	}
}
