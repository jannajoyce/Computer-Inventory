<div class="modal fade" id="userItemsModal-{{ $user->id }}" tabindex="-1" aria-labelledby="bookModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAchievementModalLabel" style="font-family: Montserrat, sans-serif; color: #000080
; font-weight: bold;">
                    {{ $user->name }} <span style="color: #858796"> items added</span>
                </h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    <table class="table my-0" id="dataTable">
                        <thead>
                        <tr>
                            {{--   <th><input type="checkbox" id="select-all"></th> --}}
                            <th style="width: 200px;">ARTICLE/ITEM</th>
                            <th style="width: 220px;">DESCRIPTION/BRAND</th>
                            <th style="width: 220px;">PROPERTY NUMBER</th>
                            <th style="width: 150px;">UNIT</th>
                            <th style="width: 150px;">UNIT VALUE</th>
                            <th style="width: 150px;">QUANTITY</th>
                            <th style="width: 250px;">LOCATION</th>
                            <th style="width: 150PX;">CONDITION</th>
                            <th style="width: 150PX;">REMARKS</th>
                            <th style="width: 200PX;">P.O. NUMBER</th>
                            <th style="width: 300PX;">DEALER</th>
                            <th style="width: 250PX;">MODE OF PROCUREMENT</th>
                            <th style="width: 200PX;">DATE ACQUIRED</th>
                            <th style="width: 200PX;">DATE ISSUED</th>
                            {{-- <th style="width: 150px;">ACTIONS</th> --}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($items as $item)
                            <tr>
                                {{-- <td><input type="checkbox" name="ids[]" value="{{ $item->id }}"></td> --}}
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->brand }}</td>
                                <td>{{ $item->property_number }}</td>
                                <td>{{ $item->unit }}</td>
                                <td>{{ $item->unit_value }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->location }}</td>
                                <td>{{ $item->condition }}</td>
                                <td>{{ $item->remarks }}</td>
                                <td>{{ $item->po_number }}</td>
                                <td>{{ $item->dealer }}</td>
                                <td>{{ $item->mode_of_procurement }}</td>
                                <td>{{ $item->date_acquired }}</td>
                                <td>{{ $item->date_issued }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
