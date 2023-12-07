"use strict";

// Class definition
var KTModalAddAddress = function () {
    var submitButton;
    var cancelButton;
    var closeButton;
    var validator;
    var form;
    var modal;

    // Init form inputs
    var handleForm = function () {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'title': {
                        validators: {
                            notEmpty: {
                                message: 'Başlık Alanı Gereklidir'
                            }
                        }
                    },
                    'notification_text': {
                        validators: {
                            notEmpty: {
                                message: 'Bildirim İçeriği Gereklidir'
                            }
                        }
                    },
                    'notification_icon': {
                        validators: {
                            notEmpty: {
                                message: 'Bildirim ikonu gereklidir'
                            }
                        }
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        );

        // Action buttons
        submitButton.addEventListener('click', function (e) {
            e.preventDefault();

            // Validate form before submit
            if (validator) {
                validator.validate().then(function (status) {
                    console.log('validated!');

                    if (status == 'Valid') {
                        submitButton.setAttribute('data-kt-indicator', 'on');

                        // Disable submit button whilst loading
                        submitButton.disabled = true;

                            let formData = new FormData();
                            formData.append('_token', csrf_token)
                            formData.append('title', $('[name="title"]').val());
                            formData.append('customer_id', $('[name="customer_id"]').val());
                            formData.append('notification_text', $('[name="notification_text"]').val());
                            formData.append('notification_icon', $('[name="notification_icon"]').val());
                            formData.append('is_push', $('[name="is_push"]').is(':checked') ? 1 : 0);

                            $.ajax({
                                url: '/dashboard/customerNotification',
                                type: "POST",
                                processData: false,
                                contentType: false,
                                data: formData,
                                dataType: "JSON",
                                success: function (res) {
                                    if(res.status == "success"){
                                        modal.hide();
                                        form.reset();
                                        submitButton.disabled = false;
                                    }
                                    Swal.fire({
                                        text: res.message,
                                        icon: res.status,
                                        buttonsStyling: false,
                                        confirmButtonText: "Tamam, Devam Et!",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    });
                                }
                            });
                            setTimeout(function() {
                                submitButton.removeAttribute('data-kt-indicator');
                                location.reload();
                        }, 2000);
                    } else {
                        Swal.fire({
                            text: "Lütfen Zorunlu Alanları Doldurun.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    }

                });
            }
        });

        cancelButton.addEventListener('click', function (e) {
            e.preventDefault();

            Swal.fire({
                text: "İşlemi İptal Etmek İstediğinize Eminmisiniz?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Evet, eminim!",
                cancelButtonText: "Hayır, devam et",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    form.reset(); // Reset form
                    modal.hide(); // Hide modal
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "İşlem iptal edilmedi!.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Tamam, Devam Et!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });
                }
            });
        });

        closeButton.addEventListener('click', function(e){
            e.preventDefault();

            Swal.fire({
                text: "İşlemi İptal Etmek İstediğinize Eminmisiniz?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Evet, eminim!",
                cancelButtonText: "Hayır, devam et",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    form.reset(); // Reset form
                    modal.hide(); // Hide modal
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "İşlem iptal edilmedi!.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Tamam, Devam Et!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });
                }
            });
        })
    }

    return {
        // Public functions
        init: function () {
            // Elements
            modal = new bootstrap.Modal(document.querySelector('#kt_modal_add_notification'));

            form = document.querySelector('#kt_modal_add_notification_form');
            submitButton = form.querySelector('#kt_modal_add_notification_submit');
            cancelButton = form.querySelector('#kt_modal_add_notification_cancel');
            closeButton = form.querySelector('#kt_modal_add_notification_close');

            handleForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTModalAddAddress.init();
});
