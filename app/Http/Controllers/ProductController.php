<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{	
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		// $products = DB::table('products')->paginate(15);
		
		// return view('product.index', ['products' => $products]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
		return response()->json([
			'name' => 'Abigail',
			'state' => 'CA'
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$products = $request->all();
		$query = array();
		// var_dump($products[0]['top_bsr']);exit;
		foreach ($products as $key => $product) {
			if (isset($product['top_bsr'])) {
				$tempTopBSR = $product['top_bsr'];
			}
			if (isset($product['bottom_bsr'])) {
				$tempBottomBSR = $product['bottom_bsr'];
			}
			if (isset($product['brand_img_url'])) {
				$brand_img_url = $product['brand_img_url'];
			}
			array_push($query, array(
					'title' => $product['title'],
					'link' => $product['link'],
					'img_url' => $product['img_url'],
					'brand_img_url' => $brand_img_url,
					'price' => $product['price'],
					'top_bsr' => $tempTopBSR,//$product['top_bsr'],
					'bottom_bsr' => $tempBottomBSR, //$product['bottom_bsr'],
					'keywords' => $product['keywords']
				));
		}
		$status = Product::insert($query);
		return Response()->json([
				'status' => $status
			]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
