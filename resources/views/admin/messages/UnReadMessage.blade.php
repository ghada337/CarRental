@extends("Admin.Layout.pages")

@section("content")
<div class="x_content">
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Show</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $messages as $message )
                        <tr style="font-weight: bold">
                            <td>{{$message->firstname}} {{$message->lastname}}</td>
                            <td>{{$message->email}}</td>
                            <td><a href="{{route(" admin.messages.show",$message->id)}}"><img
                                        src="{{asset('admin/images/edit.png')}}" alt="Edit"></a></td>
                            <td><a href="{{route(" admin.messages.delete",$message->id)}}"><img
                                        src="{{asset('admin/images/delete.png')}}" alt="Delete"></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
