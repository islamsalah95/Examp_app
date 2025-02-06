<!-- Content -->
<div class="card">

    <div class="table-responsive text-nowrap">
        <div class="card-header flex-column flex-md-row" id="hide">
            <div class="dt-action-buttons text-end pt-3 pt-md-0">
                <div class="dt-buttons btn-group flex-wrap">
                    <div class="btn-group">
                        <button onclick="printDiv('users')"
                            class="btn btn-secondary buttons-collection dropdown-toggle btn-label-primary me-2"
                            tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog"
                            aria-expanded="false"><span><i class="ti ti-file-export me-sm-1">
                                </i> <span class="d-none d-sm-inline-block">Print</span></span><span
                                class="dt-down-arrow"></span>
                        </button>
                    </div>

                    <div class="btn-group">
                        <button onclick="exportToExcel('users')"
                            class="btn btn-secondary buttons-collection dropdown-toggle btn-label-primary me-2"
                            tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog"
                            aria-expanded="false"><span><i class="ti ti-file-export me-sm-1">
                                </i> <span class="d-none d-sm-inline-block">Export</span></span><span
                                class="dt-down-arrow"></span>
                        </button>
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

        <div id="myTable" class="container mt-4">
            <table class="table table-striped table-hover table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th><i class="fas fa-user"></i> Name</th>
                        <th><i class="fas fa-envelope"></i> Email</th>
                        <th><i class="fas fa-list"></i> Subscription Subject</th>
                        <th><i class="fas fa-book"></i> Pricing Plan</th>
                        <th><i class="fas fa-cogs"></i> Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
        
                            <!-- Subscription Subjects -->
                            <td>
                                <ul class="list-unstyled">
                                    @foreach ($user->subscriptions as $subscription)
                                        <li class="border-bottom pb-2 mb-2">
                                            <i class="fas fa-book-open text-primary"></i>
                                            <strong>{{ $subscription->subject->name }}</strong>
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
        
                            <!-- Pricing Plan -->
                            <td>
                                <ul class="list-unstyled">
                                    @foreach ($user->subscriptions as $subscription)
                                        <li class="border-bottom pb-2 mb-2">
                                            <i class="fas fa-tag text-success"></i>
                                            <strong>{{ $subscription->pricingPlan->name }}</strong> 
                                            <span class="badge bg-info">{{ $subscription->pricingPlan->period_count }} {{ $subscription->pricingPlan->period_type }}</span>
                                            <span class="badge bg-danger">{{ $subscription->pricingPlan->discount }}% offer subject</span>
                                            <span class="badge bg-danger">{{ $subscription->pricingPlan->priceAfterDiscount() }}$</span>
                                            <span class="badge bg-danger">{{ $subscription->discount }}% offer User</span>
                                            <span class="badge bg-success">${{ $subscription->UserTotalAfterDiscount() }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
        
                            <!-- Actions -->
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                        <i class="ti ti-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <button class="dropdown-item text-danger" type="button"
                                                wire:click="delete({{ $user['id'] }})"
                                                wire:confirm="{{ __('questions/index.delete_confirm') }}">
                                                <i class="ti ti-trash"></i> Delete
                                            </button>
                                        </li>
                                        <li>
                                            <a class="dropdown-item"
                                            href="{{ route('users-profiles.show', ['users_profile' => $user['id']]) }}">
                                            <i class="ti ti-eye"></i> View
                                        </a>
                                        </li>

                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        

    </div>


    {{ $users->links() }}

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
