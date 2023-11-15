"use strict";

// Class definition
var KTUsersUpdatePhoneVerify = function () {
    // Shared variables
    const element = document.getElementById('kt_modal_verify_phone');
    const form = element.querySelector('#kt_modal_update_phone_verify_form');
    const modal = new bootstrap.Modal(element);

    // Init add schedule modal
    var initUpdatePhoneVerify = () => {

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        var validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'verify_code': {
                        validators: {
                            notEmpty: {
                                message: 'Doğrulama Kodu Gereklidir'
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

        // Close button handler
        const newcloseButton = element.querySelector('[data-kt-users-modal-action-verify="close"]');
        newcloseButton.addEventListener('click', e => {
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

        // Cancel button handler
        const newcancelButton = element.querySelector('[data-kt-users-modal-action-verify="cancel"]');
        newcancelButton.addEventListener('click', e => {
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

        // Submit button handler
        const newsubmitButton = element.querySelector('[data-kt-users-modal-action-verify="submit"]');
        newsubmitButton.addEventListener('click', function (e) {
            // Prevent default button action
            e.preventDefault();

            // Validate form before submit
            if (validator) {
                validator.validate().then(function (status) {

                    if (status == 'Valid') {
                        // Show loading indication
                        newsubmitButton.setAttribute('data-kt-indicator', 'on');

                        // Disable button to avoid multiple click
                        newsubmitButton.disabled = true;

                        // Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                        setTimeout(function () {
                            // Remove loading indication
                            newsubmitButton.removeAttribute('data-kt-indicator');


                            // Enable button
                            newsubmitButton.disabled = false;

                            var formData = new FormData();
                            formData.append("_token", csrf_token_phone);
                            formData.append("code", $('[name="verify_code"]').val());
                            formData.append("customer_id", $('[name="customer_id"]').val());
                            formData.append("phone", $('[name="new_number"]').val());

                            $.ajax({
                                url: verifyPhoneUrl,
                                type: "POST",
                                data: formData,
                                dataType: "JSON",
                                processData: false,
                                contentType: false,
                                success: function (res) {
                                    console.log(res);
                                    if (res.status == "success"){
                                        modal.hide();
                                        $('#customerNewPhone').text(res.newPhone).attr('href', 'tel:'+ res.newPhone);
                                    }
                                    Swal.fire({
                                        text: res.message,
                                        icon: res.status,
                                        buttonsStyling: false,
                                        confirmButtonText: "Tamam, devam et!",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    }).then(function (result) {
                                        if (result.isConfirmed) {
                                            submitButton.disabled = false;
                                        }
                                    });

                                },
                            });

                            //form.submit(); // Submit form
                        }, 2000);
                    }
                });
            }
        });
    }

    return {
        // Public functions
        init: function () {
            initUpdatePhoneVerify();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTUsersUpdatePhoneVerify.init();
});
