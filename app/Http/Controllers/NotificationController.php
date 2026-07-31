<?php

namespace App\Http\Controllers;
use App\Models\Notification;
use App\Http\Requests\StoreNotificationRequest;
use App\Http\Requests\UpdateNotificationRequest;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //Lấy dữ liệu mới nhất lên trước
        //get() thực hiện truy vấn và lấy tất cả dữ liệu
        $notifications = Notification::latest()->get();

        //Request (yêu cầu) gửi lên có mong muốn nhận dữ liệu JSON hay không?
        if ($request->expectsJson()) {
            return response()->json($notifications);
        }

        return view('admin.notifications.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNotificationRequest $request)
    {
       

        $notification = Notification::create([
            'user_id' => null,
            'title' => $request->title,
            'message' => $request->message,
            'url' => $request->url,
            'icon' => $request->icon,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Thêm thành công.',
            'data' => $notification
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Notification $notification)
    {
        return response()->json($notification);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNotificationRequest $request, Notification $notification)
    {
        $notification->update([
            'title' => $request->title,
            'message' => $request->message,
            'url' => $request->url,
            'icon' => $request->icon,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Cập nhật thành công.',
            'data' => $notification
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notification $notification)
    {
        $notification->delete();

        return response()->json([
            'success' => true,
            'message' => 'Đã xóa.'
        ]);
    }
}
