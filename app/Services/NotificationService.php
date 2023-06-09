<?php

namespace App\Services;

use App\Models\Admin;
use App\Models\Notification;
use App\Models\PushNotification;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;


class NotificationService
{



    protected $notification;
    public function __construct(Notification $notification)
    {

        $this->notification = $notification;
    }

    public function getAll(Request $request)
    {

        $deleted = isset($request->deleted) && $request->deleted == 0 ? 1 : null;
        $limit = isset($request->limit) && filter_var($request->limit, FILTER_VALIDATE_INT) ? $request->limit : 5;
        $order = isset($request->order) && $request->order == 'ASC' ? 'ASC' : 'DESC';
        $data = $this->notification::whereNull('order_id')->where(function ($query) use ($request) {
            return $query->when(
                $request->search,
                function ($q) use ($request) {
                    return $q->where('title_ar', 'like', '%' . $request->search . '%')
                        ->orWhere('title_en', 'like', '%' . $request->search . '%')
                        ->orWhere('desc_en', 'like', '%' . $request->search . '%')
                        ->orWhere('desc_ar', 'like', '%' . $request->search . '%');
                }
            );
        })

            ->when($deleted, function ($q) use ($deleted) {
                return $q->onlyTrashed();
            })
            ->when($request->from, function ($q) use ($request) {
                return $q->whereDate('created_at', '>=', $request->from);
            })
            ->when($request->to, function ($q) use ($request) {
                return $q->whereDate('created_at', '<=', $request->to);
            })



            ->orderBy('created_at', $order)
            ->paginate($limit)
            ->withQueryString();


        return $data;
    }

    public function getAllAdmin(Request $request, $useradmin)
    {

        $deleted = isset($request->deleted) && $request->deleted == 0 ? 1 : null;
        $limit = isset($request->limit) && filter_var($request->limit, FILTER_VALIDATE_INT) ? $request->limit : 5;
        $order = isset($request->order) && $request->order == 'ASC' ? 'ASC' : 'DESC';
        $data = $this->notification::where('vendor_id', $useradmin->id)->whereNull('order_id')->where(function ($query) use ($request) {
            return $query->when(
                $request->search,
                function ($q) use ($request) {
                    return $q->where('title_ar', 'like', '%' . $request->search . '%')
                        ->orWhere('title_en', 'like', '%' . $request->search . '%')
                        ->orWhere('desc_en', 'like', '%' . $request->search . '%')
                        ->orWhere('desc_ar', 'like', '%' . $request->search . '%');
                }
            );
        })

            ->when($deleted, function ($q) use ($deleted) {
                return $q->onlyTrashed();
            })
            ->when($request->from, function ($q) use ($request) {
                return $q->whereDate('created_at', '>=', $request->from);
            })
            ->when($request->to, function ($q) use ($request) {
                return $q->whereDate('created_at', '<=', $request->to);
            })



            ->orderBy('created_at', $order)
            ->paginate($limit)
            ->withQueryString();


        return $data;
    }

