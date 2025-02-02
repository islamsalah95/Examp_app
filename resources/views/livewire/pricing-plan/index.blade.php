<!-- Content -->
<div class="card">

    <div class="table-responsive text-nowrap">
        <div class="card-header flex-column flex-md-row" id="hide">
            <div class="dt-action-buttons text-end pt-3 pt-md-0">
                <div class="dt-buttons btn-group flex-wrap">
                    <div class="btn-group">
                        <button onclick="printDiv('pricing-plan')"
                            class="btn btn-secondary buttons-collection dropdown-toggle btn-label-primary me-2"
                            tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog"
                            aria-expanded="false"><span><i class="ti ti-file-export me-sm-1">
                                </i> <span
                                    class="d-none d-sm-inline-block">Print</span></span><span
                                class="dt-down-arrow"></span>
                        </button>
                    </div>

                    <div class="btn-group">
                        <button onclick="exportToExcel('pricing-plan')"
                            class="btn btn-secondary buttons-collection dropdown-toggle btn-label-primary me-2"
                            tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog"
                            aria-expanded="false"><span><i class="ti ti-file-export me-sm-1">
                                </i> <span
                                    class="d-none d-sm-inline-block">Export</span></span><span
                                class="dt-down-arrow"></span>
                        </button>
                    </div>

                    <div class="btn-group">
                        <a href="{{ router('pricing-plan.create',['subject'=>$subject->id]) }}" class="btn btn-secondary create-new btn-primary"
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
                        <th>ID</th>
                        <th>Name</th>
                        <th>Period Count</th>
                        <th>Period Type</th>
                        <th>Status</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Free Trial</th>
                        <th>Actions</th>
                    <tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($pricingPlans as $pricingPlan)
                    <tr>
                        <th>{{ $pricingPlan['id'] }}</th>
                        <th>{{ $pricingPlan['name'] }}</th>
                        <th>{{ $pricingPlan['period_count'] }}</th>
                        <th>{{ $pricingPlan['period_type'] }}</th>
                        <th>
                            @if ($pricingPlan['status'] === 'active')
                                <i class="ti ti-check text-success" title="Active"></i>
                            @elseif ($pricingPlan['status'] === 'soon')
                                <i class="ti ti-clock text-warning" title="Coming Soon"></i>
                            @else
                                <i class="ti ti-alert-circle text-danger" title="Inactive"></i>
                            @endif
                        </th>
                        <th>{{ $pricingPlan['price'] }}</th>
                        <th>{{ $pricingPlan['discount'] }}</th>
                        <th>
                            @if ($pricingPlan['free_trial'])
                                <i class="ti ti-circle-check text-success" title="Free Trial Available"></i>
                            @else
                                <i class="ti ti-circle-x text-danger" title="No Free Trial"></i>
                            @endif
                        </th>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="ti ti-dots-vertical"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('pricing-plan.edit', ['pricing_plan' => $pricingPlan['id']]) }}">
                                        <i class="ti ti-pencil"></i> Edit
                                    </a>
                                    <button class="dropdown-item text-danger" type="button"
                                        wire:click="delete({{ $pricingPlan['id'] }})"
                                        wire:confirm="{{ __('pricingPlans/index.delete_confirm') }}">
                                        <i class="ti ti-trash"></i> Delete
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $pricingPlans->links() }}

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
