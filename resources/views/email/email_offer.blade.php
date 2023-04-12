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
                            @include('email.loadmore_email_offer')


                        {{ Session::get('lastUserId') }}

                    </tbody>
                </table>

                <div class="text-center">
                    <button data-id="{{ Session::get('lastUserId') }}" class="btn btn-md rounded font-sm loadMoreButton">
                    Load More {{ Session::get('lastUserId') }}
                    </button>
                </div>

            </div>
            @else
                <div class="alert alert-warning"> You Are Not Allowed</div>
            @endif
        </div>
    </div>
@endsection

@section('script')

<script>
    $(document).ready(function () {

        $('.loadMoreButton').click(function () {
            let id = $(this).attr('data-id');
            alert(id);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('email.offer.loadmore') }}",
                type: "post",
                data:{
                    id:id,
                },
                success: function(data)
                {
                    // console.log('datata', data.data)

                    $('#table-data').append(data.data);
                    $('.loadMoreButton'+id).remove();
                }
            })
        });

          // var value = 0;

        // function loadById(dataId){

        //     let data_id = parseInt(dataId);

        //     // let valueId= parseInt(value+5);

        //     let id = data_id-5;

        //     console.log(id);
        //     $.ajax({
        //         url: "/email/offer/loadmore/"+id,
        //         type: "get",
        //         data:{
        //             id:id,
        //         },
        //         success: function(data)
        //         {
        //             console.log('datata', data.data)

        //             $('#table-data').append(data.data);
        //         }
        //     })

        // }

    });
</script>


@endsection
