<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('Image/logo.png')}}" />
    <link rel="stylesheet" href="{{ asset('CSS/homepageadmin.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="sidebar">
        <div class="user">
            <img src="{{asset('Image/logo.png')}}" alt="logo">
            <span class="username">NAHINN</span>
        </div>
        <nav role='navigation'>
            <ul>
            <li><a href="{{route('admin.homepage')}}">HOMEPAGE</a></li>
                <li><a href="{{route('admin.category')}}">CATEGORY</a></li>
                <li><a href="{{ route('admin.product') }}">PRODUCT</a></li>
                <li><a href="{{route('admin.order')}}">ORDER</a></li>
                <li><a href="{{route('admin.account_customer')}}">ACCOUNT CUSTOMER</a></li>
                <li><a href="#">REPORT</a></li>
                <li><a href="#">STATISTIC</a></li>
            </ul>
        </nav>
    </div>

    <!-- MAIN -->
    <div class="main">
        <header>
            <!-- HEADER BOTTOM -->
            <div class="bottom">
                <!-- identity -->
                <div class="identity">
                    <img src="{{asset('Image/logo.png')}}" alt="logo">
                    <span class="name">NAHINN</span> <br />
                </div>
                <!-- actions -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout →</button>
                </form>
            </div>
        </header>

        <!-- PAGE -->
        <div class="page group">
            <div class="section">
                <div class="col span_2">
                    <div>
                        <a href="{{ route('account_customer.create') }}" class="btn btn-primary">Add Account Customer</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th style="width: 5%;">STT</th> 
                                <th style="width: 20%;">CustomerName</th>
                                <th style="width: 20%;">Email</th>
                                <th style="width: 10%;">Address</th>
                                <th style="width: 10%;">Phone</th>
                                <th style="width: 10%;">Image</th>
                                <th style="width: 10%;">Update</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $customer)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $customer->firstname}} {{ $customer->middlename}} {{ $customer->lastname}}</td>
                                    <td>{{ $customer->email}}</td>
                                    <td>{{ $customer->address}}</td>
                                    <td>{{ $customer->phone}}</td>
                                    <td><img src="{{asset('storage/' . $customer->img)}}" alt="{{ $customer->firstname}} {{ $customer->middlename}} {{ $customer->lastname}}" width="100px"></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Actions">
                                        <form method="GET" action="{{ route('account_customer.edit', ['id' => $customer->customer_id]) }}">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">
                                                    Sửa
                                                </button>
                                            </form>
                                            <form method="POST" action="{{ route('account_customer.destroy', ['id' => $customer->customer_id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    Xóa
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-xs-6">
                    <img class="footer__img" width="100px" src="{{asset('/Image/logo.png')}}">
                    <h1 class="footer__title">Nahinn<span class="footer__light">.com</span></h1>
                </div>
            </div>
        </div>
    </footer>
</body>


</html>