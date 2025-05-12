<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Product\ProductServiceInterface;
use Illuminate\Http\Request;
//use Gloudemans\Shoppingcart\Cart;
use Gloudemans\Shoppingcart\Facades\Cart;
class CartController extends Controller
{
    private $productService;
    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();

        // -------------------- PHẦN SẢN PHẨM LIÊN QUAN --------------------
// Khởi tạo mảng chứa danh sách sản phẩm gợi ý
        $recommendedProducts = [];

// Lấy danh sách ID sản phẩm trong giỏ hàng để loại trừ các sản phẩm này khỏi danh sách gợi ý
        $cartProductIds = $carts->pluck('id')->toArray();

// Đọc đường dẫn tệp CSV chứa sản phẩm gợi ý
        $filePath = public_path('recommendations.csv');

// Kiểm tra nếu tệp CSV tồn tại
        if (file_exists($filePath)) {

            // Đọc nội dung tệp CSV và chuyển thành mảng các dòng
            $lines = array_map('str_getcsv', file($filePath));

            // Duyệt qua tất cả các sản phẩm trong giỏ hàng
            foreach ($carts as $cartItem) {

                // Duyệt qua từng dòng trong tệp CSV
                foreach ($lines as $line) {

                    // Kiểm tra xem ID sản phẩm trong giỏ hàng có khớp với ID sản phẩm trong tệp CSV không
                    if ((int)$line[0] === (int)$cartItem->id) {

                        // Nếu khớp, lấy các ID sản phẩm liên quan từ dòng CSV, loại bỏ phần tử đầu tiên (ID sản phẩm chính)
                        $recommendedIds = array_slice($line, 1);

                        // Duyệt qua các ID sản phẩm liên quan
                        foreach ($recommendedIds as $id) {

                            // Ép kiểu ID thành số nguyên để đảm bảo so sánh đúng
                            $id = (int)$id;

                            // Bỏ qua sản phẩm liên quan nếu nó đã có trong giỏ hàng
                            if (in_array($id, $cartProductIds)) {
                                continue; // Nếu sản phẩm đã có trong giỏ, không thêm vào danh sách gợi ý
                            }

                            // Tìm kiếm sản phẩm liên quan từ cơ sở dữ liệu
                            $product = $this->productService->find($id);

                            // Nếu tìm thấy sản phẩm, thêm vào mảng gợi ý
                            if ($product) {
                                $recommendedProducts[$product->id] = $product;
                            }
                        }
                    }
                }
            }
        }


        return view('front.shop.cart', compact('carts', 'total', 'subtotal', 'recommendedProducts'));
    }

    public function add(Request $request)
    {
        if($request->ajax()){
            $product = $this->productService->find($request->productId);

            $response['cart'] = Cart::add([
                'id'=> $product->id,
                'name'=>$product->name,
                'qty'=>1,
                'price'=>$product->discount ?? $product->price,
                'weight'=>$product-> weight ?? 0,
                'options'=> [
                    'images'=>$product->productImages,
                ],
            ]);
            $response['count']= Cart::count();
            $response['total']= Cart::total();

            return $response;
        }


        return back();
    }

    public function delete(Request $request)
    {
        if($request->ajax()){
            $response['cart'] = Cart::remove($request->rowId);
            $response['count'] = Cart::count();
            $response['total'] = Cart::total();
            $response['subtotal'] = Cart::subtotal();

            return $response;
        }
        return back();
    }

    public function destroy(){
        Cart::destroy();
    }
    public function update(Request $request)
    {
        if($request->ajax()){
            $response['cart'] = Cart::update($request->rowId, $request->qty);

            $response['count'] = Cart::count();
            $response['total'] = Cart::total();
            $response['subtotal'] = Cart::subtotal();

            return $response;

        }
    }

}
