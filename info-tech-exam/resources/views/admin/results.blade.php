@extends('layouts.master')
@section('title','Results')
@section('custom_css')
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" type="text/css">
@endsection
@section('custom_js')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>

    <script src="{{asset('assets/js/bb_search.js')}}"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-8 col-6">
            <h4 class="page-title">Student Result List</h4>
        </div>
        <div class="col-sm-4 col-6 text-right m-b-30">
            <a href="{{ route('student.result.create') }}" class="btn btn-primary" ><i class="fa fa-plus"></i> Add New Result</a>
              </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive" >
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Image</th>
                        <th>Student Name</th>
                        <th>Total Mark</th>

                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $key=>$student)
                        <tr>
                            <td>
                                <a href="#" class="avatar">{{$key+1}}</a>
                            </td>
                            <td><img src="{{ $student->image }}" height="80px" width="120px" alt=""></td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->subjects->sum('achieve_number')}}</td>
                                <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('edit',$student->id) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                        <form method="post" action="{{ route('delete',$student->id) }}">
                                            @csrf
                                            @method('delete')
                                            <button class="dropdown-item fa fa-trash-o m-r-5" onclick="return confirm('Are you confirm to delete?')"> Delete</button>
                                        </form>

                                    </div>
                                </div>
                            </td>

                        </tr>
                    @endforeach


                    </tbody>

                </table>
                <div class="text-center">
                    {{ $students->render() }}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="see-all">
                        {{--                        <span class="see-all-links" >{{$applicationTypes->links()}}</span>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
