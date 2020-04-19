$(document).ready(function () {

    class SuccessMessage {
        constructor() {
            let success_toast = $('.success-toast');
            success_toast.toast({
                delay: 2500
            });
            success_toast.toast('show');
        }
    }


    class ModalController {
        constructor() {
            this._modal = $('#tasks-modal');
            this._title = this._modal.find('.modal-title');
            this._method = this._modal.find('input[name="_method"');
            this._input_name = this._modal.find('input[name="name"');
            this._input_id = this._modal.find('input[name="id"');
            this._input_parent_id = this._modal.find('input[name="parent_id"');

            let self = this;
            this._modal.on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget)
                self._fill_in_inputs(button);
            })
        }

        _fill_in_inputs(button) {
            //TODO: method
            let create_task = button.data('create') ? true : false;

            let title = 'Edit Task';
            let method = 'PUT';

            let name = button.data('name')
            let id = button.data('id');
            let parent_id = button.data('parent-id');



            if (create_task) {
                title = 'Create Task';
                method = 'POST';

                if (parent_id) {
                    title = 'Add child to task: ' + name;
                }

                name = null;
                id = null;
            }


            this._method.val(method);
            this._input_name.val(name)
            this._input_id.val(id)
            this._input_parent_id.val(parent_id)

            this._title.text(title)


            console.log(name);
            // console.log(id);
            // console.log(parent_id);

        }
    }






    new SuccessMessage();
    new ModalController();

});
