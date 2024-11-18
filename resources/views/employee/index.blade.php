@extends('employee.layout')

@section('content')

<div class="card mt-5">
  <h2 class="card-header">Employee Managment System</h2>
  <div class="card-body">

        @session('value')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('employee.create') }}"> <i class="fa fa-plus"></i>Add New Employee</a>
        </div>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Hobbies</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
             @forelse ($employees as $employee)
                <tr>

                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->firstname }}</td>
                    <td>{{ $employee->lastname }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->mobile }}</td>
                    <td>{{ $employee->address }}</td>
                    <td>{{ $employee->gender }}</td>
                    <td>{{ $employee->hobby }}</td>
                    <td>
                    <a class="btn btn-info btn-sm mb-2" href="{{ route('employee.edit',$employee->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>

                    <form action="{{ route('employee.destroy',$employee->id) }}" method="POST">

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                    </form>

                    </td>

                </tr>
             @empty
                <tr>
                    <td colspan="4">There are no data.</td>
                </tr>
            @endforelse
            </tbody>

        </table>


  </div>
</div>
@endsection
