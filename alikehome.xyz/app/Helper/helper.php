<?php
function getImage($product=0,$folder)
{
	return asset('img'.'/'.$folder.'/'.$product);
}

function getVendorName($id){

    $vendorName = \Illuminate\Support\Facades\DB::table('products')
                  ->join('vendors','vendors.id','products.admin_id')
                  ->where('products.admin_id',$id)
                  ->select('vendors.name as name')
                 ->first();
    return $vendorName;
}
function getCategoryBrand($id){
   $brandName = \App\Product::where('category_id',$id)->groupby('brand_id')->get();
   return $brandName;
}

function getproductImage($id){
    $image = \App\ProductImage::where('product_id',$id)->first();
    return is_null($image) ? '' : $image;
}

function getExtraFacilities($id){
    $extra = \App\ExtraFacility::where('type','vendor')->where('product_id',$id)->first();
    return is_null($extra) ? '' : $extra;
}

function getAdsName($id){
    $extra = \App\Store::where('id',$id)->first();
    return is_null($extra) ? '' : $extra;
}




?>
