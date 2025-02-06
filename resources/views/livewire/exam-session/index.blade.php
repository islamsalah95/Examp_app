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
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th><i class="fas fa-book"></i> Subjects</th>
                        <th><i class="fas fa-question-circle"></i> Questions</th>
                        <th><i class="fas fa-file-alt"></i> Exams</th>
                        <th><i class="fas fa-book-open"></i> Chapters</th>
                        <th><i class="fas fa-book-open"></i> Actual Questions</th>
                        <th><i class="fas fa-check-circle"></i> Correct</th>
                        <th><i class="fas fa-times-circle"></i> Incorrect</th>
                        <th><i class="fas fa-percentage"></i> Score</th>
                        <th><i class="fas fa-cogs"></i> Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        @foreach ($user->examSessions as $examSession)
                            <tr>
                                <!-- Subjects -->
                                <td>
                                    <i class="fas fa-book"></i>
                                    <strong>{{ $examSession->subject->name }}</strong>
                                </td>

                                <!-- Questions -->
                                <td>
                                    <span class="badge bg-warning text-dark">
                                        {{ $examSession->question_count }} Questions
                                    </span>
                                </td>

                                <!-- Exams -->
                                <td>
                                    @foreach ($examSession->exams() as $exam)
                                        <div>
                                            <i class="fas fa-file-alt"></i> {{ $exam['name'] }}
                                        </div>
                                    @endforeach
                                </td>

                                <!-- Chapters -->
                                <td>
                                    @foreach ($examSession->chapters() as $chapter)
                                        <div>
                                            <i class="fas fa-book-open"></i> {{ $chapter['name'] }}
                                        </div>
                                    @endforeach
                                </td>

                                <!-- Total Questions -->
                                <td>
                                    {{ $examSession->getTotalDegreeExamSession()['total'] }}
                                </td>

                                <!-- Correct Questions -->
                                <td>
                                    {{ $examSession->getTotalDegreeExamSession()['correct'] }}
                                </td>

                                <!-- Incorrect Questions -->
                                <td>
                                    {{ $examSession->getTotalDegreeExamSession()['incorrect'] }}
                                </td>

                                <!-- Total Score -->
                                <td>
                                    {{ $examSession->getTotalDegreeExamSession()['totalDegree'] }}%
                                </td>

                                <!-- Actions -->
                                <td>
                                    <a class="btn btn-sm btn-primary view-details"
                                    data-exam-session-id href="{{route('exam-session.show',$examSession->id)}}"><i class="fas fa-eye"></i> View</a>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $users->links() }}
            </div>
        </div>

        <!-- Modal for View Details -->
        <div class="modal fade" id="viewDetailsModal" tabindex="-1" aria-labelledby="viewDetailsModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewDetailsModalLabel">Exam Session Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Details will be loaded here dynamically -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
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
