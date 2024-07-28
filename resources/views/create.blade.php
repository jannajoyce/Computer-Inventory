<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Add Item</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap')}}">
</head>

<body class="bg-gradient-primary" style="background: var(--bs-body-color);height: 540px;">
<section class="position-relative py-4 py-xl-5">
    <div class="container position-relative">
        <div class="row d-flex justify-content-center" style="padding-bottom: 0px;padding-top: 150px;">
            <div class="col-md-8 col-lg-6 col-xl-5 col-xxl-4" style="width: 1000px;">
                <div class="card mb-5">
                    <div class="card-body">
                        <h2 class="text-center mb-4">ADD NEW ITEM</h2>
                        <form action="{{ route('item.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Article/Item</label>
                                <input class="form-control" type="text" id="name" name="name" placeholder="Enter Article/Item" style="margin-bottom: 15px;">
                                @error('name')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="brand" class="form-label">Description/Brand</label>
                                <input class="form-control" type="text" id="brand" name="brand" placeholder="Enter Description/Brand" style="margin-bottom: 15px;">
                                @error('brand')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="property_number" class="form-label">Property Number</label>
                                <input class="form-control" type="text" id="property_number" name="property_number" placeholder="Enter Property Number" style="margin-bottom: 15px;">
                                @error('property_number')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="unit" class="form-label">Unit</label>
                                <input class="form-control" type="text" id="unit" name="unit" placeholder="Enter Unit" style="margin-bottom: 15px;">
                                @error('unit')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="unit_value" class="form-label">Unit Value</label>
                                <input class="form-control" type="text" id="unit_value" name="unit_value" placeholder="Enter Unit Value" style="margin-bottom: 15px;">
                                @error('unit-value')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input class="form-control" type="text" id="quantity" name="quantity" placeholder="Enter Quantity" style="margin-bottom: 15px;">
                                @error('quantity')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input class="form-control" type="text" id="location" name="location" placeholder="Enter Location" style="margin-bottom: 15px;">
                                @error('location')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="condition" class="form-label">Condition</label>
                                <select class="form-control" id="condition" name="condition" style="margin-bottom: 15px;">
                                    <option value="Operating">Operating</option>
                                    <option value="Not Operating">Not Operating</option>
                                </select>
                                @error('condition')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="remarks" class="form-label">Remarks</label>
                                <select class="form-control" id="remarks" name="remarks" style="margin-bottom: 15px;">
                                    <option value="BER">BER</option>
                                    <option value="For Turn In">For Turn In</option>
                                </select>
                                @error('remarks')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="po_number" class="form-label">P.O. Number</label>
                                <input class="form-control" type="text" id="po_number" name="po_number" placeholder="Enter P.O. Number" style="margin-bottom: 15px;">
                                @error('po_number')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="dealer" class="form-label">Dealer</label>
                                <input class="form-control" type="text" id="dealer" name="dealer" placeholder="Enter Dealer" style="margin-bottom: 15px;">
                                @error('dealer')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="date_acquired" class="form-label">Date Acquired</label>
                                <input class="form-control" type="date" id="date_acquired" name="date_acquired" style="margin-bottom: 15px;">
                                @error('date_acquired')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-block w-100" type="submit" style="background: rgb(0, 0, 128);">Add Item</button>
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
