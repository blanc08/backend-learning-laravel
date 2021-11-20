<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $products = Product::all();

            return response()->json([
                'status' => 'success',
                'message' => 'Product data fetched succesfully',
                'data' => $products,
            ], 200);
        } catch (\Exception $e) {
            return response()->json(
                [
                    "status" => 'error',
                    "message" => $e->getMessage(),
                    "error_code" => $e->getCode(),
                    "errors" => $e
                ],
                500
            );
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $product = Product::create($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'Product created succesfully',
                'data' => $product,
            ], 200);
        } catch (\Exception $e) {
            return response()->json(
                [
                    "status" => 'error',
                    "message" => 'Product create failed',
                    "error_code" => $e->getCode(),
                    "errors" => $e
                ],
                500
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $product = Product::find($id);

            return response()->json([
                'status' => 'success',
                'message' => 'Product data fetched succesfully',
                'data' => $product,
            ], 200);
        } catch (\Exception $e) {
            return response()->json(
                [
                    "status" => 'error',
                    "message" => 'Product not found',
                    "error_code" => $e->getCode(),
                    "errors" => $e
                ],
                500
            );
        }
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
        try {
            $product = Product::find($id);
            $product->update($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'Product updated succesfully',
                'data' => $product,
            ], 200);
        } catch (\Exception $e) {
            return response()->json(
                [
                    "status" => 'error',
                    "message" => 'Product update failed',
                    "error_code" => $e->getCode(),
                    "errors" => $e
                ],
                500
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $product = Product::find($id);
            $product->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Product deleted succesfully',
                'data' => $product,
            ], 200);
        } catch (\Exception $e) {
            return response()->json(
                [
                    "status" => 'error',
                    "message" => 'product delete failed',
                    "error_code" => $e->getCode(),
                    "errors" => $e
                ],
                500
            );
        }
    }
}
