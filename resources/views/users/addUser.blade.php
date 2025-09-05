@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-3" style="background:#fff; color:#000;">
        <div class="card-header bg-dark text-white text-center rounded-top">
            <h4 class="mb-0">Add New User</h4>
        </div>
        <div class="card-body p-4">
            <form id="userForm">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>First Name</label>
                        <input type="text" name="first_name" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>Mobile Number</label>
                        <input type="text" name="mobile_number" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label>Employee ID</label>
                        <input type="text" name="employee_id" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label>Department</label>
                        <select name="department" class="form-control" id="departmentDropdown" required></select>
                    </div>
                    <div class="col-md-4">
                        <label>Designation</label>
                        <select name="designation" class="form-control" id="designationDropdown" required></select>
                    </div>
                    <div class="col-md-4">
                        <label>User Type</label>
                        <select name="user_type" class="form-control" id="userTypeDropdown" required></select>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-dark px-4">Save User</button>
                </div>
            </form>

            <!-- Response Message -->
            <div id="responseMessage" class="mt-3"></div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    console.log('jQuery loaded, starting dropdown initialization...');
    
    // Load dropdown data
    $.get('/departments')
        .done(function(data) {
            console.log('Departments loaded:', data);
            $('#departmentDropdown').append('<option value="">-- Select --</option>');
            data.forEach(function(item) {
                $('#departmentDropdown').append(`<option value="${item.id}">${item.name}</option>`);
            });
        })
        .fail(function(xhr, status, error) {
            console.error('Error loading departments:', error, xhr.responseText);
        });

    $.get('/designations')
        .done(function(data) {
            console.log('Designations loaded:', data);
            $('#designationDropdown').append('<option value="">-- Select --</option>');
            data.forEach(function(item) {
                $('#designationDropdown').append(`<option value="${item.id}">${item.name}</option>`);
            });
        })
        .fail(function(xhr, status, error) {
            console.error('Error loading designations:', error, xhr.responseText);
        });

    $.get('/user-types')
        .done(function(data) {
            console.log('User types loaded:', data);
            $('#userTypeDropdown').append('<option value="">-- Select --</option>');
            data.forEach(function(item) {
                $('#userTypeDropdown').append(`<option value="${item.id}">${item.name}</option>`);
            });
        })
        .fail(function(xhr, status, error) {
            console.error('Error loading user types:', error, xhr.responseText);
        });

    // Handle form submit
    $('#userForm').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: '/users/add',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                $('#responseMessage').html(
                    `<div class="alert alert-success">${response.message}</div>`
                );
                $('#userForm')[0].reset();
            },
            error: function(xhr) {
                let errors = xhr.responseJSON.errors;
                let errorMessages = '';
                for (let key in errors) {
                    errorMessages += `<div>${errors[key][0]}</div>`;
                }
                $('#responseMessage').html(
                    `<div class="alert alert-danger">${errorMessages}</div>`
                );
            }
        });
    });
});
</script>
@endsection
