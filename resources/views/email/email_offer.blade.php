@extends('layouts.backend.backend_master')
@section('title', 'Email Send')
@section('email-offer','active')
@section('content')
    <div class="content-header">
        <h2 class="content-title">Customer</h2>
        <form action="{{ route('multi_email_offer') }}" method="POST">
            @csrf
            <div>
                <a href="{{ route('vendor.create') }}" class="btn btn-primary"><i class="material-icons md-plus"></i>Send All</a>
            </div>
        </form>
    </div>

    <div class="card">
        <div class="card-header">
            <h3>Customers</h3>
        </div>

        <div class="card-body">
            <div class="table-responsive">
            @if (Auth::user()->role == 2)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Check</th>
                            <th scope="col">#</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Customer Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="table-data">
                        @csrf
                            @include('email.loadmore_email_offer')

                {{-- <div class="ajax-load text-center" >
                    <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                        <path fill="#000"
                            d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                            <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s"
                                from="0 50 50" to="360 50 50" repeatCount="indefinite" />
                        </path>
                    </svg>
                </div> --}}
            </div>
            @else
                <div class="alert alert-warning"> You Are Not Allowed</div>
            @endif
        </div>
    </div>
@endsection

@section('script')
<script type="text/javascript">
    var token = $('input[name= "_token"]').val();
    // alert(token);
    load_more('', token);
    function load_more(id='', token){

        $.ajax({
            url: '{{ route('email_offer_loadmore') }}',
            type: "post",
            data: {
                id:id,
                _token:token
            },
            success: function(data){
                // $('#loadMoreButton').remove();
                $('#table-data').append(data);
            }
        })


        $('#loadMoreButton').click(function () {
            var id = $(this).data(id);

            alert(id);

            $('#loadMoreButton').html("Loading....");
            load_more(id, token);

        })
    }
</script>
@endsection





{{-- @section('script')
<script type="text/javascript">
$(document).ready(function () {
    var page = 1;
    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() >= $(document).height()) {
            page++;
            loadMoreData(page);
            let count = $('#table-data').attr('data-count');
                alert(count)
        }
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function loadMoreData(page){
        $.ajax(
        {

            // url: 'admin/email_offer' + page,
            url: '{{ route('email_offer_loadmore') }}',
            type: "get",
            data: {
                count:count ,
            }
            beforeSend: function()
            {
                $('.ajax-load').show();
            }
        })
        .done(function(data)
        {
            console.log(data);
            if(data.data == " "){
                $('.ajax-load').html("No more records found");
                return;
            }
            $('#table-data').attr('data-count', data.count);
            $('.ajax-load').hide();
            $("#table-data").append(data.data);
        })
        // .fail(function(jqXHR, ajaxOptions, thrownError)
        // {
        //       alert('server not responding...');
        // });
    }
})
</script>
@endsection --}}
