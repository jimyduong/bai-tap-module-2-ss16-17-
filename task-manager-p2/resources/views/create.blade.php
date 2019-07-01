@extends('home')
@section('title', 'Thêm mới khách hàng')

@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Thêm mới khách hàng</h1>
            </div>
            <div class="col-6">
                <form method="post" action="{{ route('customers.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Tên khách hàng</label>
                        <input type="text" class="form-control" name="name"  placeholder="Enter name" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Enter address" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label for="inputFileName">File Name</label>
                        <input type="text"
                               class="form-control"
                               id="inputFileName"
                               name="inputFileName">

                        <input type="file"
                               class="form-control-file"
                               id="inputFile"
                               name="inputFile">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
