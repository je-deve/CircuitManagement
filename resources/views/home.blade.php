<style>
    .centered-image {
        display: flex;
        justify-content: center;
        margin: 5% 0 10% 0;
    }
    .card {
        text-align: center;
        border-width: thin;
        border-radius: 7px;
        padding: 10% 0%;
    }
    i{
        margin-bottom: 5%;
    }

    .card:hover{
        box-shadow: 0px 10px 15px 0px rgba(0, 0, 0, 0.25);
    }

</style>
<x-app-layout>
    <div class="container-fluid">
        <div class="centered-image">
            <img src="https://www.dartec.com.sa/wp-content/uploads/2020/07/saudi-vision-2030-seeklogo.com_-1-600x401_d3772ecb98104cf730cd7404c206a8c4-min-min.png" width="20%" alt="2030 saudi vision">
        </div>
        <div class="row justify-content-around bg-white columns-4 mb-0 p-8">
            <div>
                <div class="card">
                    <a href="{{ route('circuits.index') }}">
                        <div class="card-body">
                            <i class="fas fa-tower-broadcast fa-2x"></i>
                            <p>Circuits</p>
                        </div>
                    </a>
                </div>
            </div>
            <div>
                <div class="card">
                    <a href="#">
                        <div class="card-body">
                            <i class="fas fa-users fa-2x"></i>
                            <p>Users</p>
                        </div>
                    </a>
                </div>
            </div>
            <div>
                <div class="card">
                    <a href="{{ route('events.index') }}">
                        <div class="card-body">
                            <i class="fas fa-circle-exclamation fa-2x"></i>
                            <p>Events</p>
                        </div>
                    </a>
                </div>
            </div>
            <div>
                <div class="card">
                    <a href="#">
                        <div class="card-body">
                            <i class="fas fa-chart-line fa-2x"></i>
                            <p>Dashboard</p>
                        </div>
                    </a>
                </div>
            </div>

        </div>

        <!--<div class="container row justify-content-center">
        <div class="centered-image">
            <img src="https://www.dartec.com.sa/wp-content/uploads/2020/07/saudi-vision-2030-seeklogo.com_-1-600x401_d3772ecb98104cf730cd7404c206a8c4-min-min.png" width="20%" alt="2030 saudi vision">
        </div>
        <div class="row justify-content-center bg-white">
            <div class="col-md-2">
                <div class="card">
                    <a href="{{ route('circuits.index') }}">
                        <div class="card-body">
                            <i class="fas fa-tower-broadcast fa-2x"></i>
                            <p>Circuits</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <a href="#">
                        <div class="card-body">
                            <i class="fas fa-users fa-2x"></i>
                            <p>Users</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <a href="{{ route('events.index') }}">
                        <div class="card-body">
                            <i class="fas fa-circle-exclamation fa-2x"></i>
                            <p>Events</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <a href="#">
                        <div class="card-body">
                            <i class="fas fa-chart-line fa-2x"></i>
                            <p>Dashboard</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row justify-content-around">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
            <div class="alert alert-success" role="alert">
{{ session('status') }}
            </div>
@endif

        {{ __('You are logged in!') }}
        </div>
    </div>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>-->
    </div>
</x-app-layout>
