<div class="modal fade" id="{{ $modal_id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <!-- will be filled in in JS -->
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <form action="{{ $form_action }}" method="POST">

                    @csrf
                    <input type="hidden" name="_method" value="PUT">

                    @include($form_content, $values ?? [])

                    <div class="form-group d-flex justify-content-between">
                        <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                </form>


            </div>
        </div>
    </div>
</div>
