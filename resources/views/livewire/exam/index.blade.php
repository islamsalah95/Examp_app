<!-- Content -->
<div class="card">

    <div class="table-responsive text-nowrap">
        <div class="card-header flex-column flex-md-row" id="hide">
            <div class="dt-action-buttons text-end pt-3 pt-md-0">
                <div class="dt-buttons btn-group flex-wrap">
                    <div class="btn-group">
                        <button onclick="printDiv('subscriptions')"
                            class="btn btn-secondary buttons-collection dropdown-toggle btn-label-primary me-2"
                            tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog"
                            aria-expanded="false"><span><i class="ti ti-file-export me-sm-1">
                                </i> <span
                                    class="d-none d-sm-inline-block">Print</span></span><span
                                class="dt-down-arrow"></span>
                        </button>
                    </div>

                    <div class="btn-group">
                        <button onclick="exportToExcel('subscriptions')"
                            class="btn btn-secondary buttons-collection dropdown-toggle btn-label-primary me-2"
                            tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog"
                            aria-expanded="false"><span><i class="ti ti-file-export me-sm-1">
                                </i> <span
                                    class="d-none d-sm-inline-block">Export</span></span><span
                                class="dt-down-arrow"></span>
                        </button>
                    </div>


                    <div class="btn-group">
                        <a href="{{ router('exam.create') }}"
                            class="btn btn-secondary create-new btn-primary" tabindex="0"
                            aria-controls="DataTables_Table_0" type="button">
                            <span><i class="ti ti-plus me-sm-1"></i> <span
                                    class="d-none d-sm-inline-block">{{ __('admins/index.add_record') }}</span></span>
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
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Chapter</th>
                        <th>Created at</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($exams as $exam)
                    <tr>
                        <td>{{$exam->name}}</td>
                        <td>{{$exam->chapter->name}}</td>
                        <td>{{$exam->created_at}}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="ti ti-dots-vertical"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item"
                                        href="{{ router('exam.edit', ['exam' => $exam['id']]) }}">
                                        <i class="ti ti-pencil"></i> {{ __('admins/index.edit') }}
                                    </a>
                                    <button class="dropdown-item text-danger" type="button"
                                        wire:click="delete({{ $exam['id'] }})"
                                        wire:confirm="{{ __('admins/index.delete_confirm') }}">
                                        <i class="ti ti-trash"></i> {{ __('admins/index.delete') }}
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>

        {{ $exams->links() }}

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
