<!-- Content -->
<div class="card">

    <div class="table-responsive text-nowrap">
        <div class="card-header flex-column flex-md-row" id="hide">
            <div class="dt-action-buttons text-end pt-3 pt-md-0">
                <div class="dt-buttons btn-group flex-wrap">
                    <div class="btn-group">
                        <button onclick="printDiv('coupons')"
                            class="btn btn-secondary buttons-collection dropdown-toggle btn-label-primary me-2"
                            tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog"
                            aria-expanded="false"><span><i class="ti ti-file-export me-sm-1">
                                </i> <span
                                    class="d-none d-sm-inline-block">Print</span></span><span
                                class="dt-down-arrow"></span>
                        </button>
                    </div>

                    <div class="btn-group">
                        <button onclick="exportToExcel('coupons')"
                            class="btn btn-secondary buttons-collection dropdown-toggle btn-label-primary me-2"
                            tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog"
                            aria-expanded="false"><span><i class="ti ti-file-export me-sm-1">
                                </i> <span
                                    class="d-none d-sm-inline-block">Export</span></span><span
                                class="dt-down-arrow"></span>
                        </button>
                    </div>

                    <div class="btn-group">
                        <a href="{{ router('coupon.create') }}" class="btn btn-secondary create-new btn-primary"
                            tabindex="0" aria-controls="DataTables_Table_0" type="button">
                            <span><i class="ti ti-plus me-sm-1"></i> <span
                                    class="d-none d-sm-inline-block">Add</span></span>
                        </a>
                    </div>

                    <div class="btn-group" style="width: 10px;">
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="dataTables_length" id="DataTables_Table_0_length">
                        <label>Show
                            <select wire:model.live="select" name="DataTables_Table_0_length"
                                aria-controls="DataTables_Table_0" class="form-select">
                                <option value="5">5</option>
                                <option value="7">7</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="75">75</option>
                                <option value="100">100</option>
                            </select> Entries
                        </label>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end">
                    <div id="DataTables_Table_0_filter" class="dataTables_filter">
                        <label>Search:
                            <input type="search" wire:model.live="search" class="form-control" placeholder=""
                                aria-controls="DataTables_Table_0">
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div id="myTabel">
            <table class="datatables-basic table dataTable no-footer dtr-column collapsed">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Percent</th>
                        <th>Max Uses</th>
                        <th>Times Used</th>
                        <th>Active</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>User</th>
                        <th>Subject</th>
                        <th>Pricing Plan</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($coupons as $coupon)
                        <tr>
                            <!-- Code -->
                            <td>{{ $coupon->code }}</td>
        
                            <!-- Percent -->
                            <td>{{ $coupon->percent }}%</td>
        
                            <!-- Max Uses -->
                            <td>{{ $coupon->max_uses }}</td>
        
                            <!-- Times Used -->
                            <td>{{ $coupon->times_used }}</td>
        
                            <!-- Active Status -->
                            <td>
                                <span class="badge bg-{{ $coupon->is_active ? 'success' : 'danger' }}">
                                    {{ $coupon->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
        
                            <td>{{ $coupon->start_date ? \Carbon\Carbon::parse($coupon->start_date)->format('Y-m-d') : 'N/A' }}</td>
                            <td>{{ $coupon->end_date ? \Carbon\Carbon::parse($coupon->end_date)->format('Y-m-d') : 'N/A' }}</td>
                            
                            <!-- User -->
                            <td>{{ $coupon->user->name ?? 'N/A' }}</td>
        
                            <!-- Subject -->
                            <td>{{ $coupon->subject->name ?? 'N/A' }}</td>
        
                            <!-- Pricing Plan -->
                            <td>{{ $coupon->pricingPlan->name ?? 'N/A' }}</td>
        
                            <!-- Actions -->
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="ti ti-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <!-- Edit Action -->
                                        <a class="dropdown-item"
                                            href="{{ route('coupon.edit', ['coupon' => $coupon->id]) }}">
                                            <i class="ti ti-pencil me-2"></i> Edit
                                        </a>
        
                                        <!-- Delete Action -->
                                        <button class="dropdown-item text-danger" type="button"
                                            wire:click="delete({{ $coupon->id }})"
                                            wire:confirm="{{ __('coupons/index.delete_confirm') }}">
                                            <i class="ti ti-trash me-2"></i> Delete
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        
            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $coupons->links() }}
            </div>
        </div>


        <div style="width: 1%;"></div>
        <div style="width: 1%;"></div>
    </div>
</div>
<!-- / Content -->

@script
    <script>
        $wire.on('del', (data) => {
            const message = data.message;
            Swal.fire({
                icon: 'success',
                title: message,
                showConfirmButton: false,
                timer: 2000
            });
        });
    </script>
@endscript
