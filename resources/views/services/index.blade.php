@extends('layouts.admin')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Services</h2>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <a href="{{ route('services.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> New Service</a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">

                @if(session()->has('status'))
                    <div class="alert alert-success alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        {{ session('status') }}
                    </div>
                @endif

                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Services list </h5>
                    </div>
                    <div class="ibox-content">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Address</th>
                                <th>Acctions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($services as $service)
                                <tr>
                                    <td>
                                        {{ $service->title }}
                                    </td>
                                    <td>
                                        {{ $service->description }}
                                    </td>
                                    <td>
                                        {{ $service->address }}
                                    </td>
                                    <td>
                                        <a href="{{ route('services.edit', $service) }}" class="btn btn-xs btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-xs btn-danger deleteServiceBtn" title="Delete" data-id="{{ $service->id }}"><i class="fa fa-trash"></i></button>
                                        <form action="{{ route('services.destroy', $service) }}" id="deleteForm_{{ $service->id }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $services->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('.deleteServiceBtn').click(function(){
                if(confirm('Are you sure you want to eliminate the service?')) {
                    let id = $(this).data('id');
                    form = $("#deleteForm_" + id);
                    form.submit();
                }
                return false;
            });
        });
    </script>
@endsection