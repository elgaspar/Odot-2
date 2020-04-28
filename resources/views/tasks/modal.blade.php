<div class="modal fade" id="tasks-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <!-- will be filled in in JS -->
                </h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                @include('tasks.form',[
                'project' => $project,
                'categories' => $categories
                ])

            </div>
        </div>
    </div>
</div>
