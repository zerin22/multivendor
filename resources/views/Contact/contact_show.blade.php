@extends('layouts.backend.backend_master')
@section('title', 'Single Messsage')
@section('contact', 'active')

@section('content')

    <div class="row">
        <div class="col-9 m-auto">
            <div class="content-header">
                <h2 class="content-title">Message Show</h2>
            </div>
        </div>

        <div class="col-9 m-auto">
            <div class="card">
                <div class="card-body">
                    <div class="row gx-5">
                        <div class="col-lg-9">
                            <section class="content-body p-xl-4">
                                    <div class="row mb-4 ">
                                        <label class="col-lg-3 col-form-label">Name</label>
                                        <div class="col-lg-9 position-relative">
                                            <input type="text" name="name" class="form-control" value="{{ $contact->name }}" readonly />
                                        </div>
                                    </div>

                                    <div class="row mb-4 ">
                                        <label class="col-lg-3 col-form-label">Email</label>
                                        <div class="col-lg-9 position-relative">
                                            <input type="text" name="email" class="form-control" value="{{ $contact->email }}" readonly />
                                        </div>
                                    </div>

                                    <div class="row mb-4 ">
                                        <label class="col-lg-3 col-form-label">Message</label>
                                        <div class="col-lg-9 position-relative">
                                            <input type="text" name="message" class="form-control" value="{{ $contact->message }}" readonly />
                                        </div>
                                    </div>
                                    <br />
                                    <br />
                                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal__{{ $contact->id }}">Delete</a>

                                    @push('modal')
                                    <div class="modal fade" id="exampleModal__{{ $contact->id }}" tabindex="-1" aria-labelledby="exampleModal__{{ $contact->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-center" >
                                                    <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 24 24"><path fill="#f07f8f" d="M20.05713,22H3.94287A3.02288,3.02288,0,0,1,1.3252,17.46631L9.38232,3.51123a3.02272,3.02272,0,0,1,5.23536,0L22.6748,17.46631A3.02288,3.02288,0,0,1,20.05713,22Z"/><circle cx="12" cy="17" r="1" fill="#e62a45"/><path fill="#e62a45" d="M12,14a1,1,0,0,1-1-1V9a1,1,0,0,1,2,0v4A1,1,0,0,1,12,14Z"/></svg></span>
                                                    <h4 class="h4 mb-0 mt-3" style="color: red">Warning</h4>
                                                    <p class="card-text">Are you sure you want to delete data?</p>
                                                    <strong class="card-text" style="color: red">Once deleted, you will not be able to recover this data!</strong>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <form action="{{ route('contact.destroy', $contact->id) }}" method="POST" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endpush
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
