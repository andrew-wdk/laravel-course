@extends('adminlte::page')

@section('title', 'users')

@section('content_header')
<h1>add user</h1>
@stop

@section('content')
<form id="add_user" action="{{route('admin.user.store')}}" method="POST">
    {{csrf_field()}}
    <div class="card card-primary">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="name">الأسم</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="email">الأيميل</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group col-md-12">
                    <label for="password">password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="NationalID">الرقم القومى</label>
                    <input type="number" name="NationalID" id="NationalID" class="form-control" required min="10000000000000" max="99999999999999" placeholder="أدخل 14 رقم">
                </div>
                <div class="form-group col-md-12">
                    <label for="section">الفصل</label><br>
                    <label class="radio-inline"><input type="radio" name="choosing_section" value="4" checked>4</label>
                    <label class="radio-inline"><input type="radio" name="choosing_section" value="5">5</label>
                    <label class="radio-inline"><input type="radio" name="choosing_section" value="6">6</label>
                    <style>
                        .radio-inline {
                            margin-right: 30px;
                        }
                    </style>
                </div>
                <div class="form-group col-md-12">
                    <label for="phone">الرقم محمول الشخصى</label>
                    <input type="text" name="phone" id="phone" class="form-control" pattern="^0[\d]{10}" required min-length="11" max-length="11" placeholder="أدخل 11 رقم">
                    <!-- I want to add here to accept zero's -->
                </div>
                <div class="form-group col-md-12">
                    <label for="address">العنوان</label>
                    <input type="text" name="address" id="address" class="form-control" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="telephone-no.">النقط</label>
                    <input type="number" name="points" id="points" class="form-control">
                   
                </div>
                <!-- <div class="dropdown"><label for="father">اب الأعتراف</label>
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">اب الأعتراف
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li>ابونا يوسف</li>
                        <li>ابونا تادرس</li>
                        <li>ابونا موسى</li>
                        <li>ابونا انجيلوس</li>
                        <li>اب كاهن اخر</a></li>
                    </ul>
                     <input type="text" id="other-input" name="other-input" placeholder="ادخل اسم الكاهن" style="display: none;">
                </div> -->
                <div class="form-group col-md-12">
                    <label for="father">اب الأعتراف</label><br>
                    <select id="father" name="father" class="form-control">
                        <option value="ابونا يوسف">ابونا يوسف</option>
                        <option value="ابونا تادرس">ابونا تادرس</option>
                        <option value="ابونا موسى">ابونا موسى</option>
                        <option value="ابونا انجيلوس">ابونا انجيلوس</option>
                        <option value="other">اب كاهن اخر</option>
                    </select>
                    <input type="text" id="other-input" name="other-input" placeholder="ادخل اسم الكاهن" style="display: none;">
                   <br>
                   <script>
                        var select = document.getElementById("father");
                        // Get the input element by its id
                        var input = document.getElementById("other-input");

                        // Add an event listener for the change event, which fires when the user selects an option
                        select.addEventListener("change", function() {
                            // Get the value of the selected option
                            var value = select.value;
                            // Check if the value is "other"
                            if (value == "other") {
                                // Show the input element
                                input.style.display = "block";
                            } else {
                                // Hide the input element
                                input.style.display = "none";
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>


@stop

@section('css')
<link href="https://cdn.datatables.net/v/dt/dt-1.13.7/datatables.min.css" rel="stylesheet">
@stop

@section('js')
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
<script>
    const Swal = require('sweetalert2');
    const form = document.getElementById('add_user');
    form.addEventListener('submit', function (event) {
        event.preventDefault();
    });
    Swal.fire({
            title: 'Submitting your data...',
            html: 'Please wait while we process your request.',
            didOpen: () => {
                Swal.showLoading()
            }
        });
</script>
<script>
    const Swal = require('sweetalert2');
    const form = document.getElementById('add_user');
    form.addEventListener('submit', function (event) {
        event.preventDefault();
    });
    Swal.fire({
            title: 'Submitting your data...',
            html: 'Please wait while we process your request.',
            didOpen: () => {
                Swal.showLoading()
            }
        });
</script>
<script src="https://cdn.datatables.net/v/dt/dt-1.13.7/datatables.min.js"></script>
@stop
