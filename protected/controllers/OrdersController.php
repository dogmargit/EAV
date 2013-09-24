<?php

class OrdersController extends FrontendController
{
	public $layout = '/layouts/orders_column';

	public function actionIndex($delete = false)
	{
/*		Yii::app()->cart->clear();

		echo "<pre>";
		$data['product_id'] = '126';
		$data['title'] = 'Peg p3erego GT3';
		$data['price'] = '4500';
		$data['options']  = array('color'=>'382');
		$data['quantity']  = '1';
		$data['pic']  = '796d8abc0337e384241b97c3c74b0eea.JPG';
		$data['url']  = 'peg-perego-gt3';
		Yii::app()->cart->add($data); 

		//echo Yii::app()->cart->getItemsCount();

		//Yii::app()->cart->remove('322-8');

		print_r(Yii::app()->cart->getItems()); exit();
	  	exit();*/

		if($_POST)
		{
			foreach($_POST['position'] as $item)
			{
				$tovar = Products::model()->findByPk($item['id']);
				var_dump(Yii::app()->cart->edit($item['index'], $item['qty']));
			}
		}

		$this->render('index');
	}

	public function actionCheckout()
	{
		$shoppingCart = Yii::app()->cart->getItems();

		if(count($shoppingCart) == 0)
			Yii::app()->request->redirect($this->createUrl('/cart/'));

		$order = New Orders;

		if($form = $_POST) {

			$order->attributes=$_POST['Orders'];

			if($order->save())
			{

				foreach($shoppingCart as $position)
				{
					$ordered_product = new OrdersProducts;
					$ordered_product->orders_id     = $order->id;
					$ordered_product->products_id   = $position['id'];
					$ordered_product->products_name = $position['title'];
					$ordered_product->quantity 		= $position['quantity'];
					$ordered_product->price         = $position['price'];
					$ordered_product->subtotal      = ($position['price']*$position['quantity']);

					$ordered_product->options = $position['options']?$position['color']:'';

					$ordered_product->save();
				}

				$mail = new YiiMailer('send_cart', array('shoppingCart' => $shoppingCart, 'order'=>$order));
				//$mail->clearLayout(); //if layout is already set in config
				$mail->setFrom(Yii::app()->params['email'], 'Эдуард');
				$mail->setTo($order->user_email);
				$mail->setSubject('Вы оставили заказ № '.$order->id.' на сайте '.Yii::app()->params['site_title']);
				if($mail->send())
				{
					Yii::app()->cart->clear();

					Yii::app()->request->redirect($this->createUrl('/cart/success'));
				}
			}
		}

		$this->render('checkout', array(
				'model'=>$order,
				'shoppingCart'=>$shoppingCart,
			));
	}

	public function ActionDelete()
	{
		if(!$_POST['index']) return false;

		$index = $_POST['index'];

		Yii::app()->cart->remove($index);

		echo Yii::app()->cart->getItemsCount();
	}

	public function actionAddtocart()
	{
		$product = Products::model()->findByPk((int)$_POST['id']);

		$data['product_id'] = $product->id;
		$data['title'] = $product->title;
		$data['price'] = $product->price;
		$data['quantity'] = $_POST['quantity'];
		if($_POST['color_id'])
		{
			$images = ProductsImages::model()->findByPk((int)$_POST['color_id']);
			$data['options']  = array('color_id'=>$images->id, 'color_title'=>$images->title, 'pic'=>$images->pic);
			$data['price']  = $images->price;
		}
		$data['pic']  = $product->pic;
		$data['url']  = $product->url;
		if(Yii::app()->cart->add($data))
		{
			echo json_encode(array('count'=>Yii::app()->cart->getAllItemsCount(), 'price'=>Yii::app()->cart->getAllTotalPrice()));
		} 
	}

	public function actionSuccess()
	{
		$this->render('success', array(
				'model'=>$model,
			));
	}
	
}
