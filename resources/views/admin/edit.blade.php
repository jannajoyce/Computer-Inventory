<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Edit Item</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap')}}">

<x-styleCss/>
</head>

<body class="bg-gradient-primary" style="background: var(--bs-body-color);height: 540px;">
<section class="position-relative py-4 py-xl-5">
    <div class="container position-relative">
        <div class="row d-flex justify-content-center" style="padding-bottom: 0px;padding-top: 150px;">
            <div class="col-md-8 col-lg-6 col-xl-5 col-xxl-4" style="width: 1000px;">
                <div class="card mb-5">
                    <div class="card-body">
                        <h2 class="text-center mb-4">EDIT ITEM</h2>
                        <form action="{{ route('admin.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label">Article/Item</label>
                                <input class="form-control" type="text" id="name" name="name" value="{{ $item->name }}" placeholder="Enter Article/Item" style="margin-bottom: 15px;">
                                @error('name')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="brand" class="form-label">Description/Brand</label>
                                <input class="form-control" type="text" id="brand" name="brand" value="{{ $item->brand }}" placeholder="Enter Description/Brand" style="margin-bottom: 15px;">
                                @error('brand')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="property_number" class="form-label">Property Number</label>
                                <input class="form-control" type="text" id="property_number" name="property_number" value="{{ $item->property_number }}" placeholder="Enter Property Number" style="margin-bottom: 15px;">
                                @error('property_number')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="unit" class="form-label">Unit</label>
                                <input class="form-control" type="text" id="unit" name="unit" value="{{ $item->unit }}" placeholder="Enter Unit" style="margin-bottom: 15px;">
                                @error('unit')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="unit_value" class="form-label">Unit Value</label>
                                <input class="form-control" type="text" id="unit_value" name="unit_value" value="{{ $item->unit_value }}" placeholder="Enter Unit Value" style="margin-bottom: 15px;">
                                @error('unit-value')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input class="form-control" type="text" id="quantity" name="quantity" value="{{ $item->quantity }}" placeholder="Enter Quantity" style="margin-bottom: 15px;">
                                @error('quantity')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input class="form-control" type="text" id="location" name="location" value="{{ $item->location }}" placeholder="Enter Location" style="margin-bottom: 15px;">
                                @error('location')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="condition" class="form-label">Condition</label>
                                <select class="form-control" id="condition" name="condition" style="margin-bottom: 15px;" onchange="toggleRemarks()">
                                    <option value="" disabled selected>Please Select...</option>
                                    <option value="Operating">Operating</option>
                                    <option value="Not Operating">Not Operating</option>
                                </select>
                                @error('condition')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3" id="remarks-container">
                                <label for="remarks" class="form-label">Remarks</label>
                                <select class="form-control" id="remarks" name="remarks" style="margin-bottom: 15px;">

                                </select>
                                @error('remarks')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <script>
                                function toggleRemarks() {
                                    var condition = document.getElementById('condition').value;
                                    var remarks = document.getElementById('remarks');

                                    remarks.innerHTML = '';

                                    if (condition === 'Operating') {

                                        var option = document.createElement('option');
                                        option.value = '';
                                        option.textContent = '';
                                        remarks.appendChild(option);
                                    } else if (condition === 'Not Operating') {

                                        var placeholderOption = document.createElement('option');
                                        placeholderOption.value = '';
                                        placeholderOption.disabled = true;
                                        placeholderOption.selected = true;
                                        placeholderOption.textContent = 'Please Select';
                                        remarks.appendChild(placeholderOption);

                                        var option1 = document.createElement('option');
                                        option1.value = 'BER';
                                        option1.textContent = 'BER';
                                        remarks.appendChild(option1);

                                        var option2 = document.createElement('option');
                                        option2.value = 'For Turn In';
                                        option2.textContent = 'For Turn In';
                                        remarks.appendChild(option2);
                                    }
                                }


                                document.addEventListener('DOMContentLoaded', toggleRemarks);
                            </script>

                            <div class="mb-3">
                                <label for="po_number" class="form-label">P.O. Number</label>
                                <input class="form-control" type="text" id="po_number" name="po_number" value="{{ $item->po_number }}" placeholder="Enter P.O. Number" style="margin-bottom: 15px;">
                                @error('po_number')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="dealer" class="form-label">Dealer</label>
                                <input class="form-control" type="text" id="dealer" name="dealer" value="{{ $item->dealer }}" placeholder="Enter Dealer" style="margin-bottom: 15px;">
                                @error('dealer')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="mode_of_procurement" class="form-label">Mode of Procurement</label>
                                <select class="form-control" id="mode_of_procurement" name="mode_of_procurement" style="margin-bottom: 15px;">
                                    <option value="" disabled selected>Please Select...</option>
                                    <option value="Capital Outlay">Capital Outlay</option>
                                    <option value="Capitalization">Capitalization</option>
                                    <option value="Semi Expandable">Semi Expandable</option>
                                    <option value="Transfer">Transfer</option>
                                    <option value="Donation">Donation</option>
                                    <option value="Negotiated">Negotiated</option>
                                </select>
                                @error('mode_of_procurement')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="accountname_with_accountcode" class="form-label">Account Name w/ Account Code</label>
                                <select class="form-control" id="accountname_with_accountcode" name="accountname_with_accountcode" style="margin-bottom: 15px;">
                                    <option value="" disabled selected>Please Select...</option>
                                    <option value="ICT/1-06-05-030">ICT/1-06-05-030</option>
                                    <option value="Comms/1-06-05-070">Comms/1-06-05-070</option>
                                    <option value="Office Equipment/1-06-05-020">Office Equipment/1-06-05-020</option>
                                    <option value="Machinery/1-06-05-010">Machinery/1-06-05-010</option>
                                    <option value="Other Structures/1-06-04-990">Other Structures/1-06-04-990</option>
                                    <option value="BLDG/1-06-04-010">BLDG/1-06-04-010</option>
                                    <option value="Comms Network/1-06-03-060">Comms Network/1-06-03-060</option>
                                    <option value="Power Supply System/1-06-03-050">Power Supply System/1-06-03-050</option>
                                    <option value="Construction and Heavy Equipment/1-06-05-080">Construction and Heavy Equipment/1-06-05-080</option>
                                    <option value="Firearms(Regular)/1-06-05-100">Firearms(Regular)/1-06-05-100</option>
                                    <option value="Firearms(Modernization)/1-06-05-100">Firearms(Modernization)/1-06-05-100</option>
                                    <option value="Technical & Scientific Equipment/1-06-05-140">Technical & Scientific Equipment/1-06-05-140</option>
                                    <option value="Vehicles/1-06-06-010">Vehicles/1-06-06-010</option>
                                    <option value="Vehicles(Modernization)/1-06-06-010">Vehicles(Modernization)/1-06-06-010</option>
                                    <option value="Furniture/1-06-07-010">Furniture/1-06-07-010</option>
                                    <option value="Other property plant & equipment/1-06-99-990">Other property, plant & equipment/1-06-99-990</option>
                                    <option value="Computer Software/1-08-01-020">Computer Software/1-08-01-020</option>
                                </select>
                                @error('accountname_with_accountcode')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="date_acquired" class="form-label">Date Acquired</label>
                                <input class="form-control" type="date" id="date_acquired" name="date_acquired" value="{{ $item->date_acquired }}" style="margin-bottom: 15px;">
                                @error('date_acquired')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="date_issued" class="form-label">Date Issued</label>
                                <input class="form-control" type="date" id="date_issued" name="date_issued" style="margin-bottom: 15px;">
                                @error('date_issued')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-block w-100" type="submit" style="background: rgb(0, 0, 128);">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/bs-init.js')}}"></script>
<script src="{{asset('js/theme.js')}}"></script>
</body>

</html>
