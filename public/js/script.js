$(document).ready(function () {

    class InfoMessage {
        constructor() {
            let success_toast = $('.info-toast');
            success_toast.toast({
                delay: 5000
            });
            success_toast.toast('show');
        }
    }


    class ProjectsModalController {
        constructor() {
            this._modal = $('#projects-modal');
            this._title = this._modal.find('.modal-title');
            this._method = this._modal.find('input[name="_method"');
            this._input_name = this._modal.find('input[name="name"');
            this._input_id = this._modal.find('input[name="id"');

            let self = this;
            this._modal.on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget)
                self._fill_in_inputs(button);
            })
        }

        _fill_in_inputs(button) {
            let create_task = button.data('create') ? true : false;

            let title = 'Edit Task';
            let method = 'PUT';

            let name = button.data('name')
            let id = button.data('id');

            if (create_task) {
                title = 'Create Task';
                method = 'POST';

                name = null;
                id = null;
            }

            this._method.val(method);
            this._input_name.val(name)
            this._input_id.val(id)

            this._title.text(title)
        }
    }

    class TasksModalController {
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
        }
    }





    //TODO: clean code -> make modal controllers child classes

    new InfoMessage();
    new ProjectsModalController();
    new TasksModalController();

});
