<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class ChatboxController extends Controller
{
    /**
     * Xử lý câu hỏi từ người dùng và gửi đến Python Flask API
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function askQuestion(Request $request)
    {
        // Kiểm tra và xác thực request
        if (!$request->ajax()) {
            return back();
        }

        // Xác thực đầu vào
        $validated = $request->validate([
            'question' => 'required|string|max:1000',
        ]);

        // Lấy câu hỏi đã được xác thực
        $userQuery = $validated['question'];

        try {
            // Khởi tạo Guzzle client với timeout để tránh treo quá lâu
            $client = new Client([
                'timeout' => 10.0, // 10 giây timeout
            ]);

            // Gửi câu hỏi đến backend Python (Flask API)
            $response = $client->post('http://127.0.0.1:5000/ask', [
                'json' => ['question' => $userQuery],
                'headers' => [
                    'Accept' => 'application/json',
                ],
            ]);

            // Lấy kết quả trả về từ Python backend (Flask API)
            $result = json_decode($response->getBody()->getContents(), true);

            // Kiểm tra nếu có câu trả lời từ Flask, trả về cho frontend
            if (isset($result['answer'])) {
                return response()->json(['answer' => $result['answer']]);
            } else {
                return response()->json(['answer' => 'Xin lỗi, tôi không tìm thấy câu trả lời phù hợp.']);
            }
        } catch (ConnectException $e) {
            // Lỗi kết nối đến Python API
            Log::error('Không thể kết nối đến Python API: ' . $e->getMessage());
            return response()->json([
                'answer' => 'Xin lỗi, hiện tại không thể kết nối đến hệ thống xử lý. Vui lòng thử lại sau.'
            ], 503);
        } catch (RequestException $e) {
            // Lỗi yêu cầu HTTP
            Log::error('Lỗi khi gửi yêu cầu đến Python API: ' . $e->getMessage());
            return response()->json([
                'answer' => 'Đã xảy ra lỗi khi xử lý yêu cầu của bạn. Vui lòng thử lại sau.'
            ], 500);
        } catch (\Exception $e) {
            // Lỗi khác
            Log::error('Lỗi không xác định trong ChatboxController: ' . $e->getMessage());
            return response()->json([
                'answer' => 'Đã xảy ra lỗi hệ thống. Vui lòng thử lại sau.'
            ], 500);
        }
    }
    /**
     * Lấy thông tin người dùng hiện tại cho việc theo dõi chat
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCurrentUser()
    {
        if (Auth::check()) {
            return response()->json([
                'isLoggedIn' => true,
                'userId' => Auth::id()
            ]);
        }

        return response()->json([
            'isLoggedIn' => false,
            'userId' => null
        ]);
    }
}
