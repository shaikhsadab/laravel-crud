@extends('employee.layout')

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Add New Employee</h2>
    <div class="card-body">

      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <a class="btn btn-primary btn-sm" href="{{ route('employee.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
      </div>

      <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="mb-3">
              <label for="inputName" class="form-label"><strong>First Name:</strong></label>
              <input
                  type="text"
                  name="firstname"
                  class="form-control @error('firstname') is-invalid @enderror"
                  id="inputName"
                  placeholder="First Name">
              @error('firstname')
                  <div class="form-text text-danger">{{ $message }}</div>
              @enderror
          </div>

          <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Lastname:</strong></label>
            <input
                type="text"
                name="lastname"
                class="form-control @error('name') is-invalid @enderror"
                id="inputName"
                placeholder="Last Name">
            @error('lastname')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Email:</strong></label>
            <input
                type="text"
                name="email"
                class="form-control @error('email') is-invalid @enderror"
                id="inputName"
                placeholder="Email">
            @error('email')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Mobile:</strong></label>
            <input
                type="text"
                name="mobile"
                class="form-control @error('mobile') is-invalid @enderror"
                id="inputName"
                placeholder="Mobile">
            @error('mobile')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Address:</strong></label>
            <input
                type="text"
                name="address"
                class="form-control @error('address') is-invalid @enderror"
                id="inputName"
                placeholder="Address">
            @error('address')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label"><strong>Gender:</strong></label>
            <div>
                <div class="form-check">
                    <input
                        class="form-check-input @error('gender') is-invalid @enderror"
                        type="radio"
                        name="gender"
                        id="genderMale"
                        value="male" >
                    <label class="form-check-label" for="genderMale">Male</label>
                </div>
                <div class="form-check">
                    <input
                        class="form-check-input @error('gender') is-invalid @enderror"
                        type="radio"
                        name="gender"
                        id="genderFemale"
                        value="female" >
                    <label class="form-check-label" for="genderFemale">Female</label>
                </div>
                @error('gender')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label"><strong>Hobbies:</strong></label>
            <div>
                <div class="form-check">
                    <input
                        class="form-check-input @error('hobby') is-invalid @enderror"
                        type="checkbox"
                        name="hobby[]"
                        id="hobbyReading"
                        value="reading"
                       >
                    <label class="form-check-label" for="hobbyReading">Reading</label>
                </div>
                <div class="form-check">
                    <input
                        class="form-check-input @error('hobby') is-invalid @enderror"
                        type="checkbox"
                        name="hobby[]"
                        id="hobbyTraveling"
                        value="traveling"
                       >
                    <label class="form-check-label" for="hobbyTraveling">Traveling</label>
                </div>
                <div class="form-check">
                    <input
                        class="form-check-input @error('hobby') is-invalid @enderror"
                        type="checkbox"
                        name="hobby[]"
                        id="hobbyGaming"
                        value="gaming"
                       >
                    <label class="form-check-label" for="hobbyGaming">Gaming</label>
                </div>
                @error('hobby')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>


        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Photo:</strong></label>
            <input
                type="file"
                name="file"
                class="form-control @error('file') is-invalid @enderror"
                id="inputName"
                >
            @error('file')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>





          <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      </form>

    </div>
  </div>

@endsection