    public function store(Request $request)
    {
        $notification_type = "";
        $sent_from = "" ;

        $request['admin_id'] = Auth::guard('admin')->id();
        if (Auth::guard('admin')->user()->vendor) {
            $request['admin_id'] = Auth::guard('admin')->user()->vendor->id;
        }

        if (Auth::guard('admin')->user()->vendor) {
            $sent_from = Auth::guard('admin')->user()->vendor->title_en;
        }else{
            $sent_from = "Events" ;
        }

        // set type of notification
        if ($request->user_type == 0) {
            $notification_type = "One user or many users";
        } elseif ($request->user_type == 1) {
            $notification_type = "All men";
        } elseif ($request->user_type == 2) {
            $notification_type = "All Women";
        } elseif ($request->user_type == 3) {
            $notification_type = "All users";
        } elseif ($request->user_type == 4) {
            $notification_type = "One vendor or many vendor";
        } elseif ($request->user_type == 5) {
            $notification_type = "All vendors";
        }
        // "0"  ==> One user or many users
        // "1" ==> All men
        // "2" ==> All Women
        // "3" ==> All users
        // "4" ==> One vendor or many vendor

        if ($request->user_type == 0) {
            for ($i = 0; $i < count($request->user_id); $i++) {
                $notification = Notification::create([
                    'user_id' => $request->user_id[$i],
                    'title_en' => $request->title_en,
                    'title_ar' => $request->title_ar,
                    'desc_en' => $request->desc_en,
                    'desc_ar' => $request->desc_ar,
                    'admin_id' => $request->admin_id,
                    "send_from" => $sent_from ,
                    'type' => $notification_type,
                ]);
                //   $user = User::where('id', $request->user_id[$i])->first();
                // PushNotification::fire($user->fcm-token, $notification->title_en, $notification->desc_en, null, null);
            }
        } elseif ($request->user_type == 1) {
            User::where('gender', 'male')->chunk(50, function ($users) use ($request) {
                foreach ($users as $user) {
                    $notification = Notification::create([
                        'user_id' => $user->id,
                        'title_en' => $request->title_en,
                        'title_ar' => $request->title_ar,
                        'desc_en' => $request->desc_en,
                        'desc_ar' => $request->desc_ar,
                        'admin_id' => $request->admin_id,
                        "send_from" => $sent_from ,
                        'type' => $notification_type,
                    ]);
                    //  PushNotification::fire($user->fcm-token, $notification->title_en, $notification->desc_en, null, null);
                }
            });
        } elseif ($request->user_type == 2) {
            User::where('gender', 'female')->chunk(50, function ($users) use ($request) {
                foreach ($users as $user) {
                    $notification = Notification::create([
                        'user_id' => $user->id,
                        'title_en' => $request->title_en,
                        'title_ar' => $request->title_ar,
                        'desc_en' => $request->desc_en,
                        'desc_ar' => $request->desc_ar,
                        'admin_id' => $request->admin_id,
                        "send_from" => $sent_from ,
                        'type' => $notification_type,
                    ]);
                    // PushNotification::fire($user->fcm-token, $notification->title_en, $notification->desc_en, null, null);
                }
            });
        } elseif ($request->user_type == 3) {
            User::chunk(50, function ($users) use ($request ,  $sent_from , $notification_type) {
                foreach ($users as $user) {
                    $notification = Notification::create([
                        'user_id' => $user->id,
                        'title_en' => $request->title_en,
                        'title_ar' => $request->title_ar,
                        'desc_en' => $request->desc_en,
                        'desc_ar' => $request->desc_ar,
                        'admin_id' => $request->admin_id,
                        "send_from" => $sent_from ,
                        'type' => $notification_type,
                    ]);
                    //  PushNotification::fire($user->fcm-token, $notification->title_en, $notification->desc_en, null, null);
                }
            });
        } elseif ($request->user_type == 4) {
            for ($i = 0; $i < count($request->vendor_id); $i++) {

                $vendor_admin = Admin::where("id", $request->vendor_id[0])->first();
                $vendor = Vendor::where("id", $vendor_admin->vendor_id)->first();

                $notification = Notification::create([
                    'vendor_id' => $vendor->id,
                    'title_en' => $request->title_en,
                    'title_ar' => $request->title_ar,
                    'desc_en' => $request->desc_en,
                    'desc_ar' => $request->desc_ar,
                    'admin_id' => $request->admin_id,
                    "send_from" => $sent_from ,
                    'type' => $notification_type,
                ]);
                //   $user = User::where('id', $request->user_id[$i])->first();
                // PushNotification::fire($user->fcm-token, $notification->title_en, $notification->desc_en, null, null);
            }
        }

        return true;
    }




    public function getById(int $id)
    {
        return $this->notification::withTrashed()->find($id);
    }
}
