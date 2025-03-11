<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Order\OrderServiceInterface;
use App\Services\OrderDetail\OrderDetailServiceInterface;
use App\Utilities\Constant;
use App\Utilities\VNPay;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckOutController extends Controller
{
    private $orderService;
    private $orderDetailService;
    public function __construct(OrderServiceInterface $orderService,
                                OrderDetailServiceInterface $orderDetailService)
    {
        $this->orderService = $orderService;
        $this->orderDetailService = $orderDetailService;

    }

    public function index(){
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();
        return view('front.checkout.index', compact('carts', 'total', 'subtotal'));
    }

    public function addOrder(Request $request)
    {
        //1. thêm đơn hàng
        $data = $request->all();
        $data['status'] = Constant::order_status_ReceiveOrder;
        $order = $this->orderService->create($data);

        //2. thêm chi tiết đơn hàng
        $carts = Cart::content();
        foreach ($carts as $cart) {
            $data = [
                'order_id' => $order->id,
                'product_id' => $cart->id,
                'qty' => $cart->qty,
                'amount' => $cart->price,
                'total' => $cart->qty * $cart->price,
            ];
            $this->orderDetailService->create($data);
        }

        if ($request->payment_type == 'pay_later') {

            //Gửi email:
            $total = Cart::total();
            $subtotal = Cart::subtotal();
            $this->sendEmail($order, $total, $subtotal); //Gọi hàm gửi email đã định nghĩa

            //3. xóa giỏ hàng
            Cart::destroy();

            //4. trả về kết quả thông báo
            return redirect('checkout/result')
                ->with('notification', 'Success! You will pay on delivery. Please check your email.');
        }

        if($request->payment_type == 'online_payment'){
            //1. Lấy Url thanh toán  VNPAY
            $data_url= VNPay::vnpay_create_payment([
                'vnp_TxnRef'=> $order->id, //ID đơn  hàng.
                'vnp_OrderInfo'=> 'Mô tả đơn hàng ở đây...', //mô tả đơn hàng
                'vnp_Amount' => Cart::total(0, '', '') *25424, //tổng giá của đơn hàng. Nhân với tỉ giá để chuyển sang tiền việt
            ]);

            //2. Chuyển hướng tới URL lấy đc:
            return redirect()->to($data_url);
        }

    }

    public function vnPayCheck(Request $request){
        //1. Lấy data từ URL (do VNPay gửi về qua $vnp_returnurl)
        $vnp_ResponseCode = $request->get('vnp_ResponseCode'); //mã phản hồi kết quả thanh toán. 00= thành công
        $vnp_TxnRef = $request->get('vnp_TxnRef'); //order_id
        $vnp_Amount = $request->get('vnp_Amount'); // số tiền thanh toán

        //2. kiểm tra data, xem kết quả giao dịch trả về từ VNPay hợp  lệ không

        if($vnp_ResponseCode != null){
            //Nếu thành công:
            if($vnp_ResponseCode == '00'){

                // Cập nhật trạng thái order
                $this->orderService->update(['status'=> Constant::order_status_Paid], $vnp_TxnRef);
                //Gửi email:
                $order = $this->orderService->find($vnp_TxnRef);//$vnp_TxnRef chính là order_id
                $total = Cart::total();
                $subtotal = Cart::subtotal();
                $this->sendEmail($order, $total, $subtotal); //Gọi hàm gửi email đã định nghĩa

                //xóa giỏ hàng
                Cart::destroy();
                //thông  báo kết quả.
                return redirect('checkout/result')
                    ->with('notification', 'Success! Has paid online. Please check your email.');
            }else{ //nếu không  thành công
                //xóa đơn hàng đã thêm vào database
                $this->orderService->delete($vnp_TxnRef);

                //thông báo lỗi
                return  redirect('checkout/result')
                    ->with('notification', 'Error: Payment failed or cancelled.');
            }
        }

    }

    public function result(){

        $notification = session('notification');
        return view('front.checkout.result', compact('notification'));
    }

    private function sendEmail($order, $total, $subtotal)
    {
        $email_to = $order->email;
        Mail::send('front.checkout.email',
            compact('order', 'total', 'subtotal'),
            function ($message) use ($email_to) {
            $message->from('shopalot@gmail.com', 'Shopalot eshop');
            $message->to($email_to, $email_to);
            $message-> subject('Order Notification');
            })
            ;

    }
}
