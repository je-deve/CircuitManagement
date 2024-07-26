@extends('layouts.main')

@section('content')
    <!-- top-area Start -->

    <section class="top-area">
        <div class="header-area">
            <!-- Content for header-area -->
        </div><!--/.header-area-->
        <div class="clearfix"></div>
    </section><!-- /.top-area-->
    <!-- top-area End -->

    <!-- welcome-hero start -->
    <section id="home" class="welcome-hero">
        <div class="container">
            <div class="welcome-hero-txt">

            </div>
        </div>
    </section><!--/.welcome-hero-->
    <!-- welcome-hero end -->

    <!-- list-topics start -->
    <section id="list-topics" class="list-topics">
        <div class="container">
            <div class="list-topics-content">
                <ul>
                    <li>
                        <div class="single-list-topics-content">
                            <div class="single-list-topics-icon">
                                <i class="flaticon-restaurant"></i>
                            </div>
                            <h2><a href="{{ route('circuits.index') }}">CIRCUIT</a></h2>
                            <p>Circuit Manager</p>
                        </div>
                    </li>
                    <li>
                        <div class="single-list-topics-content">
                            <div class="single-list-topics-icon">
                                <i class="flaticon-travel"></i>
                            </div>
                            <h2><a href="{{ route('events.index') }}">EVENTS</a></h2>
                            <p>Events List</p>
                        </div>
                    </li>
                    <li>
                        <div class="single-list-topics-content">
                            <div class="single-list-topics-icon">
                                <i class="flaticon-building"></i>
                            </div>
                            <h2><a href="#">Setting</a></h2>
                            <p>185 listings</p>
                        </div>
                    </li>
                    <li>
                        <div class="single-list-topics-content">
                            <div class="single-list-topics-icon">
                                <i class="flaticon-pills"></i>
                            </div>
                            <h2><a href="">Dashboard</a></h2>
                            <p>200 listings</p>
                        </div>
                    </li>
                    <li>
                        <div class="single-list-topics-content">
                            <div class="single-list-topics-icon">
                                <i class="flaticon-transport"></i>
                            </div>
                            <h2><a href="#">Automotion</a></h2>
                            <p>120 listings</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div><!--/.container-->
    </section><!--/.list-topics-->
    <!-- list-topics end -->

    <style>
        /* إضافة CSS لتوسيط البطاقات */
        .list-topics-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: center; /* توسيط البطاقات أفقيًا */
            gap: 20px; /* المسافة بين البطاقات */
        }

        .single-list-topics-content {
            text-align: center; /* توسيط النص داخل البطاقة */
            width: 200px; /* تحديد عرض ثابت للبطاقات */
        }

        .single-list-topics-icon {
            font-size: 2rem; /* حجم الأيقونات */
            margin-bottom: 10px; /* المسافة بين الأيقونة والعنوان */
        }
    </style>
@endsection
