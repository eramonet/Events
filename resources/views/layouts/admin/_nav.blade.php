@php
    $useradmin = App\Models\Admin::where('id', Auth::guard('admin')->id())->first();
    $getProducts = App\Models\Product::where('admin_id', $useradmin->id)->pluck('id');
    $getOrdersProducts = App\Models\OrderProduct::whereIn('product_id', $getProducts)->pluck('order_id');
    $vendor = App\Models\Vendor::where('id', $useradmin->vendor_id)->first();
@endphp
<nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
    <div class="container-fluid px-0">
        <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
            <div class="d-flex align-items-center">


                <button id="sidebar-toggle"
                    class="sidebar-toggle me-3 btn btn-icon-only d-none d-lg-inline-block align-items-center justify-content-center"><svg
                        class="toggle-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg></button>



            </div>
            <!-- Navbar links -->
            <ul class="navbar-nav align-items-center">





                @if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin'))


                    <li class="nav-item dropdown">
                        <a class="nav-link text-dark notification-bell dropdown-toggle" data-unread-notifications="true"
                            href="#" role="button" data-bs-toggle="dropdown" data-bs-display="static"
                            aria-expanded="false">
                            <svg class="icon icon-sm text-gray-900" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z">
                                </path>
                            </svg>
                            <span
                                style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                {{ App\Models\Become_vendor::where('status', 'pending')->count() }}
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-center mt-2 py-0"
                            style="max-height: 400px;overflow:auto;">
                            <div class="list-group list-group-flush">
                                <a href="#"
                                    class="text-center text-primary fw-bold border-bottom border-light py-3">Become
                                    Vendors Requests</a>
                                @foreach (App\Models\Become_vendor::where('status', 'pending')->get() as $bNotification)
                                    <a href="{{ route('admin.become.show', $bNotification->id) }}"
                                        class="list-group-item list-group-item-action border-bottom">
                                        <div class="row align-items-center">

                                            <div class="col ps-0 ms-2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="h6 mb-0 text-small">{{ $bNotification->name }}</h4>
                                                    </div>
                                                    <div class="text-end">
                                                        <small
                                                            class="text-danger">{{ $bNotification->created_at }}</small>
                                                    </div>
                                                </div>
                                                <p class="font-small mt-1 mb-0">{{ $bNotification->coment }}</p>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach

                            </div>
                        </div>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link text-dark notification-bell dropdown-toggle" data-unread-notifications="true"
                            href="#" role="button" data-bs-toggle="dropdown" data-bs-display="static"
                            aria-expanded="false">
                            <svg class="icon icon-sm text-gray-900" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-chat-dots-fill" viewBox="0 0 16 16">
                                <path
                                    d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                            </svg>
                            <span
                                style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                {{ App\Models\ContactMessage::where('seen', '0')->count() }}
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-center mt-2 py-0"
                            style="max-height: 400px;overflow:auto;">
                            <div class="list-group list-group-flush">
                                <a href="#"
                                    class="text-center text-primary fw-bold border-bottom border-light py-3">Contacts
                                    Messages</a>
                                @foreach (App\Models\ContactMessage::where('seen', '0')->get() as $cNotification)
                                    <a href="{{ route('admin.contact-messages.show', $cNotification->id) }}"
                                        class="list-group-item list-group-item-action border-bottom">
                                        <div class="row align-items-center">
                                            <div class="col ps-0 ms-2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="h6 mb-0 text-small">{{ $cNotification->name }}</h4>
                                                    </div>
                                                    <div class="text-end">
                                                        <small
                                                            class="text-danger">{{ $cNotification->created_at }}</small>
                                                    </div>
                                                </div>
                                                <p class="font-small mt-1 mb-0">{{ $cNotification->message }}</p>
                                            </div>

                                        </div>

                                    </a>
                                @endforeach

                            </div>
                        </div>
                    </li>

                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link text-dark notification-bell dropdown-toggle" data-unread-notifications="true"
                            href="#" role="button" data-bs-toggle="dropdown" data-bs-display="static"
                            aria-expanded="false">
                            <svg class="icon icon-sm text-gray-900" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-chat-dots-fill" viewBox="0 0 16 16">
                                <path
                                    d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                            </svg>
                            <span
                                style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                {{ App\Models\Inquery::where('status', '0')->count() }}
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-center mt-2 py-0"
                            style="max-height: 400px;overflow:auto;">
                            <div class="list-group list-group-flush">
                                <a href="#"
                                    class="text-center text-primary fw-bold border-bottom border-light py-3">Queries
                                    Messages</a>
                                @foreach (App\Models\Inquery::where('status', '0')->get() as $iNotification)
                                    <a href="#" class="list-group-item list-group-item-action border-bottom">
                                        <div class="row align-items-center">
                                            <div class="col ps-0 ms-2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="h6 mb-0 text-small">{{ $iNotification->name }}</h4>
                                                    </div>
                                                    <div class="text-end">
                                                        <small
                                                            class="text-danger">{{ $iNotification->created_at }}</small>
                                                    </div>
                                                </div>
                                                <p class="font-small mt-1 mb-0">{{ $iNotification->message }}</p>
                                            </div>

                                        </div>

                                    </a>
                                @endforeach

                            </div>
                        </div>
                    </li> --}}





                    <li class="nav-item dropdown">
                        <a class="nav-link text-dark notification-bell dropdown-toggle" data-unread-notifications="true"
                            href="#" role="button" data-bs-toggle="dropdown" data-bs-display="static"
                            aria-expanded="false">

                            <i class="fa-sharp fa-solid fa-bag-shopping icon-xs me-2"
                                style="color:black;font-size:18px"></i>

                            <span
                                style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                {{ App\Models\Product::where('accept', 'new')->count() }}
                            </span>

                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-center mt-2 py-0"
                            style="max-height: 400px;overflow:auto;">
                            <div class="list-group list-group-flush">
                                <a href="#"
                                    class="text-center text-primary fw-bold border-bottom border-light py-3">New
                                    Products
                                    Requests</a>
                                @foreach (App\Models\Product::where('accept', 'new')->get() as $p)
                                    <a href="{{ route('admin.products.show', $p->id) }}"
                                        class="list-group-item list-group-item-action border-bottom">
                                        <div class="row align-items-center">

                                            <div class="col ps-0 ms-2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="h6 mb-0 text-small">{{ $p->title_en }}</h4>
                                                    </div>
                                                    <div class="text-end">
                                                        <small class="text-danger">{{ $p->created_at }}</small>
                                                    </div>
                                                </div>
                                                <p class="font-small mt-1 mb-0">{{ $p->description_en }}</p>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach


                            </div>
                        </div>
                    </li>



                    <li class="nav-item dropdown">
                        <a class="nav-link text-dark notification-bell dropdown-toggle"
                            data-unread-notifications="true" href="#" role="button" data-bs-toggle="dropdown"
                            data-bs-display="static" aria-expanded="false">

                            <i class="fa-sharp fa-solid fa-bag-shopping icon-xs me-2"
                                style="color:black;font-size:18px"></i>

                            <span
                                style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                {{ App\Models\Hall::where('accept', 'new')->count() }}
                            </span>

                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-center mt-2 py-0"
                            style="max-height: 400px;overflow:auto;">
                            <div class="list-group list-group-flush">
                                <a href="#"
                                    class="text-center text-primary fw-bold border-bottom border-light py-3">New Halls
                                    Requests</a>
                                @foreach (App\Models\Hall::where('accept', 'new')->get() as $h)
                                    <a href="{{ route('admin.halls.show', $h->id) }}"
                                        class="list-group-item list-group-item-action border-bottom">
                                        <div class="row align-items-center">

                                            <div class="col ps-0 ms-2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="h6 mb-0 text-small">{{ $h->title_en }}</h4>
                                                    </div>
                                                    <div class="text-end">
                                                        <small class="text-danger">{{ $h->created_at }}</small>
                                                    </div>
                                                </div>
                                                <p class="font-small mt-1 mb-0">{{ $h->description_en }}</p>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach


                            </div>
                        </div>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link text-dark notification-bell  dropdown-toggle"
                            data-unread-notifications="true" href="#" role="button" data-bs-toggle="dropdown"
                            data-bs-display="static" aria-expanded="false">

                            <i class="fa-solid fa-cart-arrow-down icon-xs me-2"
                                style="color:black;font-size:18px"></i>
                            <span
                                style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                {{ App\Models\Order::where('status', 'pending')->count() }}
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-center mt-2 py-0"
                            style="max-height: 400px;overflow:auto;">
                            <div class="list-group list-group-flush">
                                <a href="#"
                                    class="text-center text-primary fw-bold border-bottom border-light py-3">Orders
                                    Products
                                    Notification
                                </a>
                                @foreach (App\Models\Order::where('status', 'pending')->get() as $opNotification)
                                    <a href="{{ route('admin.orders.show', $opNotification->order_number) }}"
                                        class="list-group-item list-group-item-action border-bottom">
                                        <div class="row align-items-center">

                                            <div class="col ps-0 ms-2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="h6 mb-0 text-small">Name:
                                                            {{ $opNotification->customer_name }}</h4>
                                                    </div>
                                                    <div class="text-end">
                                                        <small
                                                            class="text-danger">{{ $opNotification->created_at }}</small>
                                                    </div>
                                                </div>
                                                <p class="font-small mt-1 mb-0">Email:
                                                    {{ $opNotification->customer_email }}
                                                    <br> Address: {{ $opNotification->customer_address }}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach

                            </div>
                        </div>
                    </li>



                    <li class="nav-item dropdown">
                        <a class="nav-link text-dark notification-bell  dropdown-toggle"
                            data-unread-notifications="true" href="#" role="button" data-bs-toggle="dropdown"
                            data-bs-display="static" aria-expanded="false">

                            <i class="fa-solid fa-cart-arrow-down icon-xs me-2"
                                style="color:black;font-size:18px"></i>
                            <span
                                style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                {{ App\Models\Hall_booking::where('status', 'pending')->count() }}
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-center mt-2 py-0"
                            style="max-height: 400px;overflow:auto;">
                            <div class="list-group list-group-flush">
                                <a href="#"
                                    class="text-center text-primary fw-bold border-bottom border-light py-3">Halls
                                    Bookings
                                    Notification
                                </a>
                                @foreach (App\Models\Hall_booking::where('status', 'pending')->get() as $hb)
                                    <a href="{{ route('admin.hall-booking.show', $hb->id) }}"
                                        class="list-group-item list-group-item-action border-bottom">
                                        <div class="row align-items-center">

                                            <div class="col ps-0 ms-2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="h6 mb-0 text-small">Name:
                                                            {{ $hb->user->name }}</h4>
                                                    </div>
                                                    <div class="text-end">
                                                        <small class="text-danger">{{ $hb->created_at }}</small>
                                                    </div>
                                                </div>
                                                <p class="font-small mt-1 mb-0">Email:
                                                    {{ $hb->user->email }}
                                                    <br> Phone: {{ $hb->user->phone }}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach

                            </div>
                        </div>
                    </li>

                    {{--  --}}
                @else
                    @if ($vendor->type == 'product' || $vendor->type == 'product_hall')
                        <li class="nav-item dropdown">
                            <a class="nav-link text-dark notification-bell dropdown-toggle"
                                data-unread-notifications="true" href="#" role="button"
                                data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">

                                <i class="fa-sharp fa-solid fa-bag-shopping icon-xs me-2"
                                    style="color:black;font-size:18px"></i>

                                <span
                                    style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                    {{ App\Models\Product::where('admin_id', $useradmin->id)->where('accept', 'accepted')->count() }}
                                </span>

                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-center mt-2 py-0"
                                style="max-height: 400px;overflow:auto;">
                                <div class="list-group list-group-flush">
                                    <a href="#"
                                        class="text-center text-primary fw-bold border-bottom border-light py-3">Accepted
                                        Products
                                        Requests</a>
                                    @foreach (App\Models\Product::where('admin_id', $useradmin->id)->where('accept', 'accepted')->get() as $p)
                                        <a href="{{ route('admin.products.show', $p->id) }}"
                                            class="list-group-item list-group-item-action border-bottom">
                                            <div class="row align-items-center">

                                                <div class="col ps-0 ms-2">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <h4 class="h6 mb-0 text-small">{{ $p->title_en }}</h4>
                                                        </div>
                                                        <div class="text-end">
                                                            <small class="text-danger">{{ $p->created_at }}</small>
                                                        </div>
                                                    </div>
                                                    <p class="font-small mt-1 mb-0">{{ $p->description_en }}</p>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach


                                </div>
                            </div>
                        </li>
                    @endif

                    @if ($vendor->type == 'hall' || $vendor->type == 'product_hall')

                        <li class="nav-item dropdown">
                            <a class="nav-link text-dark notification-bell dropdown-toggle"
                                data-unread-notifications="true" href="#" role="button"
                                data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">

                                <i class="fa-sharp fa-solid fa-bag-shopping icon-xs me-2"
                                    style="color:black;font-size:18px"></i>

                                <span
                                    style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                    {{ App\Models\Hall::where('admin_id', $useradmin->id)->where('accept', 'accepted')->count() }}
                                </span>

                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-center mt-2 py-0"
                                style="max-height: 400px;overflow:auto;">
                                <div class="list-group list-group-flush">
                                    <a href="#"
                                        class="text-center text-primary fw-bold border-bottom border-light py-3">Accepted
                                        Halls
                                        Requests</a>
                                    @foreach (App\Models\Hall::where('admin_id', $useradmin->id)->where('accept', 'accepted')->get() as $h)
                                        <a href="{{ route('admin.halls.show', $h->id) }}"
                                            class="list-group-item list-group-item-action border-bottom">
                                            <div class="row align-items-center">

                                                <div class="col ps-0 ms-2">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <h4 class="h6 mb-0 text-small">{{ $h->title_en }}</h4>
                                                        </div>
                                                        <div class="text-end">
                                                            <small class="text-danger">{{ $h->created_at }}</small>
                                                        </div>
                                                    </div>
                                                    <p class="font-small mt-1 mb-0">{{ $h->description_en }}</p>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach


                                </div>
                            </div>
                        </li>
                    @endif

                    @if ($vendor->type == 'product' || $vendor->type == 'product_hall')

                        <li class="nav-item dropdown">
                            <a class="nav-link text-dark notification-bell  dropdown-toggle"
                                data-unread-notifications="true" href="#" role="button"
                                data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">

                                <i class="fa-solid fa-cart-arrow-down icon-xs me-2"
                                    style="color:black;font-size:18px"></i>
                                <span
                                    style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                    {{ App\Models\Order::whereIn('id', $getOrdersProducts)->where('status', 'pending')->count() }}
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-center mt-2 py-0"
                                style="max-height: 400px;overflow:auto;">
                                <div class="list-group list-group-flush">
                                    <a href="#"
                                        class="text-center text-primary fw-bold border-bottom border-light py-3">Orders
                                        Products
                                        Notification
                                    </a>

                                    @foreach (App\Models\Order::whereIn('id', $getOrdersProducts)->where('status', 'pending')->get() as $opNotification)
                                        <a href="{{ route('admin.orders.show', $opNotification->order_number) }}"
                                            class="list-group-item list-group-item-action border-bottom">
                                            <div class="row align-items-center">

                                                <div class="col ps-0 ms-2">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <h4 class="h6 mb-0 text-small">Name:
                                                                {{ $opNotification->customer_name }}</h4>
                                                        </div>
                                                        <div class="text-end">
                                                            <small
                                                                class="text-danger">{{ $opNotification->created_at }}</small>
                                                        </div>
                                                    </div>
                                                    <p class="font-small mt-1 mb-0">Email:
                                                        {{ $opNotification->customer_email }}
                                                        <br> Address: {{ $opNotification->customer_address }}
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach

                                </div>
                            </div>
                        </li>

                    @endif
                    @if ($vendor->type == 'hall' || $vendor->type == 'product_hall')

                        <li class="nav-item dropdown">
                            <a class="nav-link text-dark notification-bell  dropdown-toggle"
                                data-unread-notifications="true" href="#" role="button"
                                data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">

                                <i class="fa-solid fa-cart-arrow-down icon-xs me-2"
                                    style="color:black;font-size:18px"></i>
                                <span
                                    style="border: 1px solid red ; padding: 0px 5px; border-radius: 50%; background-color: red">
                                    {{ App\Models\Hall_booking::where('vendor_id', $vendor->id)->where('status', 'pending')->count() }}
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-center mt-2 py-0"
                                style="max-height: 400px;overflow:auto;">
                                <div class="list-group list-group-flush">
                                    <a href="#"
                                        class="text-center text-primary fw-bold border-bottom border-light py-3">Halls
                                        Bookings
                                        Notification
                                    </a>
                                    @foreach (App\Models\Hall_booking::where('vendor_id', $vendor->id)->where('status', 'pending')->get() as $hb)
                                        <a href="{{ route('admin.orders.show', $opNotification->order_number) }}"
                                            class="list-group-item list-group-item-action border-bottom">
                                            <div class="row align-items-center">

                                                <div class="col ps-0 ms-2">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <h4 class="h6 mb-0 text-small">Name:
                                                                {{ $hb->user->name }}</h4>
                                                        </div>
                                                        <div class="text-end">
                                                            <small class="text-danger">{{ $hb->created_at }}</small>
                                                        </div>
                                                    </div>
                                                    <p class="font-small mt-1 mb-0">Email:
                                                        {{ $hb->user->email }}
                                                        <br> Phone: {{ $hb->user->phone }}
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach

                                </div>
                            </div>
                        </li>

                    @endif

                @endif


















                {{--  --}}

                <li class="nav-item dropdown ms-lg-3">

                    <a class="nav-link dropdown-toggle pt-1 px-0" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="media d-flex align-items-center">
                            <img class="avatar rounded-circle" alt="Image placeholder"
                                src="{{ Auth::guard('admin')->user()->image_url }}">
                            <div class="media-body ms-2 text-dark align-items-center d-none d-lg-block">
                                <span
                                    class="mb-0 font-small fw-bold text-gray-900">{{ Auth::guard('admin')->user()->name }}</span>
                            </div>
                        </div>
                    </a>

                    <div class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-1">
                        <a class="dropdown-item d-flex align-items-center"
                            href="{{ route('admin.system-admins.edit', Auth::guard('admin')->user()->id) }}">
                            <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            My Profile
                        </a>
                        {{-- <a class="dropdown-item d-flex align-items-center" href="#">
            <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg>
            Settings
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
            <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z" clip-rule="evenodd"></path></svg>
            Messages
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
            <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z" clip-rule="evenodd"></path></svg>
            Support
            </a> --}}
                        <div role="separator" class="dropdown-divider my-1"></div>


                        <form action="{{ route('admin.logout') }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="dropdown-item d-flex align-items-center" type="submit">
                                <svg class="dropdown-icon text-danger me-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                    </path>
                                </svg>
                                Logout
                            </button>
                        </form>

                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
