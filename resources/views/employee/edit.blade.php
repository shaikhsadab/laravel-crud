@extends('employee.layout')

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Add New Employee</h2>
    <div class="card-body">

      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <a class="btn btn-primary btn-sm" href="{{ route('employee.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
      </div>

      <form action="{{ route('employee.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
          <div class="mb-3">
              <label for="inputName" class="form-label"><strong>Name:</strong></label>
              <input
                  type="text"
                  name="firstname"
                  class="form-control @error('firstname') is-invalid @enderror"
                  id="inputName"
                  placeholder="First Name"
                  value="{{ $employee->firstname }}"
                  >
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
                placeholder="Last Name"
                value="{{ $employee->lastname }}">
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
                placeholder="Email"
                value="{{ $employee->email }}"
                >
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
                placeholder="Mobile"
                value="{{ $employee->mobile }}">
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
                placeholder="Address"
                value="{{ $employee->address }}" >
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
                        value="male"
                        {{ $employee->gender == 'male' ? 'checked' : '' }}>

                    <label class="form-check-label" for="genderMale">Male</label>
                </div>
                <div class="form-check">
                    <input
                        class="form-check-input @error('gender') is-invalid @enderror"
                        type="radio"
                        name="gender"
                        id="genderFemale"
                        value="female"
                        {{ $employee->gender == 'female' ? 'checked' : '' }}>

                    <label class="form-check-label" for="genderFemale">Female</label>
                </div>
                @error('gender')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        @php
            $hobbies = old('hobby') ? (is_array(old('hobby')) ? old('hobby') : explode(',', old('hobby'))) : explode(',', $employee->hobby ?? '');
        @endphp
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

                        {{ in_array('reading', $hobbies) ? 'checked' : '' }}

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
                        {{ in_array('traveling', $hobbies) ? 'checked' : '' }}

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
                        {{ in_array('gaming', $hobbies) ? 'checked' : '' }}

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

            @if(!empty($employee->file))
            <div class="mb-2">
                <img
                    src="{{ asset($employee->file) }}"
                    alt="Employee Photo"
                    style="width: 150px; height: auto; border: 1px solid #ccc; padding: 5px;"
                >
            </div>
        @endif
       <!-- File input for uploading a new photo -->
            <input
            type="file"
            name="file"
            class="form-control @error('file') is-invalid @enderror"
            id="file"
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
