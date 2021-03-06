<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductAttributeValue;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    
    public function preGetVariations(Request $request){
        return $this->get_combinations($request->input());
    }

    public function createVariations(Request $request){
        $product = Product::find($request->product);
        $combinations = $request->variations;
        $variations = NULL;
        foreach($combinations as $combination){
            $variation_name = $product->name . " (" . $this->create_variation_name($combination, ",") . ")";
            $variation_slug = $product->name . "-" . $this->create_variation_name($combination, "-");
            $variation = Product::create([
                'name'=> $variation_name,
                'slug'=> Str::slug($variation_slug),
                'parent_id'=>$product->id,
                'options'=> json_encode($combination),
                'price'=>$product->price,
                'sku'=> Str::slug($variation_slug),
                'in_stock'=>$product->in_stock
            ]);
            if($variation) $variations[] = $variation;
        }
        return $variations;
    }

    private function create_variation_name($combination){
        $name_attrs = [];
        foreach($combination as $row){
            $pav = ProductAttributeValue::find($row);
            $name_attrs[] = $pav->value;
        }
        return implode(',', $name_attrs);
    }

    private function get_combinations($arrays) {
        $counts = array_map("count", $arrays);
        $total = array_product($counts);
        $res = [];

        $combinations = [];
        $curCombs = $total;

        foreach ($arrays as $field => $vals) {
            $curCombs = $curCombs / $counts[$field];
            $combinations[$field] = $curCombs;
        }

        for ($i = 0; $i < $total; $i++) {
            foreach ($arrays as $field => $vals) {
                $res[$i][$field] = $vals[($i / $combinations[$field]) % $counts[$field]];
            }
        }
        return $res;
    }

}
