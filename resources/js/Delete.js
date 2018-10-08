import swal from 'sweetalert';

class DeleteClass {

    constructor(settings) {
        this.settings = settings;
        this.init();
    }

    init() {
        swal({
            title: this.settings.title,
            text: this.settings.text,
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    this.settings.formId.submit();
                }
            });
    }


}

export function Delete(settings) {
    new DeleteClass(settings);
}