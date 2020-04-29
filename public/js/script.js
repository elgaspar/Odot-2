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


    class ModalController {
        constructor(args) {
            this._modal = $(args.selector);
            this._title = args.title;
            this._inputs_names = args.inputs;

            this._set_show_handler();
        }

        _set_show_handler() {
            let self = this;
            this._modal.on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget)
                let data = self._get_data(button);
                self._fill_in_inputs(data);
            })
        }

        _get_data(button) {
            let data = {};
            data.create_task = button.data('create') ? true : false;
            for (const name of this._inputs_names) {
                data[name] = button.data(name);
            }
            return data;
        }

        _fill_in_inputs(data) {
            let title = this._get_title_for_edit();
            let method = 'PUT';

            if (data.create_task) {
                title = this._get_title_for_create();
                method = 'POST';
                data = {};
            }

            this._set_title(title);
            this._modal.find('input[name="_method"]').val(method);

            for (const name of this._inputs_names) {
                this._set_input_value(name, data[name]);
            }
        }

        _get_title_for_create() {
            return 'Create ' + this._title;
        }

        _get_title_for_edit() {
            return 'Edit ' + this._title;
        }

        _set_title(value) {
            this._modal.find('.modal-title').text(value);
        }

        _set_input_value(input_name, value) {
            let input = this._get_input(input_name);
            let type = input.attr('type');
            if (input.prop("tagName").toLowerCase() == 'select' || type == 'text' || type == 'hidden') {
                input.val(value);
                input.change();
            } else if (type == 'checkbox') {
                input.prop('checked', value ? true : false);
            }
        }

        _get_input(name) {
            let name_str = '[name="' + name + '"]';
            let input = this._modal.find('input' + name_str);
            if (input.length) {
                return input;
            }
            return this._modal.find('select' + name_str);
        }

    }

    class UsersModalController extends ModalController {
        constructor() {
            super({
                selector: '#users-modal',
                title: 'User',
                inputs: ['id', 'name', 'email', 'is_admin']
            });
        }
    }

    class ProjectsModalController extends ModalController {
        constructor() {
            super({
                selector: '#projects-modal',
                title: 'Project',
                inputs: ['id', 'name']
            });
        }
    }

    class CategoriesModalController extends ModalController {
        constructor() {
            super({
                selector: '#categories-modal',
                title: 'Category',
                inputs: ['id', 'name', 'color']
            });
            $('.color-select').selectpicker();
        }
    }

    class TasksModalController extends ModalController {
        constructor() {
            super({
                selector: '#tasks-modal',
                title: 'Task',
                inputs: ['id', 'name', 'category_id', 'parent_id']
            });
            $('.category-select').selectpicker();
        }

        _fill_in_inputs(data) {
            super._fill_in_inputs(data);
            if (data.create_task && data.parent_id) {
                super._set_title('Add child to task: ' + data.name);
            }
        }
    }






    new InfoMessage();

    new UsersModalController();
    new ProjectsModalController();
    new CategoriesModalController();
    new TasksModalController();

});
